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

    <section class="pageTitle p-0" style="height: 455px; background-image:url({{static_asset('assets_web/img/investorbannermain.png')}});background-size:content;  ">
        <div class="container1">
            <div class="col-md-7 ms-auto">
                <div class="owl-carousel owl-carousel_down owl-theme" style="z-index:-1;">
                <div class="item"> <img alt="" class="left edge-grab w-100 " src="{{static_asset('assets_web/img/investorbanner1.jpg')}}"> </div>
                <div class="item"> <img alt="" class="left edge-grab w-100 " src="{{static_asset('assets_web/img/investorbanner2.jpg')}}">
                </div>
                <div class="item"> <img alt="" class="left edge-grab w-100 " src="{{static_asset('assets_web/img/investorbanner3.jpg')}}">
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
                     <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18 font-capital">Investment Opportunities in Construction</h3>
                     <div class="deals slodnaprder">
                        <hr>
                     </div>
                  </div>
               </div>
               
               <p class="  m-auto text-center">
                 "India, the fastest growing major economy on the world, is also the #1 open economy with 100% FDI allowance in most sectors. It is on an accelerated growth trajectory with 100 smart cities being built by 2022, 100 new airports by 2035 and implementation of the world's largest renewable energy expansion program. India hosts investment opportunities across multiple projects - EPC, PPP and others. These are different from the National Infrastructure Pipeline (NIP) opportunities, that are only from the infrastructure sector. EBB hosts non-NIP opportunities across 16 sectors, including infrastructure sectors, 62 sub-sectors and 37 states and union territories. Come, find your next investment opportunity on EBB."
               </p>
               
               <div class="list-on-line">
               <ul>
               <li class="icon-project"><div class="inner"><div class="icon"></div><div class="data">Projects<h3>695</h3></div></div></li>
               <li class="icon-opportunity"><div class="inner"><div class="icon"></div><div class="data">Opportunity<h3><small><i class="fa fa-inr"></i></small>12.32 bn </h3></div></div></li>
               <li class="icon-promoters"><div class="inner"><div class="icon"></div><div class="data">Promoters<h3>310</h3></div></div></li>
               <li class="icon-district"><div class="inner"><div class="icon"></div><div class="data">District<h3>270</h3></div></div></li>
               <li class="icon-private-project"><div class="inner"><div class="icon"></div><div class="data">Private Projects<h3>16</h3></div></div></li>
               <li class="icon-gov-project"><div class="inner"><div class="icon"></div><div class="data">Govt. Projects<h3>679</h3></div></div></li>
               </ul>
               </div>
               
               
               <div class="state-boxes">
               <div class="state-boxes-inner flex">
               
               <div class="inner">
               
               <div class="inner-box">
               
               <a href="#" class="fulllink" target="_blank" rel="nofollow"><h3><small><i class="fa fa-inr"></i></small>3.77 Cr. </h3><p>Development of Palava Industrial Township in Maharashtra</p><div class="statename"><span>State (s)</span> Maharashtra</div></a>
               
               </div>
               
               </div>
               
               <div class="inner"><div class="inner-box"><a href="#" class="fulllink" target="_blank" rel="nofollow"><h3><small><i class="fa fa-inr"></i></small>2.16 Cr. </h3><p>Petrochemical Hub Project, Jagatsinghpur, Odisha</p><div class="statename"><span>State (s)</span> Odisha</div></a></div></div>
               
               <div class="inner"><div class="inner-box"><a href="#" class="fulllink" target="_blank" rel="nofollow"><h3><small><i class="fa fa-inr"></i></small>906.59 Cr. </h3><p>Construction &amp; Development of a Film City in Sector 21, Greater Noida, Uttar Pradesh</p><div class="statename"><span>State (s)</span> Uttar Pradesh</div></a></div></div>
               
               <div class="inner"><div class="inner-box"><a href="#" class="fulllink" target="_blank" rel="nofollow"><h3><small><i class="fa fa-inr"></i></small>817.94 Cr. </h3><p>Odisha Economic Corridor Project, Jagatsinghpur, Odisha</p><div class="statename"><span>State (s)</span> Odisha</div></a></div></div>
               
               </div>
               
               <div class="footer-btn"><a href="{{url('/investorszone')}}" class="button" rel="nofollow">More About Residential Projects</a><a href="{{url('/investorszonecommercial')}}" class="button green">More About Commercial Projects</a></div>
               
               </div>
               
               
               
               
               <div class="home-our-services mt-5">
         <div class="row">
         
         
         <div class="col-md-12">
               <div class="left  herotext universal mt-3 h-auto text-center">
               
               <div class="border-bottom1 border-color-111 mt-0 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 mt-0 font-capital text-left" style="font-size:16px;"> Enquiry form for Investor/Builder:</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     
                     
               <div class="tab-flex">
                            <ul class="ulines-dps">
                            <li class="ukine land_owner active2"><i class="fa fa-user-tie"></i> Builder/Developers</li>
                            <li class="ukine builder"><i class="fa fa-building" aria-hidden="true"></i> Investors</li>
                            </ul>
                </div>            
                            <div class="row text-left">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="landowner landtab activetab row">
                                        
                                        <div class="border-bottom border-color-111 mt-0 mb-3">
                        <h5 class="py-2"> Share your Builder/Developers details:</h5>
                        
                     </div>
                     
                                      <div class="col-md-12"> <div class="row"><div class="col-md-8 row">
                                        
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
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Company Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Mobile Number *" maxlength="10" minlength="10">
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
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Address *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Office Address *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 102px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 102px;" class="form-control textareas br-radius-none" placeholder="Project Details *"></textarea>
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
                                        
                                        
                                        </div></div>
                                            
                                        </div>
                                        
                                        <div class="landowner buildertab row">
                                        
                                        <div class="border-bottom border-color-111 mt-0 mb-3">
                        <h5 class="py-2"> Share your Investors details:</h5>
                        
                     </div>
                     
                                        <div class="col-md-12"><div class="row"><div class="col-md-8 row">
                                        
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
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Company Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Mobile Number *" maxlength="10" minlength="10">
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
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Address *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Office Address *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 102px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 102px;" class="form-control textareas br-radius-none" placeholder="Project Details *"></textarea>
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
                                        
                                        
                                        </div></div>
                                            
                                        </div>
                            </div>
                            </div>
               </div>
            </div>
            
            
            
            <div class="col-md-6">
               <div class="left herotext universal mt-3 h-auto">
               <div class="border-bottom1">
                        <h5> Filter Residential Projects:</h5>
                     </div>
                     
                  <div class="row border-bottom py-2 mb-2">
                  <div class="col-md-4"><input type="text" name="name" class="form-control br-radius-none" placeholder="Location" autocomplete="off"></div><div class="col-md-4"><input type="text" name="name" class="form-control br-radius-none" placeholder="Pincode" autocomplete="off"></div><div class="col-md-4"><button class="filterbtn w-100"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button></div>
                 </div>
                 
                 
                 <div class="table-responsive box-shadow collaboration border-bottom">

                            <table class="table cart checkout border">
                                <thead>
                                    <tr>
                                        <th class="thbg">Project Name</th>
                                        <th class="thbg" style="width:50%!Important;">Project Location</th>
                                        <th class="thbg">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div> 
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right mt-4 mb-2">
                        <button class="filterbtn" style="display:inline; line-height:20px; height:30px;" onclick="window.location.href='/investorszone';">View All</button>
                        </div>
                  
               </div>
            </div>
            
            <div class="col-md-6">
               <div class="left herotext universal mt-3 h-auto">
               <div class="border-bottom1">
                        <h5> Filter Commercial Projects:</h5>
                     </div>
                     
                  <div class="row border-bottom py-2 mb-2">
                  <div class="col-md-4"><input type="text" name="name" class="form-control br-radius-none" placeholder="Location" autocomplete="off"></div><div class="col-md-4"><input type="text" name="name" class="form-control br-radius-none" placeholder="Pincode" autocomplete="off"></div><div class="col-md-4"><button class="filterbtn w-100"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button></div>
                 </div>
                 
                 
                 <div class="table-responsive box-shadow collaboration border-bottom">

                            <table class="table cart checkout border">
                                <thead>
                                    <tr>
                                        <th class="thbg">Project Name</th>
                                        <th class="thbg" style="width:50%!Important;">Project Location</th>
                                        <th class="thbg">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="border-bottom">

                                        <td>
                                            Guru Ji Homes
                                        </td>

                                        <td>
                                            Uttam Nagar, New Delhi - 110059
                                        </td>

                                        <td>
                                            <a href="{{url('/projectdetails')}}" class="text-primary">View Details</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div> 
                        
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right mt-4 mb-2">
                        <button class="filterbtn" style="display:inline; line-height:20px; height:30px;" onclick="window.location.href='/investorszonecommercial';">View All</button>
                        </div>
                  
               </div>
            </div>
         </div>
      </div>
            </div>
         </div>
      </div>
   </section>
   
   
 <section class="py-5 spacer bg-light">
      <div class="container">
         <div class="bottom-form w-50 m-auto">
            <div class="border-bottom1 border-color-111 mt-0 mb-3">
               <h3 class="section-title section-title__sm mb-0 pt-0 pb-0 mt-0 font-size-18">TYPE OF PROJECTS</h3>
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
                  <a class="btn border text-center rounded-3  border-yellow color-orange text-dark d-block py-2">Residencial Projects</a>
               </li>
               <li class="border-0 col-tabs_pol-2 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Commercial Projects</a>
               </li>
               <li class="border-0 col-tabs_pol-3 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Industrial Projects</a>
               </li>
               <li class="border-0 col-tabs_pol-4 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Others</a>
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
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Residencial Projects</h3>
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
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Commercial Projects</h3>
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
                                       Industrial Projects</h3>
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
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Others</h3>
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
   
   
 <section class="home-our-team home-our-services wow1 pb-5 mb-3">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="  left  herotext universal mt-3 h-auto">
                  <div class="text-left">
                     <div class="border-bottom1 border-color-111 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-3"> Promoter Corner</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                     <div class="ui-subtitle-block"><strong>Checklist before uploading a project</strong></div>
                  </div>
                  <div class="text mt-3">
                     <ul class="gm-list">
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Location of the project
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Scheme under which the project falls (if applicable)
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Financial details of the project (cost, debt and equity split)
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Requirement of the project (funding, developer, consultant, supplier etc.)
                           </p>
                        </li>
                        
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Contact details (for the investor to connect with the person directly)
                           </p>
                        </li>
                        
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Project specific fields (technical details depending on sector & sub-sector of the project)
                           </p>
                        </li>
                        
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Project specific fields (technical details depending on sector & sub-sector of the project)
                           </p>
                        </li>
                     </ul>
                  </div>
                  
                  <div class="ui-subtitle-block"><strong>Checklist before registering as a promoter</strong></div>
                  
                  <div class="text mt-3">
                     <ul class="gm-list">
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Indian company name and CIN (incase of private promoter, foreign companies are not allowed)
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Full name of agency or department or ministry (in case of government promoter)
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i>
                           <p class="mt-0">
                              Contact details (email ID of the person on which the account will be made)
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
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-3"> Investor Corner</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                  </div>
                  <div class="div-tab-dps_pol sections" style="height:auto;">
                  <ul>
                        <li class="tabs-dps-tab_pol active" style="opacity:1; position: inherit;">
                  <div>
                                                            <div id="accordion" class="accordion-container">
                                                               <article class="content-entry">
                                                                  <h4 class="article-title open">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> How can I contact a project promoter?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: block;">
                                                                     <p>You will receive an email on your registered email id with details of the project promoter after expressing an interest against the project on the portal.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> How will I know if a promoter has made some updates to the project I am following?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Update of information of project in which interest is shown will be sent through email notification to investors.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> Will I get promoter contact details after expressing interest on a certain project?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Yes. You will receive an email with contact details. The information will also reflect in your dashboard.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> I am an international investor and don't have any India specific coordinates - can I still contact a promoter?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Yes. International investors can register on portal and can contact promotor by showing interest in projects.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> Do I have to invest through this portal?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>No. EBB is only a project discovery platform. All investment decisions are made outside the portal.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> Are all projects listed on the portal verified and have the most updated information?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Project information uploaded by promoters is vetted by reputed third-party firms, empaneled by Invest India. The information is cross-checked for logical inconsistencies, data sanity and for updated information. The firms seek to verify information based on primary and secondary research. The vetting process is currently carried out by Ernst & Young and BDO Consulting.<br /><br />

