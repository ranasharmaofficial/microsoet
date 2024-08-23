<form class="bottom-form_contact " method="post" action="{{ route('insertFormData') }}">
   @csrf
   <div class="border-bottom1 border-color-111 mt-0 mb-3">
     <h3 class="section-title section-title__sm mb-0 pb-0 mt-0 font-size-18">Send Us A Message</h3>
     <div class="deals">
       <hr class="mt-0">
     </div>
    
   </div>

   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="main-parenttttttT">
         <div class="input-group mb-1 form-relative">
           <span class="input-group-addon">
             <i class="fa-solid fa-user"></i>
           </span>
           <input type="text" name="full_name" class="form-control empty border-start-0" placeholder="Full Name">
             <span class="form-text text-danger errot-form">@error('full_name')
            {{$message}}
            @enderror
        </span>
         </div>
         
         <div class="input-group w-440 float-left mb-1 form-relative">
           <span class="input-group-addon">
             <i class="fa-solid fa-envelope"></i>
           </span>
           <input type="email" name="email" class="form-control empty border-start-0" placeholder="Email Address">
             <span class="form-text text-danger errot-form">@error('email')
            {{$message}}
            @enderror
        </span>
         </div>
         
         <div class="input-group mb-1 float-left form-relative">
           <span class="input-group-addon">
             <i class="fa-solid fa-phone-flip"></i>
           </span>
           <input type="tel" name="phone_no" class="form-control empty border-start-0" placeholder="Phone Number" maxlength="10" minlength="10">
             <span class="form-text text-danger errot-form">@error('phone_no')
            {{$message}}
            @enderror
        </span>
         </div>
         
         <div class="input-group mb-1 form-relative">
           <span class="input-group-addon text-aAaA  h-200">
             <i class="fa-solid fa-pen-to-square"></i>
           </span>
           <textarea name="message" class="form-control textareas h-200 border-start-0" placeholder="Your Message *"></textarea>
           <span class="form-text text-danger errot-form">@error('message')
            {{$message}}
            @enderror
        </span>
         </div>
         
         <div>
           
         <!-- checkbox -->
         <!-- 4 -->
       </div>
     </div>
     <input type="hidden" name="form_type" value="{{ $form_type }}">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="form-group">
         <div class="btn-box">
           <button type="submit" class="addto border-0">
             Submit
             <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
               <path d="M1,5 L11,5"></path>
               <polyline points="8 1 12 5 8 9"></polyline>
             </svg>
           </button>
           <!--  <input  value="submit_project" type="hidden"  name="submit_project" /> -->
         </div>
       </div>
     </div>
   </div>
 </form>