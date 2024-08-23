@extends('frontend.master') 
@section('meta_title'){{ $detailedService->meta_title }}@stop 
@section('meta_description'){{ $detailedService->meta_description }}@stop 
@section('meta_keywords'){{ $detailedService->tags }}@stop 

@section('meta')
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $detailedService->meta_title }}">
<meta itemprop="description" content="{{ $detailedService->meta_description }}">
<meta itemprop="image" content="{{ uploaded_asset($detailedService->meta_img) }}">
<!-- Twitter Card data -->
<meta name="twitter:card" content="service">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="{{ $detailedService->meta_title }}">
<meta name="twitter:description" content="{{ $detailedService->meta_description }}">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="{{ uploaded_asset($detailedService->meta_img) }}">
<meta name="twitter:data1" content="{{ single_price($detailedService->unit_price) }}">
<meta name="twitter:label1" content="Price">
<!-- Open Graph data -->
<meta property="og:title" content="{{ $detailedService->meta_title }}" />
<meta property="og:type" content="og:service" />
<meta property="og:url" content="{{ route('service', $detailedService->slug) }}" />
<meta property="og:image" content="{{ uploaded_asset($detailedService->meta_img) }}" />
<meta property="og:description" content="{{ $detailedService->meta_description }}" />
<meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
<meta property="og:price:amount" content="{{ single_price($detailedService->unit_price) }}" />
<meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}"> 
@endsection 

