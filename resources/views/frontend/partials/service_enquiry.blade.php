<aside id="sidebar" class="sidebar-wrap">
    <div class="property-form-wrap">
       <div class="property-form clearfix">
        <form method="post" action="{{route('makeEnquiry')}}" enctype="multipart/form-data">
			@csrf
            <input type="hidden" name="page_name" value="Service">
            <div class="agent-details">
               <div class="d-flex align-items-center">
                  <div class="agent-image"><img class="rounded" src="{{ static_asset('assets/img/logo.png') }}" alt="Brittany Watkins" width="70" height="70"></div>
                  <ul class="agent-information list-unstyled">
                     <li class="agent-name"><i class="fa fa-user-o" aria-hidden="true"></i> Enquiry Form</li>
                  </ul>
               </div>
            </div>
            <div class="form-group">
               <input class="form-control" name="name" required value="" type="text" placeholder="Name">
            </div>
            <!-- form-group -->
            <div class="form-group">
               <input class="form-control" min="10" max="10" name="phone" pattern="[6789][0-9]{9}" required value="" type="text" placeholder="Phone">
            </div>
            <!-- form-group -->
            <div class="form-group">
               <input class="form-control" name="email" required value="" type="email" placeholder="Email">
            </div>
            <!-- form-group -->
            <div class="form-group form-group-textarea">
               <textarea class="form-control hz-form-message" name="message" rows="4" placeholder="Hello, I am interested in [Modern Apartment]"></textarea>
            </div>
            <!-- form-group -->	
            <div class="form-group">
               <div class="dropdown1 bootstrap-select1 form-control1" style="position:relative;">
               <i class="fa fa-angle-down" aria-hidden="true" style="top:15px;"></i>
                  <select required name="user_type" class="selectpicker form-control" title="Select">
                     <option class="bs-title-option" value="">Selected</option>
                     <option value="buyer">I'm a buyer</option>
                     <option value="tennant">I'm a tennant</option>
                     <option value="agent">I'm an agent</option>
                     <option value="other">Other</option>
                  </select>
               </div>
               <!-- selectpicker -->
            </div>
            <!-- form-group -->
            <div class="form-group">
               <label class="control control--checkbox m-0 hz-terms-of-use">
                  <input type="checkbox" required name="privacy_policy">By submitting this form I agree to <a target="_blank" href="#1">Terms of Use</a>
               </label>
            </div>
            <!-- form-group -->	
    
            <button type="submit" class="houzez_agent_property_form btn btn-secondary btn-half-width">
				   <span class="btn-loader houzez-loader-js"></span>
               Send Message					
            </button>
            {{-- <a href="tel:999999999" class="btn btn-secondary-outlined btn-half-width">
               <!-- <button type="button" class="btn"> -->
               <span class="hide-on-click">Call</span> 
               <!-- </button> -->
            </a>
            <a target="_blank" href="https://api.whatsapp.com/send, I am interested in [Modern Apartment] " class="btn btn-secondary-outlined btn-full-width mt-10"><i class="houzez-icon icon-messaging-whatsapp mr-1"></i> WhatsApp</a> --}}
         </form>
       </div>
       <!-- property-form -->
    </div>
    <!-- property-form-wrap -->
 </aside> 