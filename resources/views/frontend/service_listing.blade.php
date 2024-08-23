@extends('frontend.master')

@if (isset($category_id))
@php
$meta_title = \App\Models\Category::find($category_id)->meta_title;
$meta_description = \App\Models\Category::find($category_id)->meta_description;
@endphp
@elseif (isset($brand_id))
@php
$meta_title = \App\Models\Brand::find($brand_id)->meta_title;
$meta_description = \App\Models\Brand::find($brand_id)->meta_description;
@endphp
@else
@php
    $meta_title = get_setting('meta_title');
    $meta_description = get_setting('meta_description');
@endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $meta_title }}">
<meta itemprop="description" content="{{ $meta_description }}">

<!-- Twitter Card data -->
<meta name="twitter:title" content="{{ $meta_title }}">
<meta name="twitter:description" content="{{ $meta_description }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $meta_title }}" />
<meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')
<!-- Price nouislider-filter cdn -->
<link rel="stylesheet" href="{{static_asset('assets_web/css/nouislider.css')}}" />
<script src="{{static_asset('assets_web/js/nouislider.min.js')}}" type="text/javascript"></script>
      
<!-- <section class="pageTitle" style="background-image:url({{static_asset('assets_web/img/small_banner.jpg')}});"></section> -->

<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 breadmcrumsize">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    
                </ol>
                </nav>
            </div>
        </div>
    </div>

    <div id="product-box" class="container details-product product-catpro ">
        <div class="row">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6 mrgnbot10 showcatlist">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li class="link-category link-category1aa">
                            <div id="accordion" class="accordion-container">
                                <article class="content-entry">
                                    <h4 class="article-title">
                                        <a class="dropdown-toggle1 dropdown-toggle-collapse1" href="javascript:;"
                                            role="button">
                                            Show All Categories
                                            <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                            <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                                        </a>
                                    </h4>

                                    <div class="accordion-content">
                                        <div class="link-categoryx link-category1az ">
                                            <ul class="list-unstyled dropdown-list">
                                                @foreach ($categories as $key => $category)
                                                    <li>
                                                        <a class="dropdown-item1" href="{{ route('cat', $category->slug) }}">
                                                            {{ $category->getTranslation('name') }} 
                                                            ({{ $category->getServiceCount() }})
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            
                        </li>
                        <li class="listing-botoms">
                            @if($first_category)
                                <b>{{$first_category->name}} ({{ $first_category->getServiceCount() }})</b>
                            @endif
                        </li>
                    </ul>
                </div>
                        
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6 mrgnbot10 showcatlist">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">                        
                        <li class="listing-botoms">
                            <!--Code for First category start-->
                            <b> Sub Category</b>
                            <!--Code for First category end-->
                            <ul class="list-unstyled dropdown-list listing_block filter">

                                <!--Code for Second category start-->
                                @if(count($all_second_category_first) > 0)
                                    @foreach($all_second_category_first as $secondcategory)
                                        <li>
                                            <a class="dropdown-item1 {{ Request::is('service_list/'.$secondcategory->slug) ? 'active':'' }}"
                                                href="{{ route('services.servicecategory', $secondcategory->slug)}}">
                                                {{ $secondcategory->name }} ({{ $secondcategory->getServiceCount() }})
                                            </a>
                                        </li>
                                    @endforeach
                                @endif

                                @if(count($all_second_category_all)>0)
                                    @foreach($all_second_category_all as $secondcategory)
                                        <li class="collapses3">
                                            <a class="dropdown-item1 {{ Request::is('category/'.$secondcategory->slug) ? 'active':'' }}"
                                                href="{{ route('services.servicecategory', $secondcategory->slug)}}">
                                                {{$secondcategory->name }} ({{ $secondcategory->getServiceCount() }})
                                            </a>
                                        </li>
                                    @endforeach
                                @endif

                                <li> 
                                    <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                        data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false"
                                        aria-controls="collapseBrand">
                                        <span class="link__icon text-gray-27 bg-white">
                                            <span class="link__icon-inner">+</span>
                                        </span>
                                        <span class="link-collapse__default3">Show more</span>
                                        <span class="link-collapse__active3">Show less</span>
                                    </a>
                                </li>
                                <!--Code for Second category end-->
                            </ul>
                        </li>

                    </ul>
                </div>

                <!--Code for Third category end-->
                @if($all_third_category_first->isNotEmpty())
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                            <li class="listing-botoms">
                                <b class="showcatlist"> Third Category</b><b class="displaycatlist openthirdcat" style="border-right: 1px solid #ccc;"> Third Category <i class="fa fa-angle-down" aria-hidden="true"></i></b>
                                <b class="displaycatlist openfilter">Filters <i class="fa fa-angle-down" aria-hidden="true"></i></b>
                                <ul class="list-unstyled dropdown-list listing_block filter showcatlist thirdcatopen">
                                    @foreach($all_third_category_first as $third)
                                        <li>
                                            <a class="dropdown-item1 {{ Request::is('service_list/'.$third->slug) ? 'active':'' }}"
                                                href="{{ route('services.servicecategory', $third->slug) }}">
                                                {{ $third->name }} ({{ $third->getServiceCount() }})
                                            </a>
                                        </li>
                                    @endforeach

                                    @if(count($all_third_category_all)>0 || $all_third_category_all != null)
                                        @foreach($all_third_category_all as $third)
                                        <li class="ml-4 mb-2">
                                            <a class="text-reset fs-14  {{ Request::is('category/'.$third->slug) ? 'active':'' }}"
                                                href="{{ route('services.servicecategory', $third->slug) }}">
                                                {{ $third->name }} ({{ $third->getServiceCount() }})
                                            </a>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endif
                <!--Code for Third category end-->

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
                            <article class="content-entry open">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Brands <i></i></h4>
                                <div class="accordion-content" style="display:block;">
                                    <div class="border-topsd">
                                        @foreach ($filter_brand_data as $brand)
                                            <div class="form-group align-items-centerbrand justify-content-between mb-2 pb-1 form-relative">
                                                <div class="custom-control custom-checkbox posrel">
                                                    <input name="brand[]" value="{{ $brand->slug }}"
                                                        type="checkbox" class="brand custom-control-input"
                                                        id="brand{{$brand->id}}" @isset($brand_id)
                                                        @if($brand_id==$brand->id) checked @endif @endisset>
                                                    <label class="custom-control-label" for="brand{{$brand->id}}">
                                                        {{ $brand->getTranslation('name') }} ({{ $brand->categoryWiseServiceCount($catName->id, $catName->level) }})
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        <span class="showoffer" id="showbrand">+Show More</span>
                                        <span class="hideoffer" id="hidebrand">−Show Less</span>
                                    </div>
                                </div>
                            </article>

                            @foreach ($attributes as $attribute)
                                <article class="content-entry">
                                    <h4 class="font-size-14 mb-3 font-weight-bold article-title">
                                        {{ translate('Filter by')}} {{ $attribute->getTranslation('name') }} 
                                        <i></i>
                                    </h4>
                                    <div class="accordion-content">
                                        <div class="border-topsd">
                                            <div class="border-bott">
                                                <!-- Checkboxes -->
                                                @foreach ($attribute_choice_value_list as $attribute_value)
                                                    @if($attribute_value['attribute_id'] == $attribute->id)
                                                    <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                        <div class="custom-control custom-checkbox posrel">
                                                            <input id="checkbox_24{{$sr_number1++}}"
                                                                class="attribute custom-control-input" type="checkbox"
                                                                name="selected_attribute_values[]"
                                                                value="{{ $attribute_value['value'] }}"
                                                                @if (in_array($attribute_value['value'], $selected_attribute_values)) checked @endif >

                                                            <label class="custom-control-label" for="checkbox_24{{$sr_number2++}}">
                                                                {{ $attribute_value['value'] }}
                                                                <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            <div class="slidermob"><div class="mall-slider-handles"
                                data-start="@if(\App\Models\Service::count() < 1) 0 @else {{ \App\Models\Service::min('unit_price') }} @endif"
                                data-end="@if(\App\Models\Service::count() < 1) 0 @else {{ \App\Models\Service::max('unit_price') }} @endif"
                                @if (isset($min_price)) data-min="{{ $min_price }}" @elseif($services->min('unit_price') > 0) data-min="{{ $services->min('unit_price') }}" @else data-min="0" @endif @if (isset($max_price)) data-max="{{ $max_price }}" @elseif($services->max('unit_price') >0) data-max="{{ $services->max('unit_price') }}" @else data-max="0" @endif data-max="{{ $max_price }}" data-target="price" style="width: 100%"> 
                            </div>
                            <div class="row filter-container-1">
                                <div class="col-md-4">
                                    <input class="min_price" data-min="price" id="skip-value-lower" name="min_price"
                                        value="@if(\App\Models\Service::count() < 1) 0 @else {{ \App\Models\Service::min('unit_price') }} @endif"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <input class="max_price" data-max="price" id="skip-value-upper" name="max_price"
                                        value="@if(\App\Models\Service::count() < 1) 0 @else {{ \App\Models\Service::max('unit_price') }} @endif"
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
            
                <div class="brand_product">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="deals">
                                <h3>What type of {{ $catName->name}} are you looking for?</h3>
                            </div>
                        </div>
                    </div>
                    <div class="deals">
                        <hr>
                    </div>
                           
                    <div class="row">
                        <div class="owl-carousel owl-theme category-slide-listing" id="master_product_list">
                            
                            @foreach($filter_selected_types as $type)
                            <div class="item showboxzoom">
                                <div class="col product-categorys product-categorys-listing">
                                    <div class="product_br">
                                        <input type="radio" id="first_cat_radio_{{$type->id}}" value="{{$type->id}}" name="master_service_id" class="master_service_id">
                                        <a><label for="first_cat_radio_{{$type->id}}">
                                            <img src="{{uploaded_asset($type->icon)}}" alt="{{$type->name}}">
                                            <h3>{{$type->name}}</h3>
                                        </label></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div> 
                    </div>
                </div>
                           
                           
                <div class="head-cnt work-center text-left" style="margin-bottom:20px;">
                    <div class="bounceIn animated">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>
                                    @if(isset($category_id))
                                    Showing results for "{{ $catName->name}}"
                                    @elseif(isset($query))
                                    {{ translate('Search result for ') }}"{{ $query }}"
                                    @else
                                    {{ translate('All Services') }}
                                    @endif
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
               
                <div id="load_service_data" class="row">
                    
                </div>

                <div class="pagination">
                    
                </div>

                <div id="load_data_message"></div>
            </div>

            <!-- End Brand Carousel -->
        </div>
        <!-- </form> -->
    </div>

    <section class="banner-brand_product">
        <div class="container">
            <div class="service-pros" style="padding:0px;margin:0px;">
                <div class="head-cnt work-center text-center" style="    margin: 0px; height: 0px;">
                    <div class="bounceIn animated">
                        <h4>Why Buy Product From eBuildBazaar?</h4>
                    </div>
                </div>
            </div>

            <div class="brandss1">
                <div class="row">
                    <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon1.png')}}" alt="">
                            <h3>All Under One roof</h3>
                            <p>Ebuildbazaar Stores from others is their pricing.</p>
                        </a></div>
                    <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon2.png')}}" alt="">
                            <h3>Widest Product Range</h3>
                            <p>Ebuildbazaar Stores from others is their pricing.</p>
                        </a></div>
                    <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon3.png')}}" alt="">
                            <h3>On Time Delivery</h3>
                            <p>Ebuildbazaar Stores from others is their pricing.</p>
                        </a></div>
                    <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon4.png')}}" alt="">
                            <h3>Product Knowledge Support</h3>
                            <p>Ebuildbazaar Stores from others is their pricing.</p>
                        </a></div>
                    <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon5.png')}}" alt="">
                            <h3>Genuine Products</h3>
                            <p>Ebuildbazaar Stores from others is their pricing.</p>
                        </a></div>
                    <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon6.png')}}" alt="">
                            <h3>365 Days Wholesale Rates</h3>
                            <p>Ebuildbazaar Stores from others is their pricing.</p>
                        </a></div>
                </div>
            </div>
        </div>
    </section>
