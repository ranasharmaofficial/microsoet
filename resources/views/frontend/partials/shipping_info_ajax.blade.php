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
                                    Select a Shipping address <!--ajax page-->
                                </p>
                            </div>
                        </div>


                    </div>
                </div>


                <!-- add new address button here -->
                <div class="row"></div>

                <div class="hotel-form pb-4 pt-2 shadow-none">
                    <div class="row">

                        @foreach (Auth::user()->addresses as $key => $address)
                        <div class="col-md-4 col-sm-12">
                            <div class="d-flex position-relative">
                                <div class="hotel-form py-4 px-2 mb-3 mt-1 shadow-none w-100 bg-white pt-2 border">
                                    <div class="px-2">
                                        <div class="user_location mt-1 pb-2">
                                            <label for="payment_method_bacs d-flex">
                                                <input onclick="saveShippingCharge(this)" id="{{ $address->id }}" class="input-radio" type="radio" name="address_id"
                                                    value="{{ $address->id }}" @if ($address->set_default)
                                                checked
                                                @endif required>
                                                @php
                                                $addid = $address->id;
                                                @endphp
                                                <span for="{{ $address->id }}" class="userf-name">{{$address->address_type}}</span>
                                            </label>

                                        </div>
                                        <div class="user_name mt-1">
                                            <span class="userf-name">
                                                {{$address->first_name.' '.$address->last_name}}
                                            </span>
                                        </div>
                                        <div class="phone_number mt-1">
                                            <span class="user-phone d-flex">
                                                <i class="fa fa-phone p-2 border rounded-circle" aria-hidden="true"></i>
                                                +91-{{ $address->phone }}
                                            </span>
                                        </div>
                                        <div class="user_email mt-1">
                                            <span class="user-email d-flex">
                                                <i class="fa fa-map-marker p-2 border rounded-circle"
                                                    aria-hidden="true"></i> {{$address->house_no}}, {{$address->area}},
                                                {{$address->city}}, {{$address->state}} {{$address->pin}}
                                            </span>
                                        </div>
                                        @if($address->set_default=='1')
                                            <div class="user_email edit-address mt-1 d-flex">
                                                <div class="w-100">
                                                    <button class="btn btn-success float-start add-buttonser">Default&nbsp;Address</button>
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
                                    <a href="javscript:void(0);" data-toggle="modal" data-target="#myModaladdress">
                                        <div class="px-2">
                                            <div class="user_location mt-1 pb-2 text-center">
                                                <i class="fa fa-plus border p-3 rounded-circle" aria-hidden="true"></i>
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

                <div id="myModaladdress" class="modal fade prolidneis" role="dialog">
                    <div class="modal-dialog w-50" id="modal-dialog45">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="box-soldid1back box-soldid2">
                                </div>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            <div class="modal-body">
                                <!--  <h2 style="    font-size: 22px; text-transform: uppercase;    text-align: center; font-weight: 600;"></h2> -->
                                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Add New
                                        Address</h3>
                                    <div class="deals">
                                        <hr class="mt-2">
                                    </div>
                                </div>

                                <form class="row" autocomplete="off" method="post" action="{{route('addAddress')}}">
                                    @csrf
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" aria-label="First Name" required requireddata-msg="Please enter a valid First Name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"  aria-label="Last Name" required requireddata-msg="Please enter a valid Last Name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="phone" placeholder="Phone No." aria-label="Phone No" required requireddata-msg="Please enter a valid Phone No." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="number" class="form-control" minlength="6" maxlength="6" name="pin" id="pincode" required  placeholder="Pin Code" aria-label="Pin Code" requireddata-msg="Please enter a valid Pin Code." data-error-class="u-has-error" data-success-class="u-has-success">
                                            <span class="text-danger" id='wrong_pincode'></span>
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" onclick="get_state_city()" name="house_no" required placeholder="House/Plot No" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="address" required placeholder="Full Address" aria-label="Full address" >
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="area" required placeholder="Street/Locality/Area" aria-label="Area" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="city" required id="cityid" placeholder="City" >
                                        </div>
                                    <div class="js-form-message form-group col-md-6 mb-3">
                                        <input type="text" class="form-control" name="state" required id="stateid" placeholder="State">
                                        </div>
                                    <div class="js-form-message form-group col-md-12 mb-3">
                                        <ul class="list-unstyled d-flex">

                                            <li class="m-3 mt-0 mb-0">
                                                <label for="office">
                                                    <input id="office" class="input-radio" type="radio" data-order_button_text="" value="Office" name="address_type">
                                                    <span>Office </span>
                                                </label>
                                            </li>
                                            <li class="m-3 mt-0 mb-0">
                                                <label for="Home">
                                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="Home" name="address_type" class="input-radio" id="Home">
                                                    <span>Home  </span>
                                                </label>
                                            </li>

                                            <li class="m-3 mt-0 mb-0">
                                                <label for="other">
                                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="Other" name="address_type" class="input-radio" id="other"  >
                                                    <span>Other  </span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mb-600 d-flex w-100">
                                        <div class="mb-3 w-auto"><button onclick="window.location.href='{{url('profile')}}'" class="btn edit-address1_1 btn-primary-dark-w px-5 w-100">Cancel</button></div>
                                        <div class="mb-3 w-50 mx-3"><button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Save Address</button></div>
                                    </div>
                                </form>

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
                                // $shipping_region = $shipping_info['city'];
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
                                        <a href="#"><img width="64" height="64"
                                                src="{{ uploaded_asset($cartItem->product->thumbnail_img) }}"
                                                alt=" "></a>
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

                                    {{--<td class="cart-product-subtotal1">
                                        <a href="javascript:void(0);">
                                            <span class="remove  amount"><i class="fa fa-times"
                                                    aria-hidden="true"></i></span>
                                        </a>
                                    </td>--}}

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="cart_item coupon-check p-3">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" value="" class="dart-form-control" placeholder="Enter Coupon Code..">
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <a href="#" class="btn normal-btn dart-btn-xs">Apply Coupon</a>
                            </div>
                        </div>
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
                                        <td class="w-25  border-0"><span id="total_shipping_cost">{{ single_price($shipping) }}</span></td>
                                    </tr>
                                    @if ($carts->sum('discount') > 0)
                                    <tr class="bd-nn1 mb-3 border-0">
                                        <td class="w-75  border-0">Coupon Discount</td>
                                        <td class="w-25  border-0"><span>{{ single_price($carts->sum('discount'))
                                                }}</span></td>
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

                    <!-- <form method="POST" action="{{route('pay-on-delivery')}}"> -->
                    <form action="{{ route('payment.checkout') }}" class="form-default" role="form" method="POST" id="checkout-form">
                        @csrf
                        <input type="hidden" name="owner_id" value="{{ $carts[0]['owner_id'] }}">

                        @if($addressCount>0)
                        <input type="hidden" name="address_id" id="adid" value="{{$addid}}">
                        @else
                        <input type="hidden" name="address_id" id="adid" value="">
                        @endif
                        @if ($errors->has('address_id'))
                        <span style="font-size:18px;" class="invalid-feedback p-4" role="alert">
                            <strong>{{ $errors->first('address_id') }}</strong>
                        </span>
                        @endif

                        <div class="payments-options p-4 pt-0">
                            <div class="row">
                                @if(get_setting('razorpay') == 1)
                                    <div class="col-6 col-md-6">
                                        <label class="aiz-megabox d-block mb-3">
                                            <input value="razorpay" class="online_payment" type="radio" name="payment_option" checked>
                                            <span class="d-block p-3 aiz-megabox-elem">
                                                <img src="{{ static_asset('assets/img/cards/rozarpay.png')}}" class="img-fluid mb-2">
                                                <span class="d-block text-center">
                                                    <span class="d-block fw-600 fs-15">{{ translate('Razorpay')}}</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                @endif

                                @if(get_setting('cash_payment') == 1)
                                    @php
                                        $cod_on = 1;
                                        foreach($carts as $cartItem){
                                            $product = \App\Models\Product::find($cartItem['product_id']);
                                            if($product['digital'] == 1){
                                                $digital = 1;
                                            }
                                            if($product['cash_on_delivery'] == 0){
                                                $cod_on = 0;
                                            }
                                        }
                                    @endphp
                                    @if($cod_on == 1)
                                        <div class="col-6 col-md-6">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="cash_on_delivery" class="online_payment" type="radio" name="payment_option" checked>
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="{{ static_asset('assets/img/cards/cod.png')}}" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15">{{ translate('Cash on Delivery')}}</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    @endif
                                @endif
                            </div>

                            <div class="row">
                                <label class="checkbox d-flex align-items-center">
                                    <input type="checkbox" required id="agree_checkbox" style="width:20px; height:20px; margin:0px">
                                    <span class="aiz-square-check"></span>
                                    <span style="padding-left:10px">{{ translate('I agree to the')}}</span>
                                </label>
                            </div>

                            <div class="col-6 text-right">
                                <button type="button" onclick="submitOrder(this)" class="btn btn-primary fw-600">{{ translate('Complete Order')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>