@section('content')
<!-- write your custome html code here  -->
<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
	<div class="container">
		<div class="row">
			<div class="col-md-12 breadmcrumsize">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('')}}"><i class="fas fa-home"></i> Home</a></li>
                  @if($get_parent_id==1)
						   <li class="breadcrumb-item"><a href="{{url('cat/'.$firstCatName->slug)}}">{{$firstCatName->name}}</a> </li>
                  @endif
						<li class="breadcrumb-item"><a href="{{url('cat/'.$detailedService->category->slug)}}">{{$detailedService->category->getTranslation('name') }}</a> </li>
						<li class="breadcrumb-item active" aria-current="page"> {{ $detailedService->getTranslation('name') }}</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="container details-product">
		<div class="row">
			<div class="col-xl-9 col-wd-9gdot5">
				<div class="row">
               <!-- Left Section Start  -->
					<div class="col-md-6">
						<div class="product-box mb-0 zoom-left_hegt">
							<div class="zoom-left"> 
								@php 
								   $photos = explode(',', $detailedService->photos); 
								@endphp
								<div class="zoomWrapper">
									<img id="zoom_03" src="{{ uploaded_asset($detailedService->thumbnail_img) }}" data-zoom-image="{{ uploaded_asset($detailedService->thumbnail_img) }}" style="position: absolute;">
								</div>
								<div class="clearfix"></div>
								<div id="gallery_01">
									@foreach ($photos as $key => $photo) 
										<a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ uploaded_asset($photo) }}" data-zoom-image="{{ uploaded_asset($photo) }}">
											<img src="{{ uploaded_asset($photo) }}" width="100" />
										</a>
									@endforeach

									@foreach ($detailedService->stocks as $key => $stock)
                              @if($stock->image != null)
                                 <a href="javascript:void(0);" class="elevatezoom-gallery active" data-update="" data-image="{{ uploaded_asset($stock->image) }}" data-zoom-image="{{ uploaded_asset($stock->image) }}">
                                    <img src="{{ uploaded_asset($stock->image) }}" width="100"  />
                                 </a>
                              @endif
									@endforeach                                                                                 
								</div>
							</div>
                  </div>
						<form id="service-option-choice-form" class="d-block w-100">
                     @csrf
                     <input type="hidden" name="id" value="{{ $detailedService->id }}"> 
                     @if ($detailedService->choice_options != null)
                        @foreach (json_decode($detailedService->choice_options) as $key => $choice)
                           <div class="tab-finish pb-2">
                              <div class="row no-gutters d-none">
                                 <div class="col-sm-3">
                                    @if(count($attribute_type_arr) > 0)
                                       @foreach($attribute_type_arr as $attr) 
                                          <p class="ucfirst"> {{ $attr->getTranslation('name') }}: </p> 
                                          <p class="ucfirst"> {{ \App\Models\Attribute::find($choice->attribute_id)->getTranslation('name') }}: </p>
                                       @endforeach
                                    @endif
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

                     @if (count(json_decode($detailedService->colors)) > 0)
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
                           <div class="discrptions_button cart-add d-block cart-add1 products_list mx-2">
                              <div class="input-group quantity_input mb-0">
                                 <div class="input-group w-100 justify-content-start align-items-center packageadd">
                                    <input type="number" step="1" min="{{ $detailedService->min_qty }}" max="1" value="{{ $detailedService->min_qty }}" name="quantity" class="quantity quantity-field border-0 text-center m-0 w-25">
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
						</form>
                  <div class="backtabs-dp_servicespros2 mt-2">
                     <div class="discrptions_button cart-add cart-add1 d-block products_list product_data height100">
                        <div class="input-group quantity_input mb-0">
                           <div class="input-group w-100 justify-content-start align-items-center packageadd">
                              <!--<button onclick="addToServiceCart()" class="addtocartbutservices addtocartn mrgnlftnone btnneww w-100">
                                 <i class="fa fa-check" aria-hidden="true"></i> Add Service Quotations
                              </button>-->
                              <button class="addtocartdetailservices w-100" data-toggle="modal" data-target="#myModaladdress">Get A Quote</button>
                              <button class="out-of-stock background-gray mrgnlftnone btnneww_out" style="display:none;">
                                 Out of stock
                              </button>                                 
                           </div>
                        </div>
                        @if(Auth::user() != null) 
                           <button  data-toggle="modal" data-target="#myModalget" class="bulk-order-buttons bulkcartn moresellerw">
                              <i class="fa-solid fa-basket-shopping"></i> 
                                 Ask Price
                           </button> 
                        @else
                           <button onclick="window.location.href='{{ url('login') }}'" class="bulk-order-buttons bulkcartn moresellerw">
                              <i class="fa-solid fa-basket-shopping"></i> 
                                 Ask Price
                           </button>
                        @endif
                        
                     </div>
                                          
                     <!-- Bought together Section Start  -->
                     
                     <!-- Bought together Section End  -->
						</div>
					</div>
               <!-- Left Section End  -->

               <!-- Right Section Start  -->
					<div class="col-md-6">
						<div class="product-box1">
							<div class="discrptions">
								<h5 class="showcatlist"> {{ $detailedService->getTranslation('name') }}</h5>
								<div class="tab-finish padbottomnone displayblock">
									  <div class="col-sm-12"><strong>Descriptions -</strong> {!! $detailedService->short_description !!}</div>
								</div>
								<div class="pricebox mt-2">
									<div class="d-flex"> 
                              <div class="price w-100 mb-0 pb-0">
											<h3 class="price_actual mb-0 pb-0 mrgnnone">
                                    @if($detailedService->discount != null && $detailedService->discount_start_date <= $current_date_time && $detailedService->discount_end_date >= $current_date_time)
                                    {{home_discounted_base_price($detailedService)}} 
                                       <span class="cutprice"> {{ home_base_price($detailedService)}}</span> per Sq. ft.<br />
												@else
                                       {{ home_base_price($detailedService)}}
                                    @endif
                                    
                                    @if($detailedService->discount != null && $detailedService->discount_start_date <= $current_date_time && $detailedService->discount_end_date >= $current_date_time)
                                       <span class="offertxt" style="border:none">You Save 
                                          {{format_price(home_base_price($detailedService, false) - home_discounted_base_price($detailedService, false))}}  
                                          (@if($detailedService->discount_type == "percent"){{$detailedService->discount}}% @else{{format_price($detailedService->discount)}} Flat @endif Off) 
                                       </span>
                                    @endif
											</h3> 
										</div>
									</div>
									<!--<div class="title">Inclusive of all taxes</div>-->
                                    
                           <div class="row no-gutters sellermrgn">
										@if(count($service_other_infos)>0) 
											@foreach ($service_other_infos as $other_info) 
												<div class="servicebox">                              
													<div class="col-sm-6">
														<p class="ucfirst">{{ $other_info->key_name }}</p>
													</div>
													<div class="col-sm-6">
														{{ $other_info->key_value }}
													</div>
												</div>
											@endforeach
										@endif  
										<span class="showoffer" id="showattri">+ Show More</span>
										<span class="hideoffer" id="hideattri">− Hide More</span>
									</div>
                           <p class="col-cpvc-2_1 right-align">
										<a href="#descriptions1">View Complete Details 
											<i class="fa-solid fa-angle-down"></i>
										</a> 
									</p> 
    
                           <div class="tab-finish pb-2 displayblock">
                              <div class="row no-gutters sellermrgn">
                                 <div class="col-sm-4">
                                    <p class="ucfirst">Service Provider :</p>
                                 </div>
                                 <div class="col-sm-8">
                                    <a href="javascript:void(0);">
                                       <strong>{{$detailedService->user->shop->name}}</strong>
                                    </a> 
                                    <span class="starrating">5 
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                 </div>
                                 
                                 <div class="col-sm-12">
                                    <ul>
                                          <li>Payment Mode : Online/Ofline</li>
                                          <li>Min. Order : 100 per Sq. Ft.</li>
                                    </ul>
                                    
                                    <article class="content-entry products_offers">
                                       <h4 class="article-title mrgnnone articlewidth"> More Service Provider 
                                          <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 25px;"></i>
                                       </h4>
                                       <ul class="viewsellerul">
                                          @if(isset($more_seller_services))
                                             @foreach($more_seller_services as $more_seller)
                                                <li class="lifull">
                                                   <strong>{{$more_seller->shop_name}}</strong> - Service Price 
                                                   
                                                   @if($more_seller->discount != null && $more_seller->discount_start_date <= $current_date_time && $more_seller->discount_end_date >= $current_date_time)
                                                      @if($more_seller->discount_type == "percent")
                                                         <strong>{{ home_discounted_base_price($more_seller) }}</strong> 
                                                         <strike>{{ home_base_price($more_seller) }}</strike> 
                                                         <span class="starrating">{{$more_seller->discount }} % Off </span>
                                                      @elseif($more_seller->discount_type == "amount")
                                                         <strong>{{ home_discounted_base_price($more_seller) }}</strong> 
                                                         <strike>{{ home_base_price($more_seller) }}</strike> 
                                                         <span class="starrating">₹ {{$more_seller->discount}} Flat Off </span> 
                                                      @endif
                                                   @else
                                                         <strong>{{ home_base_price($more_seller) }}</strong> 
                                                   @endif

                                                </li>
                                             @endforeach
                                          @endif
                                          <span style="text-align:right;">View 
                                             <a class="bb1" href="{{url('/more-seller/service/'.$detailedService->id)}}">
                                                <strong><i class="fas fa-hand-pointer"></i> all service providers</strong>
                                             </a>
                                          </span>
                                       </ul>
                                    </article>  
                                 </div>
                              </div>   
                           </div>
                        </div>
							</div>
                     <img class="w-100 mb-2" src="{{ static_asset('assets_web/img/productcoupon.jpg')}}" alt="">
							
                     <!-- Sepecial offer Start --->
                     <div id="accordion" class="accordion-container1">
                        <article class="content-entry products_offers">
                           <h4 class="article-title"> Special offers 
                              <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                           </h4>
                           <div class="accordion-content accordion-containerblock">
                              <div class="offer-section">
                                 <ul>
                                    <li class="offerlist">
                                       <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                       <b>Big Saving</b> - Apply Coupon SAVEBIG &amp; Get 20% Off (price inclusive of discount) 
                                       <span class="terms">T&amp;C</span>
                                    </li>
                                    <li class="offerlist">
                                       <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                       <b>5% Instant Discount - </b> on HDFC Bank Credit Cards &amp; EMI 
                                       <span class="terms">T&amp;C</span> 
                                    </li>
                                    <li class="offerlist" style="display: none;"> 
                                       <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                       <b>No Cost EMI - Starting from Rs.1,214</b> on ICICI, Axis, Kotak, HDFC &amp; 
                                       <span class="terms">More</span> 
                                    </li>
                                    <li class="offerlist" style="display: none;">
                                       <i class="fa fa-angle-right" aria-hidden="true"></i>
                                       <b>Store Discount</b> - Visit our nearest store and get instant extra discount 
                                       <span class="terms">T&amp;C</span> 
                                    </li> 
                                    <span class="showoffer" id="showoffer">+ Show More</span>
                                    <span class="hideoffer" id="hideoffer">− Hide More</span>
                                 </ul>
                              </div>
                           </div>
                        </article>
                     </div>
                     <!-- Sepecial offer End --->
                     <div class="d-block position-relative">
                        
                     </div>
						</div>
					</div>
               
					<div id="descriptions1"></div>
				</div>
				<div class="bootstrap-accordiana">
					<div class="backtabs-dp_servicespros2">
						<ul class="ulines-dps">
							<li class="ukine ukine1b active4">Service Details</li>
							<li class="ukine ukine2b">About</li>
							<li class="ukine ukine3b">Our Services</li>
                     <li class="ukine ukine4b">Brochure</li>
                     <li class="ukine ukine5b">Service Image</li>
                     <li class="ukine ukine6b">Service Video</li>
						</ul>

						<ul class="ulines-dps-para ">
							<li class="ukine ukine1b active4">
								<div class="tab-description">
									<h3>Product Specification</h3>
									{!! $detailedService->description !!}
                        </div>
							</li>

							<li class="ukine ukine2b">
								<div class="tab-description">
									<h3>About The Company</h3>
									<div class="tab-description">
									{!! $detailedService->about !!}
									</div>
								</div>
							</li>

							<li class="ukine ukine3b">
								<div class="tab-description">
									<h3>Our Services</h3>
									<div class="tab-description">
										{!! $detailedService->our_services !!}
									</div>
								</div>
							</li>
                     
                     @if($detailedService->broucher != null)
                     @php 
                        $brouchers = explode(',', $detailedService->broucher); 
                     @endphp
                     <li class="ukine ukine4b">
								<div class="tab-description">
									<h3>Sevices Brochure</h3>
									<div class="tab-description">
										<div class="row">
											@foreach ($brouchers as $key => $item) 
												<div class="col-md-3">
													<a onclick="window.open('{{ uploaded_asset($item)}}')">
														<img src="{{ static_asset('assets_web/img/pdf_icon.jpg')}}" border="0" />Download Brochure
													</a>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</li>   
                     @endif
                        
                     @if($detailedService->service_image != null)
                     <li class="ukine ukine5b">
								<div class="tab-description">
									<h3>Service Image</h3>
									<div class="tab-description">
										<div class="row lightbox-gallery">
                                 @php 
                                    $service_images_list = explode(',', $detailedService->service_image); 
                                 @endphp
                                 @foreach ($service_images_list as $key => $item)
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                    <a href="{{ uploaded_asset($item)}}" data-lightbox="photos" class="lb_all-link">
                                       <img class="img-fluid" src="{{ uploaded_asset($item)}}" />
                                    </a>
                                    </div>
                                 @endforeach
										</div>
                           </div>
								</div>
							</li> 
                     @endif
                         
                     @if(isset($detailedService->service_video_links))
                     <li class="ukine ukine6b">
								<div class="tab-description">
									<h3>Service Video</h3>
									<div class="tab-description">
										<div class="row lightbox-gallery">
                                 @foreach (json_decode($detailedService->service_video_links, true) as $key => $value)
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                       <a href="{{ json_decode($detailedService->service_video_links, true)[$key] }}" target="_blank" style="position:relative;">
                                          <img src="{{ static_asset('assets_web/img/ytubeicon.png')}}" style="top:-90%; left:40%; position:absolute;"/>
                                          <img src="{{ uploaded_asset(json_decode($detailedService->service_video_images, true)[$key]) }}" width="100%" height="150"/>
                                       </a>
                                    </div>
                                 @endforeach
										</div>
									</div>
                        </div>
							</li>
                     @endif
						</ul>
					</div>
				</div>
			</div>

			<div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
				<div class="md-hide"> 
               <div class="deliverybox"> 
						<form>
							<input type="number" name="pincode" value="110059" placeholder="Enter Pincode"> <a href="javascript:void(0);" class="change">Change</a>
                  </form>
						<ul class="row delivery">
							<li class="col-md-4"> <img src="{{ static_asset('assets_web/img/shipping.svg')}}" class="loadimg delimg" alt=""> <span class="name">Priority</span> <span class="status">Delivery</span> </li>
							<li class="col-md-4"> <img src="{{ static_asset('assets_web/img/cancellation.svg')}}" class="loadimg delimg" alt=""> <span class="name">Cancellation</span> <span class="status">Allowed</span> </li>
						</ul>
						<div class="details">
							<p style="display: none;"><i class="fa fa-inr" aria-hidden="true"></i> Cash on Delivery Available </p>
							<p><i class="fa fa-inr" aria-hidden="true"></i> Online Payment Available</p>
						</div>
					</div>
				</div>

				<div class="mb-8">
					<div class="border-bottom border-color-1 mb-3">
						<h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Related Services</h3> 
               </div>
					<ul class="list-unstyled relatedsershow"> 
						@if(count($service_related_)>0) 
							@foreach ($service_related_ as $related_service) 
								<li class="mb-4">
								   <div class="row">
									  <div class="col-auto col-md-4"> 
										 <a href="{{ route('service', $related_service->slug) }}" class="d-block width-75">
											<img onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" class="img-fluid" src="{{ uploaded_asset($related_service->thumbnail_img) }}" alt="{{ $related_service->name }}">
										 </a> 
									  </div>
									  <div class="col col-md-8">
										 <h3 class="text-lh-1dot2 compldy font-size-14 mb-0">
											<a href="{{ route('service', $related_service->slug) }}">{{ $related_service->name }}</a>
										 </h3>
										 <div class="relatedProprice"> 
											<strong class="pricerelated">{{home_discounted_base_price($related_service)}}</strong> 
											<strike class="pricerelated">{{home_base_price($related_service)}}</strike>per Sq. ft.
											<span class="offertxtRelated">{{$related_service->discount}} @if($related_service->discount_type == "amount" ) Flat @else  % @endif Off</span> 
										 </div>
									  </div>
								   </div>
								</li>                         
							@endforeach
						@endif                        
               </ul>
               <span class="showoffer" id="showrelatedser">+ Show More</span>
               <span class="hideoffer" id="hiderelatedser">− Hide More</span>
				</div>
                
            @include('frontend.partials.service_enquiry')              

			</div>
		</div>
	</div>
