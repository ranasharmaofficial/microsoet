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


<link rel="stylesheet" href="{{static_asset('assets_web/css/nouislider.css')}}" />
<script src="{{static_asset('assets_web/js/nouislider.min.js')}}" type="text/javascript"></script>

<section class="gallerysin gallerysin2 py-5 pt-4 mt-3">
      <div class="container">
         <div class="row">
            <div class="col-md-12 row">
               
               
               
               <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
               
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6 mrgnbot10 showcatlist">
                <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li class="link-category link-category1aa">
                            <div id="accordion" class="accordion-container">
                                <article class="content-entry open">
                                    <h4 class="article-title">
                                        <a class="dropdown-toggle1 dropdown-toggle-collapse1" href="javascript:void(0);" role="button">
                                            Show All Projects Type
                                            <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                            <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                                        </a>
                                    </h4>

                                    <div class="accordion-content" style="display:block;">
                                        <div class="link-categoryx link-category1az ">
                                            <ul class="list-unstyled dropdown-list">
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Residential Projects
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Commercial Projects
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Industrial Projects
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Others
                                                        </a>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                        </li>
                        <li class="listing-botoms">
                                <b>Residential Projects</b>
                        </li>
                    </ul>
                </div>
                
                <div class="mb-6">
                    <div class="border-bottom1 border-color-11 mt-3 mb-3 showcatlist">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 showcatlist">Filters</h3>                    
                        <div class="deals">
                            <hr>
                        </div>
                    </div>
                    <!-- filter code start here -->
                    <div class="border-bott showcatlist showfilter">
                        <div id="accordion" class="accordion-container contentsarround">
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Location <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand11" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand11">
                                                       Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand12" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand12">
                                                       Mumbai
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand18" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand18">
                                                       Gurugram
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand17" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand17">
                                                       Banglore
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand16" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand16">
                                                       Chennai
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand15" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand15">
                                                       Kolkatta
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand14" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand14">
                                                       Ranchi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="brand custom-control-input" id="brand13" style="z-index:0;">
                                                    <label class="custom-control-label" for="brand13">
                                                       Patna
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                        
                                        <span class="showoffer" id="showbrand">+Show More</span>
                                        <span class="hideoffer" id="hidebrand">−Show Less</span>
                                    </div>
                                </div>
                            </article>
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Industries <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind1" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind1">
                                                       Real Estate Rental
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind2" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind2">
                                                       Real Estate Agencies
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind3" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind3">
                                                       Household Products
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind4" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind4">
                                                       Home Furnishings
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind5" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind5">
                                                       Construction Supplies
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind6" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind6">
                                                       Construction Materials
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind7" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind7">
                                                       Commercial Real Estate
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind8" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind8">
                                                       Building Maintenance
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                        
                                        
                                    </div>
                                </div>
                            </article>
                            
                            <div class="slidermob"><div class="mall-slider-handles" data-start="0" data-end="300" data-min="0" data-max="300"  data-max="" data-target="price" style="width: 100%"> 
                            </div>
                            <div class="row filter-container-1">
                                <div class="col-md-4">
                                    <input class="min_price" data-min="price" id="skip-value-lower" name="min_price"
                                        value="0"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <input class="max_price" data-max="price" id="skip-value-upper" name="max_price"
                                        value="300"
                                        readonly>
                                </div>
                            </div>
                            
                            </div>
                            
                        </div>
                    </div> 
                    <!-- filter code end here -->

                </div>
                
                </div>
                
                <div class="col-xl-9 col-wd-9gdot5">
                <div class="head-cnt work-center text-left" style="margin-bottom:20px;">
                    <div class="bounceIn animated">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>
                                    Showing results for "Residential Projects"
                                </h5>
                            </div>

                            <div class="col-md-3">
                                <div class="d-flex sortby">
                                    <label class="mb-0 opacity-50 w-20">{{ translate('Sort by')}}</label>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <select class="sort_by form-control form-control-sm aiz-selectpicker sortbytxt"
                                        name="sort_by">
                                        <option value="newest" @isset($sort_by) @if ($sort_by=='default' ) selected
                                            @endif @endisset>{{ translate('Default')}}</option>
                                        <option value="newest" @isset($sort_by) @if ($sort_by=='newest' ) selected
                                            @endif @endisset>{{ translate('Newest')}}</option>
                                        <option value="oldest" @isset($sort_by) @if ($sort_by=='oldest' ) selected
                                            @endif @endisset>{{ translate('Oldest')}}</option>
                                        <option value="price-asc" @isset($sort_by) @if ($sort_by=='price-asc' ) selected
                                            @endif @endisset>{{ translate('Price low to high')}}</option>
                                        <option value="price-desc" @isset($sort_by) @if ($sort_by=='price-desc' )
                                            selected @endif @endisset>{{ translate('Price high to low')}}</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="deals">
                              <hr>
                           </div>
                    </div>
                </div> 
                
                
                <div class="row">
                 <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Construction company seeks financial investment</h3>
                    <span>
