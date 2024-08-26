{{-- @extends('frontend.master') @section('content')
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-container">
                        <div class="form-toggle text-center">
                            <button id="login-btn" class="active">Login</button>
                            <button id="signup-btn">Sign Up</button>
                        </div>
                        <form id="login-form" class="form active" id="otp-login">
                            <h3 class="py-2 fw-bold">Login</h3>
                            <span class="py-2 d-inline-block" style="color:#a68f8f">Welcome back! Sign in to your
                                account.</span>
                            <input type="number" placeholder="Enter Your Mobile Number" required
                                class="login-number-login" pattern="[0-9]{1}"
                                inputmode="numeric" name="phone">
                            <button type="submit" class="login-btn" name="button" id="login-send-otp">Send one time password</button>
                            <div id="login-otp-input-box" class=" w-full">
                                <div class="form-group w-full">
                                    <input type="tel"
                                        class="form-control border rounded mt-3"
                                        name="otp" id="login-otp-input"
                                        placeholder="Enter OTP*" required>
                                    </input>
                                </div>

                                <div id="timer" class="text-center text-success">
                                </div>
                            </div>
                        </form>
                        <form class="form" id="otp-register" >
                            <input type="hidden" name="_token" value="mCWLS1D6klAhScGFNYPLRTdDBpxaQE6YGgterrV3">
                            <div class="form-group">
                                <h3 class="py-2 fw-bold">Sign Up</h3>
                                <span class="py-2 d-inline-block" style="color:#a68f8f">Create new account today reap the
                                    benefits of a personalized shopping experienc</span>
                                <input type="text" class="form-control" name="name" placeholder="Your Name"
                                    required="">
                            </div>
                            <div class="form-group otp-box w-100">
                                <div class="col-12 col-md-12 col-lg-8 form_pr_zero one-tgw pe-2">
                                    <div class="form-group" style="position:relative;">
                                        <input type="tel" class="form-control" name="phone" maxlength="10"
                                            id="r_phone" placeholder="Mobile" required>
                                        <span class="position-absolute send_p">
                                            <button class="btn btn-primary" type="button" id="send-otp">Send OTP</button>
                                        </span>
                                    </div>
                                    <div id="r_timer" class="text-center text-success">
                                    </div>
                                </div>
                            </div>
                            <div id="otp-input-box" class="col-12 col-md-12 col-lg-4 form_pl_zero" style="display: none;">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="otp" id="otp-input"
                                        placeholder="Enter Your OTP*" disabled required>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-paper-plane create-account"
                                        id="create-account"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>
    </section>

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
                            // toastr.error(response.message);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 5000
                            });
                            $('#send-otp')
                                .show(); // Show the OTP button again if there's an error
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
                    },
                    success: function(response) {
                        if (response.success == true) {
                            // toastr.success(response.message);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 5000
                            });
                            window.location.href = '{{ url('profile') }}';
                        } else {
                            // toastr.error(response.message);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 5000
                            });

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
                                // alert(response.message);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 5000
                                });
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
                    // alert('Please enter a valid mobile number');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter a valid mobile number',
                        showConfirmButton: false,
                        timer: 5000
                    });
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
                        if (response.status == true) {

                            // toastr.success(response.message);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 5000
                            });
                            // Redirect or further actions
                            window.location.href = '{{ url('profile') }}';
                        } else {
                            // toastr.error(response.message);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 5000
                            });
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loginBtn = document.getElementById("login-btn");
        const signupBtn = document.getElementById("signup-btn");
        const loginForm = document.getElementById("login-form");
        const signupForm = document.getElementById("signup-form");

        loginBtn.addEventListener("click", function() {
            loginForm.classList.add("active");
            signupForm.classList.remove("active");
            loginBtn.classList.add("active");
            signupBtn.classList.remove("active");
        });

        signupBtn.addEventListener("click", function() {
            signupForm.classList.add("active");
            loginForm.classList.remove("active");
            signupBtn.classList.add("active");
            loginBtn.classList.remove("active");
        });
    });
    </script>
@endsection


@section('script')
<script src="{{ static_asset('assets/js/common.js') }}" type="text/javascript"></script>

@endsection --}}

