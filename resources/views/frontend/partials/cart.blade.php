@php
if(auth()->user() != null) {
    $user_id = Auth::user()->id;
    $cart = \App\Models\Cart::where('user_id', $user_id)->get();
	$sumcartamount = \App\Models\Cart::where('user_id',$user_id)->sum('total_price');
} else {
    $temp_user_id = Session()->get('temp_user_id');
    if($temp_user_id) {
        $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
		$sumcartamount = \App\Models\Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
    }
}

@endphp
	<a href="{{url('cart')}}">
		<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> 
		@if(isset($cart) && count($cart) > 0)
		<span class="cart-count">{{ count($cart)}}</span> 
		 <label class="showcatlist">₹</label> <b class="cart-amount">{{$sumcartamount}}</b>
		@else
			<span class="cart-count">0</span>
			 <label class="showcatlist">₹</label> <b class="cart-amount">00</b>
			@endif
	</a>						
<span class="tooltiptext">Products</span>