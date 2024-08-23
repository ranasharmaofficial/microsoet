@extends('frontend.master') @section('content')
    <section class="pageTitle"> </section>
    <!--top banner end -->
    <style>
        .success_msg {
            color: green;
        }

        .success_bdr {
            border: 1px solid green;
        }

        .error_msg {
            color: red;
        }

        .error_bdr {
            border: 1px solid red;
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
            <div class="container-rtu6 mb-4">
                <div class="my-4 my-xl-8 position-relative">
                    <div class="sidkierls w-100 mb-1">
                        <div class="bootstrap-accordiana">
                            <div class="backtabs-dp_servicespros2 logintab">
                                <div class="row justify-content-center">
                                     
                                         
                                        
                                                                               
                                    <div style="margin-bottom: 40px;" class="col-md-6 p-0">
                                        <ul class="ulines-dps">
                                            <li class="ukine ukine1b fs-5 py-2 active4"><i class="fa fa-lock"
                                                    aria-hidden="true"></i> Login</li>
                                            <li class="ukine ukine2b fs-5 py-2"><i class="fa fa-user"
                                                    aria-hidden="true"></i> Sign Up </li>
                                        </ul>
                                        <ul class="ulines-dps-para">
                                            <li class="ukine ukine1b active4">
                                                <div class="colampoxe mx-0 p-4  py-3 shadow-none login_form">
                                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">
                                                            Login</h3>
                                                        <div class="deals">
                                                            <hr>
                                                        </div>
                                                        <div class="flash-message mt-2">
                                                            <span id="login_resp_msg"></span>
                                                        </div>
                                                    </div>
                                                    <p class="text-gray-901 mb-4">Welcome back! Sign in to your account.</p>
                                                    <div>
                                                        <form action="" id="otp-login">
                                                            <div width="100%" class="sc-60vv3c-2 gdRQQk sc-fPXMVe iHUNmi">
                                                                <div class="sc-60vv3c-1 fGXpWN">
                                                                    <input type="number" pattern="[0-9]{1}" inputmode="numeric" name="phone" placeholder="Enter Your Phone Number" class="form-control" id="phone-number" required>
                                                                </div>
																
																<div class="mb-1">
                                                                    <button type="button" name="submit" id="login-send-otp" class="btn btn-primary-dark-w px-5 mb-2">Send One Time Password</button>
                                                                </div>

                                                                <div id="login-otp-input-box" class=" w-full">
                                                                    <div class="form-group w-full">
                                                                        <input type="text" class="form-control border rounded mt-3" name="otp" id="login-otp-input" placeholder="Enter OTP*" required>
                                                                    </input>
                                                                </div>
                                                                
                                                                <div id="timer" class="text-center text-success"></div>
                                                            </div>
                                                        </form>

                                                         
                                                         
                                                    </div>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <!-- Modal -->
                                            </li>
                                            <li class="ukine ukine2b ">
                                                <div class="colampoxe mr-3  mx-0 p-4 py-3 shadow-none">
                                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">
                                                            Register</h3>
                                                        <div class="deals">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <p id="resp_msg"></p>
                                                    <p class="text-gray-901 mb-4">Create new account today reap the
                                                        benefits
                                                        of a personalized shopping experience.</p>

                                                    {{-- New Register Work --}}


                                                    <div class="login-form">
                                                        <div class="login-header">
                                                        </div>
                                                        <form action="#" class="flex flex-col" id="otp-register">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Full Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Your Name" required>
                                                            </div>
                                                            <div class="form-group otp-box w-100">
                                                                <div
                                                                    class="col-12 col-md-12 col-lg-8 form_pr_zero one-tgw pe-2">
                                                                    <div class="form-group relative">
                                                                        <input type="text" class="form-control"
                                                                            name="phone" maxlength="10" id="r_phone"
                                                                            placeholder="Mobile" required>
                                                                        <span class="position-absolute send_p">
                                                                            <button class="btn btn-primary" type="button"
                                                                                id="send-otp">Send OTP</button>
                                                                        </span>
                                                                    </div>
                                                                    <div id="r_timer" class="text-center text-success">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="otp-input-box"
                                                                class="col-12 col-md-12 col-lg-4 form_pl_zero">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="otp" id="otp-input"
                                                                        placeholder="Enter Your OTP*" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <button type="submit" class="theme-btn"><i
                                                                        class="far fa-paper-plane create-account"
                                                                        id="create-account"></i> Register</button>
                                                            </div>
                                                        </form>

                                                        <div class="login-footer">
                                                            <p>Already have an account? <a href="login">Login.</a></p>
                                                        </div>
                                                    </div>
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
     

    {{-- <script type="text/javascript">
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
    </script> --}}

    {{-- comment and written by roni --}}

    <script>
        $(document).ready(function() {
            $('#otp-input-box').hide();
            $('#send-otp').on('click', function() {

                var phone = $('#r_phone').val();
                // Hide the OTP button and start the timer
                $('#send-otp').hide();
                $('#otp-input-box').show();
                startTimer(30, $('#send-otp'));

                // Send OTP via AJAX
                $.ajax({
                    method: 'POST',
                    url: "{{ route('send.phone.otp') }}",
                    data: {
                        phone: phone,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#otp-input').prop('disabled', false);
                        } else {
                            // alert(response.message);
							toastr.error(response.message);
                            $('#send-otp').show(); // Show the OTP button again if there's an error
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data', error);
                        $('#send-otp').show(); // Show the OTP button again if there's an error
                    }
                });
            });

            $('#otp-input').on('input', function() {
                var otp = $(this).val();
                if (otp.length === 4) {
                    // Auto-submit OTP
                    $('#otp-register').submit();
                }
            });

            $('#otp-register').on('submit', function(event) {
                event.preventDefault();

                var name = $('input[name="name"]').val();
                var phone = $('#r_phone').val();
                var otp = $('#otp-input').val();

                $.ajax({
                    method: 'POST',
                    url: '{{ route('verify.phone.otp') }}',
                    data: {
                        name: name,
                        phone: phone,
                        otp: otp,
                        _token: "{{ csrf_token() }}"
                    },success: function(response) {
                        if (response.success==true) {
                            toastr.success(response.message);
                            window.location.href = '{{ url("profile") }}';
                        } else {
                            toastr.error(response.message);
                             
                        }
                    }
                });
            });

            function startTimer(duration, button) {
                let timer = duration,
                    minutes, seconds;
                const display = $('#r_timer');

                const interval = setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.html("Resend OTP in " + minutes + ":" + seconds);

                    if (--timer < 0) {
                        clearInterval(interval);
                        display.text("You can resend the OTP now.");
                        button.show(); // Show the OTP button again after the timer ends
                    }
                }, 1000);
            }
        });

        // login work

        $(document).ready(function() {
            $('#login-otp-input-box').hide();

            $('#login-send-otp').on('click', function() {
                var phone = $('input[name="phone"]').val();
                if (phone.length === 10) {
                    // Hide the OTP button and start the timer
                    $('#login-send-otp').hide();
                    $('#login-otp-input-box').show();
                    startTimer(30, $('#login-send-otp'));

                    // Send OTP via AJAX
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('send.login.otp') }}",
                        data: {
                            phone: phone,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#login-otp-input').prop('disabled', false);
                            } else {
                                alert(response.message);
                                $('#login-send-otp')
                            .show(); // Show the OTP button again if there's an error
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data', error);
                            $('#login-send-otp')
                                .show(); // Show the OTP button again if there's an error
                        }
                    });
                } else {
                    alert('Please enter a valid mobile number');
                }
            });

            $('#login-otp-input').on('input', function() {
                var otp = $(this).val();
                if (otp.length === 4) {
                    // Auto-submit OTP
                    $('#otp-login').submit();
                }
            });

            $('#otp-login').on('submit', function(event) {
                event.preventDefault();

                var phone = $('input[name="phone"]').val();
                var otp = $('input[name="otp"]').val();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('verify.login.otp') }}",
                    data: {
                        phone: phone,
                        otp: otp,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
						console.log(response);
                        if (response.status==true) {
                           
							toastr.success(response.message);
                            // Redirect or further actions
                            window.location.href = '{{ url("profile") }}';
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });
            });

            function startTimer(duration, button) {
                let timer = duration,
                    minutes, seconds;
                const display = $('#timer');

                const interval = setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.html("Resend OTP in " + minutes + ":" + seconds);

                    if (--timer < 0) {
                        clearInterval(interval);
                        button.show(); // Show the OTP button again after the timer ends
                    }
                }, 1000);
            }

        });
    </script>
