@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class=" w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">
						 
						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Manage Payments
                                </h3>
                               
                            </div>
                           <ul class="ulines-dps     justify-content-start">
                             <li class="ukine  "><a href="{{url('profile')}}">My Profile</li>
                              <li class="ukine "><a href="{{url('my_addressbook')}}">My Address Book  </a></li>
                              <li class="ukine"><a href="{{url('my-bank-details')}}">Bank Details</a></li>
                              <li class="ukine "><a href="{{url('change-password')}}">Change Password </a></li>
                              <li class="ukine active4"> <a href="{{url('manage-payments')}}"> Manage Payments</a> </li> 
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
							  <div class="d-flex position-relative minheight">
                         @foreach ($mypaymentcard as $item)
                     <div class="hotel-form py-4 px-2 mb-3 mt-1 shadow-none w-33 pt-2 border">
								<div class="px-2">
                                   <div class="user_name mt-1">
                                        <span class="userf-name">
										{{Auth::user()->name}}
                                        </span>
                                    </div>
									         {{-- <div class="phone_number mt-1">
                                        <span class="user-phone d-flex">
                                           <i class="fa fa-info p-2 border rounded-circle" aria-hidden="true"></i>  Ac Details : 4637 2890 3914 5621
                                        </span>
                                    </div>
                                    <div class="user_email mt-1">
                                        <span class="user-email d-flex line-heights">
                                           <i class="fa fa-code p-2 border rounded-circle" aria-hidden="true"></i>  IFSC Code : CNB-1421
                                        </span>
                                    </div> --}}
                                    <div class="user_email mt-1">
                                        <span class="user-email d-flex line-heights">
                                           <i class="fa fa-credit-card p-2 border rounded-circle" aria-hidden="true"></i>  Card Type : {{$item->credit_debit}}
                                        </span>
                                    </div>
                                    <div class="user_email mt-1">
                                        <span class="user-email d-flex line-heights">
                                           <i class="fa fa-credit-card p-2 border rounded-circle" aria-hidden="true"></i>  Card No : {{$item->card_no}}
                                        </span>
                                    </div>
                                    <div class="user_email mt-1">
                                        <span class="user-email d-flex line-heights">
                                           <i class="fa fa-university p-2 border rounded-circle" aria-hidden="true"></i>  Expiry Date : {{$item->expiry_month}} / {{$item->expiry_year}}
                                        </span>
                                    </div>
                                </div>
                        </div> 
					@endforeach  	 
                            <div class="hotel-form py-4 px-2 mb-3 mt-1 text-right w-auto h-auto pt-2 border-none">
                         <div class="px-2">
                                     
                                   <div class="user_email edit-address_1 mt-1 d-block">
								    <a href="#edit-address1"> 
                                        <span class="user-email d-block">
                                        <b class="d-flex"> <i class="fa fa-pencil p-2 border rounded-circle" aria-hidden="true"></i> Add New Cards</b>
                                        </span>
										</a>
                                    </div>
                                    </div>

                            <div id="edit-address"></div>
                            <div id="edit-address1"></div>

                        </div> 
						</div> 
                        <div class="col-md-8">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
						 
			<div class="edit_address_form_new colampoxe mr-3  mx-0 px-0 py-2 shadow-none">
						
			  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                          <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Add New Payment Card</h3>
                                          <div class="deals">
                                             <hr class="mt-2">
                                          </div>
                                       </div>
               
               
               <p class="text-gray-901 mb-4">Add new Payment Card.</p>
               <form class="row" method="post" action="{{route('addPaymentCards')}}">
				@csrf
                    <div class="js-form-message form-group col-md-12 mb-3">  
				  <ul class="list-unstyled d-flex">
                       
                        <li class="m-3 mt-0 mb-0">
                            <label for="credit">
                                <input id="credit" class="input-radio" type="radio" data-order_button_text="" value="Credit Card" name="credit_debit">
                                <span>Credit Card </span>
                            </label> 
                        </li>
                     
                        <li class="m-3 mt-0 mb-0">
                            <label for="debit">
                                <input type="radio" data-order_button_text="Proceed to PayPal" value="Debit Card" name="credit_debit" class="input-radio" id="debit" checked >
                                <span>Debit Card  </span>
                            </label> 
                        </li>
                    </ul>
				  </div>

				<div class="js-form-message form-group col-md-12 mb-3">
					<input type="number" required class="form-control" name="card_no" placeholder="Card Number">
               <small class="text-danger form-text">@error('card_no') {{$message}} @enderror</small>
				</div>
                  <div class="js-form-message form-group col-md-12 mb-3"> 
					<label class="custom-control-label form-label" for="rememberCheckbox">Expiry date</label>
				  </div>
                  <div class="js-form-message form-group col-md-6 mb-3">
					<select class="form-control" name="expiry_month" placeholder="Pin Code" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					
				  </div>
				  <div class="js-form-message form-group col-md-6 mb-3">
					<select class="form-control" name="expiry_year" placeholder="" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
						
					  <option value="2022"selected>2022</option>
					  <option value="2023">2023</option>
					  <option value="2024">2024</option>
					  <option value="2025">2025</option>
					  <option value="2026">2026</option>
					  <option value="2027">2027</option>
					  <option value="2028">2028</option>
					  <option value="2029">2029</option>
					  <option value="2030">2030</option>
					  <option value="2031">2031</option>
					  <option value="2032">2032</option>
					  <option value="2033">2033</option>
					  <option value="2034">2034</option>
					  <option value="2035">2035</option>
					  <option value="2036">2036</option>
					  <option value="2037">2037</option>
					  <option value="2038">2038</option>
					  <option value="2039">2039</option>
					  <option value="2040">2040</option>
					  <option value="2041">2041</option>
					  <option value="2042">2042</option>
					  <option value="2043">2043</option>
					  <option value="2044">2044</option>
					  <option value="2045">2045</option>
                                                                  
					</select>
					
				  </div>
                   
              
				                    
                <div class="mb-600 d-flex w-100">
                     <div class="mb-3 w-auto"><button type="button" class="btn edit-address1_1 btn-primary-dark-w px-5 w-100">Cancel</button></div>
                     <div class="mb-3 w-50 mx-3"><button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Add Card</button></div>
                  </div>
               </form>
         
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