While the data uploaded on to EBB is envisioned to be credible, EBB doesn't take any responsibility for errors or misrepresentations on the portal.</p>
                                                                  </div>
                                                               </article>
                                                               
                                                            </div>
                                                         </div>
                                                         </li>
                                                         </ul>
                                                         <div class="cl"></div>
                                                         
                     <!--<ul class="gm-list">
                        <li>
                           <i class="fa fa-caret-right"></i><span class="fw-bold"> How can I contact a project promoter?</span>
                           <p class="mt-0">
                              You will receive an email on your registered email id with details of the project promoter after expressing an interest against the project on the portal.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i><span class="fw-bold"> How will I know if a promoter has made some updates to the project I am following?</span>
                           <p class="mt-0">
                              Update of information of project in which interest is shown will be sent through email notification to investors.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i><span class="fw-bold"> Will I get promoter contact details after expressing interest on a certain project?</span>
                           <p class="mt-0">
                              Yes. You will receive an email with contact details. The information will also reflect in your dashboard.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i><span class="fw-bold"> I am an international investor and don't have any India specific coordinates - can I still contact a promoter?</span>
                           <p class="mt-0">
                              Yes. International investors can register on portal and can contact promotor by showing interest in projects.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i><span class="fw-bold"> Do I have to invest through this portal?</span>
                           <p class="mt-0">
                              No. EBB is only a project discovery platform. All investment decisions are made outside the portal.
                           </p>
                        </li>
                        <li>
                           <i class="fa fa-caret-right"></i><span class="fw-bold"> Are all projects listed on the portal verified and have the most updated information?</span>
                           <p class="mt-0">
                              Project information uploaded by promoters is vetted by reputed third-party firms, empaneled by Invest India. The information is cross-checked for logical inconsistencies, data sanity and for updated information. The firms seek to verify information based on primary and secondary research. The vetting process is currently carried out by Ernst & Young and BDO Consulting.<br /><br />

