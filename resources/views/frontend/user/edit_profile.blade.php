@extends('frontend.layouts.user_panel')

@section('panel_content')
    <div class="shadow w-100 mb-1 mys_accounts">
        <div class="bootstrap-accordiana">
            <div class="backtabs-dp_servicespros2 backtabs-dp ">

                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                    <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Account
                    </h3>

                </div>
                <ul class="ulines-dps     justify-content-start">
                    <li class="ukine  active4"><a href="{{ url('profile') }}">My Profile</li>
                    <li class="ukine "><a href="{{ url('my_addressbook') }}">My Address Book </a></li>
                    {{--<li class="ukine"><a href="{{ url('my-bank-details') }}">Bank Details</a></li>--}}
                    <li class="ukine "><a href="{{ url('change-password') }}">Change Password </a></li>
						{{-- <li class="ukine "> <a href="{{ url('manage-payments') }}"> Manage Payments</a> </li>--}}
                </ul>
                <div class="flash-message mt-2">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))
                            <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                {{ Session::get('alert-' . $msg) }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    @endforeach
                </div>
                <form class="js-validate row" method="post" action="{{ route('updateProfile') }}"
                    enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="hotel-form py-4 shadow-none">

                        <ul class="ulines-dps-para">
                            <li class="ukine 	active4">
                                <div class="hotel-form py-4 px-2 mb-3 mt-1 shadow-none">
                                    <div class="row">

                                        <div class="col-lg-2">
                                            <div class="profile_user-holder">
                                                @if (Auth::user()->avatar == '')
                                                    <img onclick="document.getElementById('profile').click();"
                                                        id="profileImg"
                                                        src="{{ static_asset('assets_web/img/profile.png') }}"
                                                        alt="" class="w-100 h-100"><i
                                                        onclick="document.getElementById('profile').click();"
                                                        class="fa fa-camera editphotobtn"></i>
                                                @else
                                                    <img onclick="document.getElementById('profile').click();"
                                                        id="profileImg"
                                                        src="{{ static_asset('uploads/user/' . Auth::user()->avatar) }}"
                                                        alt="" class="w-100 h-100"><i
                                                        onclick="document.getElementById('profile').click();"
                                                        class="fa fa-camera editphotobtn"></i>
                                                @endif
                                                <input type="file" name="file" class="form-control" id="profile">
                                            </div>
                                            <span type="button" onclick="document.getElementById('profile').click();"
                                                style="margin-top: 18px;height:35px;width:100px;"
                                                class="btn-primary-dark-w">UPLOAD</span>
                                        </div>

                                        <div class="col-lg-10">
                                            <div class="user_name mt-1">
                                                <span class="userf-name">
                                                    {{ Auth::user()->name }}

                                                </span>
                                            </div>
                                            <div class="user_email mt-1">
                                                <span class="user-email">
                                                    {{ Auth::user()->email }}
                                                </span>
                                            </div>
                                            <div class="phone_number mt-1">
                                                <span class="user-phone">
                                                    +91-{{ Auth::user()->phone }}
                                                </span>
                                            </div>
                                            @if ($errors->has('file'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('file') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>




                                </div>
                                <div class="mr-3  mx-0 px-0 py-2 shadow-none">
                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                        <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Update your
                                            Profile</h3>
                                        <div class="deals">
                                            <hr class="mt-2">
                                        </div>
                                    </div>


                                    <p class="text-gray-901 mb-4">Create new account today to reap the benefits of a
                                        personalized shopping experience.</p>




                                    <div class="js-form-message form-group col-md-6 mb-3 floatprofile">
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="First Name" value="{{ Auth::user()->first_name }}"
                                            aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group col-md-6 mb-3 floatprofile">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                            value="{{ Auth::user()->last_name }}" aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group col-md-6 mb-3 floatprofile">
                                        <input type="tel" class="form-control" name="phone" placeholder="Phone No."
                                            value="{{ Auth::user()->phone }}" aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group col-md-6 mb-3 floatprofile">
                                        <input type="email" class="form-control" readonly placeholder="Email address"
                                            value="{{ Auth::user()->email }}" aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group col-md-12 mb-3 floatprofile">
                                        <ul class="list-unstyled d-flex">
                                            @php
                                                if (!empty(Auth::user()->gender) && Auth::user()->gender == 'Female') {
                                                    $fcheck = 'checked="checked"';
                                                    $mcheck = '';
                                                    $otcheck = '';
                                                } elseif (
                                                    !empty(Auth::user()->gender) &&
                                                    Auth::user()->gender == 'Male'
                                                ) {
                                                    $mcheck = 'checked="checked"';
                                                    $fcheck = '';
                                                    $otcheck = '';
                                                } else {
                                                    $mcheck = '';
                                                    $fcheck = '';
                                                    $otcheck = 'checked="checked"';
                                                }
                                            @endphp

                                            <li class="mt-0 mb-0">
                                                <label for="payment_method_bacs d-flex">
                                                    <span><b>Gender</b> </span>
                                                </label>
                                            </li>
                                            <li class="m-3 mt-0 mb-0">
                                                <label for="genMale">
                                                    <input id="genMale" class="input-radio" type="radio"
                                                        data-order_button_text="" value="Male" name="gender"
                                                        {{ $mcheck }}>
                                                    <span>Male </span>
                                                </label>
                                            </li>
                                            <li class="m-3 mt-0 mb-0">
                                                <label for="genFemale">
                                                    <input type="radio" data-order_button_text="Proceed to PayPal"
                                                        value="Female" name="gender" class="input-radio"
                                                        {{ $fcheck }} id="genFemale">
                                                    <span>Female </span>
                                                </label>
                                            </li>
                                            <li class="m-3 mt-0 mb-0">
                                                <label for="genOther">
                                                    <input type="radio" data-order_button_text="Proceed to PayPal"
                                                        value="Other" name="gender" class="input-radio"
                                                        {{ $otcheck }} id="genOther">
                                                    <span> Other </span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mb-600">
                                        <div class="mb-3"><button type="submit"
                                                class="btn btn-primary-dark-w px-5 w-25">Update Profile</button></div>
                                    </div>
                                </div>
                            </li>


                        </ul>


                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#profile").change(function() {
            var reader = new FileReader();
            console.log(reader);
            reader.onload = function(e) {
                $('#profileImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]); // convert to base64 string
        });
    </script>
@endsection