</div>

<section class="similar-pros-section similar-pros-sectionbg">
   <div class="container">
      <div class="mb-8 similar-pros">
         <div class="service-pros" style="padding:0px;margin:0px;">
            <div class="head-cnt work-center text-center">
                  <div class="border-bottom1 border-color-111 mt-0 mb-0">
                     <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 align-left">Browse Related Categories</h3>
                     <div class="deals">
                        <hr>
                     </div>
                  </div>
            </div>
         </div>

         <ul class="list-unstyled owl-carousel owl-theme trending021">
            @foreach($related_categories AS $related_category)
               <li class="mb-4_1">
                  <div class="row">
                     <div class="col-auto col-md-6">
                        <a href="{{ route('services.servicecategory', $related_category->slug) }}" class="d-block width-75">
                           <img class="img-fluid-slisting" src="{{ uploaded_asset($related_category->icon) }}"
                                 alt="{{$related_category->name}}">
                        </a>
                     </div>

                     <div class="col col-md-6">
                        <h3 class="text-lh-1dot-ser font-size-14 mb-0">
                           <a href="{{ route('services.servicecategory', $related_category->slug) }}">{{$related_category->name}}</a>
                        </h3>
                        <!-- <div class="font-weight-bold col-md-12">
                           <ins class="font-size-15 text-red text-decoration-none d-block">In Haryana</ins>
                        </div> -->
                     </div>
                  </div>
               </li>
            @endforeach
         </ul>
      </div>
   </div>
