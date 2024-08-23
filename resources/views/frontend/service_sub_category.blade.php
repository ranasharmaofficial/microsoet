@extends('frontend.master')

@section('title')Home - @endsection

@section('description') @endsection


@section('content')

<!-- <section class="pageTitle "> </section> -->
<!-- top banner start -->
<section class="section-banner-top">
   @if($subcategories->page_wise_banner=='')
   <img src="{{static_asset('assets_web/img/building-material.png')}}" alt="Image Description" style="width:100%;">
   @else
   <img src="{{ uploaded_asset($subcategories->page_wise_banner) }}" alt="Image Description" style="width:100%;">
   @endif
</section>
<!--top banner end -->

<div class="service-pros animate__fadeInUps product-categorys product-catbsnner">
   <!-- breadcrum start -->
   <div class="container">
      <div class="row">
         <div class="col-md-12 breadmcrumsize">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$subcategories->name}} </li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- breadcrum end -->

   <div class="pt-5 pb-5 elec-tb productcategoryd">
      <div class="container">
         <div class="row">
            <div class="col-md-3 showcatlist">
               <div class="d-xl-block col-wd-2gdot5">
                  <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                     <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li class="link-category link-category1aa">
                           <div id="accordion" class="accordion-container">
                              <article class="content-entry">
                                 <h4 class="article-title">
                                    <a class="dropdown-toggle1 dropdown-toggle-collapse1" href="javascript:;" role="button">
                                       Show All Categories
                                       <span class="text-gray-25 font-size-12 font-weight-normal">
                                          ({{$servicecategories->count()}})
                                       </span> 
                                       <i class="fa fa-angle-right" aria-hidden="true" style="line-height: 35px;"></i>
                                    </a>
                                 </h4>
                                 <div class="accordion-content">
                                    <div class="link-categoryx link-category1az ">
                                       <ul class="list-unstyled dropdown-list">
                                          @foreach ($servicecategories as $key => $category)
                                          <li>
                                             <a class="dropdown-item1"
                                                href="{{ route('servicecat', $category->slug) }}">
                                                {{$category->getTranslation('name') }} ({{ $category->categories->count()}})
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
                           <b> {{$subcategories->name}} ({{ $subcategories->getServiceCount() }})</b>
                           <ul class="list-unstyled dropdown-list listing_block filter">
                              @foreach ($firstFiveSubcat as $item)
                                 <li>
                                    <a class="dropdown-item1" href="{{ route('services.servicecategory', $item->slug) }}">
                                       {{$item->name}} ({{ $item->getServiceCount() }})
                                    </a>
                                 </li>
                              @endforeach

                              @foreach ($exceptFiveSubcat as $item)
                                 <li class="collapses3">
                                    <a class="dropdown-item1" href="{{ route('services.servicecategory', $item->slug) }}">
                                       {{$item->name}} ({{ $item->getServiceCount() }})
                                    </a>
                                 </li>
                              @endforeach

                              @if(count($exceptFiveSubcat) > 0)
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
                              @endif
                           </ul>
                        </li>
                     </ul>
                  </div>
                  @include('frontend.partials.category_enquiry_form')
               </div>
            </div>
            <div class="col-md-9">
               <div class="tab-content">
                  <div class="owl-carousel owl-theme category-slide showcatlistnew">
                     @foreach ($servicecategories as $key => $category)
                     <div class="item">
                        <div class="fancybox thumb1">
                           <a class="rana {{ Request::is('servicecat/'.$category->slug) ? 'active':'' }}"> 
                              {{ set_active('servicecat', $category->slug) }} </a>

                           <a class="tablskd {{ Request::is('servicecat/'.$category->slug) ? 'active':'' }}"
                              href="{{ route('servicecat', $category->slug) }}">
                              <img data-u="image" src="{{ uploaded_asset($category->icon) }}" alt="{{ $category->getTranslation('name') }}" />
                              <h6>{{ $category->getTranslation('name') }} </h6>
                              <div class="triangle-down"></div>
                           </a>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="brand_product tab-pane active" id="tab-electric1">
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                           <div class="deals">
                              <h3> {{$subcategories->name}}</h3>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                        </div>
                     </div>
                     <div class="deals">
                        <hr>
                     </div>
                     <div class="row">
                        @foreach ($subcatlist as $item)
                        <div class="col">
                           <div class="product_br">
                              <a href="{{ route('services.servicecategory', $item->slug) }}">
                                 <img src="{{ uploaded_asset($item->banner) }}" alt="{{$item->name}}">
                                 <h3>{{$item->name}}</h3>
                              </a>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
</div>
<section class="banner-categorys">
   <div class="container" style="position:relative;">
      <img src="{{static_asset('assets_web/img/category-banner.jpg')}}" alt="">
      <div class="banner-content-wrapper">
         <h3 class="entry-title">Are You a reseller or contractor ?</h3>
         <div class="entry-description">
            <p>Become a business member to get consistent benefits.</p>
         </div>
         <div class="entry-button">
            <a href="javascript:void(0);" class="btn">Register Now</a>
         </div>
      </div>
   </div>
</section>
<section class="stage_cons showcatlistnew">
   <div class="container">
      <div class="service-pros" style="padding:0px;margin:0px;">
         <div class="head-cnt work-center text-center">
            <div class="bounceIn animated">
               <h4>Our Process Services</h4>
               <hr class="underlinskd">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="stage_cons_lst">
               <ul id="menu-soc" class="menu">
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure1.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">1</div>
                        <span class="caption">sub structure</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure2.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">2</div>
                        <span class="caption">plinth level structure</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure3.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">3</div>
                        <span class="caption">super structure</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure4.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">4</div>
                        <span class="caption">masonry construction</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure5.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">5</div>
                        <span class="caption">electrical &amp; plumbing</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure6.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">6</div>
                        <span class="caption">plaster application</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure7.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">7</div>
                        <span class="caption">water proofing</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure8.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">8</div>
                        <span class="caption">flooring &amp; tiling</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure9.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">9</div>
                        <span class="caption">wall putty application</span>
                     </a>
                  </li>
                  <li>
                     <a class="nav-link" href="javascript:void(0);">
                        <div class="item_box"><img src="{{static_asset('assets_web/img/sub_structure10.png')}}"
                              class="menu-image menu-image-title-after" alt=""></div>
                        <div class="triangle">10</div>
                        <span class="caption">paint application</span>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="bannerslid mt-1 mb-1 animated animate__fadeInUp wow p-0">
   <div class="container">
      <div class="service-pros p-0 m-0">
         <div class="head-cnt work-center text-center mb-0">
            <div class="bounceIn animated">
               <h4>Exciting Offers & Discounts</h4>
               <hr class="underlinskd">
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12 col-sm-12 col-12">
            <div class="sim-product">
               <div class="owl-carousel owl-theme tab-product">
                  @if($catwiseoffers != null)
                     @foreach ($catwiseoffers as $item)
                     <div class="item">
                        <div class="tab_imgss">
                           <a href="{{$item->slug_url}}">
                              <img src="{{uploaded_asset($item->banner)}}">
                           </a>
                        </div>
                     </div>
                     @endforeach
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@include('frontend.partials.service_you_may_like')

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
@endsection