@extends('frontend.master')

@section('content')
<section class="pageTitle"> </section>
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
            <div class="col-lg-6 col-xl-4 mx-auto">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <h3 class="text-left mb-0">{{ translate('Forgot Password?') }}</h3>
                        </div>
                        <p class="mb-4 fs-13 fw-600">
                            {{translate('Enter your email address to recover your password.')}}
                        </p>
                        <a href="" id="reset_link"></a>
                        <form id="forgot_password_form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="{{ translate('Email') }}">
                                <span id="email_error"></span>
                            </div>
                            <div class="form-group text-right">
                                <!-- <button type="button" class="btn btn-primary-dark-w px-5 w-100" id="forgot_password_submit_btn" onclick="submitForm();">
                                    {{ translate('Send Password Reset Link') }}
                                </button> -->
                            </div>
                            <div class="col-md-12 text-center fs-13 mb-2 paddingnone">
                                <a href="{{route('login')}}" class="newcusttxt">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{static_asset('assets/js/common.js')}}" type="text/javascript"></script>
<script>
    function submitForm() {
        $('#reset_link').attr('href','');
        $('#reset_link').html('');
        var email = $('#email').val();
        var isValidForm = [
            {'value':email,'id':'email','error_id':'email_error','delimeter':'','msg':'Email Required.'},
        ];
        
        if(checkBulkEmpty(isValidForm)){
            return false;
        }else{
            var isValidEmail = IsValidEmail('email','email_error',email,'Invalid Email.');
            if(!isValidEmail){
                return false;
            }
        }

        $('#forgot_password_submit_btn').attr('disabled',true);
        var form = document.getElementById('forgot_password_form');
        var formData = new FormData(form);

        $.ajax({
            url: "{{ route('forgot_password.send_password_reset_link') }}",
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
                        timer: 1500
                    });
                    $('#email').val('');
                    $('#email_error').html('');
                    $('#reset_link').attr('href',response.data.url);
                    $('#reset_link').html(response.data.url);
                }else{
                    $('#forgot_password_submit_btn').attr('disabled',false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function(response){
                $('#forgot_password_submit_btn').attr('disabled',false);
                console.log('Error:'+response);
            }
        });
    }
</script>
@endsection