</section>
        
<div class="headsections111  mb-3">
   <div class="container">
      <div class="service-pros" style="padding:0px;margin:0px;">
         <div class="head-cnt work-center text-center">
            <div class="border-bottom1 border-color-111 mt-0 mb-0">
               <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 align-left">Relative Services</h3>
                  <div class="deals">
                     <hr>
                  </div>
               </div>
            </div>
         </div>
              
         <div class="owl-carousel owl-theme trending0091 trending001">
            @if(count($related_services)>0)
               @foreach ($related_services as $key => $items)
                  <div class="item">
                     <div class="product-box services">
                        <div class="ser-prd-img position-relative">
                           <div class="beachs2  position-absolute">
                              <p>50 Flat Off</p>
                           </div>
                           <div class="beach3  position-absolute">
                              <p> {{home_discounted_base_price($items)}}  Per Sq. Ft.</p>
                           </div>
                           <img src="{{ uploaded_asset($items->thumbnail_img) }}" alt="">
                        </div>
                        <div class="discrptions">
                           <a href="service-detail.php">
                              <h5>{{ $items->name }}   </h5>
                           </a>
                           <h6> F-47, 1st Floor, Galleria Market, <span>Gurgaon, Haryana</span></h6>
                        </div>
                        <ul class="item-amenities d-flex item-amenities-with-icons">
                           <li class="h-beds"><span class="hz-figure">40 <i class="fa fa-users" aria-hidden="true"></i></span> Employee</li>
                           <li class="h-baths border-left border-right"><span class="hz-figure">200+ <i class="fa fa-file-image" aria-hidden="true"></i></span> No. Of Projects</li>
                           <li class="h-area"><span class="hz-figure">100 <i class="far fa-square"></i></span> Min. Order </li>
                        </ul>
                        <div class="border-bottom d-flex1">
                           <a class="buttonbuynow askpricebtn" href="{{route('service', $items->slug)}}"> Detail</a>
                        </div>
                        <div class="item-footer clearfix">
                           <div class="item-author">
                              <i class="fa fa-user mr-1"></i>
                              Working Exp.
                           </div>
                           <div class="item-date">
                              <i class="fa fa-paperclip" aria-hidden="true"></i>
                              2 years ago
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            @endif   
         </div>
      </div>            
   </div>

   <section class="banner-brand_product">
      <div class="container">
         <div class="service-pros" style="padding:0px;margin:0px;">
            <div class="head-cnt work-center text-center" style="    margin: 0px; height: 0px;">
               <div class="bounceIn animated">
                  <h4>Why Buy Product From eBuildBazaar?</h4> </div>
            </div>
         </div>
         <div class="brandss1">
            <div class="row">
               <div class="col-md-2">
                  <a href="#1"> <img src="{{ static_asset('assets_web/img/iconon1.png')}}" alt="">
                     <h3>All Under One roof</h3>
                     <p>Ebuildbazaar Stores from others is their pricing.</p>
                  </a>
               </div>
               <div class="col-md-2">
                  <a href="#1"> <img src="{{ static_asset('assets_web/img/iconon2.png')}}" alt="">
                     <h3>Widest Product Range</h3>
                     <p>Ebuildbazaar Stores from others is their pricing.</p>
                  </a>
               </div>
               <div class="col-md-2">
                  <a href="#1"> <img src="{{ static_asset('assets_web/img/iconon3.png')}}" alt="">
                     <h3>On Time Delivery</h3>
                     <p>Ebuildbazaar Stores from others is their pricing.</p>
                  </a>
               </div>
               <div class="col-md-2">
                  <a href="#1"> <img src="{{ static_asset('assets_web/img/iconon4.png')}}" alt="">
                     <h3>Product Knowledge Support</h3>
                     <p>Ebuildbazaar Stores from others is their pricing.</p>
                  </a>
               </div>
               <div class="col-md-2">
                  <a href="#1"> <img src="{{ static_asset('assets_web/img/iconon5.png')}}" alt="">
                     <h3>Genuine Products</h3>
                     <p>Ebuildbazaar Stores from others is their pricing.</p>
                  </a>
               </div>
               <div class="col-md-2">
                  <a href="#1"> <img src="{{ static_asset('assets_web/img/iconon6.png')}}" alt="">
                     <h3>365 Days Wholesale Rates</h3>
                     <p>Ebuildbazaar Stores from others is their pricing.</p>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>