While the data uploaded on to EBB is envisioned to be credible, EBB doesn't take any responsibility for errors or misrepresentations on the portal.
                           </p>
                        </li>
                     </ul>-->
                  </div>
               </div>
            </div>
            
            
            <div class="col-md-12">
               <div class="left herotext universal mt-3 h-auto">
                  <div class="text-left">
                     <div class="border-bottom1 border-color-111 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 mt-3"> FAQ's</h3>
                        <div class="deals">
                           <hr>
                        </div>
                     </div>
                  </div>
                  <div class="div-tab-dps_pol sections" style="height:auto;">
                  <ul>
                        <li class="tabs-dps-tab_pol active" style="opacity:1; position: inherit;">
                  <div>
                                                            <div id="accordion" class="accordion-container">
                                                               <article class="content-entry">
                                                                  <h4 class="article-title open">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> How do I post a project?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: block;">
                                                                     <p>After registering on the portal (for registration, click here) as a project promoter, you may click on floating icon (+) on the left side of page just below the header or click on add project. Further, you may add all relevant details corresponding to the project. Fields marked with an asterisk (*) are mandatory.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> What information should I include in my listing?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Information is divided into 4 major pillars to provide detailed and 360-degree view of the project-<br /><br />

&bull; General Information: Project Name, associated sector/sub-sector, estimated project costs, project components etc.<br />
&bull; Location information: Map location and other related information<br />
&bull; Project Development: Type, status, milestone dates etc.<br />
&bull; Funding Requirements: Total project cost, investments raised, investments required, debt to equity split</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> Is project information verified by EBB once a promoter sends an upload request?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Once a promoter sends an upload request, the EBB team screens the project and gets back to the promoter for any gaps / corrections in the data. Once data is screened and corrected, the project is uploaded on the EBB portal.<br /><br />

