<div id="myModaladdress" class="modal fade prolidneis" role="dialog">
    <div class="modal-dialog w-50" id="modal-dialog45">
        <div class="modal-content">
            <div class="modal-body">
                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                    <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Get A Quote</h3>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="deals">
                        <hr class="mt-2">
                    </div>
                </div>
                
                <form class="js-validate row" method="post" action="{{route('addAddress')}}" novalidate="novalidate">
                    @csrf
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" aria-label="First Name" requireddata-msg="Please enter a valid First Name." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name"  aria-label="Last Name" requireddata-msg="Please enter a valid Last Name." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Phone No." aria-label="Phone No" requireddata-msg="Please enter a valid Phone No." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="pin" id="pincode" placeholder="Pin Code" aria-label="Pin Code" requireddata-msg="Please enter a valid Pin Code." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" onclick="get_state_city()" name="house_no" placeholder="House/Plot No" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Full Address" aria-label="Full address" >
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="area" placeholder="Street/Locality/Area" aria-label="Area" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="city" id="cityid" placeholder="City" >
                    </div>
                    <div class="js-form-message form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="state" id="stateid" placeholder="State">
                    </div>
                    <div class="js-form-message form-group col-md-12 mb-3">  
                        <ul class="list-unstyled d-flex">
                            <li class="m-3 mt-0 mb-0">
                                <label for="office">
                                    <input id="office" class="input-radio" type="radio" data-order_button_text="" value="Office" name="address_type">
                                    <span>Office </span>
                                </label> 
                            </li>
                            <li class="m-3 mt-0 mb-0">
                                <label for="Home">
                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="Home" name="address_type" class="input-radio" id="Home">
                                    <span>Home  </span>
                                </label> 
                            </li>
                            <li class="m-3 mt-0 mb-0">
                                <label for="other">
                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="Other" name="address_type" class="input-radio" id="other"  >
                                    <span>Other  </span>
                                </label> 
                            </li>
                        </ul>
                    </div>
                                    
                    <div class="mb-600 d-flex w-100">
                        <div class="mb-3 w-auto"><button onclick="window.location.href='{{url('profile')}}'" class="btn edit-address1_1 btn-primary-dark-w px-5 w-100">Cencel</button></div>
                        <div class="mb-3 w-50 mx-3"><button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>