</div>

<div id="myModalget" class="modal fade prolidneis in" role="dialog">
   <div class="modal-dialog" id="modal-dialog45">
      <div class="modal-content">
         
         <div class="modal-body">
            <div class="form_section pt-0 pb-0">
               <div class="row">
                  <div class="col-md-12">
                     <form method="post" action="{{ route('service_enquiry.insertServiceEnquiry') }}" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                        @csrf
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                           <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                              <strong>Ask Price</strong> by adding a few details of your requirement
                              <button type="button" class="close" data-dismiss="modal">×</button>
                           </h3>
                           <div class="deals">
                              <hr>
                           </div>
                        </div>
                        <input type="hidden" name="service_id" value="{{ $detailedService->id }}">
                        <input type="hidden" name="service_name" value="{{ $detailedService->name }}">
                        <input type="hidden" name="category_id" value="{{ $detailedService->category_id }}">
                        <input type="hidden" name="vendor_id" value="{{ $detailedService->user_id }}">
                        
                        <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                              <img src="{{uploaded_asset($detailedService->thumbnail_img)}}" alt="">
                              <h3>{{ $detailedService->name }}</h3>
                              <p class="soldbytxt"><span>Sold By -</span>{{$detailedService->user->shop->name}}</p>
                              <p class="contype">
                                    <span>Short Description: {!! trim($detailedService->short_description) !!}</span>
                                    <span>No. Of Projects Completed: More than {{$detailedService->total_projects}}</span>
                                    <span>Service Location/City: {{$detailedService->user->shop->city}}</span>
                                    <span>Professional Assistance: As per requirement</span>
                              </p>
                           </div>
                        
                           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                              <div class="main-parenttttttT row scroll-modal">
                                 <div class="js-form-message form-group">
                                    <label class="formpoplabel">Nature of work</label>
                                    <div class="ginput_container ginput_container_checkbox">
                                       <input type="text" name="nature_work" class="form-control empty" value="{{$detailedService->category->name}}" placeholder="Nature of work" readonly>
                                    </div>
                                 </div>
                                 
                                 <div class="js-form-message form-group border-bottom">
                                    <label class="formpoplabel">Enter You Service Location</label>
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Name</label>
                                    <input type="text" name="name" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" >
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Locality</label>
                                    <input type="text" name="locality" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Locality" >
                                 </div>
                     
                                 <div class="js-form-message form-group">
                                    <label class="formpoplabel">Address</label>
                                    <textarea name="address" required class="form-control textareas" placeholder="Address (Area and Street)"></textarea>
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">City</label>
                                    <input type="text" name="city" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="City" >
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6" style="position:relative;">
                                    <i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                    <label class="formpoplabel">State</label>
                                    <select class="form-control" name="state" id="state" required>
                                       <option value="">---Select State---</option>
                                       <option value="Andhra Pradesh">Andhra Pradesh</option>
                                       <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                       <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                       <option value="Assam">Assam</option>
                                       <option value="Bihar">Bihar</option>
                                       <option value="Chandigarh">Chandigarh</option>
                                       <option value="Chhattisgarh">Chhattisgarh</option>
                                       <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                       <option value="Daman and Diu">Daman and Diu</option>
                                       <option value="Delhi">Delhi</option>
                                       <option value="Lakshadweep">Lakshadweep</option>
                                       <option value="Puducherry">Puducherry</option>
                                       <option value="Goa">Goa</option>
                                       <option value="Gujarat">Gujarat</option>
                                       <option value="Haryana">Haryana</option>
                                       <option value="Himachal Pradesh">Himachal Pradesh</option>
                                       <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                       <option value="Jharkhand">Jharkhand</option>
                                       <option value="Karnataka">Karnataka</option>
                                       <option value="Kerala">Kerala</option>
                                       <option value="Madhya Pradesh">Madhya Pradesh</option>
                                       <option value="Maharashtra">Maharashtra</option>
                                       <option value="Manipur">Manipur</option>
                                       <option value="Meghalaya">Meghalaya</option>
                                       <option value="Mizoram">Mizoram</option>
                                       <option value="Nagaland">Nagaland</option>
                                       <option value="Odisha">Odisha</option>
                                       <option value="Punjab">Punjab</option>
                                       <option value="Rajasthan">Rajasthan</option>
                                       <option value="Sikkim">Sikkim</option>
                                       <option value="Tamil Nadu">Tamil Nadu</option>
                                       <option value="Telangana">Telangana</option>
                                       <option value="Tripura">Tripura</option>
                                       <option value="Uttar Pradesh">Uttar Pradesh</option>
                                       <option value="Uttarakhand">Uttarakhand</option>
                                       <option value="West Bengal">West Bengal</option>
                                    </select>
                                 </div>

                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Landmark</label>
                                    <input type="text" name="landmark" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Landmark (Optional)" >
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Pincode</label>
                                    <input type="text" maxlength="6" oninput="numberOnly(this.id);" id="pincode" name="pincode" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Pincode" required>
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Alternate Phone No. (Optional)</label>
                                    <input type="text" maxlength="10" oninput="numberOnly(this.id);" id="alt_phone" name="alt_phone" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Alternate Phone No. (Optional)" >
                                 </div>

                                 <div class="js-form-message form-group">
                                    <label class="formpoplabel">Additional requirement</label>
                                    <textarea name="additional_requirement" class="form-control textareas h-200" placeholder="Additional requirement" required></textarea>
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


