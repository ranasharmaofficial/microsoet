@extends('frontend.master')

@section('content')
    <section class="pageTitle">
        <div class="container"> </div>
    </section>

    <div class="form_section text-left">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadmcrumsize">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Service Checkout </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-md-12  carts_nbs">
                    <div class="boxcol p-4  pt-2">
                        <div class="container1">
                        
                            <div class="border-bottom1 border-color-11 mt-3 mb-3">
                                <h4 class="section-title section-title__sm mb-0 pb-0" style="font-size:18px;"> 
                                    <i class="fa-solid fa-cart-shopping"></i> My Service Quotation
                                </h4>
                                <div class="deals"> 
                                    <hr>
                                </div>
                            </div>

                            {{-- Main Form for storing all data into db start --}}
                            <form method="POST" action="{{route('service-pay-on-delivery')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 border p-4">
                                        <div class="row">
    
                                            <div class="js-form-message p-0 mb-3">
                                                <p class="text-center text-dark bg-warning text-capitalize fw-700 rounded m-0">
                                                    Quotation Form (Nature Of Work : End-to-End Construction)
                                                </p>
                                            </div>
                                            
                                            <div class="js-form-message form-group" style="position:relative;">
                                                <label class="formpoplabel">Property Type</label>
                                                <input type="text" name="property_type" value="{{$get_common_fields->name}}" class="form-control empty" placeholder="Property Type" required readonly>
                                            </div>

                                            @if($get_common_fields->is_form_field == 1)
                                                @foreach (explode(",",$get_common_fields->form_fields) as $field)
                                                    <div class="js-form-message form-group col-md-6" style="position:relative;">
                                                        <label class="formpoplabel">{{$field}}</label>
                                                        <input type="text" name="common_lables[]" value="{{$field}}" class="form-control empty" placeholder="Common Lables" required readonly>
                                                        <input type="text" name="common_value[]" value="" class="form-control empty" placeholder="{{$field}}" required>
                                                    </div>
                                                @endforeach
                                            @endif
                                            
                                            <div class="js-form-message form-group">
                                                <label class="formpoplabel">Additional requirement</label>
                                                <textarea name="additional_requirement" required class="form-control textareas h-200" placeholder="Additional requirement"></textarea>
                                            </div>
                                            
                                        </div>
                                    
                                        <div class="col-md-12 col-sm-12">
                                            <!-- add new address button here -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-dark bg-warning text-capitalize fw-700 rounded">
                                                                Select A Service address
                                                            </p>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- add new address button here -->

                                            <div class="hotel-form pt-2 shadow-none">
                                                <div class="row">
                                                    @foreach (Auth::user()->addresses as $key => $address)
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="d-flex position-relative">
                                                                <div class="hotel-form py-4 px-2 mb-0 mt-1 shadow-none w-100 bg-white pt-2 border">
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
                                                            <div class="hotel-form py-4 px-2 mb-0 mt-1 shadow-none w-100 bg-white pt-4 border">
                                                                <a href="javscript:void(0);"  data-toggle="modal" data-target="#myModaladdress">
                                                                    <div class="px-2">
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
                                            
                                        </div>        
                                    </div>

                                    
                                    <div class="col-md-4 col-sm-12 border p-4">
                                        <div class="js-form-message form-group border-bottom">
                                            <h5 class="formpoplabel fs-18">Your Orders</h5>
                                        </div>

                                        <div class="addservproceedscroll product_data">
                                            @foreach ($serivice_carts as $cartItem)
                                                @if($cartItem->service != null)
                                                <div class="row py-2 border-bottom">
                                                    <div class="col-md-3 col-sm-3 text-center">
                                                        <img src="{{ uploaded_asset($cartItem->service->thumbnail_img) }}" alt="{{$cartItem->service->name}}" class="addcartservimg">
                                                    </div>
                                                    <div class="col-md-7 col-sm-6">
                                                        <strong>{{ $cartItem->service->name }}</strong>
                                                    </div>
                                                    <input type="hidden" class="prod_id" value="{{$cartItem->service_id}}">
                                                    <input type="hidden" class="cart_id" value="{{$cartItem->id}}">
                                                    <div class="col-md-2 col-sm-2 carts_nbs">
                                                        <button class="remove w-75 m-0 d-flow-root delete-service-cart-item">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach 

                                        </div>
                                        
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
                                        <div class="payments-options p-4 pt-0 border-top mt-4">
                                            <!--<span class="text-center d-block fs-5"><b>Payment Option</b></span>
                                            <span class="text-center d-block fs-6">or</span>-->
                                            <button type="submit" class="placeholder-buttonsl w-100 btn-success mt-3">Proceed to checkout</button>
                                            
                                        </div>

                                        <div class="payments-options p-4 pt-0">
                                            <button class="placeholder-buttonsl w-100 btn-danger mt-4"><i class="fa-solid fa-cart-shopping"></i> Continue Shopping</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- Main Form for storing all data into db end --}}
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Address model start -->
    <div id="myModaladdress" class="modal fade prolidneis" role="dialog">
        <div class="modal-dialog w-50" id="modal-dialog45">
            <div class="modal-content">
                
                <div class="modal-body">
                    <!--  <h2 style="    font-size: 22px; text-transform: uppercase;    text-align: center; font-weight: 600;"></h2> -->
                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Add New Address</h3>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <div class="deals">
                            <hr class="mt-2">
                        </div>
                    </div>
        
                    <form class="js-validate row" method="post" action="{{route('addAddress')}}" novalidate="novalidate">
                        @csrf
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="first_name" placeholder="First Name" aria-label="First Name" requireddata-msg="Please enter a valid First Name." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="last_name" placeholder="Last Name"  aria-label="Last Name" requireddata-msg="Please enter a valid Last Name." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="phone" placeholder="Phone No." aria-label="Phone No" requireddata-msg="Please enter a valid Phone No." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="pin" id="pincode" placeholder="Pin Code" aria-label="Pin Code" requireddata-msg="Please enter a valid Pin Code." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" onclick="get_state_city()" name="house_no" placeholder="House/Plot No" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="address" placeholder="Full Address" aria-label="Full address" >
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="area" placeholder="Street/Locality/Area" aria-label="Area" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="city" id="cityid" placeholder="City" >
                        </div>
                        <div class="js-form-message form-group col-md-6 mb-3">
                            <input type="text" class="form-control br-radius-none" name="state" id="stateid" placeholder="State">
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
                                <!-- <li class="m-3 mt-0 mb-0">
                                    <label for="other">
                                        <input type="radio" data-order_button_text="Proceed to PayPal" value="Other" name="address_type" class="input-radio" id="other"  >
                                        <span>Other  </span>
                                    </label> 
                                </li> -->
                            </ul>
                        </div>
                                        
                        <div class="mb-600 d-flex w-100">
                            <div class="mb-3 w-auto"><button onclick="window.location.href='{{url('profile')}}'" class="btn edit-address1_1 btn-primary-dark-w px-5 w-100">Cencel</button></div>
                            <div class="mb-3 w-50 mx-3"><button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Save Address</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Address model end -->

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