@extends('frontend.master')
@section('title') Collaboration  @endsection
@section('description') @endsection
@section('style')
    <style>
        .h-350 {
            height: 350px !important;
        }

        .h-835 {
            height: 835px !important;
        }

        .nav-pills .tabs-dps-tab_pol.active a {
            background-color: #1274c0;
            color: #fff !important;
        }

        .bg-blue {
            background: #1274c0;
        }

        .h-215 {
            height: 215px;
        }

        .bg-orange {
            background: #ff7713
        }

        .owl-carousel600.asbf .owl-dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .h-250 {
            height: 250px;
        }

        .owl-carousel600.asbf .owl-stage-outer {
            margin-top: 0px;
            padding-top: 0px;
        }

        .border-yellow {
            border-color: #ff7713 !important;
        }

        .color-orange {
            color: #ff7713 !important;
        }

        .tabs-dps-tab_pol.active .border-yellow {
            border-color: #1274c0 !important;
        }

        .tabs-dps-tab_pol.active .color-orange {
            color: #fff !important;
        }

        .owl-carousel_down .owl-dots {
            position: absolute;
            right: 0px;
            top: 40%;
        }

        .owl-carousel_down .owl-dot span {
            margin: 5px auto !important;
        }

        .owl-carousel_down .owl-dot {
            width: 100%;
        }

        .owl-carousel_down img {
            height: 455px;
        }

        .opacity-1 {
            opacity: 1;
        }

        #input_18_14 .m-1 {
            margin: 2px !important;
        }
        .owl-carousel_down .owl-nav{
            display:none;
        }
        .owl-carousel600 .owl-nav{
            display:none;
        }
        .form-above_footer .contact-form {
            height: 910px;    
            margin-bottom: 90px;
        }
    </style>
@endsection

@section('content')

    <section class="pageTitle p-0" style="height: 455px;background-image:url({{static_asset('assets_web/img/contration-design.png')}});background-size:content;  ">
        <div class="container1">
            <div class="col-md-7 ms-auto">
                <div class="owl-carousel owl-carousel_down owl-theme">
                <div class="item"> <img alt="" class="left edge-grab w-100 " src="{{static_asset('assets_web/img/building-collaboration.png')}}"> </div>
                <div class="item"> <img alt="" class="left edge-grab w-100 " src="{{static_asset('assets_web/img/building-collaboration3.png')}}">
                </div>
                <div class="item"> <img alt="" class="left edge-grab w-100 " src="{{static_asset('assets_web/img/building-collaboration2.png')}}">
                </div>
                </div>
            </div>
        </div>
    </section>


