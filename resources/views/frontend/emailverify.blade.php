@extends('frontend.master')

@section('content')
<style>
    		label {
    color: #9f1e1e;
    cursor: pointer;
    font-weight: 400;
}
</style>
    <section class="pageTitle"> </section>
    <!--top banner end -->
    <div class="discription_section my__accountsd">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadmcrumsize">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Verify Your Email</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box-soldid2">
                        <div class="colampoxe">
                            <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pb-2 mt-0 font-size-18"> Your new password
                                    must:</h3>
                                <div class="deals">
                                    <hr>
                                </div>
                            </div>
                            <p class="text-gray-901 mb-1">Be at least 6 characters in length
                                <br>Not contain common passwords.
                                <br>Not be same as your current password
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-soldid1">
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                            <h3 class="section-title section-title__sm mb-0 mt-0 pb-2 font-size-18">
                                {{ translate('Verify your Email?') }} </h3>
                            @php
                                $sessionData = Session::get('verify');
								$email = "";
								$code = "";
								if($sessionData!=null && $sessionData['email']){$email=$sessionData['email'];}
								if($sessionData!=null && $sessionData['code']){$code=$sessionData['code'];}
                            @endphp
                            <p class="mb-4 opacity-60">Enter OTP Sent to <b>{{ $email }}</b></p>
                            <div class="deals"><hr></div>
                            <div class="flash-message mt-2">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if (Session::has('alert-' . $msg))
                                        <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                            {{ Session::get('alert-' . $msg) }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endforeach
								<span id="resp_msg" class="text-danger"></span>
                            </div>
                        </div>
                        <form id="verifyEmailForm" method="post">
                            @csrf
                            <div class="form-group mb-2">
                                <input style="border: 1px solid gray;border-radius: 5px;" type="tel" min="6" maxlength="6" class="form-control number" name="otp" id="otp" placeholder="{{ translate('Enter OTP') }}" value="{{ $code }}">
                            </div>
                            <span id="otp_error"></span>
                            <div class="mb-600" style="text-align: center;">
                                <div class="mb-3">
                                    <button type="button" id="otp_submit_btn" class="btn btn-primary-dark-w" style="width:auto;" onclick="submitForm()">{{ translate('VERIFY') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{static_asset('assets/js/common.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        function submitForm() {
            var otp = $('#otp').val();

			if(IsEmpty('otp','otp_error',otp,'OTP Required','')){
				return false;
			}else{
				$('#otp_submit_btn').attr('disabled',true);
			}

			var form = document.getElementById('verifyEmailForm');
			var formData = new FormData(form);

			$.ajax({
				url: "{{ route('verifyOtpOfEmail') }}",
				method: 'POST',
				data: formData,
				dataType: 'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success: function(response){
					console.log("response",response);
					if(response.status){
						$('#verifyEmailForm')[0].reset();
						// $('#resp_msg').addClass('success_msg');
						// $('#resp_msg').html(response.msg);
						// alert(response.msg);
                        toastr.success(response.msg);
						window.location.replace('login');
					}else{
						$('#otp_submit_btn').attr('disabled',false);
						$('#resp_msg').addClass('error_msg');
						$('#resp_msg').html(response.msg);
                        toastr.success(response.msg);
					}
				},
				error: function(response){
					$('#otp_submit_btn').attr('disabled',false);
                    toastr.success(response);
					console.log('Error:'+response);
				}
			});
        }
    </script>
@endsection
