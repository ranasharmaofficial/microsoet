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

<div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-shopping-cart">
                                                <circle cx="9" cy="21" r="1"></circle>
                                                <circle cx="20" cy="21" r="1"></circle>
                                                <path
                                                    d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                </path>
                                            </svg>
											@if(isset($cart) && count($cart) > 0)
                                            <span class="position-absolute top-0 start-100 translate-middle badge">{{count($cart)}}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
											@else
												<span class="position-absolute top-0 start-100 translate-middle badge">0
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
											@endif
                                        </button>
                                        <div class="onhover-div">
                                            <ul class="cart-list">
											@if(isset($cart) && count($cart) > 0)
												@foreach($cart as $item)
													<li class="product-box-contain">
														<div class="drop-cart">
															<a href="product-left-thumbnail.html" class="drop-image">
																<img src="{{ uploaded_asset($item->product->thumbnail_img) }}" class="blur-up lazyloaded" alt="">
															</a>
															<div class="drop-contain">
																<a href="product-left-thumbnail.html">
																	<h5>{{ \Illuminate\Support\Str::limit($item->product->name, 36, '...') }}</h5>
																</a>
																<h6><span>{{$item->quantity}} x</span> ₹ {{$item->price}}</h6>
																<button class="close-button close_button">
																	<i class="fa-solid fa-xmark"></i>
																</button>
															</div>
														</div>
													</li>
												@endforeach
											@endif

                                            </ul>
                                            <div class="price-box">
                                                <h5>Total :</h5>
                                                <h4 class="theme-color fw-bold">₹ {{ $sumcartamount }}</h4>
                                            </div>
                                            @if(count($cart) > 0)
                                            <div class="button-group">
                                                <a href="{{ url('cart') }}" class="btn btn-sm cart-button">View Cart</a>
                                                <a href="{{ url('checkout') }}" class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>


									{{--
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

									--}}
