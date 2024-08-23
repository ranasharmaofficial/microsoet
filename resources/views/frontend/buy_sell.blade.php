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


<section class="pos-relative">
	<div class="banner-area jarallax" style="background-image: url({{static_asset('assets_web/img/desktop-banner.webp')}}); height:500px;"></div>
    
    <div class="baners2">
         <div class="container">
         <div class="banner-inner-wrap mx-5 pos-relative">
         
         <div class="ffrr sb-pfa">
	<h3>Only Register <span style="color:#ff6c00;">Property/Land</span> Owner</h3>
	<a href="javascript:void(0);" title="Post Your Property" class="btn-pfa" data-toggle="modal" data-target="#myModalregister">Register Now<i class="fa fa-angle-right dib ml5px"></i> </a>
	</div>
               <div class="row">
               
                  <div class="col-12">
                     <div class="banner-inner">
                        <h1 class="title">Find Your <br> Perfect Property</h1>
                     </div>
                  </div>
                  
                  <div class="col-12">
                     <div class="banner-search-wrap pos-relative">
                        <ul class="nav nav-tabs rld-banner-tab">
                           <li class="nav-item"><a class="nav-link active">Buy<br />Properties</a>
                           <div class="tab-content">
                           <div class="tab-pane fade show active">
                              <div class="rld-main-search">
                                 <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                       <div class="rld-single-input left-icon"><input type="text" class="form-control br-radius-none" placeholder="Enter City, Locality, Project"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="select-box custom-select rld-single-select flat-icon">
                           <select class="selectpicker form-control" title="Select">
                              <option>Flat+1</option>
                                             <option value="2">1 Bhk</option>
                                             <option value="3">2 Bhk</option>
                                             <option value="3">3 Bhk</option>
                                             <option value="3">4 Bhk</option>
                                             <option value="3">5 Bhk</option>
                                             <option value="3">5+ Bhk</option>
                           </select>
                        </div>
                        
                        
                                       
                                    </div>
                                    
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select budget-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Budget</option>
                                             <option value="2">Below ₹5 Lac</option>
                                             <option value="3">₹5 Lac - ₹10 Lac</option>
                                             <option value="3">₹10 Lac - ₹20 Lac</option>
                                             <option value="3">₹20 Lac - ₹50 Lac</option>
                                             <option value="3">₹50 Lac - ₹1 Cr</option>
                                             <option value="3">₹1+ Cr</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4"><a class="srchbuybtn w-100 text-center" href="{{url('/buy_list')}}"><i class="fa fa-search" aria-hidden="true"></i> Search Now</a></div>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                        </li>
                           
                        
                        <li class="nav-item"><a class="nav-link">Rent<br />Properties</a>
                           <div class="tab-content">
                           <div class="tab-pane fade">
                              <div class="rld-main-search">
                                 <div class="row">
                                 <div class="col-xl-2 col-lg-6 col-md-6">
                                       <div class="select-box custom-select rld-single-select rent-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option value="2">Select</option>
                                             <option value="3" selected="selected">Flat</option>
                                             <option value="2">PG</option>                                             
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                       <div class="rld-single-input left-icon"><input type="text" class="form-control br-radius-none" placeholder="Enter City, Locality, Project"></div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select flat-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Flat+1</option>
                                             <option value="2">1 Bhk</option>
                                             <option value="3">2 Bhk</option>
                                             <option value="3">3 Bhk</option>
                                             <option value="3">4 Bhk</option>
                                             <option value="3">5 Bhk</option>
                                             <option value="3">5+ Bhk</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select budget-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Budget</option>
                                             <option value="2">Below ₹5000</option>
                                             <option value="3">₹5001 - ₹10000</option>
                                             <option value="3">₹10001 - ₹20000</option>
                                             <option value="3">₹20001 - ₹50000</option>
                                             <option value="3">₹50001 - ₹100000</option>
                                             <option value="3">₹100000+</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4"><a class="srchbuybtn w-100 text-center" href="{{url('/buy_list')}}"><i class="fa fa-search" aria-hidden="true"></i> Search Now</a></div>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                        </li>
                           <li class="nav-item"><a class="nav-link">Plot<br />&amp; Land</a>
                           <div class="tab-content">                           
                           <div class="tab-pane fade">
                              <div class="rld-main-search">
                                 <div class="row">
                                 <div class="col-xl-3 col-lg-6 col-md-6">
                                       <div class="select-box custom-select rld-single-select rent-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option value="2">Select</option>
                                             <option value="2" selected="selected">Residential Plot</option>
                                             <option value="3">Commercial Land</option>
                                             <option value="3">Agriculture Land</option>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                       <div class="rld-single-input left-icon"><input type="text" class="form-control br-radius-none" placeholder="Enter City, Locality, Project"></div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select flat-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Area (Sqft.)</option>
                                             <option value="2">Below 100</option>
                                             <option value="3">101 - 200</option>
                                             <option value="3">201 - 500</option>
                                             <option value="3">501 - 1000</option>
                                             <option value="3">1001 - 5000</option>
                                             <option value="3">5000+</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select budget-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Budget</option>
                                             <option value="2">Below ₹5 Lac</option>
                                             <option value="3">₹5 Lac - ₹10 Lac</option>
                                             <option value="3">₹10 Lac - ₹20 Lac</option>
                                             <option value="3">₹20 Lac - ₹50 Lac</option>
                                             <option value="3">₹50 Lac - ₹1 Cr</option>
                                             <option value="3">₹1+ Cr</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4"><a class="srchbuybtn w-100 text-center" href="{{url('/buy_list')}}"><i class="fa fa-search" aria-hidden="true"></i> Search Now</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        </li>
                        
                        <li class="nav-item"><a class="nav-link">Commercial<br />Properties</a>
                           <div class="tab-content">
                           <div class="tab-pane fade">
                              <div class="rld-main-search">
                                 <div class="row">
                                 <div class="col-xl-2 col-lg-6 col-md-6">
                                       <div class="select-box custom-select rld-single-select rent-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option value="2">Select</option>
                                             <option value="2" selected="selected">Buy</option>
                                             <option value="3">Lease</option>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                       <div class="rld-single-input left-icon"><input type="text" class="form-control br-radius-none" placeholder="Enter City, Locality, Project"></div>
                                    </div>
                                    
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select flat-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Property Type</option>
                                             <option value="2">Office Space</option>
                                             <option value="3">Shop/Showroom</option>
                                             <option value="3">Commercial Land</option>
                                             <option value="3">Coworking Space</option>
                                             <option value="3">Warehouse/Godown</option>
                                             <option value="3">Industrial Building</option>
                                             <option value="3">Industrial Shed</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select budget-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>Budget</option>
                                             <option value="2">Below ₹5 Lac</option>
                                             <option value="3">₹5 Lac - ₹10 Lac</option>
                                             <option value="3">₹10 Lac - ₹20 Lac</option>
                                             <option value="3">₹20 Lac - ₹50 Lac</option>
                                             <option value="3">₹50 Lac - ₹1 Cr</option>
                                             <option value="3">₹1+ Cr</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4"><a class="srchbuybtn w-100 text-center" href="{{url('/buy_list')}}"><i class="fa fa-search" aria-hidden="true"></i> Search Now</a></div>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                        </li>
                           <li class="nav-item"><a class="nav-link">Post Free<br />Property Ad</a>
                           <div class="tab-content">                           
                           <div class="tab-pane fade">
                              <div class="rld-main-search">
                                 <div class="row">
                                 <div class="col-xl-3 col-lg-6 col-md-6">
                                       <div class="select-box custom-select rld-single-select owner-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>You are</option>
                                             <option value="2">Owner</option>
                                             <option value="3">Agent</option>
                                             <option value="3">Builder</option>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                       <div class="select-box custom-select rld-single-select rent-icon">
									   
                                          <select class="selectpicker form-control" title="Select">
                                             <option>You are here to</option>
                                             <option value="2">Sell</option>
                                             <option value="3">Rent/Lease</option>
                                             <option value="3">List as PG</option>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                       <div class="rld-single-input mobile-icon"><input type="text" class="form-control br-radius-none" placeholder="Mobile Number"></div>
                                    </div>
                                    
                                    <div class="col-xl-2 col-lg-4 col-md-4"><a class="srchbuybtn w-100 text-center" href="#"><i class="fa fa-play" aria-hidden="true"></i> Start Now</a></div>
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
         </div>
    </div>