- Established in 1985, we are one of the senior builders in Vizag.
- We have constructed 15 million plus square feet and completed over 30 projects.
- The business...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/mmt1967UkucvFPOfIinwsAlZsDXWaGJYs4qeRiQW.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Contractors Company Investment Opportunity</h3>
                    <span>
- We are a construction company that requires funds to develop a residential apartment project.
- The investment amount would provide the investor with a stake...</span>
                    <label class="text-primary">Investment: ₹5 Cr for 6% </label>
                    <p>West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/RxTA4jpYh7ZEZG1BEqEZZ2ms4ocVXcAYEViIWS64.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Residential Real Estate Construction Company</h3>
                    <span>
- Have completed more than 23 private client house constructions that amount to 81,660 Sq Ft.- Our annual revenue shown in the books is INR 40 lakhs.- We have associated...</span>
                    <label class="text-primary">Investment: ₹1 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/ciN8XcDI45xluu87FDLl6faKLc8f0AoHwIYwNh4v.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Newly Established Agriculture Support Company</h3>
                    <span>
- We sell quarter to half-acre agri plots with a constructed farmhouse.- The owner owns 25 acres of agricultural land in Kodaikanal.- We have been running this model...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/zbvx6Iwfs59Cgf016A0YYHn4sbdzvlJF86ruSWPn.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Leading turnkey building contractor in Kerala</h3>
                    <span>
- Leading turnkey Residential/commercial building contractors in Kerala.- Also developing digitally transformed platforms and tech-enabled project management...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/giaFE9X2J0L953WIBk4cXmZEP2oeghcz64QVOaw0.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Established EPC construction company</h3>
                    <span>
- MEP company involved in government and private construction projects.- The company constructs medical colleges, hospitals, company headquarters, and...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/mp0mU30i0eeZL4veTuQivYnLKpkB5ARSTtt0KC28.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Engineering, Procurement & Construction Company</h3>
                    <span>
- Established in 1985, we are one of the senior builders in Vizag.
- We have constructed 15 million plus square feet and completed over 30 projects.
- The business...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/NxTyFtRjrk2haHX72R113tvafYdsEgl3XwkoWFVE.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Naturopathy hospital and spiritual resort</h3>
                    <span>
- Our company has worked on 3 construction projects previously that included the construction of a 700-unit residential complex.- We plan to establish...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-6 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/LHtZ9hz3BRc9iAve37RasZlN3EGplRsv8l34uxPz.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>AI and data analysis-powered agricultural</h3>
                    <span>
- Established in 1985, we are one of the senior builders in Vizag.
- We have constructed 15 million plus square feet and completed over 30 projects...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                 </div>
                
                
                
                
                </div>
                
               <!--<div class="home-our-services col-xl-9 col-wd-9gdot5">
         <div class="row">
            
            <div class="col-md-12">
               <div class="left herotext universal mt-3 h-auto">
               
                     
                  
                 
                 <div class="row">
                 <div class="grid-item col-md-3 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-12">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-12 land_box">
                    <h3>Construction company seeks financial investment</h3>
                    <span>
- Established in 1985, we are one of the senior builders in Vizag.
- We have constructed 15 million plus square feet and completed over 30 projects.
- The business...</span>
                    <label class="text-primary">Investment: ₹10 Cr for 6% </label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="{{url('/projectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                 </div>       
                        
                  
               </div>
            </div>
            
         </div>
      </div>-->
            </div>
         </div>
      </div>
   </section>
   
   
   
   <div id="myModalowner" class="modal fade prolidneis in" role="dialog">
            <div class="modal-dialog" id="modal-dialog45">
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
                                                
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                                                        <img src="https://ebb.orrish.org/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" alt="End To End Residential Architectural Services">
                                                        <h3>Construction company seeks financial investment</h3>
                                                        <p class="soldbytxt"><span>Investment:</span> <i class="fa fa-inr left_pos"></i>10 Cr for 6%</p>
                                                        <p class="contype">
                                                            <span>Building Type: Residential</span>
                                                            <span>South West Delhi, New Delhi- 110010</span>
                                                        </p>
                                                    </div>
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
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
	$(document).ready(function () { 
        //price range fonction start
        price_range();
        function price_range(){
            var $propertiesForm = $('.mall-category-filter');
            var $body = $('body');
            $('.mall-slider-handles').each(function () {
                var el = this;
                noUiSlider.create(el, {
                    start: [el.dataset.start, el.dataset.end],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: [parseFloat(el.dataset.min)],
                        max: [parseFloat(el.dataset.max)]
                    },
                    pips: {
                        mode: 'range',
                        density: 20
                    }
                }).on('change', function (values) {
                    $('[data-min="' + el.dataset.target + '"]').val(values[0])
                    $('[data-max="' + el.dataset.target + '"]').val(values[1])
                    $propertiesForm.trigger('submit');

                    get_common_filter_function();
                });
            })
            
        }
	}
	);
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