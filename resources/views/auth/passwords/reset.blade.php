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
						<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
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
								<h3 class="section-title section-title__sm mb-0 mt-0 pb-2 font-size-18"> {{ translate('Reset Password') }} </h3>
								<p class="mb-4 opacity-60">{{translate('Enter your email address and new password and confirm password.')}} </p>
								<div class="deals">
									<hr> </div>
							</div>
							<form class="js-validate" method="post" action="{{ route('password.update') }}" novalidate="novalidate">
							@csrf
							@php
							$email_in_session = Session::get('email_in_session');
							
							@endphp
								<div class="js-form-message form-group mb-2">
									<input value="{{ $email_in_session }}" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  value="{{ $email ?? old('email') }}" name="email" id="RegisterSrEmailExample01" placeholder="{{ translate('Email') }}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> 
								</div>
								 @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
								@endif
								<div class="js-form-message form-group mb-2">
									<input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="123456" id="upassword" placeholder="{{translate('Verification Code')}}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
									{{-- <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $email ?? old('code') }}" id="upassword" placeholder="{{translate('Verification Code')}}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success"> --}}
								</div>
								@if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
								@endif
								<div class="js-form-message form-group mb-2">
									<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="uconfirm_password" placeholder="{{ translate('New Password') }}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
								</div>
								 @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
								<div class="js-form-message form-group mb-2">
									<input type="password" class="form-control" name="password_confirmation" id="RegisterSrEmailExample04" placeholder="{{ translate('Confirm Password') }}" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
								</div>
								<div class="mb-600" style="    text-align: center;">
									<div class="mb-3">
										<button type="submit" class="btn btn-primary-dark-w" style="width:auto;">{{ translate('Reset Password') }}</button>
									</div>
								</div>
								
							</form>
						</div>
					</div>
				</div>
				</div>
				</div>
<?php if(false) {?>
<div class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <div class="bg-white rounded shadow-sm p-4 text-left">
                    <h1 class="h3 fw-600">{{ translate('Reset Password') }}</h1>
                    <p class="mb-4 opacity-60">{{translate('Enter your email address and new password and confirm password.')}} </p>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ translate('Email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $email ?? old('code') }}" placeholder="{{translate('Code')}}" required autofocus>

                            @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ translate('New Password') }}" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ translate('Confirm Password') }}" required>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ translate('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
@endsection