</section>


<section class="gallerysin gallerysin2 py-5 pt-4">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Explore Property in Delhi</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div>
               
               <div class="row">
               <div class="col-sm-12 mb-3 mt-2"><h5>Residential Properties</h5> </div>
                           
                           <div class="owl-carousel owl-theme owl-carousel_sliders trending001">
                           
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg1">
                              <a href="#">
                              <h3><small>11257</small>Builder Floors</h3>
                                 <img src="{{ static_asset('assets_web/img/studio-apartments.png')}}" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg2">
                              <a href="#">
                              <h3><small>9231 </small> Flats</h3>
                                 <img src="{{ static_asset('assets_web/img/penthouse.png')}}" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg3">
                              <a href="#">
                              <h3><small>2408 </small> House &amp; Villas</h3>
                                 <img src="{{ static_asset('assets_web/img/farm-house.png')}}" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg1">
                              <a href="#">
                              <h3><small>1737 </small> Residential Plots</h3>
                                 <img src="{{ static_asset('assets_web/img/residential-land.png')}}" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg2">
                              <a href="#">
                              <h3><small>334 </small> Farm House</h3>
                                 <img src="{{ static_asset('assets_web/img/individual-house.png')}}" alt="">
                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
						  
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg3">
                              <a href="#">
                              <h3><small>23 </small> Penthouse</h3>
                                 <img src="{{ static_asset('assets_web/img/flats-apartments.png')}}" alt="">
                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img bg1">
                              <a href="#">                                 
                                 <h3><small>17 </small> Studio Apartments</h3>
                                 <img src="{{ static_asset('assets_web/img/builder-floor.png')}}" alt="">
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        
                           
                           
                           
                           
                              
                           </div>
			</div>
               
               
               
               
               <div class="row">
               <div class="col-sm-12 mb-3 mt-2"><h5>Commercial Properties</h5> </div>
                           
                           <div class="owl-carousel owl-theme owl-carousel_sliders trending001">
                           
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">
                              <h4><small>135</small>Business Center</h4>
                              <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">
                              <h4><small>99 </small> Industrial Land</h4>
                              <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/mmt1967UkucvFPOfIinwsAlZsDXWaGJYs4qeRiQW.webp" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">
                              <h4><small>121 </small> Hotels</h4>
                              <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/RxTA4jpYh7ZEZG1BEqEZZ2ms4ocVXcAYEViIWS64.webp" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">
                              <h4><small>190 </small> Factory</h4>
                              <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/ciN8XcDI45xluu87FDLl6faKLc8f0AoHwIYwNh4v.webp" alt="">                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">
                              <h4><small>634 </small> Farm Land</h4>
                              <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/zbvx6Iwfs59Cgf016A0YYHn4sbdzvlJF86ruSWPn.webp" alt="">
                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
						  
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">
                              <h4><small>213 </small> Showrooms</h4>
                              <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" alt="">
                                 
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="buysell_img">
                              <a href="#" class="bgblack">                                 
                                 <h4><small>644 </small> Commercial Shops</h4>
                                 <span class="explorenav">Explore <i class="fa fa-angle-double-right"></i></span>
                                 <img src="https://ebuildbazaar.in/public/uploads/all/mmt1967UkucvFPOfIinwsAlZsDXWaGJYs4qeRiQW.webp" alt="">
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        
                           
                           
                           
                           
                              
                           </div>
			</div>
               
               <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Project Gallery</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div>
                           
                           <div class="row">
                           
                           <div class="owl-carousel owl-theme owl-gallery_sliders trending001_1">
                           
                           <div class="item">
                            <div class="project-gallery-box row">
                           <div class="col-md-4">
                           
                           	<div class="logodiv px-4 pt-4"><img src="https://teja10.kuikr.com/r1/20221125/ak_172_2116997553-1669354994_80x80.png" alt="" style="width:auto; height:70px;"></div>
                            <div class="logoinfo px-4">
											<div class="bhkdiv">Keya Homes</div>
											<p id="city0">94.99 Lakhs To 1.74 Crores</p>
											<span>2, 3, 4 BHK Apartment</span>
                                            <a href="#">View More</a>
										</div>
                            <button class="filterbtn w-100 mt-4 mb-4">I AM INTERESTED</button>
                           </div>
                           <div class="col-md-8"><img src="https://teja10.kuikr.com/restatic/KAmd.jpg" alt="" style="height:340px;"></div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="project-gallery-box row">
                           <div class="col-md-4">
                           
                           	<div class="logodiv px-4 pt-4"><img src="https://teja10.kuikr.com/r1/20221125/ak_172_2116997553-1669354994_80x80.png" alt="" style="width:auto; height:70px;"></div>
                            <div class="logoinfo px-4">
											<div class="bhkdiv">Keya Homes</div>
											<p id="city0">94.99 Lakhs To 1.74 Crores</p>
											<span>2, 3, 4 BHK Apartment</span>
                                            <a href="#">View More</a>
										</div>
                            <button class="filterbtn w-100 mt-4 mb-4">I AM INTERESTED</button>
                           </div>
                           <div class="col-md-8"><img src="https://teja10.kuikr.com/restatic/KAmd.jpg" alt="" style="height:340px;"></div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="project-gallery-box row">
                           <div class="col-md-4">
                           
                           	<div class="logodiv px-4 pt-4"><img src="https://teja10.kuikr.com/r1/20221125/ak_172_2116997553-1669354994_80x80.png" alt="" style="width:auto; height:70px;"></div>
                            <div class="logoinfo px-4">
											<div class="bhkdiv">Keya Homes</div>
											<p id="city0">94.99 Lakhs To 1.74 Crores</p>
											<span>2, 3, 4 BHK Apartment</span>
                                            <a href="#">View More</a>
										</div>
                            <button class="filterbtn w-100 mt-4 mb-4">I AM INTERESTED</button>
                           </div>
                           <div class="col-md-8"><img src="https://teja10.kuikr.com/restatic/KAmd.jpg" alt="" style="height:340px;"></div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="project-gallery-box row">
                           <div class="col-md-4">
                           
                           	<div class="logodiv px-4 pt-4"><img src="https://teja10.kuikr.com/r1/20221125/ak_172_2116997553-1669354994_80x80.png" alt="" style="width:auto; height:70px;"></div>
                            <div class="logoinfo px-4">
											<div class="bhkdiv">Keya Homes</div>
											<p id="city0">94.99 Lakhs To 1.74 Crores</p>
											<span>2, 3, 4 BHK Apartment</span>
                                            <a href="#">View More</a>
										</div>
                            <button class="filterbtn w-100 mt-4 mb-4">I AM INTERESTED</button>
                           </div>
                           <div class="col-md-8"><img src="https://teja10.kuikr.com/restatic/KAmd.jpg" alt="" style="height:340px;"></div>
                        </div>
                        
                              
                        
                        </div>
                        
						  
                           
                        
                        
                           
                           
                           
                           
                              
                           </div>
			</div>
            
            <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Real Estate Service in Delhi</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div> 
                           
                           <div class="row">
                           
                           
                           <div class="owl-carousel owl-theme owl-carousel_sliders trending001">
                           
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_8.jpg" alt="">
                                 <h3>Agents / Brokers</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_1.jpg" alt="">
                                 <h3>Builders / Developers</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_2.jpg" alt="">
                                 <h3>Architects / Architecture</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_3.jpg" alt="">
                                 <h3>Interior Decorators</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_4.jpg" alt="">
                                 <h3>Vaastu Consultant</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
						  
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_5.jpg" alt="">
                                 <h3>Building Contractors</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="product_br">
                              <a href="#">
                                 <img src="https://static.realestateindia.com/rei/images/service_icon_6.jpg" alt="">
                                 <h3>Home Inspection</h3>
                                 <p>Here Are Hassle-Free Solutions! Buy - Sell - Rent Your Property</p>
                              </a>
                           </div>
                        </div>
                        
                              
                        
                        </div>
                        
                           
                           
                           
                           
                              
                           </div>
			</div>
            
            
            <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Housing Building Experts</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div> 
                           
                           <div class="col-md-12 pb-2">
                           <h5 class="pb-2">Top Localities in <div class="location_radio checked"><input type="radio" id="1" value="1" name="cities" checked="checked">
                                        <label for="1">Delhi</label>
                          </div> <div class="location_radio"><input type="radio" id="2" value="2" name="cities">
                                        <label for="2">Gurugram</label>
                          </div> <div class="location_radio"><input type="radio" id="3" value="3" name="cities">
                                        <label for="3">Noida</label>
                          </div></h5>
                           
                           	<div class="city_radio checked"><input type="radio" id="1" value="1" name="city" checked="checked">
                                        <label for="1">Dwarka</label>
                          </div>
                          
                          	<div class="city_radio"><input type="radio" id="2" value="2" name="city">
                                        <label for="2">Uttam Nagar</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Jasola" value="Jasola" name="city">
                                        <label for="Jasola">Jasola</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Saket" value="Saket" name="city">
                                        <label for="Saket">Saket</label>
                          </div>
                          <div class="city_radio"><input type="radio" id="Khanpur" value="Khanpur" name="city">
                                        <label for="Khanpur">Khanpur</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Chattarpur" value="Chattarpur" name="city">
                                        <label for="Chattarpur">Chattarpur</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Pitampura" value="Pitampura" name="city">
                                        <label for="Pitampura">Pitampura</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Janakpuri" value="Janakpuri" name="city">
                                        <label for="Janakpuri">Janakpuri</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Najafgarh" value="Najafgarh" name="city">
                                        <label for="Najafgarh">Najafgarh</label>
                          </div>
                          
                          <div class="city_radio"><input type="radio" id="Rohini" value="Rohini" name="city">
                                        <label for="Rohini">Rohini</label>
                          </div>
                          
                           </div>
                           
                    <div class="row">
                           
                           <div class="owl-carousel owl-theme owl-carousel_sliders trending001">
                           
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                             <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div> 
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                              <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                              <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                           <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>   
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>  
                        
                        </div>
						  
                           <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                             <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div> 
                        
                        </div>
                        <div class="item">
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>
                        
                            <div class="col product-categorys product-categorys-listing showboxzoombot">
                           <div class="housing_projects">
                              <a href="#">
                              <div class="col-md-12 row m-0 p-0">
                              <div class="col-md-4"><img src="https://is1-2.housingcdn.com/0b8ad14c/f80be7c36eeb4f42644036ee59bffb96/v0/thumb.jpeg.webp" alt="" class="brdr-100"></div>
                              
                              <div class="col-md-8 housing-name text-left">
                              	<h3>Palm Floors</h3>
                                <span>Housing Expert</span>
                                <p>
                                	<label><strong>6 years</strong><br />Experience</label>
                                    <label style="border:0px;"><strong>40</strong><br />Properties</label>
                                </p>
                              </div>
                              
                              </div>
                              
                              
                              <div class="col-md-12 text-left m-0 pt-3">
                              <span class="sector-txt">Sector 52</span> <span class="sector-txt">Sector 57</span>
                              </div>
                              </a>
                           </div>
                        </div>  
                        
                        </div>
                        
                           
                           
                           
                           
                              
                           </div>
			</div>   
               
               
               <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Featured Projects</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div>
                       
                       
                      <div class="row">
                           
                           <div class="owl-carousel owl-theme owl-projects_sliders trending001">
                           
                           <div class="item">
                           
                            <div class="project-gallery-box">
                            
                            <div class="col-md-12"><img src="https://cdn.staticmb.com/property/microsite/new-banners/project-showcase/mitya-homes-dwarka-mor-newdelhi/show-new.jpg" alt="" style="height:220px;"></div>
                           <div class="col-md-12 row">
                           
                           	<div class="col-md-3 text-center"><img src="https://cdn.staticmb.com/property/microsite/new-banners/project-showcase/mitya-homes-dwarka-mor-newdelhi/logo.jpg" alt="" style="width:auto; display:initial;" class="py-2"></div>
                            <div class="col-md-6 featured-project">
                                <h3>Residential projects</h3>
                                <p>by Mitya Infratech<br />
                                Dwarka Mor, New Delhi<br />
                                Marketed by Mitya Infratech</p>
							</div>
                             <div class="col-md-3 featured-project">
											<p class="text-right py-2">2, 3 BHK Flats<br /><strong>24 Lac</strong>  onwards</p>
                                            <button class="filterbtn w-100 mt-0">View All</button>
										</div>
                           </div>
                           
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="project-gallery-box">
                            
                            <div class="col-md-12"><img src="https://cdn.staticmb.com/property/microsite/new-banners/project-showcase/dlfcapital-greens-moti-nagar-new-delhi/img.jpg" alt="" style="height:220px;"></div>
                           <div class="col-md-12 row">
                           
                           	<div class="col-md-3 text-center"><img src="https://cdn.staticmb.com/property/microsite/new-banners/project-showcase/mitya-homes-dwarka-mor-newdelhi/logo.jpg" alt="" style="width:auto; display:initial;" class="py-2"></div>
                            <div class="col-md-6 featured-project">
                                <h3>Commercial projects</h3>
                                <p>by Mitya Infratech<br />
                                Dwarka Mor, New Delhi<br />
                                Marketed by Mitya Infratech</p>
							</div>
                             <div class="col-md-3 featured-project">
											<p class="text-right py-2">2, 3 BHK Flats<br /><strong>24 Lac</strong>  onwards</p>
                                            <button class="filterbtn w-100 mt-0">View All</button>
										</div>
                           </div>
                           
                        </div>
                        
                              
                        
                        </div>
                        <div class="item">
                            <div class="project-gallery-box">
                            
                            <div class="col-md-12"><img src="https://cdn.staticmb.com/property/microsite/new-banners/project-showcase/mitya-homes-dwarka-mor-newdelhi/show-new.jpg" alt="" style="height:220px;"></div>
                           <div class="col-md-12 row">
                           
                           	<div class="col-md-3 text-center"><img src="https://cdn.staticmb.com/property/microsite/new-banners/project-showcase/mitya-homes-dwarka-mor-newdelhi/logo.jpg" alt="" style="width:auto; display:initial;" class="py-2"></div>
                            <div class="col-md-6 featured-project">
                                <h3>Land projects</h3>
                                <p>by Mitya Infratech<br />
                                Dwarka Mor, New Delhi<br />
                                Marketed by Mitya Infratech</p>
							</div>
                             <div class="col-md-3 featured-project">
											<p class="text-right py-2">2, 3 BHK Flats<br /><strong>24 Lac</strong>  onwards</p>
                                            <button class="filterbtn w-100 mt-0">View All</button>
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
   
   
 <section class="py-2 spacer bg-light mb-2">
      <div class="container">
      <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Top Localities</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div>
         
         
         <div class="mt-md-n1ddd div-tab-dps_pol d-block mt-1">
            <ul class="nav nav-pills d-flex align-items-center justify-content-center px-2 w-100">
               <li class="border-0 col-tabs_pol-1 tabs-dps-tab_pol active nav-item w-25">
                  <a class="btn border text-center rounded-3  border-yellow color-orange text-dark d-block py-2">Popular</a>
               </li>
               <li class="border-0 col-tabs_pol-2 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Investment Hotspots</a>
               </li>
               <li class="border-0 col-tabs_pol-3 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Affordable</a>
               </li>
               <li class="border-0 col-tabs_pol-4 tabs-dps-tab_pol nav-item w-25 px-2">
                  <a class="btn border text-center rounded-3 border-yellow color-orange text-dark d-block py-2">Great Lifestyle</a>
               </li>
            </ul>
         </div>
         <div class="div-tab-dps_pol sections h-350 mt-3 mb-0">
            <ul>
               <li class="col-tabs_pol-1 tabs-dps-tab_pol active">
                  <div class="tab-content policys_eckolion  shadow-none mb-0 h-auto overflow-visible p-0 border">
                     <div class="content_row row">
                     
                        <div class="col-md-4 collaboration mx-2">
                           
                           <div class="sector_radio checked"><input type="radio" id="1" value="1" name="sector" checked="checked">
                                        <label for="1">
                                            Sector 57,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="2" value="2" name="sector">
                                        <label for="2">
                                            Sector 30,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="3" value="3" name="sector">
                                        <label for="3">
                                            Sector 32,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="4" value="4" name="sector">
                                        <label for="4">
                                            Sector 48,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="5" value="5" name="sector">
                                        <label for="5">
                                            Sector 12,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="6" value="6" name="sector">
                                        <label for="6">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="7" value="7" name="sector">
                                        <label for="7">
                                            Sector 20,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="8" value="8" name="sector">
                                        <label for="8">
                                            Sector 45,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="9" value="9" name="sector">
                                        <label for="9">
                                            Sector 50,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="10" value="10" name="sector">
                                        <label for="10">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                        </div>
                        
                        <div class="col-md-8 row landowner activetab p-3">
                        <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Popular</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                                        
                                        <div class="col-md-8 row">
                                        
                                        <div class="col-md-6">
                                        <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Full Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Phone Number *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-envelope left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Email Address *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Location *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
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
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-inr left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Min Investment (In Rs.) *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                          </div>  
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 158px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 158px;" class="form-control textareas br-radius-none" placeholder="Working Address *"></textarea>
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
               </li>
               <li class="col-tabs_pol-2 tabs-dps-tab_pol">
                  <div class="tab-content policys_eckolion  shadow-none mb-0 h-auto overflow-visible p-0 border">
                     <div class="content_row row">
                     
                        <div class="col-md-4 collaboration mx-2">
                           
                           <div class="sector_radio checked"><input type="radio" id="1" value="1" name="sector" checked="checked">
                                        <label for="1">
                                            Sector 57,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="2" value="2" name="sector">
                                        <label for="2">
                                            Sector 30,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="3" value="3" name="sector">
                                        <label for="3">
                                            Sector 32,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="4" value="4" name="sector">
                                        <label for="4">
                                            Sector 48,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="5" value="5" name="sector">
                                        <label for="5">
                                            Sector 12,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="6" value="6" name="sector">
                                        <label for="6">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="7" value="7" name="sector">
                                        <label for="7">
                                            Sector 20,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="8" value="8" name="sector">
                                        <label for="8">
                                            Sector 45,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="9" value="9" name="sector">
                                        <label for="9">
                                            Sector 50,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="10" value="10" name="sector">
                                        <label for="10">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                        </div>
                        
                        <div class="col-md-8 row landowner activetab p-3">
                        <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Investment Hotspots</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                                        
                                        <div class="col-md-8 row">
                                        
                                        <div class="col-md-6">
                                        <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Full Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Phone Number *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-envelope left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Email Address *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Location *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
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
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-inr left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Min Investment (In Rs.) *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                          </div>  
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 158px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 158px;" class="form-control textareas br-radius-none" placeholder="Working Address *"></textarea>
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
               </li>
               <li class="col-tabs_pol-3 tabs-dps-tab_pol">
                  <div class="tab-content policys_eckolion  shadow-none mb-0 h-auto overflow-visible p-0 border">
                     <div class="content_row row">
                     
                        <div class="col-md-4 collaboration mx-2">
                           
                           <div class="sector_radio checked"><input type="radio" id="1" value="1" name="sector" checked="checked">
                                        <label for="1">
                                            Sector 57,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="2" value="2" name="sector">
                                        <label for="2">
                                            Sector 30,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="3" value="3" name="sector">
                                        <label for="3">
                                            Sector 32,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="4" value="4" name="sector">
                                        <label for="4">
                                            Sector 48,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="5" value="5" name="sector">
                                        <label for="5">
                                            Sector 12,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="6" value="6" name="sector">
                                        <label for="6">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="7" value="7" name="sector">
                                        <label for="7">
                                            Sector 20,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="8" value="8" name="sector">
                                        <label for="8">
                                            Sector 45,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="9" value="9" name="sector">
                                        <label for="9">
                                            Sector 50,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="10" value="10" name="sector">
                                        <label for="10">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                        </div>
                        
                        <div class="col-md-8 row landowner activetab p-3">
                        <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Affordable</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                                        
                                        <div class="col-md-8 row">
                                        
                                        <div class="col-md-6">
                                        <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Full Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Phone Number *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-envelope left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Email Address *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Location *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
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
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-inr left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Min Investment (In Rs.) *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                          </div>  
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 158px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 158px;" class="form-control textareas br-radius-none" placeholder="Working Address *"></textarea>
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
               </li>
               <li class="col-tabs_pol-4 tabs-dps-tab_pol">
                  <div class="tab-content policys_eckolion  shadow-none mb-0 h-auto overflow-visible p-0 border">
                     <div class="content_row row">
                     
                        <div class="col-md-4 collaboration mx-2">
                           
                           <div class="sector_radio checked"><input type="radio" id="1" value="1" name="sector" checked="checked">
                                        <label for="1">
                                            Sector 57,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="2" value="2" name="sector">
                                        <label for="2">
                                            Sector 30,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="3" value="3" name="sector">
                                        <label for="3">
                                            Sector 32,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="4" value="4" name="sector">
                                        <label for="4">
                                            Sector 48,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="5" value="5" name="sector">
                                        <label for="5">
                                            Sector 12,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="6" value="6" name="sector">
                                        <label for="6">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="7" value="7" name="sector">
                                        <label for="7">
                                            Sector 20,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="8" value="8" name="sector">
                                        <label for="8">
                                            Sector 45,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="9" value="9" name="sector">
                                        <label for="9">
                                            Sector 50,Gurugram Haryana
                          </label>
                          </div>
                          
                          <div class="sector_radio"><input type="radio" id="10" value="10" name="sector">
                                        <label for="10">
                                            Sector 19,Gurugram Haryana
                          </label>
                          </div>
                          
                        </div>
                        
                        <div class="col-md-8 row landowner activetab p-3">
                        <div class="aboutIfo">
                                 <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                    <h3 class="section-title section-title__sm mb-0 pb-0 pt-2 mt-0 font-size-18">Great Lifestyle</h3>
                                    <div class="deals">
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                                        
                                        <div class="col-md-8 row">
                                        
                                        <div class="col-md-6">
                                        <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-user left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Full Name *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-phone-flip left_pos"></i>
                                                </span>
                                                <input type="tel" name="full-name" class="form-control empty br-radius-none" placeholder="Phone Number *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa-envelope left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Email Address *">
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa-solid fa fa-map-marker left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Site Location *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
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
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <span class="input-group-addon br-radius-none">
                                                    <i class="fa fa-inr left_pos"></i>
                                                </span>
                                                <input type="text" name="full-name" class="form-control empty br-radius-none" placeholder="Min Investment (In Rs.) *" maxlength="10" minlength="10">
                                            </div>
                                            </div>
                                          </div>  
                                            
                                            
                                            <div class="col-md-4"><div class="input-group" style="margin-bottom: 5px;">
                                                <span class="input-group-addon br-radius-none text-aAaA" style="height: 158px;">
                                                    <i class="fa-solid fa-pen-to-square left_pos"></i>
                                                </span>
                                                <textarea name="message" style="height: 158px;" class="form-control textareas br-radius-none" placeholder="Working Address *"></textarea>
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
               </li>
            </ul>
         </div>
      </div>
   </section>   
   
