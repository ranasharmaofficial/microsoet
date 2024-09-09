@if( $carts && count($carts) > 0 )
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
								@php
								   $total=0;
								   $i =0;
								   $l =0;

							   @endphp
							   @foreach ($carts as $item)
                                    <tr class="product-box-contain product_data">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="{{ url('/product/'.$item->product->slug) }}" class="product-image">
                                                    <img src="{{ uploaded_asset($item->product->thumbnail_img) }}"
                                                        class="img-fluid blur-up lazyload" alt="{{$item->product->name}}">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="{{ url('/product/'.$item->product->slug) }}">{{ \Illuminate\Support\Str::limit($item->product->name, 36, '...') }}</a>
                                                        </li>

                                                        <li class="text-content"><span class="text-title">Sold
                                                                By:</span> Microsoet</li>

																{{--<li class="text-content"><span
                                                                class="text-title">Quantity</span> - 500 g</li>--}}

                                                        <li>
                                                            <h5 class="text-content d-inline-block">Price :</h5>
                                                            <span><i class="fa fa-inr"></i> {{$item->price+$item->tax}}</span>
																{{--<span class="text-content">{{$item->quantity}} X {{$item->price+$item->tax}}</span>--}}
                                                        </li>

                                                       {{-- <li>
                                                            <h5 class="saving theme-color">Saving : $20.68</h5>
                                                        </li>--}}
														<input type="hidden" class="prod_id" value="{{$item->product_id}}">
														<input type="hidden" class="cart_id" value="{{$item->id}}">
                                                        <li class="quantity-price-box">
                                                            <div class="cart_qty">
                                                                <div class="input-group packageadd">
                                                                    <button type="button" class="btn qty-left-minus button-minus cart_button_minus"
                                                                        data-type="minus" data-field="quantity[{{ $item->id }}]">
                                                                        <i class="fa fa-minus ms-0"></i>
                                                                    </button>
                                                                    <input readonly class="form-control input-number qty-input"
                                                                        type="number" data-id="{{ $item->id }}" step="1" max="10" value="{{ $item->quantity }}" min="{{ $item->product->min_qty }}" max="" name="quantity[]">
                                                                    <button type="button" class="btn qty-right-plus button-plus cart_button_plus"
                                                                        data-type="plus" data-field="quantity[{{ $item->id }}]">
                                                                        <i class="fa fa-plus ms-0"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <h5>Total: $35.10</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">Price</h4>
                                            {{--<h5>$35.10 <del class="text-content">$45.68</del></h5>--}}
                                            <h5>{{$item->quantity}} X <i class="fa fa-inr"></i> {{$item->price+$item->tax}}</h5>
                                            {{--<h6 class="theme-color">You Save : $20.68</h6>--}}
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">Qty</h4>
                                            <li class="quantity-price-box">
												<div class="cart_qty">
													<div class=" justify-content-end">
														<div class="cart-add cart-add1 d-block">
														   <div class="input-group quantity_input justify-content-end">
															  <div class="input-group w-auto justify-content-end align-items-center packageadd">
																 <input type="button" value="-" class="button-minus rounded-circle quantity-left-minus icon-shape icon-sm cart_button_minus" data-field="quantity[{{ $item->id }}]">
																 <input style=" background-color: #d6dcd7;color:black;" type="number" data-id="{{ $item->id }}" step="1" max="10" value="{{ $item->quantity }}" min="{{ $item->product->min_qty }}" max="" name="quantity[]" class="kjsdbfkjsf quantity quantity-field text-center w-25 qty">
																 <input type="button" value='+' class="button-plus rounded-circle quantity-right-plus icon-shape icon-sm cart_button_plus" data-field="quantity[{{ $item->id }}]">
															  </div>
														   </div>
														   {{--<button class="remove float-right m-0 d-flow-root delete-cart-item">Remove <i class="fa-solid fa-trash-can"></i></button>--}}
														</div>
													</div>
									   
												</div>
											</li>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h5><i class="fa fa-inr"></i> {{$item->quantity*($item->price+$item->tax)}}/-</h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">Action</h4>
                                            {{--<a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>--}}
                                            <a class="remove close_button delete-cart-item" href="javascript:void(0)"><i class="fa fa-trash-o ms-0" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
									@php
									   $total +=$item->price * $item->quantity;
								   @endphp
								@endforeach
                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
							{{--<div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Coupon Code Here...">
                                    <button class="btn-apply">Apply</button>
                                </div>
                            </div>--}}
							@php
									if($total>=199){
										$delivery_charge = 0;
									}else{
										$delivery_charge = 19;
									}
									$amount_payable = $total+$delivery_charge;
								@endphp
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price"><i class="fa fa-inr"></i>  {{$total}}</h4>
                                </li>

                                <li>
                                    <h4>Delivery Charge</h4>
                                    <h4 class="price"><i class="fa fa-inr"></i> {{ $delivery_charge }}</h4>
                                </li>

                                {{--
								<li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li>--}}
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total Amount Payable</h4>
                                <h4 class="price theme-color"><i class="fa fa-inr"></i> {{ $amount_payable }}</h4>
                            </li>
                        </ul>
						
						@php
							$free_delivery_amount = 8999;
							$more_puchase_amount = $free_delivery_amount-$total;
						@endphp
						@if($total<$free_delivery_amount)
							<div class="p-2">
							<p class="font-weight-bold text-danger">Shop for <b><i class="fa fa-inr"></i> {{$more_puchase_amount}}</b> to save <b><i class="fa fa-inr"></i> 19</b> on Delivery Charge </p>
							</div>
						@endif

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = '{{ url('checkout') }}';"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = '{{ url('') }}';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			@else
				<div class="row p-2">
				   <div class="col-md-12">
					  <div class="boxcol p-4  pt-2">
						 <div class="container1">

						   <div class="border-bottom1 border-color-11 mt-3 mb-3">
							 
						 </div>

							<div class="shadow-sm bg-white p-4 rounded">
								<div class="text-center p-3">
									<i class="las la-frown la-3x opacity-60 mb-3"></i>
									<h3 class="h4 fw-700">{{translate('Your Cart is empty')}}</h3>
								</div>
							</div>


						 </div>
					  </div>
				   </div>

				</div>
			@endif

<script>
    $('.delete-cart-item').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).closest('.product_data').find('.cart_id').val();

        $.ajax({
            method: "POST",
            url: '{{ route('cart.removeFromCart') }}',
            data: {
                'id': id,
            },
            success: function(data) {
                // toastr.info("Removed from Cart!");
                updateNavCart(data.nav_cart_view, data.cart_count);
                $('#cart-summary').html(data.cart_view);
            }
        });
    });
</script>
