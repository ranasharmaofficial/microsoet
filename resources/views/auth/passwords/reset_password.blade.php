@extends('frontend.master')

@section('content')

@php
$auth = "";
$key = "";
if(isset($_REQUEST['auth'])) {
    $auth = $_REQUEST['auth'];
}
if(isset($_REQUEST['key'])) {
    $key = $_REQUEST['key'];
}
@endphp

<section class="pageTitle"> </section>
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
            <div class="col-lg-6 col-xl-4 mx-auto">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <h3 class="text-left mb-0">{{ translate('Reset Password') }}</h3>
                        </div>
                        <form id="reset_password_form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="{{ translate('New Password') }}" onkeyup="isStrong(this.value,'password_error')">
                                <span id="password_error"></span>  
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="{{ translate('Confirm Password') }}" onkeyup="isMatch(this.value,'password','confirm_password','check_password_match','Password ')">
                                <span id="check_password_match"></span>
                            </div>
                            <div class="form-group text-right">
                                <input type="hidden" name="auth" value="{{$auth}}">
                                <input type="hidden" name="key" value="{{$key}}">
                                <button class="btn btn-primary-dark-w px-5 w-100" type="button" id="reset_password_submit_btn" onclick="submitForm();">
                                    {{ translate('Reset') }}
                                </button>
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
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        var isValidForm = [
            {'value':password,'id':'password','error_id':'password_error','delimeter':'','msg':'Password Required.'},
            {'value':confirm_password,'id':'confirm_password','error_id':'check_password_match','delimeter':'','msg':'Confirm Password Required.'},
        ];
        
        if(checkBulkEmpty(isValidForm)){
            return false;
        }

        $('#reset_password_submit_btn').attr('disabled',true);
        var form = document.getElementById('reset_password_form');
        var formData = new FormData(form);

        $.ajax({
            url: "{{ route('forgot_password.reset_password_auth') }}",
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
                    window.location.replace('/login');
                }else{
                    $('#reset_password_submit_btn').attr('disabled',false);
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
                $('#reset_password_submit_btn').attr('disabled',false);
                console.log('Error:'+response);
            }
        });
    }
</script>
@endsection