<section class="gallerysin gallerysin2 py-5 pt-4 mb-5 mt-5">
      <div class="container home-our-services">
      <div class="left herotext">
      <div class="brand_product pt-3">
                <div class="row">
                              <div class="col-md-12 col-sm-12 col-12">
                                 <div class="deals">
                                    <h3>Price & Rental Trends for Property/Land</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="deals">
                              <hr>
                           </div>
                           </div>
                           
            <div class="border-bottom1">
                        <h5> Filter :</h5>
                     </div>
                     
                  <div class="row border-bottom py-2 mb-2">
                  <div class="col-md-2 pos-relative"><i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                            <select class="form-control br-radius-none" name="city_Type" id="city_Type">
                                <option>Select City</option>
                                <option value="Passport">Delhi</option>
                                <option value="Passport">Gurugram</option>
                                <option value="Passport">Noida</option>
                            </select></div>
                  <div class="col-md-2 pos-relative"><i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                            <select class="form-control br-radius-none" name="locality_Type" id="locality_Type">
                                <option>Select Area/Locality</option>
                                <option value="Passport">Uttam Nagar</option>
                                <option value="Passport">Dwarka</option>
                                <option value="Passport">Saket</option>
                            </select></div>
                            
                            <div class="col-md-2 pos-relative"><i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                            <select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Type of Property</option>
                                <option value="Passport">Commercial</option>
                                <option value="Passport">Residential</option>
                                <option value="Passport">Land</option>
                                <option value="Passport">Agriculture</option>
                            </select></div>
                  <div class="col-md-2 pos-relative"><i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 15px;"></i>
                                                
                            <select class="form-control br-radius-none" name="Building_Type" id="Building_Type">
                                <option>Hot Deals</option>
                                <option value="Passport">Today's Price</option>
                                <option value="Passport">Today's Hot Deals</option>
                                <option value="Passport">Market Price</option>
                            </select></div>
                            
                            <div class="col-md-3"><div class="row px-2">
                                            <input type="text" name="full-name" class="form-control empty br-radius-none w-50" placeholder="Min Price"> <input type="text" name="full-name" class="form-control empty br-radius-none w-50" placeholder="Max Price">
                                            </div></div>
                                            
                                            
                            <div class="col-md-1"><button class="filterbtn w-100"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button></div>
                 </div>
                 
                                
         <div class="row">
                 
         <div class="col-md-12">
         <div class="table-responsive box-shadow border-bottom markettable tablealt">
						<table class="table cart checkout border">
							<thead>
								<tr>
									<th class="thbg"><strong>Builder/Project Name</strong></th>
									<th class="thbg"><strong>Price Q4 2022</strong></th>
									<th class="thbg">% Change <br><span>(Q3-2022 Vs Q4-2022)</span></th>
									<th class="thbg"><strong>1BHK Rental</strong></th>
									<th class="thbg"><strong>2BHK Rental</strong></th>
									<th class="thbg"><strong>3BHK Rental</strong></th>
								</tr>
								
							</thead>
							<tbody>
									<tr>
									<td>
										<a href="#">Abul Fazal Enclave</a>
									</td>
									<td><i class="fa fa-inr"></i>3520-4480</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Alaknanda</a>
									</td>
									<td><i class="fa fa-inr"></i>11632-14804</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Ashok Nagar</a>
									</td>
									<td><i class="fa fa-inr"></i>12711-16177</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>9900-12100 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Ashok Vihar</a>
									</td>
									<td><i class="fa fa-inr"></i>9594-12210</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Ashram</a>
									</td>
									<td><i class="fa fa-inr"></i>5867-7467</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Aya Nagar</a>
									</td>
									<td><i class="fa fa-inr"></i>2933-3733</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>8901-10878 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Badarpur</a>
									</td>
									<td><i class="fa fa-inr"></i>2670-3263</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Bakkarwala</a>
									</td>
									<td><i class="fa fa-inr"></i>52380-64020</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Bindapur</a>
									</td>
									<td><i class="fa fa-inr"></i>4445-5657</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Block A</a>
									</td>
									<td><i class="fa fa-inr"></i>3520-4480</td>
									<td>
										<span class="fw">0% </span><span class="arrow-green">↑</span>									</td>
									<td><i class="fa fa-inr"></i>9900-12100 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Burari</a>
									</td>
									<td><i class="fa fa-inr"></i>3440-4204</td>
									<td>
										<span class="fw">0% </span><span class="arrow-red">↓</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															<tr>
									<td>
										<a href="#">Chandni Chowk</a>
									</td>
									<td><i class="fa fa-inr"></i>17101-13992</td>
									<td>
										<span class="fw">0% </span><span class="arrow-green">↑</span>									</td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
									<td><i class="fa fa-inr"></i>3520-4480 </td>
								</tr>
															
														</tbody>
						</table>
					</div>
         </div>
         
         
         <div class="col-md-12 text-center mt-2"><button class="filterbtn text-center" style="display:inline-block;">Show More</button></div>
         </div>
      </div>
      </div>
