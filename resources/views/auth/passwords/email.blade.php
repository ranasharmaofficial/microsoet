@extends('frontend.master')

@section('content')

<section class="pageTitle"> </section>
<!--top banner end -->
<div class="discription_section my__accountsd">
	<div class="container">
		<div class="row">
			<div class="col-md-12 breadmcrumsize">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
					</ol>
				</nav>
			</div>
		</div>
				<div class="row">
					<div class="col-md-6">
						<div class="box-soldid2">
							<div class="colampoxe">
								<div class="border-bottom1 border-color-111 mt-0 mb-3">
									<h3 class="section-title section-title__sm mb-0 pb-2 mt-0 font-size-18"> Your new password must:</h3>
									<div class="deals">
										<hr> </div>
								</div>
								<p class="text-gray-901 mb-1">Be at least 6 characters in length
									<br>Not contain common passwords.
									<br>Not be same as your current password</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box-soldid1">
							<div class="border-bottom1 border-color-111 mt-0 mb-3">
								<h3 class="section-title section-title__sm mb-0 mt-0 pb-2 font-size-18"> {{ translate('Forgot Password?') }} </h3>
								<p class="mb-4 opacity-60">{{translate('Enter your email address to recover your password.')}} </p>
								<div class="deals">
									<hr> </div>
							</div>
							<form class="js-validate" method="post" action="{{ route('password.email') }}" novalidate="novalidate">
							@csrf
							@if (addon_is_activated('otp_system'))
								<div class="js-form-message form-group mb-2">
									<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" id="RegisterSrEmailExample01" placeholder="{{ translate('Email') }}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> 
								</div>
								 @else
								<div class="js-form-message form-group mb-2">
									<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" id="RegisterSrEmailExample01" placeholder="{{ translate('Email') }}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> 
								</div>
								 @endif
								@if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
							{{--<div class="js-form-message form-group mb-2">
									<input type="email" class="form-control" name="email" id="upassword" placeholder="Type New Password" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> </div>
								<div class="js-form-message form-group mb-2">
									<input type="email" class="form-control" name="email" id="uconfirm_password" placeholder="Retype New Password" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> </div>
								<div class="js-form-message form-group mb-2">
									<input type="email" class="form-control" name="email" id="RegisterSrEmailExample04" placeholder="Enter OTP Sent to 9999999999" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> </div>
								<div class="mb-600" style="    text-align: center;">
									<div class="mb-3">
										<button type="submit" class="btn btn-primary-dark-w" style="width:auto;">{{ translate('Send Password Reset Link') }}</button>
									</div>
								</div>--}}
								<div class="mb-600" style="    text-align: center;">
									<div class="mb-3">
										<button type="submit" class="btn btn-primary-dark-w" style="width:auto;">{{ translate('Send OTP') }}</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
				</div>
@endsection
