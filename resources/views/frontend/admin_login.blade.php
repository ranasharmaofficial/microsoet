@extends('frontend.admin_login_layout')

@section('content')
<style>
	.success_msg{color: green;}
	.success_bdr{border: 1px solid green;}
	.error_msg{color:red;}
	.error_bdr{border: 1px solid red;}
    .buttonbuynow, .buttonbuynow:hover {
        width: 100%;
        border: 1px solid #ff6c00;
        padding: 0px;
        height: 31px;
        line-height: 0px;
        background: #ff6c00;
        color: #fff;
        font-size: 14px;
        border-radius: 0.25rem;
        cursor: pointer;
    }
</style>
 <div class="h-100 bg-cover bg-center py-4 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{static_asset('assets/img/logo.png')}}" height="60px" class="mb-1 mt-1" />
            </div>
            <div class="col-lg-6 col-xl-4 m-auto">
                <div class="card text-left">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <h3 class="text-center mb-0">Admin Login</h3>
                            <span id="resp_msg" class="mb-1"></span>
                        </div>
                        <form method="POST" id="admin-login-form">
                            @csrf
                             <div class="form-group">
                            <h3 class="fs-13 fw-600">Email</h3>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ translate('Email') }}">
                                <span id="email_error"></span>
                            </div>
                            <div class="form-group">
                            <h3 class="fs-13 fw-600">Password</h3>
                                <input id="password" type="password" class="form-control" name="password" placeholder="{{ translate('Password') }}">
                                <span id="password_error"></span>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <div class="text-left">
                                        <label class="aiz-checkbox">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remembe') ? 'checked' : '' }}>
                                            <span>Keep me signed in.</span>
                                            <span class="aiz-square-check"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="admin-login-button" class="buttonbuynow mb-3" onclick="submitAdminLoginForm()">
                                {{ translate('Login') }}
                            </button>
                            
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
    <script type="text/javascript">

        function submitAdminLoginForm() {
            var password = $('#password').val();
            var email = $('#email').val();
			var isValidForm = [
				{'value':password,'id':'password','error_id':'password_error','delimeter':'','msg':'Password Required.'},
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

			$('#admin-login-button').attr('disabled',true);
			var form = document.getElementById('admin-login-form');
			var formData = new FormData(form);

			$.ajax({
				url: "{{ route('auth.admin.login') }}",
				method: 'POST',
				data: formData,
				dataType: 'JSON',
				contentType: false,
				cache: false,
				processData: false,
				success: function(response){
					console.log("response",response);
					if(response.status){
                        toastr.success(response.msg);
                        window.location.replace("/admin/");
					}else{
                        $('#admin-login-button').attr('disabled',false);
						toastr.error(response.msg);
					}
				},
				error: function(response){
                    $('#admin-login-button').attr('disabled',false);
					console.log('Error:'+response);
				}
			});
        }
    </script>
@endsection