</section>   
    
  <div id="myModalregister" class="modal fade prolidneis in" role="dialog">
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
                                                        <strong>Register</strong> Property/Land Owner
                                                    <button type="button" class="close" data-dismiss="modal">×</button></h3>
                                                    <div class="deals">
                                                        <hr>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-12 border-bottom pb-2 mb-3">
                                                 <div class="youare checked"><input type="radio" id="1" value="1" name="youare" checked="checked">
                                        <label for="1">Builder</label>
                          </div>
                          
                          
                          <div class="youare"><input type="radio" id="Jasola" value="Jasola" name="youare">
                                        <label for="Jasola">Owner</label>
                          </div>
                                                </div>
                                                    
                                                <div class="row">
                                                
                                               
                          
                          
                          
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="main-parenttttttT row">
															
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
                                                                <label class="formpoplabel">Company Name</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Company Name" >
                                                            </div>
                                                            
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Location</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Location" >
                                                            </div>
                                                            
                                                            
                                                            <div class="js-form-message form-group col-md-6" style="position:relative;">
                                                            <i class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 40px;"></i>
                                                                <label class="formpoplabel">Type</label>
                                                                <select class="form-control" name="Building_Type" id="Building_Type">
                                <option>Select Type</option>
                                <option value="Passport">Commercial</option>
                                <option value="Passport">Residential</option>
                                <option value="Passport">Industrial</option>
                                <option value="Passport">Others</option>
                            </select>
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
                                                      
                                            </form> </div> 
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