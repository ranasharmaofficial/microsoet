@extends('frontend.layouts.user_panel')

@section('panel_content')
<div class=" w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">

						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Account
                                </h3>

                            </div>
                           <ul class="ulines-dps     justify-content-start">
                              <li class="ukine  "><a href="{{url('profile')}}">My Profile</li>
                              <li class="ukine "><a href="{{url('my_addressbook')}}">My Address Book  </a></li>
                              <li class="ukine active4"><a href="{{url('my-bank-details')}}">Bank Details</a></li>
                              <li class="ukine "><a href="{{url('change-password')}}">Change Password </a></li>
                              <li class="ukine "> <a href="{{url('manage-payments')}}"> Manage Payments</a> </li>
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
							  <div class="d-flex position-relative justify-content-center">
                            <div class="hotel-form py-4 px-4 mb-3 mt-1 align-center background-white shadow-none w-50 pt-2 border">
                            <div class="px-2">
                                    <div class="user_location mt-1 pb-3">
                                        <span class="userf-name">
                                          Add Bank Details
                                        </span>
                                    </div>


                                    <div class="user_email mt-1 pb-3">
                                        <span class="user-email">
                                          You haven't added any bank accounts.
                                        </span>
                                    </div>
                                   <div class="user_email edit-address mt-1">
								   <button type="button" onclick="window.location.href='{{url('manage-payments')}}'" class="edit-address1 btn btn-primary-dark-w px-5 w-50" >Add Bank Details</button>
								   {{-- <button type="button" class="edit-address1 btn btn-primary-dark-w px-5 w-50"  data-toggle="modal" data-target="#myModal">Add Bank Details</button> --}}

                                    </div>
                                    </div>






                        </div>

						</div>


                              </li>


                           </ul>


                        </div>
                        </div>
                     </div>
                  </div>
				  <div id="myModal" class="modal fade prolidneis" role="dialog">
            <div class="modal-dialog w-50" id="modal-dialog45">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="box-soldid1back box-soldid2">
                        </div>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <!--  <h2 style="    font-size: 22px; text-transform: uppercase;    text-align: center; font-weight: 600;"></h2> -->
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                          <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Relogin before entering bank details</h3>
                                          <div class="deals">
                                             <hr class="mt-2">
                                          </div>
                                       </div>



              <form class="js-validate row" novalidate="novalidate">
                  <div class="js-form-message form-group col-md-12 mb-3">
					<input type="text" id="login_password" class="form-control w-100" name="email" placeholder="Enter Password" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
				  </div>

                  <div class="js-form-message form-group col-md-12 mb-3">
				  <ul class="list-unstyled d-flex">

                        <li class="m-3 mt-0 mb-0">
                            <label for="payment_method_bacs d-flex">
                                <input required class="input-radio" type="radio" value="bacs" name="payment_method" checked>
                                <span>Password </span>
                            </label>
                        </li>
                        <span style="color:red;font-size:16px;" id="login_error"></span>
						{{-- <li class="m-3 mt-0 mb-0">
                            <label for="payment_method_paypal d-flex">
                                <input type="radio" data-order_button_text="Proceed to PayPal" value="bacs" name="payment_method" class="input-radio" id="payment_method_paypal" checked >
                                <span>Send OTP  </span>
                            </label>
                        </li>--}}
                    </ul>
				  </div>

                <div class="mb-600 d-flex w-50">
                     <div class="mb-3 w-50 mx-3">
					 <button type="submit" class="edit-address1 btn btn-primary-dark-w px-5 w-100 loginAgain">Login</button>
					 </div>
                  </div>
               </form>
                    </div>
                </div>
            </div>
        </div>
				  <script>
		 $("#profile").change(function() {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function(e) {
            $('#profileImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); // convert to base64 string
    });
		 </script>
@endsection


