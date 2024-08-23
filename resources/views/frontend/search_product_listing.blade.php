@extends('frontend.master')

@section('content')

<!-- Price nouislider-filter cdn -->
<link rel="stylesheet" href="{{static_asset('assets_web/css/nouislider.css')}}" />

<script src="{{static_asset('assets_web/js/nouislider.min.js')}}" type="text/javascript"></script>

<section class="pageTitle" style="background-image:url({{static_asset('assets_web/img/small_banner.jpg')}});">
</section>
<!--top banner end -->
<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 breadmcrumsize">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translate('Home')}}</a></li>
                        @if(!isset($category_id))
                        <li class="breadcrumb-item"><a href="{{ route('search') }}">{{ translate('All Categories')}}</a>
                        </li>
                        @else
                        <li class="breadcrumb-item"><a href="{{ route('search') }}">{{ translate('All Categories')}}
                            </a></li>
                        @endif
                        @if(isset($category_id))
                        <li class="breadcrumb-item active"><a
                                href="{{ route('products.category', \App\Models\Category::find($category_id)->slug) }}">{{
                                \App\Models\Category::find($category_id)->getTranslation('name') }}</a></li>

                        @endif --}}

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div id="product-box" class="container details-product product-catpro ">
    <form action="" method="GET">
        <div class="row">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6 mrgnbot10 showcatlist">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">

                    @if($type == "Product")
                        @foreach ($first_product_categories as $key => $category)
                            <li class="link-category link-category1aa">
                                <div id="accordion" class="accordion-container">
                                    <article class="content-entry">
                                        <h4 class="article-title">
                                            <a class="dropdown-toggle1 dropdown-toggle-collapse1" href="javascript:;"
                                                role="button">
                                                {{ $category->name }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                                <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                                            </a>
                                        </h4>
                                        <div class="accordion-content">
                                            <div class="link-categoryx link-category1az ">
                                                <ul class="list-unstyled dropdown-list">
                                                    @foreach ($second_product_categories as $key => $first_level_id)
                                                        @if($first_level_id->parent_id == $category->id)
                                                            <li>
                                                                <a class="dropdown-item1 {{ Request::is('category/'.$first_level_id->slug) ? 'active':'' }}"
                                                                    href="{{ route('products.category', $first_level_id->slug) }}">{{ $first_level_id->name }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </li>
                        @endforeach
                    @else
                        @foreach ($first_service_categories as $key => $category)
                            <li class="link-category link-category1aa">
                                <div id="accordion" class="accordion-container">
                                    <article class="content-entry">
                                        <h4 class="article-title">
                                            <a class="dropdown-toggle1 dropdown-toggle-collapse1" href="javascript:;"
                                                role="button">
                                                {{ $category->name }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                                <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                                            </a>
                                        </h4>
                                        <div class="accordion-content">
                                            <div class="link-categoryx link-category1az ">
                                                <ul class="list-unstyled dropdown-list">
                                                    @foreach ($second_service_categories as $key => $first_level_id)
                                                        @if($first_level_id->parent_id == $category->id)
                                                            <li>
                                                                <a class="dropdown-item1 {{ Request::is('service_list/'.$first_level_id->slug) ? 'active':'' }}"
                                                                    href="{{ route('services.servicecategory', $first_level_id->slug) }}">{{ $first_level_id->name }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    
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
                            <article class="content-entry open">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">Brands <i></i></h4>
                                <div class="accordion-content" style="display:block;">
                                    <div class="border-topsd">
                                        @foreach ($first_brands as $brand)
                                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="brand[]" value="{{ $brand->slug }}"
                                                        type="checkbox" class="brand custom-control-input"
                                                        id="brand{{$brand->id}}" @isset($brand_id)
                                                        @if($brand_id==$brand->id) checked @endif @endisset>
                                                    <label class="custom-control-label" for="brand{{$brand->id}}">{{
                                                        $brand->getTranslation('name') }}
                                                        <span class="text-gray-25 font-size-12 font-weight-normal"> </span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- End Checkboxes -->
                                        <!-- View More - Collapse -->
                                        <div class="collapses" id="collapseBrand1">
                                            @foreach ($allbrands as $brand)
                                            <div
                                                class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="brand[]" value="{{ $brand->slug }}"
                                                        type="checkbox" class="brand custom-control-input"
                                                        id="brand{{$brand->id}}" @isset($brand_id) @if ($brand_id==$brand->id) checked @endif @endisset>
                                                    <label class="custom-control-label" for="brand{{$brand->id}}">{{
                                                        $brand->getTranslation('name') }}
                                                        <span class="text-gray-25 font-size-12 font-weight-normal">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                        <!-- End View More - Collapse -->
                                        <!-- Link -->
                                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                            data-toggle="collapse" href="#collapseBrand" role="button"
                                            aria-expanded="false" aria-controls="collapseBrand">
                                            <span class="link__icon text-gray-27 bg-white">
                                                <span class="link__icon-inner">+</span>
                                            </span>
                                            <span class="link-collapse__default">Show more</span>
                                            <span class="link-collapse__active">Show less</span>
                                        </a>
                                    </div>
                                </div>
                            </article>

                            @if (get_setting('color_filter_activation'))
                                <article class="content-entry">
                                    <h4 class="font-size-14 mb-3 font-weight-bold article-title"> 
                                        {{translate('Filter by color')}} 
                                    </h4>
                                    <div class="accordion-content">
                                        <div class="border-topsd">
                                            <div class="border-bott">
                                                <!-- Checkboxes -->
                                                @foreach ($first_five_color as $key => $color)
                                                    <div class="form-group  align-items-center justify-content-between mb-2 pb-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="color custom-control-input"
                                                                id="color{{$color->id}}" name="color[]" value="{{ $color->code }}"
                                                                @if(isset($selected_color) &&
                                                                $selected_color==$color->code) checked @endif
                                                            >
                                                            <label class="custom-control-label"
                                                                for="color{{$color->id}}">{{$color->name}}
                                                                <span
                                                                    class="text-gray-25 font-size-12 font-weight-normal"></span>
                                                                <span class="mx-auto color_code">
                                                                    <div style="background-color:{{$color->code}}"
                                                                        class="w-100 h-100">
                                                                    </div>
                                                                </span></label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <!-- End Checkboxes -->

                                                <!-- View More - Collapse -->
                                                <div class="collapses2" id="collapseBrand1">
                                                    @foreach ($colors as $key => $color)
                                                    <div class="form-group  align-items-center justify-content-between mb-2 pb-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="color custom-control-input"
                                                                id="color{{$color->id}}" name="color"
                                                                value="{{ $color->code }}" 
                                                                @if(isset($selected_color) && $selected_color==$color->code) checked @endif >
                                                            <label class="custom-control-label"
                                                                for="color{{$color->id}}">{{$color->name}} <span
                                                                    class="text-gray-25 font-size-12 font-weight-normal"></span>
                                                                <span class="mx-auto color_code">
                                                                    <div style="background-color:{{$color->code}}"
                                                                        class="w-100 h-100">
                                                                    </div>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <!-- End View More - Collapse -->

                                                <!-- Link -->
                                                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                                    data-toggle="collapse" href="#collapseColor" role="button"
                                                    aria-expanded="false" aria-controls="collapseColor">
                                                    <span class="link__icon text-gray-27 bg-white">
                                                        <span class="link__icon-inner">+</span>
                                                    </span>
                                                    <span class="link-collapse__default2">Show more</span>
                                                    <span class="link-collapse__active2">Show less</span>
                                                </a>
                                                <!-- End Link -->
                                            </div>
                                        </div>
                                    </div>

                                </article>
                            @endif

                            {{-- @foreach ($attributes as $attribute)
                                <article class="content-entry">
                                    <h4 class="font-size-14 mb-3 font-weight-bold article-title">
                                        {{ translate('Filter by')}} {{ $attribute->getTranslation('name') }} 
                                        <i></i>
                                    </h4>
                                    <div class="accordion-content">
                                        <div class="border-topsd">
                                            <div class="border-bott">
                                                <!-- Checkboxes -->
                                                @foreach ($attribute->attribute_values as $attribute_value)
                                                    <div class="form-group align-items-center justify-content-between mb-2 pb-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input id="checkbox_24{{$attribute_value->id}}"
                                                                class="attribute custom-control-input" type="checkbox"
                                                                name="selected_attribute_values[]"
                                                                value="{{ $attribute_value->value }}"
                                                                @if (in_array($attribute_value->value, $selected_attribute_values)) checked @endif >

                                                            <label class="custom-control-label" for="checkbox_24{{$attribute_value->id}}">
                                                                {{ $attribute_value->value }}
                                                                <span class="text-gray-25 font-size-12 font-weight-normal"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach --}}


                            <div class="slidermob"><div class="mall-slider-handles"
                                data-start="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif"
                                data-end="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::max('unit_price') }} @endif"
                                @if (isset($min_price)) data-min="{{ $min_price }}" @elseif($products->min('unit_price') > 0) data-min="{{ $products->min('unit_price') }}" @else data-min="0" @endif @if (isset($max_price)) data-max="{{ $max_price }}" @elseif($products->max('unit_price') >0) data-max="{{ $products->max('unit_price') }}" @else data-max="0" @endif data-max="{{ $max_price }}" data-target="price" style="width: 100%"> 
                            </div>
                            <div class="row filter-container-1">
                                <div class="col-md-4">
                                    <input class="min_price" data-min="price" id="skip-value-lower" name="min_price"
                                        value="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <input class="max_price" data-max="price" id="skip-value-upper" name="max_price"
                                        value="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::max('unit_price') }} @endif"
                                        readonly>
                                </div>
                                <!-- <div class="col-md-4">
                                    <button type="submit" class="btn btn-sm">Filter</button>
                                </div> -->
                            </div>
                            
                            </div>
                        </div>
                    </div> 
                    <!-- filter code end here -->

                    {{-- <div class="border-bott">    
                        @include('frontend.partials.category_enquiry_form')
                    </div> --}}
                </div>
            </div>

            <div class="col-xl-9 col-wd-9gdot5">
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
                                    {{ translate('All Products') }}
                                    @endif
                                </h5>
                            </div>

                            <div class="col-md-3">
                                <div class="d-flex sortby">
                                    <label class="mb-0 opacity-50 w-20">{{ translate('Sort by')}}</label>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <select class="sort_by form-control form-control-sm aiz-selectpicker sortbytxt"
                                        name="sort_by">
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
                    </div>
                </div>
                <div id="load_product_data" class="row"> </div>

                <div id="load_data_message"></div>
            </div>
            <!-- End Brand Carousel -->
        </div>
    </form>
</div>
<section class="banner-brand_product">
   <div class="container">
      <div class="service-pros" style="padding:0px;margin:0px;">
         <div class="head-cnt work-center text-center" style="    margin: 0px; height: 0px;">
            <div class="bounceIn animated">
               <h4>Why Buy Product From {{ env('APP_NAME') }}?</h4>
            </div>
         </div>
      </div>

      <div class="brandss1">
         <div class="row">
            <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon1.png')}}" alt="">
                  <h3>All Under One roof</h3>
                  <p>{{ env('APP_NAME') }} Stores from others is their pricing.</p>
               </a></div>
            <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon2.png')}}" alt="">
                  <h3>Widest Product Range</h3>
                  <p>{{ env('APP_NAME') }} Stores from others is their pricing.</p>
               </a></div>
            <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon3.png')}}" alt="">
                  <h3>On Time Delivery</h3>
                  <p>{{ env('APP_NAME') }} Stores from others is their pricing.</p>
               </a></div>
            <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon4.png')}}" alt="">
                  <h3>Product Knowledge Support</h3>
                  <p>{{ env('APP_NAME') }} Stores from others is their pricing.</p>
               </a></div>
            <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon5.png')}}" alt="">
                  <h3>Genuine Products</h3>
                  <p>{{ env('APP_NAME') }} Stores from others is their pricing.</p>
               </a></div>
            <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon6.png')}}" alt="">
                  <h3>365 Days Wholesale Rates</h3>
                  <p>{{ env('APP_NAME') }} Stores from others is their pricing.</p>
               </a></div>
         </div>
      </div>
   </div>
</section>

 


@endsection

@section('script')
<script type="text/javascript">
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

                    get_common_filter_function(values[0], values[1]);
                });
            })
            
        }
        //price range fonction End
        
        var page = 1;
       // Used for get page number from pagination
        function urlParam(name, url_link){
            console.log("I am url");
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

        i = 0; // globally defined for array used in filter :  Don't remove this line

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

        // Return checked colors in array 
        function get_color_array(){
            var color_arr = [];
            $('.color:checked').each(function () {
                color_arr[i++] = $(this).val();
            });
            color_arr = color_arr.filter(function( element ) {
                return element !== undefined;
            });
            return color_arr;
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
            var color_arr = get_color_array();
            var attribute_arr = get_attribute_array();
            var sort_by = $('.sort_by').val();
            var min_price = $('.min_price').val();
            var max_price = $('.max_price').val();
            var type = $('#type').val();

            onChageLoadData(page, type, brand_arr, color_arr, attribute_arr, sort_by, min_price, max_price);
        }

        // Brand wise filter 
        $('.brand').change(function() {
            get_common_filter_function();
        });

        get_common_filter_function();
        // Color wise filter
        $(".color").change(function () {
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
        function onChageLoadData(page, type, brand, color, attribute, sort_by, min_price, max_price){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            var keyword = $('#searchid').val();
            if(type == "Product"){
                var set_url = "{{ route('get_search_filtered_products') }}";
            }else{
                var set_url = "{{ route('get_search_filtered_services') }}";
            }

            jQuery.ajax({
                url: set_url,
                method: "get",
                data: {
                    keyword: keyword,
                    page: page,
                    brand: brand,
                    color: color,
                    attribute: attribute,
                    sort_by: sort_by,
                    min_price: min_price,
                    max_price: max_price,
                    type: type,
                },
                success: function(result){
                    // console.log (result.product_lists);
                    if(result.status == true){
                        $('#load_product_data').html(result.data);
                    }
                }
            });
        }

    });
    // product Filter end here

    // script for add to product cart
    $(document).ready(function () {
        $(document).on('click', '.addToCartUButton', function () {
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.input-number').val();
            var product_price = $(this).closest('.product_data').find('.prod_price').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{url('add-to-cart')}}',
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                    'product_price': product_price,
                },
                success: function (response) {
                    toastr.info(response.status);
                    updateNavCart(response.nav_cart_view, response.cart_count, response.sum_cart_count);
                    $('#product-box').html(response.product_box_view);
                }
            });
        });
    });

    // script for open service modal
    $(document).ready(function () {
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

    function filter(limit, start) {
      var full_url = $(location).attr('href');
            var path = $(location).attr('pathname');
            console.log("Url : " + full_url);
            console.log("path : " + path);

            var appUrl = "{{env('APP_URL')}}";
            var split_url = appUrl + "/category/";
            var get_slug = full_url.split(split_url);
            var slug_trimed = get_slug.toString().replace(/(^,)|(,$)/g, '');

            // var minimum_price = document.getElementById("skip-value-lower");
            // var maximum_price = document.getElementById("skip-value-upper");
            // var brand = document.getElementsByClassName("brand");
            var brand = get_product('brand');
            // var category = get_product('category');

            // console.log("min price :" + minimum_price);
            // console.log("max price :" + maximum_price);
            console.log("Brand slug: " + brand);
            console.log("get_slug url : " + slug_trimed);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: ENDPOINT + "/get_filtered_products",
                method: "GET",
                data: {
                    limit: limit,
                    start: start,
                    slug: slug_trimed,
                    brand: brand,
                },
                cache: false,
                success: function (data) {
                    if (data == '') {
                        $('#load_data_message').html(
                            '<h3 class="text-center text-danger">No More Products Found!</h3>');
                            action = 'active';
                    } else {
                        $('#load_product_data').append(data);
                        $('#load_data_message').html("");
                        action = 'inactive';
                        // console.log(data.products);
                    }
                }
            })
      
        //$('#search-form').submit();
    }
    
    function rangefilter(arg) {
        $('input[name=min_price]').val(arg[0]);
        $('input[name=max_price]').val(arg[1]);
        filter();
    }
</script>


@endsection