@if( $carts && count($carts) > 0 )
            <div class="row p-2">
               <div class="col-md-9">
			   
                  <div class="boxcol p-4  pt-2">
                     <div class="container1">

					   <div class="border-bottom1 border-color-11 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> <i class="fa-solid fa-cart-shopping"></i> My Cart</h3>
						<div class="deals">
                     <hr>
                  </div>
                     </div>
						<div id="">
							<table class="table1" id="cart" class="table table-hover table-condensed">

							   <tbody style="border: 1px solid #d3d3d385; border-radius:10px;">
							   @php
								   $total=0;
								   $i =0;
								   $l =0;

							   @endphp
							   <script>
								   var total_charge = 0;
								   var total_cart_price_cod = 0;
							   </script>
							   @foreach ($carts as $item)
								  <tr class="product_data">
									 <td data-th="Product">
										<div class="row">

										   @if ($item->product->thumbnail_img == null)
											  <div class="col-md-2 col-sm-6 hidden-xs">
												 <img src="{{ static_asset('assets_web/img/placeholder.png') }}" alt="" class="cart-img" />
											  </div>
										   @else
											  <div style="cursor:pointer;" onclick="window.location.href='{{ url('/product/'.$item->product->name) }}'" class="col-md-2 col-sm-6 hidden-xs">
												 <img src="{{ uploaded_asset($item->product->thumbnail_img) }}" alt="{{$item->product->name}}" class="cart-img" />
											  </div>
										   @endif
												@php
													$seller_details = \App\Models\Shop::where('user_id', $item->product->user_id)->first();
                                                    // dd( $seller_details->pincode);

												@endphp
										 
										   <div class="col-md-7 col-sm-6 text-cart">
										   <h4 class="nomargin">{{$item->product->name}}</h4>

											<div class="row">
											  <div class="col-sm-4 ">
												  <p class="pp-cart m-0">{{$item->product->unit}}</p>
												  <p class="pp-cart m-0">&#8377;{{$item->price+$item->tax}}/-</p>
												  <p class="pp-cart m-0">Total: {{$item->quantity}} X {{$item->price+$item->tax}} = &#8377;{{$item->quantity*($item->price+$item->tax)}}/-</p>
											  </div>
                                             <!--<div class="col-sm-3 cartoff">
                                             8 % Off
                                             </div>  --->
											</div>
										</div>
                                       <input type="hidden" class="prod_id" value="{{$item->product_id}}">
                                       <input type="hidden" class="cart_id" value="{{$item->id}}">
                                       <div class="col-md-3 col-sm-12 input-cart">
                                       <div class="cart-add cart-add1 d-block">
                                       <div class="input-group quantity_input justify-content-end">
                                          <div class="input-group w-auto justify-content-end align-items-center packageadd">
                                             <input type="button" value="-" class="button-minus rounded-circle quantity-left-minus icon-shape icon-sm cart_button_minus" data-field="quantity[{{ $item->id }}]">
                                             <input type="number" data-id="{{ $item->id }}" step="1" max="10" value="{{ $item->quantity }}" min="{{ $item->product->min_qty }}" max="" name="quantity[]" class="kjsdbfkjsf quantity quantity-field text-center w-25 qty">
                                             <input type="button" value="+" class="button-plus rounded-circle quantity-right-plus icon-shape icon-sm cart_button_plus" data-field="quantity[{{ $item->id }}]">
                                          </div>
                                       </div>
                                    <button class="remove float-right m-0 d-flow-root delete-cart-item">Remove <i class="fa-solid fa-trash-can"></i></button>
                                 </div>
								 <span class="print_delivery_charge_here"></span>

                                       </div>
                                       <div class=" col-lg-12 bd-bt "></div>
                                    </div>
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
				  </form>
               </div>
               <div class="col-md-3">
               <div class="col-sidkild">
                  <div class=" boxcol  product-list-cart p-4 pt-2">
				  <div class="border-bottom1 border-color-11 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> Order Summary</h3>
						<div class="deals">
                     <hr>
                  </div>
                     </div>

                     <div id="cart_total_price" class="table-responsive cartpage  product-list-cart">
                        <table class="table3 table-cartsummary">
                           <tbody>
						   @php
									if($total>=199){
										$delivery_charge = 0;
									}else{
										$delivery_charge = 19;
									}
									$amount_payable = $total+$delivery_charge;
								@endphp
                              <tr class="bd-nn1 mb-3">
                                 <td class="w-75 border-0">Price (<span class="cart_count"></span> Item)</td>
                                 <td class="w-25 border-0">₹ <span>{{$total}}</span></td>
								 <input type="hidden" id="total_cart_price" class="total_cart_price" value="{{$total}}" name="total_cart_price">
								 <input type="hidden" id="total_code_charge" class="total_code_charge" value="0" name="total_code_charge">
								 <input type="hidden" id="total_cart_price_with_cod___" class="total_cart_price_with_cod___" value="0" name="total_cart_price_with_cod___">
								 <input type="hidden" id="total_cccprice" class="total_cccprice" value="0" name="total_cccprice">
                              </tr>
                              <tr class="bd-nn1 mb-3 border-0">
                                 <td class="w-75  border-0">Delivery Charge</td>
                                 <td class="w-25  border-0">₹ <span class="show_delivery_charge">{{ $delivery_charge }}</span></td>
                              </tr>
                              <tr class="amount-pay">
                                 <td class="w-75">Amount Payable</td>
                                 <td class="w-25">₹ <span class="total_cart_price_with_cod">{{ $amount_payable }}</span></td>
                                 <!--<td class="w-25">₹ <span class="total_cart_price_with_cod">{{$total+0}}</span></td>-->
                              </tr>
                           </tbody>
                        </table>
						@php
							$free_delivery_amount = 199;
							$more_puchase_amount = $free_delivery_amount-$total;
						@endphp
						@if($total<$free_delivery_amount)
							<p class="font-weight-bold text-danger">Shop for <b><i class="fa fa-inr"></i> {{$more_puchase_amount}}</b> to save <b><i class="fa fa-inr"></i> 19</b> on Delivery Charge </p>
						@endif
                     </div>
					 <form action="{{ route('cart.storeDeliveryCharge') }}" method="post">
						@csrf
						 
							<div class="row">
								<button type="submit" class="cont2 w-100">  Proceed to checkout</button>
								<div style="text-align: center;" class="continue align-items-center"><a href="{{url('')}}" class=""><i class="fa-solid fa-cart-shopping"></i> Continue Shopping</a></div>
							</div>
						 
					</form>
                  </div>
                  <div class="boxcol  product-list-cart  col-cartpoint p-4 pt-2">
                     <div class="">
                        <div class="cartPointsPan">
                           <div class="pointsWrap">
                              <div class="icons"><img src="{{static_asset('assets_web/img/iconcome1.svg')}}" alt="Lowest Price Guaranteed"></div>
                              <div class="pointLabel">Lowest Price Guaranteed</div>
                           </div>
                           <div class="pointsWrap">
                              <div class="icons"><img src="{{static_asset('assets_web/img/iconcome2.svg')}}" alt="Worldwide Delivery"></div>
                              <div class="pointLabel">Worldwide Delivery</div>
                           </div>
                           <div class="pointsWrap">
                              <div class="icons"><img src="{{static_asset('assets_web/img/iconcome3.svg')}}" alt="Easily Track your Order"></div>
                              <div class="pointLabel">Easily Track your Order</div>
                           </div>
                           <div class="pointsWrap">
                              <div class="icons"><img src="{{static_asset('assets_web/img/iconcome4.svg')}}" alt="Buy Products on Credit"></div>
                              <div class="pointLabel">Buy Products on Credit</div>
                           </div>
                           <div class="scheduledCallback">
                              <div><img src="{{static_asset('assets_web/img/iconcome5.svg')}}" alt="scheduleCallback"></div>
                              <div>
                                 <div>Any Confusion "No worries"</div>
                                 <button type="button" class="btn btn-default">Request A Call Back</button>
                                 <div class="hide">
                                    <div class="modal">
                                       <div class="modalInnerContent callbackModal m">
                                          <div class="modalHeader">
                                             <div class="modalTitle">Request A Call Back</div>
                                             <button type="button" class="btn close">
                                                <svg width="14" height="14" viewBox="0 0 24 24" style="display: inline-block; vertical-align: middle;">
                                                   <path d="M14.6,12l8.8-8.8C23.8,2.8,24,2.4,24,1.9s-0.2-1-0.5-1.3c-0.7-0.7-1.9-0.7-2.6,0L12,9.4L3.2,0.6c-0.7-0.7-1.9-0.7-2.6,0s-0.7,1.9,0,2.6L9.4,12l-8.8,8.8c-0.7,0.7-0.7,1.9,0,2.6s1.9,0.7,2.6,0l8.8-8.8l8.8,8.8c0.4,0.4,0.8,0.5,1.3,0.5s1-0.2,1.3-0.5c0.4-0.4,0.5-0.8,0.5-1.3s-0.2-1-0.5-1.3L14.6,12z" fill="#000"></path>
                                                </svg>
                                             </button>
                                          </div>
                                          <div class="modalContent"><iframe title="Contact form" frameborder="0" src="#2" style="height: 650px; width: 99%; border: none;"></iframe></div>
                                       </div>
                                       <span role="button" tabindex="0" class="backdropOverlay"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
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
							<h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> <i class="fa-solid fa-cart-shopping"></i> My Cart</h3>
							<div class="deals">
						 <hr>
					  </div>
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