@endsection

@section('script')
    <script src="{{ static_asset('assets/js/common.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        function submitForm() {
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var phone = $('#phone').val();
            var password = $('#reg_password').val();
            var confirm_password = $('#txtConfirmPassword').val();
            var email = $('#reg_email').val();
            var isValidForm = [{
                    'value': password,
                    'id': 'reg_password',
                    'error_id': 'password_error',
                    'delimeter': '',
                    'msg': 'Password Required.'
                },
                {
                    'value': confirm_password,
                    'id': 'txtConfirmPassword',
                    'error_id': 'confirm_password_error',
                    'delimeter': '',
                    'msg': 'Confirm Password Required.'
                },
                {
                    'value': email,
                    'id': 'reg_email',
                    'error_id': 'reg_email_error',
                    'delimeter': '',
                    'msg': 'Email Required.'
                },
                {
                    'value': phone,
                    'id': 'phone',
                    'error_id': 'phone_error',
                    'delimeter': '',
                    'msg': 'Mobile Required.'
                },
                {
                    'value': last_name,
                    'id': 'last_name',
                    'error_id': 'last_name_error',
                    'delimeter': '',
                    'msg': 'Last Name Required.'
                },
                {
                    'value': first_name,
                    'id': 'first_name',
                    'error_id': 'first_name_error',
                    'delimeter': '',
                    'msg': 'First Name Required.'
                }
            ];

            if (checkBulkEmpty(isValidForm)) {
                console.log("form invalid");
                return false;
            } else {
                var isValidEmail = false;
                var isValidMobile = false;
                if (email != "") {
                    isValidEmail = IsValidEmail('reg_email', 'reg_email_error', email, 'Invalid Email.');
                    if (!isValidEmail) {
                        return false;
                    }
                } else if (phone != "") {
                    isValidMobile = IsValidMobile('phone', 'phone_error', phone, 'Invalid Mobile.');
                    if (!isValidMobile) {
                        return false;
                    }
                } else {
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

            $('#create-account').attr('disabled', true);
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
                success: function(response) {
                    console.log("response", response);
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.replace('email-verify');
                    } else {
                        $('#create-account').attr('disabled', false);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response) {
                    $('#create-account').attr('disabled', false);
                    console.log('Error:' + response);
                }
            });
        }

        function submitLoginForm() {
            var password = $('#password').val();
            var email = $('#email').val();
            var isValidForm = [{
                    'value': password,
                    'id': 'password',
                    'error_id': 'login_password_error',
                    'delimeter': '',
                    'msg': 'Password Required.'
                },
                {
                    'value': email,
                    'id': 'email',
                    'error_id': 'email_error',
                    'delimeter': '',
                    'msg': 'Email Required.'
                },
            ];

            if (checkBulkEmpty(isValidForm)) {
                return false;
            }
            // else{
            //     var isValidEmail = IsValidEmail('email','email_error',email,'Invalid Email.');
            //     if(!isValidEmail){
            //         return false;
            //     }
            // }

            $('#login-button').attr('disabled', true);
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
                success: function(response) {
                    console.log("response", response);
                    if (response.status) {
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        // url = 'profile';
                        // if(response.redirectTo){
                        //     url=response.redirectTo;
                        // }
                        // window.location.replace(url);
                        window.history.back();
                    } else {
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#login-button').attr('disabled', false);
                    }
                },
                error: function(response) {
                    $('#login-button').attr('disabled', false);
                    console.log('Error:' + response);
                }
            });


        }
    </script>
@endsection
