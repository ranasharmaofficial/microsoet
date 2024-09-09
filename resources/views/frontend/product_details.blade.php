@extends('frontend.master')
@section('meta_title'){{ $detailedProduct->meta_title }}@stop
@section('meta_description'){{ $detailedProduct->meta_description }}@stop
@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
<meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
<meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
<meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
<meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
<meta name="twitter:label1" content="Price">
<!-- Open Graph data -->
<meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
<meta property="og:type" content="og:product" />
<meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
<meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
<meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
<meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
<meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
<meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection


@section('content')
     
	 <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                       <nav>
						{{--<ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">{{ $detailedProduct->name }}</li>
                            </ol>--}}
							
							<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="{{url('')}}"><i class="fas fa-home"></i> Home</a></li>
						  @if($get_parent_id==1)
								   <li class="breadcrumb-item"><a href="{{url('cat/'.$firstCatName->slug)}}">{{$firstCatName->name}}</a> </li>
						  @endif
						<li class="breadcrumb-item"><a href="javascript:void(0);">{{$detailedProduct->category->getTranslation('name') }}</a> </li>
						<li class="breadcrumb-item active" aria-current="page"> {{ $detailedProduct->getTranslation('name') }}</li>
					</ol>
					
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-12 position-relative">
                                        <div class="product-label-group">
                                            <div class="product-label-tag warning-label-tag">
                                                <span>Featured</span>
                                            </div>
                                        </div>
										@php
											$photos = explode(',', $detailedProduct->photos);
										@endphp
                                        <div class="product-main-1 no-arrow">
                                            @foreach ($photos as $key => $photo)
											<div>
                                                <div class="slider-image">
                                                    <img src="{{ uploaded_asset($photo) }}" id="img-1"
                                                        data-zoom-image="{{ uploaded_asset($photo) }}"
                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                </div>
                                            </div>
											@endforeach
											
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="bottom-slider-image left-slider no-arrow slick-top">
                                            @foreach ($photos as $key => $photo)
											<div>
                                                <div class="sidebar-image">
                                                    <img src="{{ uploaded_asset($photo) }}" class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
											@endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                <h4 class="name">{{ $detailedProduct->name }}</h4>
								<div class="product-rating custom-rate">
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
                                        </ul>
                                        <span class="review">23 Customer Review</span>
                                    </div>
									<div class="price-rating pricebox mt-2">
										@if(home_price($detailedProduct) != home_discounted_price($detailedProduct))
											 <div class="price w-100 mb-0 pb-0">
												<h3 class="price_actual mb-0 pb-0 price">
												   {{home_discounted_base_price($detailedProduct)}}
												   <span class="cutprice"> {{ home_base_price($detailedProduct)}}</span>
												   <span class="offertxt offer" style="border:none">You Save
													  {{format_price(home_base_price($detailedProduct, false) - home_discounted_base_price($detailedProduct, false))}}
													  (@if($detailedProduct->discount_type == "percent"){{$detailedProduct->discount}}% @else{{format_price($detailedProduct->discount)}} Flat @endif Off)
												   </span>
												</h3>
											 </div>
										@else
											 <div class="price w-100 mb-0 pb-0">
												<h3 id="total_price" class="price_actual mb-0 pb-0">
												   {{home_base_price($detailedProduct)}}
												</h3>
											 </div>
										@endif
									</div>

                                <div class="product-contain">
                                    <p>{{ $detailedProduct->short_description }}</p>
                                </div>
								@if(false)
                                <div class="product-package">
                                    <div class="product-title">
                                        <h4>Weight</h4>
                                    </div>
                                    <ul class="select-package">
                                        <li>
                                            <a href="javascript:void(0)" class="active">1/2 KG</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">1 KG</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">1.5 KG</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Red Roses</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">With Pink Roses</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="time deal-timer product-deal-timer mx-md-0 mx-auto" id="clockdiv-1"
                                    data-hours="1" data-minutes="2" data-seconds="3">
                                    <div class="product-title">
                                        <h4>Hurry up! Sales Ends In</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="days d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Days</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="hours d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Hours</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="minutes d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Min</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="seconds d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Sec</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
								@endif
