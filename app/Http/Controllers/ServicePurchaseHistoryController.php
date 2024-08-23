<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderDetail;
use App\Models\ServiceEnquiry;
use Auth;
use DB;

class ServicePurchaseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = ServiceOrder::where('user_id', Auth::user()->id)->orderBy('code', 'desc')->paginate(25);
        foreach ($orders as $key => $value) {
            $value['order_details'] = ServiceOrderDetail::where('service_order_id', $value->id)->get();
            $value['count_cancelled_order'] =  ServiceOrderDetail::where('service_order_id',$value->id)->where('delivery_status','cancelled')->count();
            $value['count_delivered_order'] =  ServiceOrderDetail::where('service_order_id',$value->id)->where('delivery_status','delivered')->count();
            $value['cancelled_order_list'] =  ServiceOrderDetail::where('service_order_id', $value->id)->where('delivery_status','cancelled')->get();
            $value['delivered_order_list'] =  ServiceOrderDetail::where('service_order_id', $value->id)->where('delivery_status','delivered')->get();
        }
        // dd($orders);
        
        return view('frontend.user.service.purchase_history', compact('orders'));
    }

    // public function productReturn(){
    //     return view('frontend.user.product_return');
    // }
    // public function helpSupport(){
    //     return view('frontend.user.help_support');
    // }
    // public function favouriteStore(){
    //     return view('frontend.user.favourite_store');
    // }
    // public function feedback(){
    //     return view('frontend.user.feedback');
    // }
    // public function ebbbucksBalance(){
    //     return view('frontend.user.ebbbucks-balance');
    // }
    // public function cluesBucks(){
    //     return view('frontend.user.ebbbucks-cluesbucks');
    // }
    // public function chat(){
    //     return view('frontend.user.chat');
    // }
    

    // public function purchase_history_details(Request $request)
    // {
    //     $order = ServiceOrder::findOrFail($request->order_id);
    //     $order->delivery_viewed = 1;
    //     $order->payment_status_viewed = 1;
    //     $order->save();
    //     return view('frontend.user.order_details_customer', compact('order'));
    // }

    public function orderDetails($id)
    {
        $order = ServiceOrder::findOrFail($id);
        $order_details = ServiceOrderDetail::where('service_order_id',$order->id)->get();
        // dd($order_details);
        return view('frontend.user.service.order-details', compact('order','order_details'));
    }

    public function enquiry()
    {
        $auth_user_id = Auth::user()->id;
        $enquiries = ServiceEnquiry::select('*')->where('user_id', $auth_user_id)->paginate(25);
        return view('frontend.user.service.ask_price_list', compact('enquiries'));
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