@extends('frontend.master')
@section('content')
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-container">
                    <div class="form-toggle text-center">
                        <button id="login-btn" class="active">Login</button>
                        <button id="signup-btn">Sign Up</button>
                    </div>
                    <!-- Corrected form IDs -->
                    <form id="login-form" class="form active">
                        <h3 class="py-2 fw-bold">Login</h3>
                        <span class="py-2 d-inline-block" style="color:#a68f8f">Welcome back! Sign in to your account.</span>
                        <input type="number" placeholder="Enter Your Mobile Number" required class="login-number-login" pattern="[0-9]{1}" inputmode="numeric" name="phone">
                        <button type="button" class="login-btn" id="login-send-otp">Send one time password</button>
                        <div id="login-otp-input-box" class="w-full" style="display:none;">
                            <div class="form-group w-full">
                                <input type="tel" class="form-control border rounded mt-3" name="otp" id="login-otp-input" placeholder="Enter OTP*" disabled required>
                            </div>
                            <div id="timer" class="text-center text-success"></div>
                        </div>
                    </form>
                    <form id="signup-form" class="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <h3 class="py-2 fw-bold">Sign Up</h3>
                            <span class="py-2 d-inline-block" style="color:#a68f8f">Create new account today and reap the benefits of a personalized shopping experience</span>
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group otp-box w-100">
                            <div class="col-12 col-md-12 col-lg-8 form_pr_zero one-tgw pe-2">
                                <div class="form-group" style="position:relative;">
                                    <input type="tel" class="form-control" name="phone" maxlength="10" id="r_phone" placeholder="Mobile" required>
                                    <span class="position-absolute send_p">
                                        <button class="btn btn-primary" type="button" id="send-otp">Send OTP</button>
                                    </span>
                                </div>
                                <div id="r_timer" class="text-center text-success"></div>
                            </div>
                        </div>
                        <div id="otp-input-box" class="col-12 col-md-12 col-lg-4 form_pl_zero" style="display: none;">
                            <div class="form-group">
                                <input type="text" class="form-control" name="otp" id="otp-input" placeholder="Enter Your OTP*" disabled required>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-paper-plane create-account" id="create-account"></i> Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#otp-input-box').hide();
        $('#send-otp').on('click', function() {
            var phone = $('#r_phone').val();
            $('#send-otp').hide();
            $('#otp-input-box').show();
            startTimer(30, $('#send-otp'));

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
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                        $('#send-otp').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data', error);
                    $('#send-otp').show();
                }
            });
        });

        $('#otp-input').on('input', function() {
            var otp = $(this).val();
            if (otp.length === 4) {
                $('#signup-form').submit();
            }
        });

        $('#signup-form').on('submit', function(event) {
            event.preventDefault();

            var name = $('input[name="name"]').val();
            var phone = $('#r_phone').val();
            var otp = $('#otp-input').val();

            $.ajax({
                method: 'POST',
                url: "{{ route('verify.phone.otp') }}",
                data: {
                    name: name,
                    phone: phone,
                    otp: otp,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                        window.location.href = '{{ url('profile') }}';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                }
            });
        });

        function startTimer(duration, button) {
            let timer = duration, minutes, seconds;
            const display = $('#r_timer');

            const interval = setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.html("Resend OTP in " + minutes + ":" + seconds);

                if (--timer < 0) {
                    clearInterval(interval);
                    display.text("You can resend the OTP now.");
                    button.show();
                }
            }, 1000);
        }

        $('#login-otp-input-box').hide();

        $('#login-send-otp').on('click', function() {
            var phone = $('input[name="phone"]').val();
            if (phone.length === 10) {
                $('#login-send-otp').hide();
                $('#login-otp-input-box').show();
                startTimer(30, $('#login-send-otp'));

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
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 5000
                            });
                            $('#login-send-otp').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data', error);
                        $('#login-send-otp').show();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please enter a valid mobile number',
                    showConfirmButton: false,
                    timer: 5000
                });
            }
        });

        $('#login-otp-input').on('input', function() {
            var otp = $(this).val();
            if (otp.length === 4) {
                $('#login-form').submit();
            }
        });

        $('#login-form').on('submit', function(event) {
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
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                        window.location.href = '{{ url('profile') }}';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                }
            });
        });

        function startTimer(duration, button) {
            let timer = duration, minutes, seconds;
            const display = $('#timer');

            const interval = setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.html("Resend OTP in " + minutes + ":" + seconds);

                if (--timer < 0) {
                    clearInterval(interval);
                    display.text("You can resend the OTP now.");
                    button.show();
                }
            }, 1000);
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const loginBtn = document.getElementById("login-btn");
        const signupBtn = document.getElementById("signup-btn");
        const loginForm = document.getElementById("login-form");
        const signupForm = document.getElementById("signup-form");

        loginBtn.addEventListener("click", function() {
            loginForm.classList.add("active");
            signupForm.classList.remove("active");
            loginBtn.classList.add("active");
            signupBtn.classList.remove("active");
        });

        signupBtn.addEventListener("click", function() {
            signupForm.classList.add("active");
            loginForm.classList.remove("active");
            signupBtn.classList.add("active");
            loginBtn.classList.remove("active");
        });
    });
</script>
@endsection

@section('script')
<script src="{{ static_asset('assets/js/common.js') }}" type="text/javascript"></script>
@endsection
