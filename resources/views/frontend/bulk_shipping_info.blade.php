@extends('frontend.master')

@section('content')
<section class="pageTitle">
        <div class="container"> </div>
    </section>
    <!--top banner end -->
    <div class="form_section text-left">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadmcrumsize">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Bulk Products Checkout </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <!-- add new address button here -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="text-center text-dark bg-warning text-capitalize fw-700 rounded">
                                        Proceed to buy with these items
                                    </p>
                                    <p class="border border-1 text-capitalize border-start-0 border-end-0 p-1">
                                        Select a Shipping address
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>

                    <!-- add new address button here -->
                    <div class="hotel-form pb-4 pt-2 shadow-none">
                        <div class="row">
						
							@foreach (Auth::user()->addresses as $key => $address)
								<div class="col-md-4 col-sm-12">
									<div class="d-flex position-relative">
										<div class="hotel-form py-4 px-2 mb-3 mt-1 shadow-none w-100 bg-white pt-2 border">
											<div class="px-2">
												<div class="user_location mt-1 pb-2">
													<label for="payment_method_bacs d-flex">
														<input class="input-radio" type="radio" name="address_id" value="{{ $address->id }}" @if ($address->set_default)
													checked
												@endif required>
												@php
													$addid = $address->id; 
												@endphp
														<span class="userf-name">{{$address->address_type}}</span>
													</label>

												</div>
												<div class="user_name mt-1">
													<span class="userf-name">
														{{$address->first_name.' '.$address->last_name}} 
													</span>
												</div>
												<div class="phone_number mt-1">
													<span class="user-phone d-flex">
														<i class="fa fa-phone p-2 border rounded-circle"
															aria-hidden="true"></i>
														+91-{{ $address->phone }}
													</span>
												</div>
												<div class="user_email mt-1">
													<span class="user-email d-flex">
														<i class="fa fa-map-marker p-2 border rounded-circle"
															aria-hidden="true"></i> {{$address->house_no}}, {{$address->area}}, {{$address->city}}, {{$address->state}} {{$address->pin}}
													</span>
												</div>
												@if($address->set_default=='1')
												<div class="user_email edit-address mt-1 d-flex">

													<div class="w-100">
														<button
															class="btn btn-success float-start add-buttonser">Default&nbsp;Address</button>
													</div>
												</div>
												@endif
											</div>
										</div>
									</div>
								</div>
							@endforeach
						 
                            <div class="col-md-4 col-sm-12">
                                <div class="d-flex position-relative">
                                    <div class="hotel-form py-4 px-2 mb-3 mt-1 shadow-none w-100 bg-white pt-4 border">
                                        <a href="{{url('my_addressbook#edit-address1')}}">
                                            <div class="px-2 py-4">
                                                <div class="user_location mt-1 pb-2 text-center">
                                                    <i class="fa fa-plus border p-3 rounded-circle"
                                                        aria-hidden="true"></i>
                                                    <h6 class="m-3">
                                                        Add New Address
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="colampoxe m-0  pt-1 mt-0">
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                            <h3 class="section-title section-title__sm mb-0 pb-0 mt-3 font-size-18">Your Orders</h3>
                            <div class="deals">
                                <hr>
                            </div>
                        </div>


                        <div class="table-responsive box-shadow">

                            <table class="table cart checkout border">
                                <thead>
                                    <tr>
                                        <th class="cart-product-thumbnail">Product</th>
                                        <th class="cart-product-name">Description</th>
                                        <th class="cart-product-quantity">Quantity</th>
                                        <th class="cart-product-subtotal">Total</th>
                                        <th class="cart-product-subtotal">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $tax = 0;
                                        $shipping = 0;
                                        $product_shipping_cost = 0;
                                    @endphp

                                    @foreach ($carts as $cartItem)
                                        @php
                                            $product = \App\Models\Product::find($cartItem['product_id']);
                                            $subtotal += $cartItem['price'] * $cartItem['quantity'];
                                            $tax += $cartItem['tax'] * $cartItem['quantity'];
                                            $product_shipping_cost = $cartItem['shipping_cost'];
                                            
                                            $shipping += $product_shipping_cost;
                                            
                                            $product_name_with_choice = $product->getTranslation('name');
                                            if ($cartItem['variant'] != null) {
                                                $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];
                                            }
                                        @endphp
                                
                                        <tr class="cart_item border-bottom">
                                            <td class="cart-product-thumbnail">
                                                <a href="#"><img width="64" height="64" src="{{ uploaded_asset($cartItem->product->thumbnail_img) }}" alt=" "></a>
                                            </td>
                                            <td class="cart-product-name">
                                                <a href="#">{{$cartItem->product->name}}</a>
                                            </td>
                                            <td class="quantity">
                                                <span>{{$cartItem->quantity}}</span>
                                            </td>
                                            <td class="cart-product-subtotal">
                                                <span class="amount">₹ {{$cartItem->quantity*$cartItem->price}}</span>
                                            </td>
                                        </tr>
									@endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="col-sidkildw mt-4">
                        <div class=" boxcol  product-list-cart p-4 pt-2 pb-2">
                            <div class="border-bottom1 border-color-11 mt-3 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> Cart Totals</h3>
                                <div class="deals">
                                    <hr>
                                </div>
                            </div>
						
                            <div class="table-responsive cartpage  product-list-cart">
                                <table class="table3 table-cartsummary border">
                                    <tbody>
                                        <tr class="bd-nn1 mb-3">
                                            <td class="w-75 border-0">Items</td>
                                            <td class="w-25 border-0"><span>{{ count($carts) }} </span></td>
                                        </tr>
                                        <tr class="bd-nn1 mb-3">
                                            <td class="w-75 border-0">Subtotal</td>
                                            <td class="w-25 border-0"><span>{{ single_price($subtotal) }}</span></td>
                                        </tr>
										<tr class="bd-nn1 mb-3">
                                            <td class="w-75 border-0">Tax</td>
                                            <td class="w-25 border-0"><span>{{ single_price($tax) }}</span></td>
                                        </tr>
                                        <tr class="bd-nn1 mb-3 border-0">
                                            <td class="w-75  border-0">Shipping</td>
                                            <td class="w-25  border-0"><span>{{ single_price($shipping) }}</span></td>
                                        </tr>
										@if ($carts->sum('discount') > 0)
                                            <tr class="bd-nn1 mb-3 border-0">
                                                <td class="w-75  border-0">Coupon Discount</td>
                                                <td class="w-25  border-0"><span>{{ single_price($carts->sum('discount')) }}</span></td>
                                            </tr>
										@endif

										@php
                                            $total = $subtotal+$tax+$shipping;
                                            if ($carts->sum('discount') > 0){
                                                $total -= $carts->sum('discount');
                                            }
                                        @endphp

                                        <tr class="amount-pay border-bottom">
                                            <td class="w-75">Payable Total Amount</td>
                                            <td class="w-25"><span>{{ single_price($total) }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <form method="POST" action="{{route('BulkpayOnDelivery')}}">
                            @csrf
                            <input type="hidden" name="address_id" id="adid" value="{{$addid}}">
                            <div class="payments-options p-4 pt-0">
                                <button type="submit" class="placeholder-buttonsl w-100 btn-success mt-3">Submit Order Request</button>
                            </div>
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
        $(document).ready(function() {
            var ckbox = $("input[name='address_id']");
            var chkId = '';
            $('input').on('click', function() {
                
                if (ckbox.is(':checked')) {
                $("input[name='address_id']:checked").each ( function() {
                        chkId = $(this).val() + ",";
                    chkId = chkId.slice(0, -1);
                });
                
                //alert ( $(this).val() ); // return all values of checkboxes checked
                //$('#adid')$(this).val();
                $('#adid').val(chkId);
                //alert(chkId); // return value of checkbox checked
                }     
            });
        });
	</script>
@endsection

@section('modal')
    @include('frontend.partials.address_modal')
@endsection