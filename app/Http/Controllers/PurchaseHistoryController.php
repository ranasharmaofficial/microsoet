<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Auth;
use DB;

use App\Models\SmsTemplate;

class PurchaseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('code', 'desc')->paginate(25);
        foreach ($orders as $key => $value) {
            $value['order_details'] = OrderDetail::where('order_id', $value->id)->get();
            $value['count_cancelled_order'] =  OrderDetail::where('order_id',$value->id)->where('delivery_status','cancelled')->count();
            $value['count_delivered_order'] =  OrderDetail::where('order_id',$value->id)->where('delivery_status','delivered')->count();
            $value['cancelled_order_list'] =  OrderDetail::where('order_id', $value->id)->where('delivery_status','cancelled')->get();
            $value['delivered_order_list'] =  OrderDetail::where('order_id', $value->id)->where('delivery_status','delivered')->get();
        }
        // $cancelled_order = Order::where('user_id', Auth::user()->id)->where('delivery_status','cancelled')->orderBy('code', 'desc')->paginate(25);

        // $delivered_order = Order::where('user_id', Auth::user()->id)->orderBy('code', 'desc')->paginate(25);
        // dd($cancelled_order);
        return view('frontend.user.purchase_history', compact('orders'));
    }

    public function productReturn(){
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('code', 'desc')->paginate(25);
        foreach ($orders as $key => $value) {
            $value['order_details'] = OrderDetail::where('order_id', $value->id)->get();
            $value['count_return_request'] =  OrderDetail::where('order_id',$value->id)->where('delivery_status','return_request')->count();
            $value['count_returned_order'] =  OrderDetail::where('order_id',$value->id)->where('delivery_status','returned')->count();
            $value['return_request_list'] =  OrderDetail::where('order_id', $value->id)->where('delivery_status','return_request')->get();
            $value['returned_order_list'] =  OrderDetail::where('order_id', $value->id)->where('delivery_status','returned')->get();
        }
        // dd($orders->returned_order_list);
        return view('frontend.user.product_return', compact('orders'));
    }
    public function helpSupport(){
        return view('frontend.user.help_support');
    }
    public function favouriteStore(){
        return view('frontend.user.favourite_store');
    }
    public function feedback(){
        return view('frontend.user.feedback');
    }
    public function ebbbucksBalance(){
        return view('frontend.user.ebbbucks-balance');
    }
    public function cluesBucks(){
        return view('frontend.user.ebbbucks-cluesbucks');
    }
    public function chat(){
        return view('frontend.user.chat');
    }


    public function digital_index()
    {
        $orders = DB::table('orders')
                        ->orderBy('code', 'desc')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->join('products', 'order_details.product_id', '=', 'products.id')
                        ->where('orders.user_id', Auth::user()->id)
                        ->where('products.digital', '1')
                        ->where('order_details.payment_status', 'paid')
                        ->select('order_details.id')
                        ->paginate(15);
        return view('frontend.user.digital_purchase_history', compact('orders'));
    }

    public function purchase_history_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_viewed = 1;
        $order->payment_status_viewed = 1;
        $order->save();
        return view('frontend.user.order_details_customer', compact('order'));
    }
    public function orderDetails($id)
    {
        $order = Order::findOrFail($id);
        $order_details = OrderDetail::where('order_id',$order->id)->get();
        // dd($order_details);
        return view('frontend.order-details', compact('order','order_details'));
    }

    public function order_cancel($id){
        $orders = Order::findOrFail($id);
        $order_details = OrderDetail::where('order_id',$id)->first();
        $product_name = Product::where('id', $order_details->product_id)->first();

        return view('frontend.user.cancel_order_details', compact('order_details','orders','product_name'));
    }

    public function cancel_product_order(Request $request)
    {
        $request->validate([
            'cancellation_reason' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'order_id' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);
        $canel_product_order = OrderDetail::where('order_id', '=', $request->order_id)->where('product_id', $request->product_id)
            ->update([
                'cancellation_reason' => $request->cancellation_reason,
                'delivery_status' => 'cancel_request',
                'cancellation_time' => now(),
            ]);

        if ($canel_product_order) {
            $mail_template = view('mailers.order_cancellation.order_cancellation',compact('order'));
            $subject = "Request to Cancel the Order";
            $mail_data = array(
                "mail_identifier" => "product_order_cancelled",
                "to"=> $order->user->email,
                "name"=> $order->user->name,
                "subject"=> $subject . ' - ' . $order->code,
                "template"=> $mail_template,
            );
            $user_mail = new \App\Http\Controllers\SendmailerController;
            $user_mail->StoreMail($mail_data);

            //cancellation request by customer

            $user = User::where('id', Auth::user()->id)->first();
            $sms_template   = SmsTemplate::where('identifier','order_cancel_request')->first();
            $sms_body       = $sms_template->sms_body;
            $sms_body       = str_replace('[[ordercode]]', $order->code, $sms_body);
            // $sms_body       = str_replace('[[link]]', env('APP_URL'), $sms_body);
            $template_id    = $sms_template->template_id;

            $userdata = array(
                "sms_indentifier" => "order_cancel_request",
                "sms_from"=> env('APP_NAME'),
                "sms_to"=> $user->phone,
                "sms_body"=> $sms_body,
                "template_id"=> $template_id,
                "user_id"=> $user->id,
            );
            $otpController = new OTPVerificationController;
            $otpController->store_phone_verification($user, $userdata);

            return redirect('purchase_history')->with(session()->flash('alert-danger', 'Request to Cancel the Order!'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please! try again later.'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
