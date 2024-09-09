@extends('frontend.master')

{{-- @if (isset($category_id))
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
@endsection --}}

@section('content')
 
<!-- Price nouislider-filter cdn -->
<link rel="stylesheet" href="{{static_asset('assets_web/css/nouislider.css')}}" />

<script src="{{static_asset('assets_web/js/nouislider.min.js')}}" type="text/javascript"></script>

</section>
<!--top banner end -->

 <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                         @if(!isset($category_id))
							 <h2>All Categories</h2>
						  @else
							  <h2>All Categories</h2>
						  @endif
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{ \App\Models\Category::find($category_id)->getTranslation('name') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
	
	
<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 breadmcrumsize">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translate('Home')}}</a></li>
                        @if(!isset($category_id))
                        <li class="breadcrumb-item">
                            <a href="{{ route('search') }}">{{ translate('All Categories')}}</a>
                        </li>
                        @else
                        <li class="breadcrumb-item">
                            <a href="{{ route('search') }}">{{ translate('All Categories')}}</a>
                        </li>
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

<!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-custom-3 wow fadeInUp">
                    <div class="left-box">
                        <div class="shop-left-sidebar">
                            <div class="back-button">
                                <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                            </div>

                            <div class="accordion custom-accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne">
                                            <span>Categories</span>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="form-floating theme-form-floating-2 search-box">
                                                <input type="search" class="form-control" id="search"
                                                    placeholder="Search ..">
                                                <label for="search">Search</label>
                                            </div>

                                            <ul class="category-list custom-padding custom-height">
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="fruit">
                                                        <label class="form-check-label" for="fruit">
                                                            <span class="name">Fruits & Vegetables</span>
                                                            <span class="number">(15)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="cake">
                                                        <label class="form-check-label" for="cake">
                                                            <span class="name">Bakery, Cake & Dairy</span>
                                                            <span class="number">(12)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="behe">
                                                        <label class="form-check-label" for="behe">
                                                            <span class="name">Beverages</span>
                                                            <span class="number">(20)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="snacks">
                                                        <label class="form-check-label" for="snacks">
                                                            <span class="name">Snacks & Branded Foods</span>
                                                            <span class="number">(05)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="beauty">
                                                        <label class="form-check-label" for="beauty">
                                                            <span class="name">Beauty & Household</span>
                                                            <span class="number">(30)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="pets">
                                                        <label class="form-check-label" for="pets">
                                                            <span class="name">Kitchen, Garden & Pets</span>
                                                            <span class="number">(50)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="egg">
                                                        <label class="form-check-label" for="egg">
                                                            <span class="name">Eggs, Meat & Fish</span>
                                                            <span class="number">(19)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="food">
                                                        <label class="form-check-label" for="food">
                                                            <span class="name">Gourment & World Food</span>
                                                            <span class="number">(30)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="care">
                                                        <label class="form-check-label" for="care">
                                                            <span class="name">Baby Care</span>
                                                            <span class="number">(20)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="fish">
                                                        <label class="form-check-label" for="fish">
                                                            <span class="name">Fish & Seafood</span>
                                                            <span class="number">(10)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="marinades">
                                                        <label class="form-check-label" for="marinades">
                                                            <span class="name">Marinades</span>
                                                            <span class="number">(05)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="lamb">
                                                        <label class="form-check-label" for="lamb">
                                                            <span class="name">Mutton & Lamb</span>
                                                            <span class="number">(09)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="other">
                                                        <label class="form-check-label" for="other">
                                                            <span class="name">Port & other Meats</span>
                                                            <span class="number">(06)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="pour">
                                                        <label class="form-check-label" for="pour">
                                                            <span class="name">Pourltry</span>
                                                            <span class="number">(01)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="salami">
                                                        <label class="form-check-label" for="salami">
                                                            <span class="name">Sausages, bacon & Salami</span>
                                                            <span class="number">(03)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                            <span>Food Preference</span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="category-list custom-padding">
                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox" id="veget">
                                                        <label class="form-check-label" for="veget">
                                                            <span class="name">Vegetarian</span>
                                                            <span class="number">(08)</span>
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
                        
                        @foreach ($attributes as $attribute)
                            <article class="content-entry">
                                <h4 class="font-size-14 mb-3 font-weight-bold article-title">
                                   <strong> {{ translate('Filter by')}} {{ $attribute->getTranslation('name') }} 
                                    <i></i></strong>
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

                        <!-- Price range fixed by Rana Sharma -->
                        <div class="slidermob mt-3">
                            <div class="mall-slider-handles"
                                data-start="@if(\App\Models\Product::count() < 1) 0 @else {{ $min_price_value }} @endif"
                                data-end="@if(\App\Models\Product::count() < 1) 0 @else {{ $max_price_value }} @endif"
                                
                                @if (isset($min_price_value)) data-min="{{ $min_price_value }}" 
                                @elseif($min_price > 0) data-min="{{ $min_price }}" 
                                @else data-min="0" 
                                @endif 
                                @if (isset($max_price_value)) data-max="{{ $max_price_value }}" 
                                @elseif($max_price >0) data-max="{{ $max_price }}" 
                                @else data-max="0" 
                                @endif 
                                data-max="{{ $max_price_value }}" 
                                data-target="price" style="width: 100%"> 

                            </div>
                            <div class="row filter-container-1">
                                <div class="col-md-4">
                                    <input class="min_price" data-min="price" id="skip-value-lower" name="min_price"
                                        value="@if(\App\Models\Product::count() < 1) 0 @else {{$min_price_value}} @endif"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <input class="max_price" data-max="price" id="skip-value-upper" name="max_price"
                                        value="@if(\App\Models\Product::count() < 1) 0 @else {{$max_price_value}} @endif"
                                        readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- filter code end here -->     

                             
                        </div>
                    </div>
                </div>

                <div class="col-custom- wow fadeInUp">
                    <div class="show-button">
                        <div class="filter-button-group mt-0">
                            <div class="filter-button d-inline-block d-lg-none">
                                <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                            </div>
                        </div>

                        <div class="top-filter-menu">
                            <div class="category-dropdown">
                                <h5 class="text-content">Sort By :</h5>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown">
                                        <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" id="pop" href="javascript:void(0)">Popularity</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="low" href="javascript:void(0)">Low - High
                                                Price</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="high" href="javascript:void(0)">High - Low
                                                Price</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="rating" href="javascript:void(0)">Average
                                                Rating</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="aToz" href="javascript:void(0)">A - Z Order</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="zToa" href="javascript:void(0)">Z - A Order</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" id="off" href="javascript:void(0)">% Off - Hight To
                                                Low</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="grid-option d-none d-md-block">
                                <ul>
                                    <li class="three-grid">
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-3.svg" class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn d-xxl-inline-block d-none active">
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-4.svg"
                                                class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid.svg"
                                                class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/list.svg" class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="load_product_data" class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
					{{--<div>
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/2.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name">Vegetable</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                        </a>
                                        <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.
                                            Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly
                                            cheese macaroni cheese croque monsieur.</p>
                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault10">
                                                        <label class="form-check-label" for="flexCheckDefault10">
                                                            <span class="name">1 to 1.2 kg</span>
                                                            <span class="number">(06)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault11">
                                                        <label class="form-check-label" for="flexCheckDefault11">
                                                            <span class="name">2 x 24 pcs Multipack</span>
                                                            <span class="number">(03)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault12">
                                                        <label class="form-check-label" for="flexCheckDefault12">
                                                            <span class="name">2x6 pcs Multipack</span>
                                                            <span class="number">(04)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault13">
                                                        <label class="form-check-label" for="flexCheckDefault13">
                                                            <span class="name">4x6 pcs Multipack</span>
                                                            <span class="number">(05)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault14">
                                                        <label class="form-check-label" for="flexCheckDefault14">
                                                            <span class="name">5x6 pcs Multipack</span>
                                                            <span class="number">(09)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault15">
                                                        <label class="form-check-label" for="flexCheckDefault15">
                                                            <span class="name">Combo 2 Items</span>
                                                            <span class="number">(10)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault16">
                                                        <label class="form-check-label" for="flexCheckDefault16">
                                                            <span class="name">Combo 3 Items</span>
                                                            <span class="number">(14)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault17">
                                                        <label class="form-check-label" for="flexCheckDefault17">
                                                            <span class="name">2 pcs</span>
                                                            <span class="number">(19)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault18">
                                                        <label class="form-check-label" for="flexCheckDefault18">
                                                            <span class="name">3 pcs</span>
                                                            <span class="number">(14)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault19">
                                                        <label class="form-check-label" for="flexCheckDefault19">
                                                            <span class="name">2 pcs Vacuum (140 g to 180 g each
                                                                )</span>
                                                            <span class="number">(13)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault20">
                                                        <label class="form-check-label" for="flexCheckDefault20">
                                                            <span class="name">4 pcs</span>
                                                            <span class="number">(18)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault21">
                                                        <label class="form-check-label" for="flexCheckDefault21">
                                                            <span class="name">4 pcs Vacuum (140 g to 180 g each
                                                                )</span>
                                                            <span class="number">(07)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault22">
                                                        <label class="form-check-label" for="flexCheckDefault22">
                                                            <span class="name">6 pcs</span>
                                                            <span class="number">(09)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault23">
                                                        <label class="form-check-label" for="flexCheckDefault23">
                                                            <span class="name">6 pcs carton</span>
                                                            <span class="number">(11)</span>
                                                        </label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 m-0 category-list-box">
                                                        <input class="checkbox_animated" type="checkbox"
                                                            id="flexCheckDefault24">
                                                        <label class="form-check-label" for="flexCheckDefault24">
                                                            <span class="name">6 pcs Pouch</span>
                                                            <span class="number">(16)</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <label style="white-space:nowrap;" class="mb-0 opacity-50 w-20">{{ translate('Sort by')}}</label>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <select class="sort_by form-control form-control-sm aiz-selectpicker sortbytxt"
                                    name="sort_by">
                                    <option value="default" @isset($sort_by) @if ($sort_by=='default' ) selected
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
                </div>
            </div>
           
		    

            <div id="load_product_data" class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                
            </div>

            <div class="pagination">
                
            </div>

            <div id="load_data_message"></div>
        </div>

    <!-- End Brand Carousel -->
    </div>
		</div>
	</section>
</div>

 

<script type="text/javascript">
    // product Filter start here
    $(document).ready(function () {
        //price range fonction start
		// alert('rana');
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
            onChageLoadData(page, brand_arr, color_arr, attribute_arr, sort_by, min_price, max_price);
        }

        // Brand wise filter 
        $('.brand').change(function() {
            get_common_filter_function();
        });

        get_common_filter_function();

        $('#reset_btn').click(function(){
            $('input[type=checkbox]').prop('checked',false);
            get_common_filter_function();
        });
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
        function onChageLoadData(page, brand, color, attribute, sort_by, min_price, max_price){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: "{{ route('get_filtered_products') }}",
                method: "get",
                data: {
                    slug: "{{$latestslug}}",
                    page: page,
                    brand: brand,
                    color: color,
                    attribute: attribute,
                    sort_by: sort_by,
                    min_price: min_price,
                    max_price: max_price,
                },
                success: function(result){
                    console.log (result);
                    if(result.status == true){
                        $('#load_product_data').html(result.data.output);
                        // $('#pagination').html(result.data.product_page_link);

                        // var quantity_value = $('.quantity').val();
                        console.log(quantity_value);
                        // if(quantity_value > 1){
                            // $('.add_cart_button_minus').prop('disabled', false);
                        // }else{
                            // $('.add_cart_button_minus').prop('disabled', true);
                        // }
                    }
                }
            });
        }

    });
    // product Filter end here

    // script for add to cart
    $(document).ready(function () {
        $(document).on('click', '.addToCartUButton', function () {
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.input-number').val();
            var product_price = $(this).closest('.product_data').find('.prod_price').val();
			var prod_name = $(this).closest('.product_data').find('.prod_name').val();
			var prod_img = $(this).closest('.product_data').find('.prod_img').val();
			$(".printproname").text(prod_name);
			$(".printproimg").attr("src",prod_img);
			//$("p").text("Hello world!");

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
                    // toastr.info(response.status);
                    updateNavCart(response.nav_cart_view, response.cart_count, response.sum_cart_count);
                    $('#product-box').html(response.product_box_view);
                }
            });
        });
    });

    // script for buy now
    $(document).ready(function () {
        $(document).on('click', '.productBuyNow', function () {
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
                url: '{{url('product-buy-now')}}',
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                    'product_price': product_price,
                },
                success: function (response) {
                    // toastr.info(response.status);
                    updateNavCart(response.nav_cart_view, response.cart_count, response.sum_cart_count);
                    $('#product-box').html(response.product_box_view);
                    setTimeout(function() {
                        /*Redirect to cart page after 1 sec*/
                        window.location.href ='{{url('cart')}}';
                    }, 1000)
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
        console.log("I am price slider");
        alert("I am price slider");

        $('input[name=min_price]').val(arg[0]);
        $('input[name=max_price]').val(arg[1]);
        filter();
    }
</script>

@endsection