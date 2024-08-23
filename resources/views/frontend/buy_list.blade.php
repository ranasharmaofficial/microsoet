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
                                            Show All Property Type
                                            <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                            <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                                        </a>
                                    </h4>

                                    <div class="accordion-content" style="display:block;">
                                        <div class="link-categoryx link-category1az ">
                                            <ul class="list-unstyled dropdown-list">
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Apartments
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Villa
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Plots
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item1" href="#">
                                                            Builder Floors
                                                        </a>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                        </li>
                        <li class="listing-botoms">
                                <b>Apartments</b>
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
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Cities <i></i></h4>
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
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Localities <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind1" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind1">
                                                       Uttam Nagar, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind2" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind2">
                                                       Dwarka Mor, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind3" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind3">
                                                       Laxmi Nagar, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind4" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind4">
                                                       Saket, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind5" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind5">
                                                       Jasola, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind6" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind6">
                                                       Malviya Nagar, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind7" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind7">
                                                       Munirka, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="ind8" style="z-index:0;">
                                                    <label class="custom-control-label" for="ind8">
                                                       Mayur Vihar, Delhi
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                        
                                        
                                    </div>
                                </div>
                            </article>
                            
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Posted By <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="posted" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Builder" style="z-index:0;">
                                                    <label class="custom-control-label" for="Builder">
                                                       Builder
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="posted" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Broker" style="z-index:0;">
                                                    <label class="custom-control-label" for="Broker">
                                                       Broker
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="posted" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Owner" style="z-index:0;">
                                                    <label class="custom-control-label" for="Owner">
                                                       Owner
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                        
                                        
                                    </div>
                                </div>
                            </article>
                            
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Available From <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Ready to Move" style="z-index:0;">
                                                    <label class="custom-control-label" for="Ready to Move">
                                                       Ready to Move
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Within 3 months" style="z-index:0;">
                                                    <label class="custom-control-label" for="Within 3 months">
                                                       Within 3 months
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Within 6 months" style="z-index:0;">
                                                    <label class="custom-control-label" for="Within 6 months">
                                                       Within 6 months
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="Within 1 year" style="z-index:0;">
                                                    <label class="custom-control-label" for="Within 1 year">
                                                       Within 1 year
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="1 - 3 Years" style="z-index:0;">
                                                    <label class="custom-control-label" for="1 - 3 Years">
                                                       1 - 3 Years
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="3 - 5 Years" style="z-index:0;">
                                                    <label class="custom-control-label" for="3 - 5 Years">
                                                       3 - 5 Years
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="available" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="> 5 Years" style="z-index:0;">
                                                    <label class="custom-control-label" for="> 5 Years">
                                                       > 5 Years
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        
                                        
                                    </div>
                                </div>
                            </article>
                            
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Beds <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="bhk[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="1bhk" style="z-index:0;">
                                                    <label class="custom-control-label" for="1bhk">
                                                       1 BHK
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="bhk[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="2bhk" style="z-index:0;">
                                                    <label class="custom-control-label" for="2bhk">
                                                       2 BHK
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="bhk[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="3bhk" style="z-index:0;">
                                                    <label class="custom-control-label" for="3bhk">
                                                       3 BHK
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="bhk[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="4bhk" style="z-index:0;">
                                                    <label class="custom-control-label" for="4bhk">
                                                       4 BHK
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="bhk[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="4+" style="z-index:0;">
                                                    <label class="custom-control-label" for="4+">
                                                       4+ BHK
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        
                                        
                                    </div>
                                </div>
                            </article>
                            
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Ad Posted Date <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="ads[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="In 24 Hours" style="z-index:0;">
                                                    <label class="custom-control-label" for="In 24 Hours">
                                                       In 24 Hours
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="ads[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="In a week" style="z-index:0;">
                                                    <label class="custom-control-label" for="In a week">
                                                       In a week
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="ads[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="In two weeks" style="z-index:0;">
                                                    <label class="custom-control-label" for="In two weeks">
                                                       In two weeks
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="ads[]" value="Ambuja-IZueg" type="checkbox" class="attribute custom-control-input" id="In a month" style="z-index:0;">
                                                    <label class="custom-control-label" for="In a month">
                                                       In a month
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                        
                                        
                                    </div>
                                </div>
                            </article>
                            
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Area (Sqft.) <i></i></h4>
                                <div class="accordion-content">
                                    <div class="border-topsd row">
                                        
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1 pos-relative col-md-6"><span class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 17px; right:20px;"></span>
                                                <select class="form-control br-radius-none" name="city_Type" id="city_Type">
                                <option>Min</option>
                                <option value="Passport">0+</option>
                                <option value="Passport">500</option>
                                <option value="Passport">1000</option>
                                <option value="Passport">1500</option>
                                <option value="Passport">2000</option>
                                <option value="Passport">2500</option>
                                <option value="Passport">3000</option>
                                <option value="Passport">>3000</option>
                            </select>
                                            </div>
                                            <div class="form-group align-items-center justify-content-between mb-2 pb-1 pos-relative col-md-6"><span class="fa fa-angle-down" aria-hidden="true" style="position: absolute; z-index: 99; top: 17px; right:20px;"></span>
                                                <select class="form-control br-radius-none" name="city_Type" id="city_Type">
                                <option>Max</option>
                                <option value="Passport">500</option>
                                <option value="Passport">1000</option>
                                <option value="Passport">1500</option>
                                <option value="Passport">2000</option>
                                <option value="Passport">2500</option>
                                <option value="Passport">3000</option>
                                <option value="Passport">>3000</option>
                            </select>
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
                                    Showing results for "Property in Delhi More, Darbhanga"
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
                    <h3>Kalra The Luxury Residency</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹20 L to 60 L </strong></label>
                    <span>By Kalra Builder And Developers</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>Uttam Nagar, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>3 BHK Independent Builder Floor</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 60 L </strong></label>
                    <span>Best 3 BHK Independent Floor</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
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
                    <h3>Kalra The Royal Homes</h3>
                    <label class="text-primary py-1"><strong>Investment: ₹25 L to 50 L </strong></label>
                    <span>Marketed by  Kalra Builder</span>
                    <span><strong>Aminities:</strong> &middot; Lift &middot; Car &middot; Parking &middot; Gas Pipeline &middot; Covered Car Parking</span>
                    <p>West Delhi, New Delhi- 110010</p>
                    <div class="row border-top pt-2">
                    <div class="col-md-6 text-center">Built-Up Area<br /><strong>800 sq.ft.</strong></div>
                    <div class="col-md-6 text-center">POSTED<br /><strong>16-Jan-2023</strong></div>
                    </div>
                    <a href="{{url('/builderprojectdetails')}}" class="buttonbuynow askpricebtn"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                 </div>
                
                
                
                
                </div>
                
               
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
                                                        <strong>Send Enquiry</strong> for Builder/Owner
                                                    <button type="button" class="close" data-dismiss="modal">×</button></h3>
                                                    <div class="deals">
                                                        <hr>
                                                    </div>
                                                </div>
                                                    
                                                <div class="row">
                                                
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                                                        <img src="https://ebb.orrish.org/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" alt="End To End Residential Architectural Services">
                                                        <h3>Kalra The Luxury Residency</h3>
                                                        <p class="soldbytxt"><span>Investment:</span> <i class="fa fa-inr left_pos"></i>20 L to 60 L</p>
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