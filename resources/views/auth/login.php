<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Microsoft</title>
    <?php
         include 'include/link.php'
         ?>
</head>

<body>
    <?php
         include 'include/header.php'
         ?>
    <!-- log in section start -->
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
                        <form id="login-form" class="form active">
                            <h3 class="py-2 fw-bold">Login</h3>
                            <span class="py-2 d-inline-block" style="color:#a68f8f">Welcome back! Sign in to your
                                account.</span>
                            <input type="number" placeholder="Enter Your Mobile Number" required
                                class="login-number-login">
                            <button type="submit" class="login-btn">Send one time password</button>
                        </form>
                        <form id="signup-form" class="form">
                            <input type="hidden" name="_token" value="mCWLS1D6klAhScGFNYPLRTdDBpxaQE6YGgterrV3">
                            <div class="form-group">
                                <h3 class="py-2 fw-bold">Sign Up</h3>
                                <span class="py-2 d-inline-block" style="color:#a68f8f">Create new account today reap
                                    the benefits of a personalized shopping experienc</span>
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
                            </div>
                            <div class="form-group otp-box w-100">
                                <div class="col-12 col-md-12 col-lg-8 form_pr_zero one-tgw pe-2">
                                    <div class="form-group" style="position:relative;">
                                        <input type="tel" class="form-control" name="phone" maxlength="10" id="r_phone"
                                            placeholder="Mobile" required="">
                                        <span class="position-absolute send_p">
                                            <button class="btn btn-primary" type="button" id="send-otp">Send
                                                OTP</button>
                                        </span>
                                    </div>
                                    <div id="r_timer" class="text-center text-success">
                                    </div>
                                </div>
                            </div>
                            <div id="otp-input-box" class="col-12 col-md-12 col-lg-4 form_pl_zero"
                                style="display: none;">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="otp" id="otp-input"
                                        placeholder="Enter Your OTP*" disabled="" required="">
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
    <!-- log in section end -->
    <!-- login end-->

    <?php
         include 'include/footer.php'
         ?>
    <?php
         include 'include/script.php'
         ?>
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
</body>

</html>