<div id="myModaladdress" class="modal fade prolidneis in" role="dialog">
   <div class="modal-dialog" id="modal-dialog45">
      <div class="modal-content">
         <div class="modal-body">
            <div class="form_section pt-0 pb-0">
               <div class="row">
                  <div class="col-md-12">
                     <form method="post" action="{{ route('service_orders.quotation')}}" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                        @csrf
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
                              <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                                 <strong>Get A Quotation</strong> for {{$detailedService->category->name}}
                                 <button type="button" class="close" data-dismiss="modal">×</button>
                              </h3>
                              <div class="deals">
                                 <hr>
                              </div>
                        </div>

                        <input type="hidden" name="service_id" value="{{ $detailedService->id }}">
                        <input type="hidden" name="service_name" value="{{ $detailedService->name }}">
                        <input type="hidden" name="category_id" value="{{ $detailedService->category_id }}">
                        <input type="hidden" name="vendor_id" value="{{ $detailedService->user_id }}">
                        <input type="hidden" name="quantity" value="1">

                        @if($detailedService->discount != null && $detailedService->discount_start_date <= $current_date_time && $detailedService->discount_end_date >= $current_date_time)
                           <input type="hidden" name="price" value="{{home_discounted_base_price($detailedService, false)}}">
                        @else
                           <input type="hidden" name="price" value="{{ home_base_price($detailedService, false)}}">
                        @endif
                              
                        <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                              <img src="{{uploaded_asset($detailedService->thumbnail_img)}}" alt="">
                              <h3>{{ $detailedService->name }}</h3>
                              <p class="soldbytxt"><span>Sold By -</span>{{$detailedService->user->shop->name}}</p>
                              <p class="contype">
                                    <span>Short Description: {!! trim($detailedService->short_description) !!}</span>
                                    <span>No. Of Projects Completed: More than {{$detailedService->total_projects}}</span>
                                    <span>Service Location/City: {{$detailedService->user->shop->city}}</span>
                                    <span>Professional Assistance: As per requirement</span>
                              </p>
                           </div>
                        
                           <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                              <div class="main-parenttttttT row scroll-modal">

                                 <div class="js-form-message form-group">
                                    <label class="formpoplabel">Nature of work</label>
                                    <div class="ginput_container ginput_container_checkbox">
                                       <input type="text" name="nature_work" class="form-control empty" value="{{$detailedService->category->name}}" placeholder="Nature of work" readonly>
                                    </div>
                                 </div>
                                 
                                 @if($detailedService->category->is_form_field)
                                
                                    @foreach (explode(",",$detailedService->category->form_fields) as $field)
                                       <div class="js-form-message form-group col-md-6" style="position:relative;">
                                          <label class="formpoplabel">{{$field}}</label>
                                          <input type="text" name="common_lables[]" value="{{$field}}" class="form-control empty" placeholder="Common Lables" required readonly>
                                          <input type="text" name="common_value[]" value="" class="form-control empty" placeholder="{{$field}}" required>
                                       </div>
                                    @endforeach
                                 @endif
                           
                                 <div class="js-form-message form-group border-bottom">
                                    <label class="formpoplabel">Enter You Service Location</label>
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Name</label>
                                    <input type="text" name="name" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" >
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Locality</label>
                                    <input type="text" name="locality" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Locality" >
                                 </div>
                     
                                 <div class="js-form-message form-group">
                                    <label class="formpoplabel">Address</label>
                                    <textarea name="address" required class="form-control textareas" placeholder="Address (Area and Street)"></textarea>
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">City</label>
                                    <input type="text" name="city" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="City" >
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6" style="position:relative;">
                                    <i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                    <label class="formpoplabel">State</label>
                                    <select class="form-control" name="state" id="state" required>
                                       <option value="">---Select State---</option>
                                       <option value="Andhra Pradesh">Andhra Pradesh</option>
                                       <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                       <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                       <option value="Assam">Assam</option>
                                       <option value="Bihar">Bihar</option>
                                       <option value="Chandigarh">Chandigarh</option>
                                       <option value="Chhattisgarh">Chhattisgarh</option>
                                       <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                       <option value="Daman and Diu">Daman and Diu</option>
                                       <option value="Delhi">Delhi</option>
                                       <option value="Lakshadweep">Lakshadweep</option>
                                       <option value="Puducherry">Puducherry</option>
                                       <option value="Goa">Goa</option>
                                       <option value="Gujarat">Gujarat</option>
                                       <option value="Haryana">Haryana</option>
                                       <option value="Himachal Pradesh">Himachal Pradesh</option>
                                       <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                       <option value="Jharkhand">Jharkhand</option>
                                       <option value="Karnataka">Karnataka</option>
                                       <option value="Kerala">Kerala</option>
                                       <option value="Madhya Pradesh">Madhya Pradesh</option>
                                       <option value="Maharashtra">Maharashtra</option>
                                       <option value="Manipur">Manipur</option>
                                       <option value="Meghalaya">Meghalaya</option>
                                       <option value="Mizoram">Mizoram</option>
                                       <option value="Nagaland">Nagaland</option>
                                       <option value="Odisha">Odisha</option>
                                       <option value="Punjab">Punjab</option>
                                       <option value="Rajasthan">Rajasthan</option>
                                       <option value="Sikkim">Sikkim</option>
                                       <option value="Tamil Nadu">Tamil Nadu</option>
                                       <option value="Telangana">Telangana</option>
                                       <option value="Tripura">Tripura</option>
                                       <option value="Uttar Pradesh">Uttar Pradesh</option>
                                       <option value="Uttarakhand">Uttarakhand</option>
                                       <option value="West Bengal">West Bengal</option>
                                    </select>
                                 </div>

                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Landmark</label>
                                    <input type="text" name="landmark" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Landmark (Optional)" >
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Pincode</label>
                                    <input type="text" name="pincode" maxlength="6" oninput="numberOnly(this.id);" id="pincode1" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Pincode" required>
                                 </div>
                     
                                 <div class="js-form-message form-group col-md-6">
                                    <label class="formpoplabel">Alternate Phone No. (Optional)</label>
                                    <input type="text" maxlength="10" oninput="numberOnly(this.id);" id="alt_phone1" name="alt_phone" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Alternate Phone No. (Optional)" >
                                 </div>

                                 <div class="js-form-message form-group">
                                    <label class="formpoplabel">Additional requirement</label>
                                    <textarea name="additional_requirement" class="form-control textareas h-200" placeholder="Additional requirement" required></textarea>
                                 </div>
                                    <!-- 4 -->
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
<script id="rendered-js" >
function numberOnly(id) {
  var element = document.getElementById(id);
  element.value = element.value.replace(/[^0-9]/gi, "");
}
//# sourceURL=pen.js
    </script>
@endsection