<section class="gallerysin gallerysin2 py-5 pt-4">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="bottom-form w-50 m-auto">
                  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                     <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">LAND COLLABORATION
                     </h3>
                     <div class="deals slodnaprder">
                        <hr>
                     </div>
                  </div>
               </div>
               <div class="home-our-services container">
         <div class="row">
            <div class="col-md-12">
               <div class="left  herotext universal mt-3 h-auto text-center">
               
               <div class="tab-flex">
                            <ul class="ulines-dps">
                            <li class="ukine land_owner active2"><i class="fa fa-user-tie"></i> Land Owner</li>
                            <li class="ukine builder"><i class="fa fa-building" aria-hidden="true"></i> Builder/Collaborator</li>
                            </ul>
                </div>            
                            <div class="row text-left">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                                        <div class="landowner landtab activetab row">
                                        
                                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-0"> Share your Land Owner details:</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     
                                        <div class="col-md-8 row">
                                        
                                        <div class="col-md-4">
                                        <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Full Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Phone Number *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-envelope left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Email Address *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Location *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px; position:relative;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-building left_pos"></i>
                                                </span>
                                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                            <select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Select Building Type</option>
                                <option value="Passport">Commercial</option>
                                <option value="Passport">Residential</option>
                                <option value="Passport">Industrial</option>
                                <option value="Passport">Others</option>
                            </select>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px; position:relative;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-industry left_pos"></i>
                                                </span>
                                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                                                <select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Select Property Type</option>
                                <option value="Passport">Registry Type</option>
                                <option value="Passport">Power of Attorney</option>
                            </select>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="far fa-square left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Land Size (Sqr. Ft.) *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px; position:relative;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-landmark left_pos"></i>
                                                </span>
                                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                                                <select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Select Land Face</option>
                                <option value="Passport">Front Face</option>
                                <option value="Passport">Back Face</option>
                            </select>
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-inr left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Appro. Property Value *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 160px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 160px;" class="form-control textareas br-radius-none" placeholder="Working Address *"></textarea>
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="btn-box">
                                                <button type="submit" class="addto">
                                                    Submit
                                                    <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                                    <path d="M1,5 L11,5"></path>
                                                    <polyline points="8 1 12 5 8 9"></polyline>
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                        </div>
                                            
                                        </div>
                                        
                                        <div class="landowner buildertab row">
                                        
                                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-0"> Share your Builder details:</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     
                                        <div class="col-md-8 row">
                                        
                                        <div class="col-md-4">
                                        <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Full Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Phone Number *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-envelope left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Email Address *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Functional Area *">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px; position:relative;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-building left_pos"></i>
                                                </span>
                                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                            <select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Select Building Type</option>
                                <option value="Passport">Commercial</option>
                                <option value="Passport">Residential</option>
                                <option value="Passport">Industrial</option>
                                <option value="Passport">Others</option>
                            </select>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px; position:relative;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-industry left_pos"></i>
                                                </span>
                                                <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                                                <select class="form-control br-radius-none" name="state" id="state">
                                                    <option value="">Select Property Type</option>
                                                    <option value="New Construction">New Construction</option>
                                                    <option value="Structural Modification">Structural Modification</option>
                                                    <option value="Renovation">Renovation</option>
                                                    <option value="Interior Design / Other">Interior Design / Other</option>
                                                </select>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="far fa-square left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Min. Order (Sqr. Ft.) *" >
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-tasks left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Work Exp. (In yrs.) *" >
                                            </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-diagram-project left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="No. of Projects *">
                                            </div>
                                            </div>
                                            
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 160px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 160px;" class="form-control textareas br-radius-none" placeholder="Working Address *"></textarea>
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="btn-box">
                                                <button type="submit" class="addto">
                                                    Submit
                                                    <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                                    <path d="M1,5 L11,5"></path>
                                                    <polyline points="8 1 12 5 8 9"></polyline>
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                        </div>
                                            
                                        </div>
                            </div>
                            </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="left herotext universal mt-3 h-auto">
               <div class="border-bottom1">
                        <h5> Filter Land Owner:</h5>
                     </div>
                     
                  <div class="row border-bottom py-2 mb-2">
                  <div class="col-md-3"><input type="text" name="name" class="form-control br-radius-none" placeholder="Location" autocomplete="off"></div><div class="col-md-3"><input type="text" name="name" class="form-control br-radius-none" placeholder="Pincode" autocomplete="off"></div><div class="col-md-4" style="margin-bottom: 10px; position:relative;"><i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i><select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Building Type</option>
                                <option value="Passport">Commercial</option>
                                <option value="Passport">Residential</option>
                                <option value="Passport">Industrial</option>
                                <option value="Passport">Others</option>
                            </select></div><div class="col-md-2"><button class="filterbtn w-100"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button></div>
                 </div>
                 
                 
                 <div class="table-responsive box-shadow collaboration border-bottom">

                            <table class="table cart checkout border">
                                <thead>
                                    <tr>
                                        <th class="thbg">Land Owner</th>
                                        <th class="thbg" style="width:40%!Important;">Land Location</th>
                                        <th class="thbg" style="width:20%!Important;">Building Type</th>
                                        <th class="thbg">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Commercial Type
                                        </td>


                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
									<tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Commercial Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr><tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Commercial Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        <td>
                                            Commercial Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalowner" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div> 
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right mt-4 mb-2">
                        <button class="filterbtn" style="display:inline; line-height:20px; height:30px;" onclick="window.location.href='/collaborationOwner';">View All</button>
                        </div>
                  
               </div>
            </div>
            
            <div class="col-md-6">
               <div class="left herotext universal mt-3 h-auto">
               <div class="border-bottom1">
                        <h5> Filter Builder/Collaborator:</h5>
                     </div>
                     
                  <div class="row border-bottom py-2 mb-2">
                  <div class="col-md-3"><input type="text" name="name" class="form-control br-radius-none" placeholder="Location" autocomplete="off"></div><div class="col-md-3"><input type="text" name="name" class="form-control br-radius-none" placeholder="Pincode" autocomplete="off"></div><div class="col-md-4" style="margin-bottom: 10px; position:relative;"><i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i><select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Building Type</option>
                                <option value="Passport">Commercial</option>
                                <option value="Passport">Residential</option>
                                <option value="Passport">Industrial</option>
                                <option value="Passport">Others</option>
                            </select></div><div class="col-md-2"><button class="filterbtn w-100"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button></div>
                 </div>
                 
                 
                 <div class="table-responsive box-shadow collaboration border-bottom">

                            <table class="table cart checkout border">
                                <thead>
                                    <tr>
                                        <th class="thbg">Builder Name</th>
                                        <th class="thbg" style="width:40%!Important;">Land Location</th>
                                        <th class="thbg" style="width:20%!Important;">Building Type</th>
                                        <th class="thbg">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Commercial Type
                                        </td>


                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
									<tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Commercial Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr><tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Commercial Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">

                                        <td>
                                            Vikash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        
                                        <td>
                                            Residential Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Abinash Kumar
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>
                                        <td>
                                            Commercial Type
                                        </td>

                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalcolla" class="text-primary">Send Enquiry</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div> 
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right mt-4 mb-2">
                        <button class="filterbtn" style="display:inline; line-height:20px; height:30px;" onclick="window.location.href='/collaborationDetails';">View All</button>
                        </div>
                  
               </div>
            </div>
         </div>
      </div>
            </div>
         </div>
      </div>
   </section>
   
   
   <section class="gallerysin gallerysin2 py-5 pt-4">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="bottom-form w-50 m-auto">
                  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                     <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">BUILDER COLLABORATION
                     </h3>
                     <div class="deals slodnaprder">
                        <hr>
                     </div>
                  </div>
               </div>
               <p class="  m-auto text-center">
                  Want to transform your old house into a modern and luxurious apartment but worried about the hustle
                  and expenditure?
                  growciti is the one-stop-solutions for all your property-related problems. Our in-house
                  professional team of
                  architect and interiors ensure that we deliver a modern luxurious unit to you with all the latest
                  fittings in
                  an agreed span of time. We offer proven results without compromising the quality. When it comes to
                  redevelop/reconstruct/rebuild a brand-new house with modern facilities, growciti is the firm you
                  should opt for.
                  We have a comprehensive knowledge and first-hand experience in building collaborations. From the
                  scratch level
                  (foundation work) to structural part to home decor or interior designing, everything will be designed
                  according
                  to the demands and requirements of clients.
               </p>
            </div>
         </div>
      </div>
   </section>

   <section class="py-5 spacer bg-light">
      <div class="container">
         <div class="bottom-form w-50 m-auto">
            <div class="border-bottom1 border-color-111 mt-0 mb-3">
               <h3 class="section-title section-title__sm mb-0 pt-0 pb-0 mt-0 font-size-18">TYPE OF COLLABORATION</h3>
               <div class="deals slodnaprder">
                  <hr>
               </div>
            </div>
         </div>
         <p class="  m-auto text-center">
            Want to transform your old house into a modern and luxurious apartment but worried about the hustle and
            expenditure?
            growciti is the one-stop-solutions for all your property-related problems.
         </p>
         <div class="mt-md-n1ddd div-tab-dps_pol d-block mt-3">
            <ul class="nav nav-pills d-flex align-items-center justify-content-center px-2 w-100">
               <li class="border-0 col-tabs_pol-1 tabs-dps-tab_pol active nav-item w-25">
                  <a class="btn border text-center rounded-3  border-yellow color-orange text-dark d-block py-2">Land
                     Collaboration</a>
               </li>
               <li class="border-0 col-tabs_pol-2 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Plot
                     Collaboration</a>
               </li>
               <li class="border-0 col-tabs_pol-3 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Bulding
                     Collaboration</a>
               </li>
               <li class="border-0 col-tabs_pol-4 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Flat
                     Collaboration</a>
               </li>
            </ul>
         </div>
         <div class="div-tab-dps_pol sections h-350 mt-3 mb-0">
            <ul>
               <li class="col-tabs_pol-1 tabs-dps-tab_pol active">
                  <div class="tab-content policys_eckolion  shadow-none mb-0 h-auto overflow-visible px-0 pb-0">
                     <div class="content_row row">
                        <div class="col-md-6">
                           <img alt="" class="left edge-grab w-100 rounded-3" src="{{static_asset('assets_web/img/Land-Collaboration.png')}}">
                        </div>
                        <div class="col-md-6">
                           <div class="clm_66">
                              <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Land
                                       Collaboration</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud. Lorem ipsum dolor sit amet consectetur
                                 adipisicing elit sed do eiusmod tempor et dolore magna aliqua enim ad minim veniam quis
                                 nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="col-tabs_pol-2 tabs-dps-tab_pol">
                  <div class="tab-content policys_eckolion h-auto overflow-visible  shadow-none mb-0  px-0 pb-0">
                     <div class="content_row row">
                        <div class="col-md-6">
                           <img alt="" class="left edge-grab w-100 rounded-3" src="{{static_asset('assets_web/img/Pilot-Collaboration.png')}}">
                        </div>
                        <div class="col-md-6">
                           <div class="clm_66">
                              <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Plot
                                       Collaboration</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud. Lorem ipsum dolor sit amet consectetur
                                 adipisicing elit sed do eiusmod tempor et dolore magna aliqua enim ad minim veniam quis
                                 nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="col-tabs_pol-3 tabs-dps-tab_pol">
                  <div class="tab-content policys_eckolion h-auto overflow-visible  shadow-none mb-0  px-0 pb-0">
                     <div class="content_row row">
                        <div class="col-md-6">
                           <img alt="" class="left edge-grab w-100 rounded-3" src="{{static_asset('assets_web/img/Building-Collaboration02.png')}}">
                        </div>
                        <div class="col-md-6">
                           <div class="clm_66">
                              <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">
                                       Building Collaboration</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud. Lorem ipsum dolor sit amet consectetur
                                 adipisicing elit sed do eiusmod tempor et dolore magna aliqua enim ad minim veniam quis
                                 nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="col-tabs_pol-4 tabs-dps-tab_pol">
                  <div class="tab-content policys_eckolion h-auto overflow-visible  shadow-none mb-0  px-0 pb-0">
                     <div class="content_row row">
                        <div class="col-md-6">
                           <img alt="" class="left edge-grab w-100 rounded-3" src="{{static_asset('assets_web/img/flat-Collaboration.png')}}">
                        </div>
                        <div class="col-md-6">
                           <div class="clm_66">
                              <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Flat
                                       Collaboration</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                              <p>
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud. Lorem ipsum dolor sit amet consectetur
                                 adipisicing elit sed do eiusmod tempor et dolore magna aliqua enim ad minim veniam quis
                                 nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore
                                 magna aliqua enim ad minim veniam quis nostrud.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </section>  
   
   
   <section class="home-our-team home-our-services wow1 py-5">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="  left  herotext universal mt-3 h-auto">
                  <div class="text-left">
                     <div class="border-bottom1 border-color-111 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-3"> What we offer in
                           collaboration:</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     <div class="ui-subtitle-block"><i>growciti sed aute dou eiusmod tempor incididunt labore
                           dolore magna aliqua</i></div>
                  </div>
                  <div class="text mt-3">
                     <ul class="gm-list">
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <span class="fw-bold"> Preliminary</span>
                           <p class="mt-0">
                              We pen down a collaboration agreement along with specifications of the material and
                              fixtures where all the standard terms and conditions are mentioned.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <span class="fw-bold"> Planning</span>
                           <p class="mt-0">
                              An architect and interiors team is appointed to design the layout plan, Interior and
                              Exterior variations which are discussed by landowner, then we proceed for sanction from
                              the concerned authority.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <span class="fw-bold"> Construction</span>
                           <p class="mt-0">
                              Then we start construction.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <span class="fw-bold"> Possession Handover</span>
                           <p class="mt-0">
                              After the completion of construction, share of floors as agreed in the collaboration
                              agreement transferred to the parties.
                           </p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="left herotext universal mt-3 h-auto">
                  <div class="text-left">
                     <div class="border-bottom1 border-color-111 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-3"> Benefits of
                           Collaboration:</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     <div class="ui-subtitle-block"><i>growciti sed aute dou eiusmod tempor incididunt labore
                           dolore magna aliqua</i></div>
                  </div>
                  <div class="text ">
                     <ul class="gm-list">
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p>
                              A new customized modern home with the latest amenities.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p>
                              Professional team with good technical expertise
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p>
                              Assurance of construction quality at each level process.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p>
                              We give the opportunity to the owner to liquidate if needed a better price of his/her
                              share.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p>
                              10 years warranty on the structure and 1 year functional warranty.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p>
                              On-time delivery
                           </p>
                        </li>
                        <li>
                           <p class="mb-0">&nbsp;
                              
                           </p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="page-block aboutsus mb-0 pt-5 pb-5  bg-light">
      <div class="container">
         <div class="bottom-form w-50 m-auto">
            <div class="border-bottom1 border-color-111 mt-0 mb-3">
               <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Choose growciti Homes
                  as your collaboration partner</h3>
               <div class="deals slodnaprder">
                  <hr>
               </div>
            </div>
         </div>
         <p class="w-75 m-auto text-center">
            We are courteous with our client. We use doctrine of honesty &amp;
            hassle-free service. We are best for our qualitative results.
            We are transparent &amp; trustworthy. We like to create positive
            vibe &amp; client friendly.
         </p>
         <div class="how-we-work mt-4">
            <div class="row">
               <div class="col-md-12 how-we-work__column20">
                  <div class="owl-carousel owl-carousel600 asbf">
                     <div class="item">
                        <div class="content_row row">
                           <div class="col-md-6">
                              <img alt="" class="left edge-grab w-100 rounded-3 h-250" src="{{static_asset('assets_web/img/Peace-of-Mind.png')}}">
                           </div>
                           <div class="col-md-6">
                              <div class="clm_66">
                                 <div class="aboutIfo">
                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                       <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">
                                          Peace of Mind</h3>
                                       <div class="deals">
                                          <hr>
                                       </div>
                                    </div>
                                 </div>
                                 <p>
                                    Enjoy a hassle free plot construction experience during the entire lifecycle of the
                                    project from signing to delivery. Professional team and smooth processes for each
                                    step make the home construction process with growciti a happy experience. We
                                    invite you to speak to any of our existing home-owners to know their Home building
                                    journey with growciti.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="content_row row">
                           <div class="col-md-6">
                              <img alt="" class="left edge-grab w-100 rounded-3 h-250"
                                 src="{{static_asset('assets_web/img/Premium-on-your-share-of-Property.png')}}">
                           </div>
                           <div class="col-md-6">
                              <div class="clm_66">
                                 <div class="aboutIfo">
                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                       <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">
                                          Premium on your share of Property</h3>
                                       <div class="deals">
                                          <hr>
                                       </div>
                                    </div>
                                 </div>
                                 <p>
                                    growciti Homes also fetch a premium of 5 to 10 % as compared to similar
                                    properties in a given area due to use of better material, transparent paperwork and
                                    warranty on all work done. This gives the owner the opportunity to liquidate (if
                                    needed) his/ her own share of 3 floors at a higher price.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="content_row row">
                           <div class="col-md-6">
                              <img alt="" class="left edge-grab w-100 rounded-3 h-250"
                                 src="{{static_asset('assets_web/img/Well-funded-developer.png')}}">
                           </div>
                           <div class="col-md-6">
                              <div class="clm_66">
                                 <div class="aboutIfo">
                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                       <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Well
                                          funded developer</h3>
                                       <div class="deals">
                                          <hr>
                                       </div>
                                    </div>
                                 </div>
                                 <p>
                                    growciti is a well funded corporate developer and does not depend on funding
                                    from sale proceeds for construction and, hence, guarantees on-time delivery.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

    <section class="contact-section1 mb-3 pb-3" style="overflow:hidden;">
      <div class="container-fluid1">
         <div class="row">
            <div class="col-sm-6 col-no-pdg p-0">
               <div class="b-container-without-1 b-container-without-1_mod-a position-relative">
                  <h2 class="b-container-without-1__title">Are you Interested in Collaboration with Us!</h2>
                  <div class="b-container-without-1__text">
                     <p>Have a call-to-action to provide visitors with another action to take if they choose not to
                        complete the form.</p>
                  </div>
                  <a href="#sticky-block-1" class="b-container-without-1__btn btn btn-primary btn-effect w-50">send us your Plot
                     Detail</a>
               </div>
            </div>
            <div class="col-sm-6 col-no-pdg p-0">
               <div class="b-container-without-1 b-container-without-1_mod-b border-2-colors position-relative">
                  <h2 class="b-container-without-1__title">download Collaboration brochure!</h2>
                  <div class="b-container-without-1__text">
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor et dolore magna
                        aliqua enim ad minim veniam quis nostrud.</p>
                  </div>
                  <div class="d-flex justify-content-center align-items-center mx-auto">
                     <a href="{{static_asset('assets_web/img/EBB-specification.pdf')}}" class="b-container-without-1__btn btn btn-default btn-effect"
                        download>EBB Specification</a>
                     <a href="{{static_asset('assets_web/img/EBB-PPT.pdf')}}" class="b-container-without-1__btn btn btn-default btn-effect mx-2"
                        download>EBB PPT</a>
                     <a href="{{static_asset('assets_web/img/gurgaon-PPT.pdf')}}" class="b-container-without-1__btn btn btn-default btn-effect"
                        download>Gurgaon PPT</a>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
    </section>

    <section class="gallerysin gallerysin2 py-5 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                <div class="bottom-form w-50 m-auto">
                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18"> Hassle-free
                            Experience</h3>
                        <div class="deals slodnaprder">
                            <hr>
                        </div>
                    </div>
                </div>
                <p class="w-75 m-auto text-center">
                    We are courteous with our client. We use doctrine of honesty &amp;
                    hassle-free service. We are best for our qualitative results.
                    We are transparent &amp; trustworthy. We like to create positive
                    vibe &amp; client friendly.
                </p>
                </div>
                <div class="col-md-3">
                <div class="gallerysicons h-215 px-3 pb-3">
                    <div class="accreditation2">
                        <span class="glyphicon glyphicon-off logo-small"> <i class="fa-4x fa fa-wrench"
                            aria-hidden="true"></i> </span>
                        <h4>Full Home Customizability</h4>
                        <p>growciti Homes provides multiple options to customize your home. Style your home to your
                            personality!</p>
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="gallerysicons h-215 px-3 pb-3">
                    <div class="accreditation2">
                        <span class="glyphicon glyphicon-heart logo-small"><i
                            class="fa fas far fa-handshake fa-4x"></i></span>
                        <h4>All-in-One Offering</h4>
                        <p>growciti Homes provides an all-in-one offering across design, construction and approvals -
                            all managed by our in-house teams only.</p>
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="gallerysicons h-215 px-3 pb-3">
                    <div class="accreditation2">
                        <span class="glyphicon glyphicon-lock logo-small"><i
                            class="fa fas far fa-calendar fa-4x"></i></span>
                        <h4>On Time Delivery</h4>
                        <p>growciti promises you a world class home with a guaranteed on-time delivery or we pay
                            penalty. You don’t have to wait to live in your home!</p>
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="gallerysicons h-215 px-3 pb-3">
                    <div class="accreditation2">
                        <span class="glyphicon glyphicon-leaf logo-small"><i class="fas fa fa-shield fa-4x"></i></span>
                        <h4>growciti Warranty</h4>
                        <p>growciti Homes are covered with 10 year warranty for structure and 1 year functional
                            warranty. Forget the hassles of seepage and cracks in the wall!</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-type-b section-bg section-bg_primary section-bg_light">
        <div class="section__inner">
            <div class="container">
                <div class="row">
                <div class="col-sm-7">
                    <section class="b-type-e pe-0">
                        <h2 class="b-type-e__title ui-title-inner-1">See what more growciti has to offer and why you
                            should choose us.</h2>
                        <div class="b-type-e__text">
                            <a class="btn bg-orange py-2 px-4 rounded-pill text-white fs-6">Why growciti</a>
                        </div>
                    </section>
                    
                </div>
                <div class="col-sm-5">
                    <div class="b-contact-banner b-contact-banner_mod-a">
                        <div class="b-contact-banner__border"></div>
                        <div class="b-contact-banner__inner">
                            <h3 class="b-contact-banner__title">contact us for a competitive price</h3>
                            <div class="b-contact-banner__decor ui-decor-type-3 center-block"></div>
                            <div class="b-contact-banner__info b-contact-banner__info_lg"> +91 7303612266</div>
                            <div class="b-contact-banner__info"> info@ebuildbazaar.in</div>
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sticky-block-1" class="sticky-block-wrapper animated animate__fadeInUp wow">
        <section class="form-above_footer">
            <div class="container">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="contact-form shadow">
                        <div class="backtabs-dp">
                            <ul class="ulines-dps">
                            <li class="ukine ukine8 active2">Plot Owner</li>
                            <li class="ukine ukine9">Plot Collaborator</li>
                            </ul>
                            <ul class="ulines-dps-para">
                            <li class="ukine ukine8 active2 start-0">
                                <form class="bottom-form mt-0">
                                    <div class="bounceIn animated">
                                        <h4>Enter Your Details for Collaboration</h4>
                                        <p>
                                        Include an email and phone number so visitors can get in touch with you on their
                                        first attempt.
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="main-parenttttttT">
                                            <div class="input-group" style="margin-bottom: 10px">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty"
                                                    placeholder="Full Name" />
                                            </div>
                                            <div class="input-group w-440" style="margin-bottom: 10px; float: left">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty"
                                                    placeholder="Email Address" />
                                            </div>
                                            <div class="input-group w-441" style="margin-bottom: 10px; float: left">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-phone-flip"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty"
                                                    placeholder="Phone Number" maxlength="10" minlength="10" />
                                            </div>
                                            <div class="input-group " style="margin-bottom: 10px">
                                                <hr class="border-2 my-0 p-1 w-100 rounded-pill opacity-1 bg-blue" />
                                            </div>
                                            <div class="input-group w-441" style="margin-bottom: 10px; float: left">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa fa-map"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty"
                                                    placeholder="Colony/Locality *" maxlength="10" minlength="10" />
                                            </div>
                                            <div class="input-group" style="margin-bottom: 5px">
                                                <span class="input-group-addon text-aAaA" style="height: 120px">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </span>
                                                <textarea name="message" style="height: 120px;"
                                                    class="form-control textareas" placeholder=""> Your Message *
                                                    </textarea>
                                            </div>
                                            <div class="ginput_container ginput_container_checkbox">
                                                <span class="fw-bold d-block mt-2 text-start">Plot Size in Sq. Yards*
                                                </span>
                                                <ul class="gfield_checkbox" id="input_18_14">
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.1" type="checkbox" value="Architect"
                                                        id="choice_18_14_1" />
                                                    <label for="choice_18_14_1" id="label_18_14_1">50 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.1" type="checkbox" value="Architect"
                                                        id="choice_18_14_1" />
                                                    <label for="choice_18_14_1" id="label_18_14_1">100 Sq. Yards*</label>
                                                    </li>

                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">150 Sq. Yards*
                                                    </label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">200 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">250 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">300 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">350 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">400 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">450 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">500 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">500+ More Sq.
                                                        Yards*</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="btn-box">
                                                <button type="submit" class="addto">
                                                    Submit
                                                    <svg class="position-relative ml-2" width="13px" height="10px"
                                                    viewBox="0 0 13 10">
                                                    <path d="M1,5 L11,5"></path>
                                                    <polyline points="8 1 12 5 8 9"></polyline>
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="ukine ukine9 start-0">
                                <form class="bottom-form mt-0">
                                    <div class="bounceIn animated">
                                        <h4>Enter Your Details for Collaboration</h4>
                                        <p>
                                        Include an email and phone number so visitors can get in touch with you on their
                                        first attempt.
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="main-parenttttttT">
                                            <div class="input-group" style="margin-bottom: 10px">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty"
                                                    placeholder="Full Name" />
                                            </div>
                                            <div class="input-group w-440" style="margin-bottom: 10px; float: left">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty"
                                                    placeholder="Email Address" />
                                            </div>
                                            <div class="input-group w-441" style="margin-bottom: 10px; float: left">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-phone-flip"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty"
                                                    placeholder="Phone Number" maxlength="10" minlength="10" />
                                            </div>
                                            <div class="input-group " style="margin-bottom: 10px">
                                                <hr class="border-2 my-0 p-1 w-100 rounded-pill opacity-1 bg-blue" />
                                            </div>
                                            <div class="input-group w-441" style="margin-bottom: 10px; float: left">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa fa-map"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty"
                                                    placeholder="Colony/Locality *" maxlength="10" minlength="10" />
                                            </div>
                                            <div class="input-group" style="margin-bottom: 5px">
                                                <span class="input-group-addon text-aAaA" style="height: 120px">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </span>
                                                <textarea name="message" style="height: 120px;"
                                                    class="form-control textareas" placeholder=""> Your Message *
                                                    </textarea>
                                            </div>
                                            <div class="ginput_container ginput_container_checkbox">
                                                <span class="fw-bold d-block mt-2 text-start">Plot Size in Sq. Yards*
                                                </span>
                                                <ul class="gfield_checkbox" id="input_18_14">
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.1" type="checkbox" value="Architect"
                                                        id="choice_18_14_1" />
                                                    <label for="choice_18_14_1" id="label_18_14_1">50 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.1" type="checkbox" value="Architect"
                                                        id="choice_18_14_1" />
                                                    <label for="choice_18_14_1" id="label_18_14_1">100 Sq. Yards*</label>
                                                    </li>

                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">150 Sq. Yards*
                                                    </label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">200 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">250 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">300 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">350 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">400 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">450 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">500 Sq. Yards*</label>
                                                    </li>
                                                    <li class="gchoice_18_14_3 m-1">
                                                    <input name="input_14.3" type="checkbox" value="Building Material"
                                                        id="choice_18_14_3" />
                                                    <label for="choice_18_14_3" id="label_18_14_3">500+ More Sq.
                                                        Yards*</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="btn-box">
                                                <button type="submit" class="addto">
                                                    Submit
                                                    <svg class="position-relative ml-2" width="13px" height="10px"
                                                    viewBox="0 0 13 10">
                                                    <path d="M1,5 L11,5"></path>
                                                    <polyline points="8 1 12 5 8 9"></polyline>
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                    <div class="content-section justify mt-0 oveR">
                        <div class="sdkjlkd">
                            <div class="u-container-layout u-container-layout-2 h-100 mt-3">
                            <img src="{{ static_asset('assets_web/img/Collaboration-form.png')}}" alt=""
                                class="img-responsive w-100 h-835 rounded">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    
    
    <div id="myModalowner" class="modal fade prolidneis in" role="dialog">
            <div class="modal-dialog w-50" id="modal-dialog45">
                <div class="modal-content">
                    
                    <div class="modal-body">
                                <div class="form_section pt-0 pb-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="'.route('service_enquiry.insertServiceEnquiry').'" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                                                <input type="hidden" name="_token" value="'. csrf_token().'">
                                                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                    <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18 text-left">
                                                        <strong>Send Enquiry</strong> for Land Owner
                                                    <button type="button" class="close" data-dismiss="modal">×</button></h3>
                                                    <div class="deals">
                                                        <hr>
                                                    </div>
                                                </div>
                                                    
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 askalertlft py-3">
                                                       
                                                        <div class="row">
                    <div class="col-md-2 col-sm-6">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0 mt-0" style="border-radius:100%;">
                    </div>
                    
                    <div class="col-md-10 col-sm-6 land_box">
                    <h3><strong>Vikash Kumar</strong></h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Residential</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    </div>
                    </div>
                                                    </div>
                                                
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="main-parenttttttT row">

                                                            <div class="js-form-message form-group border-bottom">
                                                                <label class="formpoplabel">Please share your contact</label>   
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Name</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" >
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Mobile</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Mobile" >
                                                            </div>
															
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Email</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Email" >
                                                            </div>
                                                            
                                                            
                                                             <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Location</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Location" >
                                                            </div>
                                                            
                                                            <div class="js-form-message form-group">
                                                                <label class="formpoplabel">Description</label>
                                                                <textarea name="additional_requirement" required="" class="form-control textareas h-200" placeholder="Description"></textarea>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <div class="btn-box">
                                                                <button type="submit" class="addto">
                                                                    Submit
                                                                    <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                                                        <path d="M1,5 L11,5"></path>
                                                                        <polyline points="8 1 12 5 8 9"></polyline>
                                                                    </svg>
                                                                </button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                        
                                            </form></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        
        <div id="myModalcolla" class="modal fade prolidneis in" role="dialog">
            <div class="modal-dialog w-50" id="modal-dialog45">
                <div class="modal-content">
                    
                    <div class="modal-body">
                                <div class="form_section pt-0 pb-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="'.route('service_enquiry.insertServiceEnquiry').'" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                                                <input type="hidden" name="_token" value="'. csrf_token().'">
                                                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                    <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18 text-left">
                                                        <strong>Send Enquiry</strong> for Builder/Collaborator
                                                    <button type="button" class="close" data-dismiss="modal">×</button></h3>
                                                    <div class="deals">
                                                        <hr>
                                                    </div>
                                                </div>
                                                    
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 askalertlft py-3">
                                                       
                                                        <div class="row">
                    <div class="col-md-2 col-sm-6">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0 mt-0" style="border-radius:100%;">
                    </div>
                    
                    <div class="col-md-10 col-sm-6 land_box">
                    <h3><strong>Guru Ji Homes</strong></h3>
                    <span>by Guru Ji Builders</span>
                    <label>Building Type: Residential</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    </div>
                    </div>
                                                    </div>
                                                
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="main-parenttttttT row">

                                                            <div class="js-form-message form-group border-bottom">
                                                                <label class="formpoplabel">Please share your contact</label>   
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Name</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" >
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Mobile</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Mobile" >
                                                            </div>
															
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Email</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Email" >
                                                            </div>
                                                            
                                                            
                                                             <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Location</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Location" >
                                                            </div>
                                                            
                                                            <div class="js-form-message form-group">
                                                                <label class="formpoplabel">Description</label>
                                                                <textarea name="additional_requirement" required="" class="form-control textareas h-200" placeholder="Description"></textarea>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <div class="btn-box">
                                                                <button type="submit" class="addto">
                                                                    Submit
                                                                    <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                                                        <path d="M1,5 L11,5"></path>
                                                                        <polyline points="8 1 12 5 8 9"></polyline>
                                                                    </svg>
                                                                </button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                   </div>     
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
        $('.owl-carousel400').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 2
                },
                1000: {
                items: 3
                }
            }
        });
        $('.owl-carousel600').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            dots: true,
            nav: false,
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 1
                },
                1000: {
                items: 1
                }
            }
        });

        $('.owl-carousel_down').owlCarousel({
            animateOut: 'fadeOut',
            loop: true,
            autoplay: true,
            nav: false,
            items: 1,
            margin: 0,
            smartSpeed: 300
        });
    </script>
@endsection