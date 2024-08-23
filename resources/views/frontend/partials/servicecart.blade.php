@php
if(auth()->user() != null) {
    $user_id = Auth::user()->id;
    $cart = \App\Models\ServiceCart::where('user_id', $user_id)->get();
} else {
    $temp_user_id = Session()->get('temp_user_id');
    if($temp_user_id) {
        $cart = \App\Models\ServiceCart::where('temp_user_id', $temp_user_id)->get();
	}
}
@endphp

<a class="">
	<i class="fa fa-shopping-basket" aria-hidden="true"></i>
	@if(isset($cart) && count($cart) > 0)
		<span class="service_cart-count service_cart_btn">{{ count($cart)}}</span>
	@else
		<span class="service_cart-count">0</span>
	@endif
</a>
<span class="tooltiptext">Services</span>