After uploading the project, the project information is vetted by reputed third-party firms, empaneled by Invest India. The information is cross-checked for logical inconsistencies, data sanity and for updated information. The firms seek to verify information based on primary and secondary research. The vetting process is currently carried out by Ernst & Young and BDO Consulting.<br /><br />

While the data uploaded on to EBB is envisioned to be credible, EBB does not take any responsibility for errors or misrepresentations on the portal.</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> I am the promoter of a project not based in India - can I list on EBB?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>No. Currently the portal only lists projects based out of India</p>
                                                                  </div>
                                                               </article>
                                                               <article class="content-entry">
                                                                  <h4 class="article-title">
                                                                     <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                                     <span><i class="fa fa-caret-right"></i> Is it necessary to fill all fields or just the mandatory ones while posting?</span><i class="fa fa-angle-right" aria-hidden="true" style="  float:right;  line-height: 35px;"></i>
                                                                     </a>
                                                                  </h4>
                                                                  <div class="accordion-content" style="display: none;">
                                                                     <p>Although filling only mandatory fields will list your project on the portal, we recommend you to fill entire information to generate maximum investor interest.</p>
                                                                  </div>
                                                               </article>
                                                               
                                                               
                                                            </div>
                                                         </div>
                                                         </li>
                                                         </ul>
                                                         <div class="cl"></div>
                                                         
                     
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   </section>   
        
 <!--<div id="myModalinvestor" class="modal fade prolidneis in" role="dialog">
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
                                                        <strong>Send Enquiry</strong> for Investors
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
                    <span>Min. Investment: <i class="fa fa-inr left_pos"></i> 1000.00</span>
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
                                                                <label class="formpoplabel">Description</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Description" >
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
 <div id="myModalinvestorc" class="modal fade prolidneis in" role="dialog">
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
                                                        <strong>Send Enquiry</strong> for Investors
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
                    <span>Min. Investment: <i class="fa fa-inr left_pos"></i> 1000.00</span>
                    <label>Building Type: Commercial</label>
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
                                                                <label class="formpoplabel">Description</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Description" >
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
        </div>-->   
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