@php $qty = 0;  foreach ($detailedProduct->stocks as $key => $stock) { $qty += $stock->qty; } @endphp

                                <div class="note-box product-package">
									<div class="d-block position-relative">
								<form id="option-choice-form" class="d-block w-100">
                            @csrf
									<input type="hidden" name="id" value="{{ $detailedProduct->id }}">
                           @if ($detailedProduct->choice_options != null)
                              @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                                 <div class="tab-finish pb-2">
                                    <div class="row no-gutters">
										<div class="col-sm-3">
                                          {{-- @if(count($attribute_type_arr) > 0)
                                             @foreach($attribute_type_arr as $attr) --}}
                                                {{-- <p class="ucfirst"> {{ $attr->getTranslation('name') }}: </p> --}}
                                                <p class="ucfirst"> {{ \App\Models\Attribute::find($choice->attribute_id)->getTranslation('name') }}: </p>

                                             {{-- @endforeach
                                          @endif --}}
										</div>
										<div class="col-sm-9">
											<div class="aiz-radio-inline d-flex">
                                                @foreach ($choice->values as $key => $value)
                                                   <label class="aiz-megabox pl-0 mr-2">
                                                      <input class="opacity" type="radio" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key==0) checked @endif>
                                                      <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-0 mt-0 mx-2">
                                                         {{ $value }}
                                                      </span>
                                                   </label>
                                                @endforeach
                                            </div>
										</div>
                                    </div>
                                 </div>
                              @endforeach
                           @endif

                           @if (count(json_decode($detailedProduct->colors)) > 0)
                              <div class="row no-gutters">
                                 <div class="col-sm-3">
                                    <div class="opacity-50 my-0">
                                       <h6 class="ucfirst">{{ translate('Color')}}:</h6>
                                    </div>
                                 </div>
                                 <div class="col-sm-9">
                                    <div class="aiz-radio-inline">
                                       @foreach ($color_name as $key => $color)
                                          <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" >
                                             <input class="opacity" type="radio" name="color" value="{{ $color->name }}" @if($key==0) checked @endif>
                                             <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-0 mt-0 mx-2">
                                                   <span class="size-30px d-inline-block rounded" style="background:{{ $color->code }};"></span>
                                             </span>
                                          </label>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                              <hr>
                              <span class="showoffer" id="loadMore">&plus; Show More</span>
                              <span class="hideoffer" id="showLess">&minus; Hide More</span>
                           @endif


									<!-- Quantity + Add to cart -->
									<div class="row no-gutters d-none mb-3">
										<div class="col-sm-12">
											<div class="opacity-50 my-2">
												<p class="ucfirst">{{ translate('Quantity')}}:</p>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="discrptions_button cart-add d-block cart-add1 products_list mx-2">
												<div class="input-group quantity_input mb-0">
													<div class="input-group w-100 justify-content-start align-items-center packageadd">
														<input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 m-0" data-field="quantity">
														<input type="number" step="1" min="{{ $detailedProduct->min_qty }}" max="10" value="{{ $detailedProduct->min_qty }}" name="quantity" class="quantity quantity-field border-0 text-center m-0 w-25">
														<input type="button" value="+" class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm m-0 lh-0" data-field="quantity"> </div>
												</div>
											</div>
										</div>
									</div>
								</form>

								<h4 id="" class="stockquantity">
                           @if($detailedProduct->stock_visibility_state == 'quantity')
                              <span id="available-quantity">Only {{ $qty }} Items Left!</span>
                           {{ translate('available')}}
                           @elseif($detailedProduct->stock_visibility_state == 'text' && $qty >= 1)
                              {{ translate('In Stock') }}
                           @endif
                        </h4>
						
						@php
                                 if(Auth::user() != null) {
                                    $user_id = Auth::user()->id;
                                    $temp_user_id = null;
                                    $check_product_av = App\Models\Cart::where('product_id',$detailedProduct->id)->where('user_id',$user_id)->pluck('quantity')->first();
                                 } else {
                                    $check_product_av = App\Models\Cart::where('product_id',$detailedProduct->id)->where('temp_user_id',$temp_user_id)->pluck('quantity')->first();
                                 }
                              @endphp
								<div class=" position-absolute end-0 bottom-0 justify-content-end w-75">
									<div class="discrptions_button"> </div>
								</div>
							</div>
								</div>
                                <div class="note-box product-package products_list product_data packageadd">
								 

                                    
									@if ($check_product_av=='1')
                                       <input type="button" value="&minus;" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 m-0 countnone" data-field="quantity">
                                    @else
                                       <input type="button" value="&minus;" class="button-minus add_cart_button_minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 m-0 @if($check_product_av<1) countnone @endif" data-field="quantity">
                                    @endif	
										 <input type="number" step="1" min="{{ $detailedProduct->min_qty }}" max="10" @if($check_product_av>=1) value="{{ $check_product_av }}" @else value="1" @endif name="quantity" class="quantity quantity-field border-0 text-center m-0 w-25 @if($check_product_av<1) countnone @endif input-number">
                                 <input type="button" value="&plus;" class="button-plus add_cart_button_plus border rounded-circle quantity-right-plus icon-shape icon-sm m-0 lh-0 @if($check_product_av<1) countnone @endif" data-field="quantity">
                                 <input type="hidden" value="{{$detailedProduct->id}}" class="prod_id">
                                 <input type="hidden" id="total_product_price" class="prod_price">
                                 <button onclick="addToCart()" class="addtocartbut buttonnone addtocartn mrgnlftnone btnneww w-30 @if($check_product_av>=1) countnone @endif">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    Add to Cart
                                 </button>
									</br>
                                 <button onclick="buyNow()" class="addedetoservicecart addtocartn mrgnlftnone btnneww w-70">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Buy Now {{home_discounted_base_price($detailedProduct)}}
                                    @if( home_discounted_base_price($detailedProduct, false) != home_base_price($detailedProduct, false))
                                       <strike style="font-size:11px;">{{home_base_price($detailedProduct)}}</strike>
                                       <span class="offertxt" style="border:none; font-size:11px;">
                                          {{$detailedProduct->discount}} @if($detailedProduct->discount_type == "percent") % @else Flat @endif Off
                                       </span>
                                    @endif
                                 </button>

                                  
								 
                                </div>

                                <div class="buy-box">
                                    <a href="javascript:void(0)">
                                        <i data-feather="heart"></i>
                                        <span>Add To Wishlist</span>
                                    </a>
								</div>

                                <div class="pickup-box">
									@php $qty = 0;  foreach ($detailedProduct->stocks as $key => $stock) { $qty += $stock->qty; } @endphp
                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Category : <a href="javascript:void(0)">{{$detailedProduct->category->getTranslation('name') }}</a></li>
                                            <li>Brand : {{ $detailedProduct->brand ? $detailedProduct->brand->getTranslation('name') : 'N/A' }}</li>
                                            <li>Stock : <a href="javascript:void(0)">{{ $qty }} Items Left</a></li>
                                            {{--<li>Tags : <a href="javascript:void(0)">Cake,</a> <a
                                                    href="javascript:void(0)">Backery</a></li> --}}
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab">Description</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab">Overview</button>
                                    </li>

                                    {{--<li class="nav-item" role="presentation">
                                        <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                            data-bs-target="#care" type="button" role="tab">Care Instructions</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab">Review</button>
                                    </li>--}}
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="product-description">
                                            <div class="nav-desh">
												{!! $detailedProduct->description !!}
                                            </div>
										</div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel">
                                        <div class="table-responsive">
										{{--<table class="table info-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Specialty</td>
                                                        <td>Vegetarian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ingredient Type</td>
                                                        <td>Vegetarian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brand</td>
                                                        <td>Lavian Exotique</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Form</td>
                                                        <td>Bar Brownie</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Package Information</td>
                                                        <td>Box</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manufacturer</td>
                                                        <td>Prayagh Nutri Product Pvt Ltd</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Item part number</td>
                                                        <td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Net Quantity</td>
                                                        <td>40.00 count</td>
                                                    </tr>
                                                </tbody>
                                            </table>--}}
											{!! $detailedProduct->overview !!}
                                        </div>
										
                                    </div>

                                    <div class="tab-pane fade" id="care" role="tabpanel">
                                        <div class="information-box">
                                            <ul>
                                                <li>Store cream cakes in a refrigerator. Fondant cakes should be
                                                    stored in an air conditioned environment.</li>

                                                <li>Slice and serve the cake at room temperature and make sure
                                                    it is not exposed to heat.</li>

                                                <li>Use a serrated knife to cut a fondant cake.</li>

                                                <li>Sculptural elements and figurines may contain wire supports
                                                    or toothpicks or wooden skewers for support.</li>

                                                <li>Please check the placement of these items before serving to
                                                    small children.</li>

                                                <li>The cake should be consumed within 24 hours.</li>

                                                <li>Enjoy your cake!</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review" role="tabpanel">
                                        <div class="review-box">
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <div class="product-rating-box">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="product-main-rating">
                                                                    <h2>3.40
                                                                        <i data-feather="star"></i>
                                                                    </h2>

                                                                    <h5>5 Overall Rating</h5>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12">
                                                                <ul class="product-rating-list">
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>5<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: 40%;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">2</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>4<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: 20%;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">1</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>3<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: 0%;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">0</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>2<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: 20%;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">1</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>1<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: 20%;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">1</h5>
                                                                        </div>
                                                                    </li>

                                                                </ul>

                                                                <div class="review-title-2">
                                                                    <h4 class="fw-bold">Review this product</h4>
                                                                    <p>Let other customers know what you think</p>
                                                                    <button class="btn" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#writereview">Write a
                                                                        review</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7">
                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image people-text">
                                                                            <img alt="user" class="img-fluid "
                                                                                src="../assets/images/review/1.jpg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="people-comment">
                                                                        <div class="people-name"><a
                                                                                href="javascript:void(0)"
                                                                                class="name">Jack Doe</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content"> 29 Sep 2023
                                                                                    06:40:PM
                                                                                </h6>
                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"></i>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <p>Avoid this product. The quality is
                                                                                terrible, and
                                                                                it started falling apart almost
                                                                                immediately. I
                                                                                wish I had read more reviews before
                                                                                buying.
                                                                                Lesson learned.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image people-text">
                                                                            <img alt="user" class="img-fluid "
                                                                                src="../assets/images/review/2.jpg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="people-comment">
                                                                        <div class="people-name"><a
                                                                                href="javascript:void(0)"
                                                                                class="name">Jessica
                                                                                Miller</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content"> 29 Sep 2023
                                                                                    06:34:PM
                                                                                </h6>
                                                                                <div class="product-rating">
                                                                                    <div class="product-rating">
                                                                                        <ul class="rating">
                                                                                            <li>
                                                                                                <i data-feather="star"
                                                                                                    class="fill"></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <i data-feather="star"
                                                                                                    class="fill"></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <i data-feather="star"
                                                                                                    class="fill"></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <i data-feather="star"
                                                                                                    class="fill"></i>
                                                                                            </li>
                                                                                            <li>
                                                                                                <i
                                                                                                    data-feather="star"></i>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <p>Honestly, I regret buying this item. The
                                                                                quality
                                                                                is subpar, and it feels like a waste of
                                                                                money. I
                                                                                wouldn't recommend it to anyone.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image people-text">
                                                                            <img alt="user" class="img-fluid "
                                                                                src="../assets/images/review/3.jpg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="people-comment">
                                                                        <div class="people-name"><a
                                                                                href="javascript:void(0)"
                                                                                class="name">Rome Doe</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content"> 29 Sep 2023
                                                                                    06:18:PM
                                                                                </h6>
                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"></i>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <p>I am extremely satisfied with this
                                                                                purchase. The
                                                                                item arrived promptly, and the quality
                                                                                is
                                                                                exceptional. It's evident that the
                                                                                makers paid
                                                                                attention to detail. Overall, a
                                                                                fantastic buy!
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image people-text">
                                                                            <img alt="user" class="img-fluid "
                                                                                src="../assets/images/review/4.jpg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="people-comment">
                                                                        <div class="people-name"><a
                                                                                href="javascript:void(0)"
                                                                                class="name">Sarah
                                                                                Davis</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content"> 29 Sep 2023
                                                                                    05:58:PM
                                                                                </h6>
                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"></i>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <p>I am genuinely delighted with this item.
                                                                                It's a
                                                                                total winner! The quality is superb, and
                                                                                it has
                                                                                added so much convenience to my daily
                                                                                routine.
                                                                                Highly satisfied customer!</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image people-text">
                                                                            <img alt="user" class="img-fluid "
                                                                                src="../assets/images/review/5.jpg">
                                                                        </div>
                                                                    </div>
                                                                    <div class="people-comment">
                                                                        <div class="people-name"><a
                                                                                href="javascript:void(0)"
                                                                                class="name">John Doe</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content"> 29 Sep 2023
                                                                                    05:22:PM
                                                                                </h6>
                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"></i>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <p>Very impressed with this purchase. The
                                                                                item is of
                                                                                excellent quality, and it has exceeded
                                                                                my
                                                                                expectations.</p>
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="vendor-contain">
                                <div class="vendor-image">
                                    <img src="{{ asset('public/assets_web/images/logo.png') }}" class="blur-up lazyload" alt="">
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">New Microsoet Computer</h5>
									<div class="product-rating mt-1">
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
                                        </ul>
                                        <span>(36 Reviews)</span>
                                    </div>

                                </div>
                            </div>
							<div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="map-pin"></i>
                                            <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            <h5>Contact Seller: <span class="text-content">+91 099316 21852</span></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                @foreach(\App\Models\Product::where('published',1)->where('approved',1)->orderBy('id', 'DESC')->limit('8')->get() as $item)
										@php 
												$current_timestamp = strtotime(date('Y-m-d H:i:s'));
												 $product_url = route('product', $item->slug);
												$item->cart_quantity = 0;
												$totalQty = 0; // Initialize total quantity
												if($item->stocks){
													foreach ($item->stocks as $key => $stock) {
														$totalQty += $stock->qty; // Accumulate total quantity
													}
												}

											if($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp &&  $item->discount_type == "percent"){
												$output .= '<div class="beachs">'.$item->discount.' % Off</div>';
												$discount_price = home_discounted_base_price($item, false);
												$discount_show_price = home_discounted_base_price($item, true);
												$original_show_price = home_base_price($item, true);
								
											}elseif($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp && $item->discount_type == "amount") {
												$output .= '<div class="beachs">₹'.$item->discount.' Off</div>';
												$discount_price = home_discounted_base_price($item, false);
												$discount_show_price = home_discounted_base_price($item, true);
												$original_show_price = home_base_price($item, true);
											}else{
												$discount_price = home_base_price($item, false);
												$discount_show_price = home_discounted_base_price($item, true);
												$original_show_price = home_base_price($item, true);
											}
										@endphp
									<li>
                                        <div class="offer-product">
                                            <a href="{{ $product_url }}" class="offer-image">
                                                <img src="{{ uploaded_asset($item->thumbnail_img) }}" class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="{{ $product_url }}">
                                                        <h6 class="name">{{ \Illuminate\Support\Str::limit($item->getTranslation('name'), 45, '...') }}</h6>
                                                    </a>
                                                    <h6 class="price theme-color">{{ $discount_show_price }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
								@endforeach
                                    
                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        {{--<div class="ratio_156 pt-25">
                            <div class="home-contain">
                                <img src="../assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Seafood</h6>
                                        <h3 class="text-uppercase fw-normal"><span
                                                class="theme-color fw-bold">Freshes</span> Products</h3>
                                        <h3 class="fw-light">every hour</h3>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->
 
    <!-- Related Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Related Products</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach($related_products as $item)
							@php
								$brand_details = \App\Models\Brand::where('id', $item->brand_id)->first();
								$current_timestamp = strtotime(date('Y-m-d H:i:s'));
								 $product_url = route('product', $item->slug);
								$item->cart_quantity = 0;
                                $totalQty = 0; // Initialize total quantity
                                if($item->stocks){
                                    foreach ($item->stocks as $key => $stock) {
                                        $totalQty += $stock->qty; // Accumulate total quantity
                                    }
                                }

                                if($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp &&  $item->discount_type == "percent"){
                                    $output .= '<div class="beachs">'.$item->discount.' % Off</div>';
                                    $discount_price = home_discounted_base_price($item, false);
                                    $discount_show_price = home_discounted_base_price($item, true);
                                    $original_show_price = home_base_price($item, true);
                    
                                }elseif($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp && $item->discount_type == "amount") {
                                    $output .= '<div class="beachs">₹'.$item->discount.' Off</div>';
                                    $discount_price = home_discounted_base_price($item, false);
                                    $discount_show_price = home_discounted_base_price($item, true);
                                    $original_show_price = home_base_price($item, true);
                                }else{
                                    $discount_price = home_base_price($item, false);
                                    $discount_show_price = home_discounted_base_price($item, true);
                                    $original_show_price = home_base_price($item, true);
                                }
								@endphp
							<div>
							
							<div class="product-box-3 wow fadeInUp" data-wow-delay="0.05s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{ $product_url }}">
                                            <img src="{{ uploaded_asset($item->thumbnail_img) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
									</div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
										@if($brand_details)
											<span class="span-name">{{ $brand_details->name }}</span>
										@endif
                                        <a href="{{ $product_url }}">
                                            <h5 class="name">{{ \Illuminate\Support\Str::limit($item->getTranslation('name'), 45, '...') }}</h5>
                                        </a>
                                        <h5 class="price"><span class="theme-color">{{ $discount_show_price }}</span>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
                                 
                            </div>
							
						@endforeach
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->


@endsection
