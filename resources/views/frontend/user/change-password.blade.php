@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class="shadow w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">

						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Address Book
                                </h3>

                            </div>

                            <ul class="ulines-dps     justify-content-start">
                             <li class="ukine  "><a href="{{url('profile')}}">My Profile</li>
                              <li class="ukine "><a href="{{url('my_addressbook')}}">My Address Book  </a></li>
                              
                              <li class="ukine active4 "><a href="{{url('change-password')}}">Change Password </a></li>
                              
                            </ul>
						   <div class="flash-message mt-2">
                                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                        @if (Session::has('alert-' . $msg))
                                            <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                                {{ Session::get('alert-' . $msg) }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                        <div class="hotel-form py-4 shadow-none">
						  <ul class="ulines-dps-para">
                              <li class="ukine active4">

						 <div class=" mr-3  mx-0 px-0 py-2 shadow-none">

			  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                          <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Change Password</h3>
                                          <div class="deals">
                                             <hr class="mt-2">
                                          </div>
                                       </div>


               <div class="box-soldid1">



                                    <form class="js-validate" method="post" action="{{route('userPasswordChange')}}" autocomplete="off" novalidate="novalidate">
										@csrf
                                        <div class="js-form-message form-group mb-2">
										<input type="password" required name="old_password" class="form-control" placeholder="Type Current Password">
										<small class="form-text text-danger">@error('old_password') {{ $message }} @enderror</small>
                                        </div>
                                        <div class="js-form-message form-group mb-2">
										<input type="password" required class="form-control" name="new_password" placeholder="Type New Password">
										<small class="form-text text-danger">@error('new_password') {{ $message }} @enderror</small>
                                        </div>
                                        <div class="js-form-message form-group mb-2">
										<input type="password" required class="form-control" name="confirm_password" placeholder="Retype New Password">
										<small class="form-text text-danger">@error('confirm_password') {{ $message }} @enderror</small>
                                        </div>
                                        <!--<div class="js-form-message form-group mb-2"><input type="email"
                                                class="form-control" name="email" id="RegisterSrEmailExample3"
                                                placeholder="Enter OTP Sent to 9999999999" aria-label="Email address"
                                                requireddata-msg="Please enter a valid email address."
                                                data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>-->
                                        <div class="mb-600">
                                            <div class="mb-3"><button type="submit" class="btn btn-primary-dark-w"
                                                    style="width:auto;">Reset Password</button></div>
                                        </div>
                                    </form>
                                </div>

            </div>
			 </li>


                           </ul>


                        </div>
                        </div>
                     </div>
                  </div>
				   <script>
		 $(".edit-address").click(function(){
			 $(".edit_address_form").show();
			  $(".edit_address_form_new").hide();
		 });
		  $(".edit-address1").click(function(){
			 $(".edit_address_form").hide();
		 });
		 $(".edit-address_1").click(function(){
			 $(".edit_address_form_new").show();
			  $(".edit_address_form").hide();
		 });
		  $(".edit-address1_1").click(function(){
			 $(".edit_address_form_new").hide();
		 });
		 </script>
@endsection
