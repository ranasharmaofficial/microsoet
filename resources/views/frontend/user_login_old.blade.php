@extends('frontend.master') @section('content')
    <section class="pageTitle"> </section>
    <!--top banner end -->
	<style>
		.success_msg{color: green;}
		.success_bdr{border: 1px solid green;}
		.error_msg{color:red;}
		.error_bdr{border: 1px solid red;}
		
		label {
    color: #9f1e1e;
    cursor: pointer;
    font-weight: 400;
}

	</style>
    <div class="discription_section my__accountsd">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadmcrumsize">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login Or Registration</li>
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
                                    <div class="col-md-3 back_login">
                                        <div class="background-login position-relative h-100">
                                            <h3>Looks like you're new here!</h3>
                                            <p>Sign up with your mobile number to get started</p> <img
                                                src="{{ asset('public/assets_web/img/login_img.png')}}" class="position-absolute bottom-0 w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-9 p-0">
                                        <ul class="ulines-dps">
                                            <li class="ukine ukine1b fs-5 py-2 active4"><i class="fa fa-lock" aria-hidden="true"></i> Login</li>
                                            <li class="ukine ukine2b fs-5 py-2"><i class="fa fa-user" aria-hidden="true"></i> Sign Up </li>
                                        </ul>
                                        <ul class="ulines-dps-para">
                                            <li class="ukine ukine1b active4">
                                                <div class="colampoxe mx-0 p-4  py-3 shadow-none login_form">
                                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Login</h3>
                                                        <div class="deals">
                                                            <hr>
                                                        </div>
                                                        <div class="flash-message mt-2">
                                                            <span id="login_resp_msg"></span>
                                                        </div>
                                                    </div>
                                                    <p class="text-gray-901 mb-4">Welcome back! Sign in to your account.</p>
                                                    <form method="post" id="login-form">
                                                        @csrf
                                                        @if (addon_is_activated('otp_system') && env('DEMO_MODE') != 'On')
                                                            <div class="form-group">
                                                                <input type="tel" id="login_phone" class="form-control" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                                            </div>
                                                            <input type="hidden" name="country_code" value="">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="{{ old('email') }}" placeholder="{{ translate('Email or Mobile') }}" name="email" id="email" autocomplete="off">
                                                            </div>
                                                            <div class="form-group text-right">
                                                                <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>
                                                            </div>
                                                        @else
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="{{ old('email') }}" style="border: 1px solid gray;border-radius: 5px;" placeholder="{{ translate('Email or Mobile') }}" name="email" id="email" autocomplete="off">
                                                                <span id="email_error"></span>
                                                            </div>
                                                        @endif
                                                        <div class="form-group form-relative">
                                                            <input type="password" class="form-control" style="border: 1px solid gray;border-radius: 5px;" placeholder="{{ translate('Password') }}" name="password" id="password">
                                                            <i class="fa fa-eye seepassactive" aria-hidden="true"></i><i class="fa fa-eye-slash seepass"></i>
                                                            <span id="login_password_error"></span>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="" id="rememberCheckbox">
                                                                <label class="opacity-60" for="rememberCheckbox">{{ translate('Remember Me') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="mb-1">
                                                            <button type="button" name="submit" id="login-button" class="btn btn-primary-dark-w px-5 mb-2" onclick="submitLoginForm()"> Login</button>
                                                            <div class="mb-2"><a href="{{ route('forgot_password') }}" class="text-blue">Lost your password?</a></div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <!-- Modal -->
                                            </li>
                                            <li class="ukine ukine2b ">
                                                <div class="colampoxe mr-3  mx-0 p-4 py-3 shadow-none">
                                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Register</h3>
                                                        <div class="deals"><hr></div>
                                                    </div>
													<p id="resp_msg"></p>
                                                    <p class="text-gray-901 mb-4">Create new account today to reap the benefits of a personalized shopping experience.</p>
                                                    <form id="reg-form" method="post" class="row">
                                                        @csrf
                                                        <div class="js-form-message form-group col-md-6 mb-3">
                                                            <input type="text" style="border: 1px solid gray;border-radius: 5px;" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                                name="first_name" id="first_name"
                                                                value="{{ old('first_name') }}" placeholder="First Name"
                                                                autocomplete="off">
                                                            @if ($errors->has('first_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                                </span>
                                                            @endif
                                                            <span id="first_name_error"></span>
                                                        </div>
                                                        <input type="hidden" name="name" value="a">
                                                        <div class="js-form-message form-group col-md-6 mb-3">
                                                            <input type="text"
                                                                class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                                name="last_name" style="border: 1px solid gray;border-radius: 5px;" id="last_name"
                                                                value="{{ old('last_name') }}" placeholder="Last Name"
                                                                autocomplete="off">
                                                            @if ($errors->has('last_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                                            @endif
                                                            <span id="last_name_error"></span>
                                                        </div>
                                                        <div class="js-form-message form-group col-md-6 mb-3">
                                                            <input maxlength="10" min="10" pattern="[6-9][0-9]{9}"
                                                                type="tel"
                                                                class="form-control number {{ $errors->has('mobile_no') ? ' is-invalid' : '' }}"
                                                                name="mobile_no" id="phone"
                                                                value="{{ old('mobile_no') }}" style="border: 1px solid gray;border-radius: 5px;" style="border: 1px solid gray;border-radius: 5px;" placeholder="Phone No."
                                                                autocomplete="off">
                                                            @if ($errors->has('mobile_no'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                                                </span>
                                                            @endif
                                                            <span id="phone_error"></span>
                                                        </div>
                                                        <div class="js-form-message form-group col-md-6 mb-3">
                                                            <input type="email"
                                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                name="email" id="reg_email"
                                                                value="{{ old('email') }}" style="border: 1px solid gray;border-radius: 5px;" placeholder="Email address"
                                                                autocomplete="off">
                                                            @if ($errors->has('email'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                            <span id="reg_email_error"></span>
                                                        </div>
                                                        {{-- <div class="js-form-message form-group col-md-12 mb-3">
                                                            <ul class="list-unstyled d-flex">
                                                                <li class="mt-0 mb-0">
                                                                    <label for="d-flex">
                                                                        <span><b>Gender</b></span>
																	</label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="male">
                                                                        <input id="male" class="input-radio" type="radio" value="Male" checked name="gender">
																		<span>Male</span>
																	</label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="female">
                                                                        <input type="radio" id="female" value="Female" name="gender" class="input-radio">
																		<span>Female</span>
																	</label>
                                                                </li>
                                                                <li class="m-3 mt-0 mb-0">
                                                                    <label for="other">
                                                                        <input type="radio" id="other"
                                                                            value="Other" name="gender"
                                                                            class="input-radio"> <span>Other </span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                            <span id="gender_error"></span>
                                                        </div> --}}
                                                        <div class="js-form-message form-group mb-3 col-md-6">
                                                            <input type="password"
                                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} "
                                                                id="reg_password"
                                                                onkeyup="isStrong(this.value,'password_error')"
                                                                name="password" style="border: 1px solid gray;border-radius: 5px;" placeholder="Password">
                                                            <span id="password_error"></span>
                                                        </div>
                                                        <div class="js-form-message form-group mb-3 col-md-6">
                                                            <input type="password" class="form-control" style="border: 1px solid gray;border-radius: 5px;" 
                                                                placeholder="{{ translate('Confirm Password') }}"
                                                                name="password_confirmation" id="txtConfirmPassword" onkeyup="isMatch(this.value,'reg_password','txtConfirmPassword','CheckPasswordMatch','Password ')">
                                                            <span id="CheckPasswordMatch"></span>
                                                            <span id="confirm_password_error"></span>
                                                        </div>
                                                        <div class="js-form-message mb-3">
                                                            <div
                                                                class="custom-control custom-checkbox d-flex align-items-center">
                                                                <input type="checkbox" name="remember"
                                                                    {{ old('remember') ? 'checked' : '' }} class=""
                                                                    id="rememberCheckbox1" checked>
                                                                <label class="opacity-60" for="rememberCheckbox1">Your personal data will be used to support your experience throughout this website, to manage your account, and for other purposes described in our <a href="{{url('privacy_policy')}}" class="text-blue" target="_blank">privacy policy.</a></label>

                                                            </div>
                                                        </div>

                                                        <div class="js-form-message mb-3">
                                                            <div
                                                                class="custom-control custom-checkbox d-flex align-items-center">
                                                                <input type="checkbox" name="remember"
                                                                    {{ old('remember') ? 'checked' : '' }} class=""
                                                                    id="rememberCheckbox2" checked>
                                                                <label class="opacity-60" for="rememberCheckbox2">You agree to receive eBb's promotional & marketing emails suited to your preferences. You can always unsubscribe if needed.</label>
                                                            </div>
                                                        </div>

                                                        <div class="mb-600">
                                                            <div class="mb-3">
                                                                <button type="button" style="width:140px;" class="btn btn-primary-dark-w px-5 create-account" id="create-account" onclick="return submitForm();">{{ translate('Create Account') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade prolidneis" role="dialog">
        <div class="modal-dialog" id="modal-dialog45">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="box-soldid1back box-soldid2"><i class="fa " aria-hidden="true"></i></div>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-soldid2">
                                <div class="colampoxe">
                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                        <h3 class="section-title section-title__sm mb-0 pb-2 mt-0 font-size-18"> Your new
                                            password must:</h3>
                                        <div class="deals">
                                            <hr>
                                        </div>
                                    </div>
                                    <p class="text-gray-901 mb-1">Be at least 4 characters in length
                                        <br>Not contain common passwords.
                                        <br>Not be same as your current password
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-soldid1">
                                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 mt-0 pb-2 font-size-18"> Change
                                        Password </h3>
                                    <div class="deals">
                                        <hr>
                                    </div>
                                </div>
                                <form class="js-validate" novalidate="novalidate">
                                    <div class="js-form-message form-group mb-2">
                                        <input type="email" class="form-control" name="email"
                                            id="RegisterSrEmailExample01" placeholder="Type Current Password"
                                            aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group mb-2">
                                        <input type="email" class="form-control" name="email" id="upassword"
                                            placeholder="Type New Password" aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group mb-2">
                                        <input type="email" class="form-control" name="email" id="uconfirm_password"
                                            placeholder="Retype New Password" aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="js-form-message form-group mb-2">
                                        <input type="email" class="form-control" name="email"
                                            id="RegisterSrEmailExample04" placeholder="Enter OTP Sent to 9999999999"
                                            aria-label="Email address"
                                            requireddata-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <div class="mb-600" style="    text-align: center;">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary-dark-w"
                                                style="width:auto;">Change Password</button>
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

    <script type="text/javascript">
	/*comment by Abinash*/
        /*var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php
                echo json_encode(
                    \App\Models\Country::where('status', 1)
                        ->pluck('code')
                        ->toArray(),
                );
            @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if (selectedCountryData.iso2 == 'bd') {
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });*/

        function toggleEmailPhone(el) {
            if (isPhoneShown) {
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('{{ translate('Use Phone Instead') }}');
            } else {
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('{{ translate('Use Email Instead') }}');
            }
        }
    </script>
@endsection
@section('script')
    <script src="{{static_asset('assets/js/common.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        function submitForm() {
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var phone = $('#phone').val();
            var password = $('#reg_password').val();
            var confirm_password = $('#txtConfirmPassword').val();
            var email = $('#reg_email').val();
			var isValidForm = [
				{'value':password,'id':'reg_password','error_id':'password_error','delimeter':'','msg':'Password Required.'},
				{'value':confirm_password,'id':'txtConfirmPassword','error_id':'confirm_password_error','delimeter':'','msg':'Confirm Password Required.'},
				{'value':email,'id':'reg_email','error_id':'reg_email_error','delimeter':'','msg':'Email Required.'},
				{'value':phone,'id':'phone','error_id':'phone_error','delimeter':'','msg':'Mobile Required.'},
				{'value':last_name,'id':'last_name','error_id':'last_name_error','delimeter':'','msg':'Last Name Required.'},
				{'value':first_name,'id':'first_name','error_id':'first_name_error','delimeter':'','msg':'First Name Required.'}
			];

			if(checkBulkEmpty(isValidForm)){
                console.log("form invalid");
				return false;
			}else{
                var isValidEmail = false;
                var isValidMobile = false;
                if(email!=""){
                    isValidEmail = IsValidEmail('reg_email','reg_email_error',email,'Invalid Email.');
                    if(!isValidEmail){
                        return false;
                    }
                }else if(phone!=""){
                    isValidMobile = IsValidMobile('phone','phone_error',phone,'Invalid Mobile.');
                    if(!isValidMobile){
                        return false;
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Email or Phone required.",
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                // if(!isValidMobile || !isValidEmail){
                //     return false;
                // }
            }

			$('#create-account').attr('disabled',true);
			var form = document.getElementById('reg-form');
			var formData = new FormData(form);

			$.ajax({
				url: "{{ route('auth.register') }}",
				method: 'POST',
				data: formData,
				dataType: 'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success: function(response){
					console.log("response",response);
					if(response.status){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.replace('email-verify');
					}else{
                        $('#create-account').attr('disabled',false);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
					}
				},
				error: function(response){
                    $('#create-account').attr('disabled',false);
					console.log('Error:'+response);
				}
			});
        }

        function submitLoginForm() {
            var password = $('#password').val();
            var email = $('#email').val();
			var isValidForm = [
				{'value':password,'id':'password','error_id':'login_password_error','delimeter':'','msg':'Password Required.'},
				{'value':email,'id':'email','error_id':'email_error','delimeter':'','msg':'Email Required.'},
			];

			if(checkBulkEmpty(isValidForm)){
				return false;
			}
            // else{
            //     var isValidEmail = IsValidEmail('email','email_error',email,'Invalid Email.');
            //     if(!isValidEmail){
            //         return false;
            //     }
            // }

			$('#login-button').attr('disabled',true);
			var form = document.getElementById('login-form');
			var formData = new FormData(form);

			$.ajax({
				url: "{{ route('auth.login') }}",
				method: 'POST',
				data: formData,
				dataType: 'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success: function(response){
					console.log("response",response);
					if(response.status){
                            // toastr.success(response.msg);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            //url = 'profile';
                            // if(response.redirectTo){
                            //     url=response.redirectTo;
                            // }
                             window.location.href = '{{ url("profile") }}';
                        }else{
                            // toastr.error(response.msg);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 3000
                            });
                            $('#login-button').attr('disabled',false);
                        }
				},
				error: function(response){
                    $('#login-button').attr('disabled',false);
					console.log('Error:'+response);
				}
			});
        }
    </script>
@endsection
