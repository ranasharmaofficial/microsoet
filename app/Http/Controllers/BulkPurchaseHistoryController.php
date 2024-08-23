<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulkOrder;
use App\Models\BulkOrderDetail;
use Auth;
use DB;

class BulkPurchaseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulk_orders = BulkOrder::where('user_id', Auth::user()->id)->orderBy('code', 'desc')->paginate(10);
        return view('frontend.user.bulk_purchase_history', compact('bulk_orders'));
		
    }
	/*
    public function productReturn(){
        return view('frontend.user.product_return');
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
        $order = BulkOrder::findOrFail($request->order_id);
        $order->delivery_viewed = 1;
        $order->payment_status_viewed = 1;
        $order->save();
        return view('frontend.user.order_details_customer', compact('order'));
    }
	*/
    public function orderDetails($id)
    {
        $order = BulkOrder::findOrFail($id);
        return view('frontend.bulk-order-details', compact('order'));
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
