@extends('frontend.master')

@section('title')Career  @endsection

@section('description') @endsection


@section('content')



    <section class="pageTitle">  <div class="container">   </div>  </section>
      <!--top banner end -->
         <div class="form_section">
		  <!-- <div class="container">
	  <div class="row">
		 <div class="col-md-12 breadmcrumsize">
		   <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>  
                  <li class="breadcrumb-item active" aria-current="page"> Enquiry     </li>
               </ol>
            </nav>
		 </div>
		 </div>
		 </div>-->
		 <div class="row">
		 <div class="col-md-2"></div>
		 <div class="col-md-8">
         <form class="bottom-form" method="post" action="{{ route('addHireNow') }}" enctype="multipart/form-data">
            @csrf
            <div class="border-bottom1 border-color-111 mt-0 mb-3">
                     <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Life @growciti</h3>
                     <div class="deals">
                        <hr>
                     </div>
                  <p>  
                  We value our employees the most and we believe in their complete well-being. Hence we have instituted several initiatives and programs that we run to ensure a healthy and happy workforce as part of our mission to work in an exciting and vibrant environment.
                      </p>
                  </div>
                                      
                                       <div class="row">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                             <div class="main-parenttttttT">
                                                <div class="input-group mb-3 ">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-user"></i>
                                                   </span>
                                                   <input type="text" name="name" class="form-control empty" placeholder="Full Name" />
                                                   <span class="form-text text-danger">@error('name')
                                                      {{$message}}
                                                      @enderror
                                                  </span>
                                                </div>
                                                <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-envelope"></i>
                                                   </span>
                                                   <input type="text" name="email" class="form-control empty" placeholder="Email Address" />
                                                   <span class="form-text text-danger">@error('email')
                                                      {{$message}}
                                                      @enderror
                                                  </span>
                                                </div>
                                                <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-phone-flip"></i>
                                                   </span>
                                                   <input type="tel" name="mobile" class="form-control empty" placeholder="Phone Number" />
                                                   <span class="form-text text-danger">@error('mobile')
                                                      {{$message}}
                                                      @enderror
                                                  </span>
                                                </div>
                                                 
                                                   <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-map"></i>
                                                   </span>
                                                   <input type="text" name="address" class="form-control empty" placeholder=" Address" />
                                                   <span class="form-text text-danger">@error('address')
                                                      {{$message}}
                                                      @enderror
                                                  </span>
                                                </div>
                                                   <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-map-marker"></i>
                                                   </span>
                                                   <input type="text" name="city" class="form-control empty" placeholder=" City" />
                                                   <span class="form-text text-danger">@error('city')
                                                      {{$message}}
                                                      @enderror
                                                  </span>
                                                </div>
                                                   <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-clipboard"></i>
                                                   </span>
                                                 <select class="form-control" name="post_apply">
                           <option value="Selected">Post Apply For</option>
   <option class="executive" value="Executive">Executive </option>
   <option class="internship" value="Internship">Internship </option>
   <option class="management-director" value="Management (Director)">Management (Director)</option>
   <option class="management-manager" value="Management (Manager)">Management (Manager)</option>
   <option class="management-trainee" value="Management Trainee">Management Trainee</option>
   <option class="non-management-entry" value="Non-Management (Entry)">Non-Management (Entry)</option>
   <option class="non-management-experienced" value="Non-Management (Experienced)">Non-Management (Experienced)</option>
   <option class="supervisory" value="Supervisory (60)">Supervisory (60)</option> 
                         
                                 </select>
                                 <span class="form-text text-danger">@error('post_apply')
                                    {{$message}}
                                    @enderror
                                </span>
                                                </div>
                                       <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-users"></i>
                                                   </span>
                                                 
                                 <select class="form-control" name="enrollment_type">
                      
                           <option value="Selected">Employment type</option>
                           
   <option class="executive" value="Casual / On-call">Casual / On-call </option>
   <option class="internship" value="Full time">Full time</option>
   <option class="management-director" value="Graduate programme">Graduate programme</option>
   <option class="management-manager" value="Internship">Internship</option>
   <option class="management-trainee" value="Part Time">Part time</option>
   <option class="non-management-entry" value="Temporary / Seasonal">Temporary / Seasonal </option> 
                         
                                 </select>
                                 <span class="form-text text-danger">@error('enrollment_type')
                                    {{$message}}
                                    @enderror
                                </span>
                             
                                                </div>
                                       <div class="input-group w-440 float-left mb-3">
                                                   <span class="input-group-addon">
                                                   <i class="fa-solid fa-upload"></i>
                                                   </span>
                                                 
                                <input type="file" name="imagefile"  class="form-control empty p-3 pt-2" placeholder="Attach A File">
                             
                                                </div>
                                                <div class="input-group mb-3">
                                                   <span class="input-group-addon text-aAaA  h-200">
                                                   <i class="fa-solid fa-pen-to-square"></i>
                                                   </span>
                                                   <textarea name="message" class="form-control textareas h-200" placeholder=" Your Message *"></textarea>
                                                </div>
                                                 
                                                <!-- 4 -->
                                             </div>
                                          </div>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                             <div class="form-group">
                                                <div class="btn-box">
                                                   <button type="submit" class="addto">
                                                      Submit   
                                                      <svg class="position-relative ml-2" width="13px" height="10px"  viewBox="0 0 13 10"  >
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
		 </div>
		 <div class="col-md-2"></div>
		 </div>
		 </div>
     
       
	      <!-- form end here -->
 @endsection	 
	 
 