</div>  

<div id="myQuoteModal" class="modal fade prolidneis in" role="dialog">
    <div class="modal-dialog" id="modal-dialog45">
        <div class="modal-content">
        <div class="modal-header">
                        <div class="box-soldid1back box-soldid2" style="height:25px;">&nbsp;
                        </div>
                        <button type="button" class="close">×</button>
                    </div>
            
            <div class="modal-body">
                <div class="form_section pt-0 pb-0">
                    <form method="post" action="{{ route('service_orders.quotation')}}" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                       @csrf
                       <div class="row form_modal_body">
                          
     
                       </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="myAskPriceModal" class="modal fade prolidneis in" role="dialog">
    <div class="modal-dialog" id="modal-dialog45">
        <div class="modal-content">
        <div class="modal-header">
                        <div class="box-soldid1back box-soldid2" style="height:25px;">&nbsp;
                        </div>
                        <button type="button" class="close">×</button>
                    </div>
            
            <div class="modal-body">
                <div class="form_section pt-0 pb-0">
                    <form method="post" action="{{ route('service_enquiry.insertServiceEnquiry')}}" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                       @csrf
                       <div class="row ask_price_modal_body">
     
                          
     
                       </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
   
    
<script type="text/javascript">
    $(document).ready(function() {
        var ckbox = $("input[name='service_id']");
        var chkId = '';
        $('input').on('click', function() {
            if (ckbox.is(':checked')) {
            $("input[name='service_id']:checked").each ( function() {
                chkId = $(this).val() + ",";
                chkId = chkId.slice(0, -1);
            });
            
            //alert ( $(this).val() ); // return all values of checkboxes checked
            //$('#adid')$(this).val();
            $('#adid').val(chkId);
            //alert(chkId); // return value of checkbox checked
            }     
        });
    });
    
    // product Filter start here
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
        //price range fonction End

        // using for onload page
        var page = 1;
        var brand_array = get_brand_array();
        onChageLoadData(page, brand_array);

        // Used for get page number from pagination
        function urlParam(name, url_link){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(url_link);
            if (results==null) {
            return null;
            }
            return decodeURI(results[1]) || 0;
        }

        // Used for get data from pagiantion link
        $('body').on('click', '.pagination a', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            // using urlParam function  
            var page = urlParam('page', url);
            get_common_filter_function(page);

        });
    
        var i = 0; // globally defined for array used in filter :  Don't remove this line

        // Return checked brands in array 
        function get_brand_array(){
            var brand_arr = [];
            $('.brand:checked').each(function () {
                brand_arr[i++] = $(this).val();
            });
            brand_arr = brand_arr.filter(function( element ) {
                return element !== undefined;
            });
            return brand_arr;
        }

        // Return checked attributes in array 
        function get_attribute_array(){
            var attribute_arr = [];
            $('.attribute:checked').each(function () {
                attribute_arr[i++] = $(this).val();
            });
            attribute_arr = attribute_arr.filter(function( element ) {
                return element !== undefined;
            });
            return attribute_arr;
        }

        // common function for every filter
        function get_common_filter_function(page){
            var brand_arr = get_brand_array();
            var attribute_arr = get_attribute_array();
            var sort_by = $('.sort_by').val();
            var min_price = $('.min_price').val();
            var max_price = $('.max_price').val();
            var master_service_id = $("input[name='master_service_id']:checked").val();

            console.log("master_service_id : "+master_service_id);

            onChageLoadData(page, brand_arr, attribute_arr, sort_by, min_price, max_price, master_service_id);
        }

        // Brand wise filter 
        $('.brand').change(function() {
            get_common_filter_function();
        });

        $('.master_service_id').change(function() {
            get_common_filter_function();
        });

        //Attribute wise filter
        $(".attribute").change(function () {
            get_common_filter_function();
        });

        // Brand wise filter 
        $('.sort_by').change(function() {
            get_common_filter_function();
        });

        // Common ajax for all filter
        function onChageLoadData(page, brand, attribute, sort_by, min_price, max_price, master_service_id){
            console.log("I am load data");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: "{{ route('get_filtered_services1') }}",
                method: "get",
                data: {
                    slug: "{{$latestslug}}",
                    page: page,
                    brand: brand,
                    attribute: attribute,
                    sort_by: sort_by,
                    min_price: min_price,
                    max_price: max_price,
                    master_service_id: master_service_id,
                },
                success: function(result){
                    console.log(result);
                    if(result.status == true){
                        $('#load_service_data').html(result.data.output); 
                    }
                }
            });
        }

    });
    // product Filter end here

    // script for add to cart
    $(document).ready(function () {
        $(document).on('click', '.addToServiceCart', function () {
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.input-number').val();
            var product_price = $(this).closest('.product_data').find('.prod_price').val();
            var serv_prod_name = $(this).closest('.product_data').find('.serv_prod_name').val();
            var serv_prod_img = $(this).closest('.product_data').find('.serv_prod_img').val();
            $(".printproname").text(serv_prod_name);
            $(".printproimg").attr("src",serv_prod_img);
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{url('service-add-to-cart')}}',
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                    'product_price': product_price,
                },
                success: function (response) {
                    // toastr.info(response.status);
                    updateServiceNavCart(response.service_nav_cart_view, response.service_cart_count, response.service_sum_cart_count);
                    $('#product-box').html(response.product_box_view);
                    serviceCartModal();  //this function is in master.blade.php
                }
            });
        });

        $(document).on('click', '.quoteModal', function (){
            var service_id = $(this).data('id');

            // AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url('service_modal_details')}}',
                type: 'post',
                data: {service_id: service_id},
                success: function(response){ 
                    // Add response in Modal body
                    $('.form_modal_body').html(response.data);
                    // Display Modal
					
                    $('#myQuoteModal').modal('show'); 
					
					$("#myQuoteModal").addClass("fadeshow");
					
                }
            });

        });
		
	

        $(document).on('click', '.askPriceModal', function (){
            var service_id = $(this).data('id');

            // AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url('service_ask_price_modal')}}',
                type: 'post',
                data: {service_id: service_id},
                success: function(response){ 
                    // Add response in Modal body
                    $('.ask_price_modal_body').html(response.data);
                    // Display Modal
                    $('#myAskPriceModal').modal('show'); 
					
					$("#myAskPriceModal").addClass("fadeshow");
                }
            });

        });

    });

 

    function updateNavCart(view, count, amount) {
        $('.cart-count').html(count);
        $('#cart_items').html(view);
        $('.cart-amount').html(amount);
    }
    
    function updateServiceNavCart(view, count, amount) {
        $('.service_cart-count').html(count);
        $('#service_cart_items').html(view);
        $('.service_cart-amount').html(amount);
    }
</script>


<script id="rendered-js" >
function numberOnly(id) {
  var element = document.getElementById(id);
  element.value = element.value.replace(/[^0-9]/gi, "");
}
//# sourceURL=pen.js
    </script>
@endsection