@extends('frontend.master')

@section('content')




<div class="discription_section my__accountsd">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12 breadmcrumsize">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ translate('Register your shop')}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-rtu6">
            <div class="my-4 my-xl-8 position-relative">
                <div class="sidkierls w-100 mb-1">
                    <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 logintab">
                            <div class="row">
                                <div class="col-md-3 back_login" style="padding:0 0 0 13px;">
                                    <img src="https://ebb.orrish.org/ebb-banner.png"
                                        style="border-radius:5px 0 0 5px;" />
                                </div>
                                <div class="col-md-9 p-0">
                                    <ul class="ulines-dps" style="padding-top:0px;">
                                        <li class="ukine ukine1b fs-5 py-2 active4">
                                            <i class="fa-solid fa-store"></i>Register Your Shop
                                        </li>
                                    </ul>

                                    <form id="shop" class="form_section row" action="{{ route('seller.store') }}"
                                        method="POST" enctype="multipart/form-data" style="padding:0px;">
                                        @csrf
                                        <ul class="ulines-dps-para">
                                            <li class="ukine ukine2b active4">
                                                <div class="colampoxe mr-3  mx-0 p-4 py-3 shadow-none">
                                                    <div class="vendor_shop row">
                                                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                            <h3
                                                                class="section-title section-title__sm mb-0 pb-2 font-size-shop_18">
                                                                Personal Info</h3>
                                                            <div class="deals">
                                                                <hr>
                                                            </div>
                                                        </div>

                                                        <div class="js-form-message col-md-6 mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-user"
                                                                        style="color: #ff7713;"></i>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('first_name') }}"
                                                                    placeholder="{{  translate('First Name') }}*"
                                                                    name="first_name" required>
                                                            </div>
                                                        </div>
                                                        <div class="js-form-message col-md-6 mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-user"
                                                                        style="color: #ff7713;"></i>
                                                                </span>
                                                                <input required type="text" class="form-control"
                                                                    name="last_name" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="js-form-message col-md-6 mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-phone-flip"
                                                                        style="color: #ff7713;"></i>
                                                                </span>
                                                                <input maxlength="10" min="10" pattern="[6789][0-9]{9}"
                                                                    required type="tel"
                                                                    class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                                    name="phone" id="phone"
                                                                    value="{{ old('phone') }}"
                                                                    placeholder="Phone No.">
                                                            </div>
                                                        </div>
                                                        <div class="js-form-message col-md-6 mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-envelope"
                                                                        style="color: #ff7713;"></i>
                                                                </span>
                                                                <input required type="email" class="form-control"
                                                                    name="email1" id="email1" value=""
                                                                    placeholder="Email address">
                                                            </div>
                                                        </div>
                                                        <div class="js-form-message form-group col-md-12 mb-3">
                                                            <ul class="list-unstyled d-flex" style="font-size:14px;">
                                                                <li class="mt-0 mb-0">
                                                                    <label for="payment_method_bacs d-flex">
                                                                        <span><b>Gender</b> </span> </label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="male">
                                                                        <input id="male" class="input-radio"
                                                                            type="radio" value="Male" checked
                                                                            name="gender"> <span>Male </span> </label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="female">
                                                                        <input type="radio" id="female" value="Female"
                                                                            name="gender" class="input-radio">
                                                                        <span>Female </span> </label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="other">
                                                                        <input type="radio" id="other" value="Other"
                                                                            name="gender" class="input-radio">
                                                                        <span>Other </span> </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="js-form-message mb-3 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key" style="color: #ff7713;"></i>
                                                                </span>
                                                                <input required type="password" class="form-control"
                                                                    onkeyup="CheckPasswordStrength(this.value)"
                                                                    name="password" placeholder="New Password"
                                                                    aria-label="Email address"
                                                                    requireddata-msg="Please enter a valid email address."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success">
                                                            </div>
                                                            @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>

                                                            @endif
                                                            <span class="text-danger" id="password_error"></span>
                                                            <div id="password-strength-status"></div>
                                                            <span id="password_strength"></span>
                                                        </div>
                                                        <div class="js-form-message mb-3 col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-key" style="color: #ff7713;"></i>
                                                                </span>
                                                                <input type="password" class="form-control"
                                                                    placeholder="{{  translate('Confirm Password') }}"
                                                                    name="password_confirmation"
                                                                    id="txtConfirmPassword">
                                                            </div>



                                                            <div class="registrationFormAlert" style="color:green;"
                                                                id="CheckPasswordMatch"></div>
                                                            <script>
                                                                function checkPasswordMatch() {
                                                                    var password = $("#txtPassword").val();
                                                                    var confirmPassword = $("#txtConfirmPassword").val();
                                                                    if (password != confirmPassword)
                                                                        $("#CheckPasswordMatch").html("Passwords does not match!");
                                                                    else
                                                                        $("#CheckPasswordMatch").html("Passwords match.");
                                                                }
                                                                $(document).ready(function () {
                                                                    $("#txtConfirmPassword").keyup(checkPasswordMatch);
                                                                });
                                                            </script>




                                                        </div>

                                                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                            <h3
                                                                class="section-title section-title__sm mb-0 pb-2 font-size-shop_18">
                                                                Vendor Type Info</h3>
                                                            <div class="deals">
                                                                <hr>
                                                            </div>
                                                        </div>




                                                        <div class="js-form-message form-group col-md-12 mb-3">
                                                            <ul class="list-unstyled d-flex" style="font-size:14px;">
                                                                <li class="mt-0 mb-0">
                                                                    <label for="payment_method_bacs d-flex">
                                                                        <span><b>Select Vendor Type</b></span>
                                                                    </label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="product">
                                                                        <input class="input-radio input-radio1"
                                                                            type="radio" id="product" value="Product"
                                                                            name="vendor_type" required>
                                                                        <span>Product </span>
                                                                    </label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="service">
                                                                        <input class="input-radio input-radio1"
                                                                            type="radio" id="service" value="Service"
                                                                            name="vendor_type">
                                                                        <span>Service </span>
                                                                    </label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="both">
                                                                        <input class="input-radio input-radio1"
                                                                            type="radio" id="both" value="Both"
                                                                            name="vendor_type">
                                                                        <span>Both </span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 product_div d-none">
                                                                <div class="js-form-message left-align">
                                                                    <label> <span><b style="font-size:14px;">Product
                                                                                Parent Categories :</b> </span> </label>
                                                                </div>
                                                                <div class="sellerProServmain">
                                                                    <div class="form-group sellerProServ"
                                                                        style="margin-bottom:0px;">
                                                                        @foreach($product_categories as $category)
                                                                        <div class="js-form-message mb-3">
                                                                            <div
                                                                                class="custom-control custom-checkbox d-flex gender_Box">
                                                                                <input type="checkbox"
                                                                                    class="product_checkbox"
                                                                                    name="product_category_ids[]"
                                                                                    value="{{$category->id}}">
                                                                                <label class="opacity-60"> {{
                                                                                    $category->name }} </label>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-6 service_div d-none">
                                                                <div class="js-form-message left-align">
                                                                    <label>
                                                                        <span><b style="font-size:14px;">Service Parent
                                                                                Categories :</b> </span>
                                                                    </label>
                                                                </div>
                                                                <div class="sellerProServmain">
                                                                    <div class="form-group sellerProServ"
                                                                        style="margin-bottom:0px;">

                                                                        @foreach($service_categories as $category)
                                                                        <div class="js-form-message mb-3">
                                                                            <div
                                                                                class="custom-control custom-checkbox d-flex gender_Box">
                                                                                <input type="checkbox"
                                                                                    class="service_checkbox"
                                                                                    name="service_category_ids[]"
                                                                                    value="{{$category->id}}">
                                                                                <label class="opacity-60"> {{
                                                                                    $category->name }} </label>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="border-bottom1 border-color-111 mt-0 mb-3"
                                                            style="padding-top:10px;">
                                                            <h3
                                                                class="section-title section-title__sm mb-0 pb-2 font-size-shop_18">
                                                                Basic Info</h3>
                                                            <div class="deals">
                                                                <hr>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa-solid fa-store"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="{{ translate('Shop Name')}}*"
                                                                        name="shop_name" value="{{ old('shop_name') }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fas fa-location"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Lacality*" name="lacality" value=""
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="js-form-message col-md-12 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon text-aAaA  h-200"
                                                                        style="width:5%;">
                                                                        <i class="fa fa-address-card"
                                                                            style="color: #ff7713; line-height:90px;"></i>
                                                                    </span>
                                                                    <textarea name="shop_address"
                                                                        class="form-control textareas h-200"
                                                                        placeholder="Address (Area and Street)*"
                                                                        autocomplete="off"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa-solid fa-city"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="City*" name="city" value=""
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group" style="position:relative;">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa-solid fa-phone-flip"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <i class="fa fa-angle-down" aria-hidden="true"
                                                                        style="color: #000; z-index: 999; top: 18px;"></i>
                                                                    <select
                                                                        class="sort_by form-control aiz-selectpicker sortbytxt"
                                                                        name="state">
                                                                        <option>---Select State---</option>
                                                                        <option value="Andhra Pradesh">Andhra Pradesh
                                                                        </option>
                                                                        <option value="Andaman and Nicobar Islands">
                                                                            Andaman and Nicobar Islands</option>
                                                                        <option value="Arunachal Pradesh">Arunachal
                                                                            Pradesh</option>
                                                                        <option value="Assam">Assam</option>
                                                                        <option value="Bihar">Bihar</option>
                                                                        <option value="Chandigarh">Chandigarh</option>
                                                                        <option value="Chhattisgarh">Chhattisgarh
                                                                        </option>
                                                                        <option value="Dadar and Nagar Haveli">Dadar and
                                                                            Nagar Haveli</option>
                                                                        <option value="Daman and Diu">Daman and Diu
                                                                        </option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                                        <option value="Puducherry">Puducherry</option>
                                                                        <option value="Goa">Goa</option>
                                                                        <option value="Gujarat">Gujarat</option>
                                                                        <option value="Haryana">Haryana</option>
                                                                        <option value="Himachal Pradesh">Himachal
                                                                            Pradesh</option>
                                                                        <option value="Jammu and Kashmir">Jammu and
                                                                            Kashmir</option>
                                                                        <option value="Jharkhand">Jharkhand</option>
                                                                        <option value="Karnataka">Karnataka</option>
                                                                        <option value="Kerala">Kerala</option>
                                                                        <option value="Madhya Pradesh">Madhya Pradesh
                                                                        </option>
                                                                        <option value="Maharashtra">Maharashtra</option>
                                                                        <option value="Manipur">Manipur</option>
                                                                        <option value="Meghalaya">Meghalaya</option>
                                                                        <option value="Mizoram">Mizoram</option>
                                                                        <option value="Nagaland">Nagaland</option>
                                                                        <option value="Odisha">Odisha</option>
                                                                        <option value="Punjab">Punjab</option>
                                                                        <option value="Rajasthan">Rajasthan</option>
                                                                        <option value="Sikkim">Sikkim</option>
                                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                                        <option value="Telangana">Telangana</option>
                                                                        <option value="Tripura">Tripura</option>
                                                                        <option value="Uttar Pradesh">Uttar Pradesh
                                                                        </option>
                                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                                        <option value="West Bengal">West Bengal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa-solid fa-landmark"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Landmark(Optional)" name="landmark"
                                                                        value="{{ old('shop_name') }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-map-pin"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Pincode*" name="pincode" value=""
                                                                        required>
                                                                </div>
                                                            </div>

                                                            <div class="js-form-message col-md-6 mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa-solid fa-phone-flip"
                                                                            style="color: #ff7713;"></i>
                                                                    </span>
                                                                    <input maxlength="10" min="10"
                                                                        pattern="[6789][0-9]{9}" required type="tel"
                                                                        class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                                        name="phone" id="phone"
                                                                        value="{{ old('phone') }}"
                                                                        placeholder="Alternate Phone No. (Optional)">
                                                                </div>
                                                            </div>


                                                            <div class="js-form-message form-group col-md-12 mb-3">
                                                                <ul class="list-unstyled d-flex"
                                                                    style="font-size:14px;">
                                                                    <li class="mt-0 mb-0">
                                                                        <label for="payment_method_bacs d-flex">
                                                                            <span><b>Address Type</b> </span> </label>
                                                                    </li>
                                                                    <li class="m-3 mt-0 mb-0">
                                                                        <label for="male">
                                                                            <input id="shop" class="input-radio"
                                                                                type="radio" value="Shop Address"
                                                                                checked name="atype"> <span>Shop Address
                                                                            </span> </label>
                                                                    </li>
                                                                    <li class="m-3 mt-0 mb-0">
                                                                        <label for="female">
                                                                            <input type="radio" id="wirehouse"
                                                                                value="Wirehouse Address" name="atype"
                                                                                class="input-radio"> <span>Wirehouse
                                                                                Address</span> </label>
                                                                    </li>
                                                                </ul>
                                                            </div>


                                                        </div>

                                                    </div>


                                                </div>

                                            </li>
                                        </ul>
                                        <div class="mb-1 row"
                                            style="border-top:1px solid #e5e5e5; padding:10px 0 0 15px; margin-left:12px; width:95%;">
                                            <div class="col-md-6 text-center"
                                                style="line-height: 43px; font-size: 14px;">Already have an account? <a
                                                    href="#">Sign in</a></div>
                                            <div class="col-md-6 text-left"><button type="submit"
                                                    class="btn btn-primary-dark-w px-5 mb-2 fw-600"
                                                    style="width:180px;">
                                                    {{ translate('Register Your Shop')}}
                                                </button></div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="border-bottom1 border-color-111 mt-0 mb-3" style="padding-top:10px;">
                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-shop_18">Basic Info</h3>
                <div class="deals">
                    <hr> </div>
            	</div>
                
                
                <div class="row">
                                    <div class="js-form-message col-md-6 mb-3">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                <i class="fa-solid fa-store" style="color: #ff7713;"></i>
                                                </span>
                                        <input type="text" class="form-control" placeholder="{{ translate('Shop Name')}}*"
                                            name="shop_name" value="{{ old('shop_name') }}" required>
                                            </div>
                                    </div>
                                    <div class="js-form-message col-md-6 mb-3">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                <i class="fas fa-location" style="color: #ff7713;"></i>
                                                </span>
                                        <input type="text" class="form-control" placeholder="Lacality*"
                                            name="lacality" value="" required>
                                            </div>
                                    </div>
                                    <div class="js-form-message col-md-12 mb-3">
                                            <div class="input-group">
                                                    <span class="input-group-addon text-aAaA  h-200" style="width:5%;">
                                                <i class="fa fa-address-card" style="color: #ff7713; line-height:90px;"></i>
                                                </span>
                                            <textarea name="shop_address" class="form-control textareas h-200" placeholder="Address (Area and Street)*" autocomplete="off"></textarea>
                                            </div>
                                    </div>
                                    
                                    <div class="js-form-message col-md-6 mb-3">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                <i class="fa-solid fa-city" style="color: #ff7713;"></i>
                                                </span>
                                        <input type="text" class="form-control" placeholder="City*"
                                            name="city" value="" required>
                                            </div>
                                    </div>
                                    <div class="js-form-message col-md-6 mb-3">
                                    <div class="input-group" style="position:relative;">
                                                    <span class="input-group-addon">
                                                <i class="fa-solid fa-phone-flip" style="color: #ff7713;"></i>
                                                </span>
                                                <i class="fa fa-angle-down" aria-hidden="true" style="color: #000; z-index: 999; top: 18px;"></i>
                                            <select class="sort_by form-control aiz-selectpicker sortbytxt"
                                    name="state">
                                    <option>---Select State---</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
                                            </div>
                                    </div>
                                    <div class="js-form-message col-md-6 mb-3">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                <i class="fa-solid fa-landmark" style="color: #ff7713;"></i>
                                                </span>
                                        <input type="text" class="form-control" placeholder="Landmark(Optional)"
                                            name="landmark" value="{{ old('shop_name') }}" required>
                                            </div>
                                    </div>
                                    <div class="js-form-message col-md-6 mb-3">
                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                <i class="fa fa-map-pin" style="color: #ff7713;"></i>
                                                </span>
                                        <input type="text" class="form-control" placeholder="Pincode*"
                                            name="pincode" value="" required>
                                            </div>
                                    </div>
                                    
                                    <div class="js-form-message col-md-6 mb-3">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                <i class="fa-solid fa-phone-flip" style="color: #ff7713;"></i>
                                                </span>
														<input  maxlength="10" min="10" pattern="[6789][0-9]{9}" required type="tel" class="form-control {{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" name="mobile_no" id="phone" value="{{ old('mobile_no') }}" placeholder="Alternate Phone No. (Optional)">
                                                        </div>
													</div>
                                    <div class="js-form-message form-group col-md-12 mb-3">
														<ul class="list-unstyled d-flex" style="font-size:14px;">
															<li class="mt-0 mb-0">
																<label for="payment_method_bacs d-flex"> <span><b>Address Type</b> </span> </label>
															</li>
															<li class="m-3 mt-0 mb-0">
																<label for="male">
																	<input id="shop" class="input-radio" type="radio" value="Shop Address" checked name="atype"> <span>Shop Address </span> </label>
															</li>
															<li class="m-3 mt-0 mb-0">
																<label for="female">
																	<input type="radio" id="wirehouse" value="Wirehouse Address" name="atype" class="input-radio"> <span>Wirehouse Address</span> </label>
															</li>
														</ul>
													</div>
                                                    
                                                    
                                </div>
                               

                                    </form>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

@section('script')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    // making the CAPTCHA  a required field for form submission
    $(document).ready(function () {
        selectedVal = "";
        $(".input-radio1").click(function () {
            selectedVal = $(".input-radio1:checked").val();
            $(".product_checkbox").prop('checked', false);
            $(".service_checkbox").prop('checked', false);

            if (selectedVal == 'Product') {
                $(".product_div").removeClass("d-none");
                $(".service_div").addClass("d-none");
                // $(".product_checkbox").prop('required', true);
            }

            if (selectedVal == "Service") {
                $(".product_div").addClass("d-none");
                $(".service_div").removeClass("d-none");
                // $(".service_checkbox").prop('required', true);
            }

            if (selectedVal == "Both") {
                $(".product_div").removeClass("d-none");
                $(".service_div").removeClass("d-none");
                // $(".product_checkbox").prop('required', true);
                // $(".service_checkbox").prop('required', true);
            }

        });

        $("#shop").on("submit", function (evt) {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                //reCaptcha not verified
                alert("please verify you are humann!");
                evt.preventDefault();
                return false;
            }
            //captcha verified
            //do the rest of your validations here
            $("#reg-form").submit();
        });
    });
</script>
@endsection