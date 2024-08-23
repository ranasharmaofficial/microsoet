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
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
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
<style>
	.text-truncate-2 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
</style>
     <section class="pageTitle">
         <div class="container">  </div>
      </section>
      <!--top banner end -->
      <div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
	   <div class="container">
	  <div class="row">
		 <div class="col-md-12 breadmcrumsize">
		   <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li> 
             <li class="breadcrumb-item"><a href="">Structural Materials </a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Cement     </li>
               </ol>
            </nav>
		 </div>
		 </div>
		 </div>
         <div class="container details-product product-catpro ">
		 <form class="" id="search-form" action="" method="GET">
            <div class="row">
               <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                  <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                           <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
   
    <li class="link-category0">
                           <div class="dropdown-title"></div>
                        </li>
    <li class="link-category link-category1aa">



       <div id="accordion" class="accordion-container">
          <article class="content-entry">
             <h4 class="article-title">
                <a class="dropdown-toggle1 dropdown-toggle-collapse1" href="javascript:;" role="button">
                   Show All Categories<span class="text-gray-25 font-size-12 font-weight-normal"> (9)</span> <i class="fa fa-angle-right" aria-hidden="true" style="    line-height: 35px;"></i>
                </a>
             </h4>
             <div class="accordion-content">
                <div class="link-categoryx link-category1az ">
                   <ul class="list-unstyled dropdown-list">
                      
						 
					 @if (!isset($category_id))
                                                @foreach (\App\Models\Category::where('level', 0)->get() as $category)
                                                    <li class="mb-2 ml-2">
                                                        <a class="dropdown-item1" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="mb-2">
                                                    <a class="text-reset fs-14 fw-600" href="{{ route('search') }}">
                                                        <i class="las la-angle-left"></i>
                                                        {{ translate('All Categories')}}
                                                    </a>
                                                </li>
                                                @if (\App\Models\Category::find($category_id)->parent_id != 0)
                                                    <li class="mb-2">
                                                        <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Models\Category::find(\App\Models\Category::find($category_id)->parent_id)->slug) }}">
                                                            <i class="las la-angle-left"></i>
                                                            {{ \App\Models\Category::find(\App\Models\Category::find($category_id)->parent_id)->getTranslation('name') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="mb-2">
                                                    <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Models\Category::find($category_id)->slug) }}">
                                                        <i class="las la-angle-left"></i>
                                                        {{ \App\Models\Category::find($category_id)->getTranslation('name') }}
                                                    </a>
                                                </li>
                                                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category_id) as $key => $id)
                                                    <li class="ml-4 mb-2">
                                                        <a class="text-reset fs-14" href="{{ route('products.category', \App\Models\Category::find($id)->slug) }}">{{ \App\Models\Category::find($id)->getTranslation('name') }}</a>
                                                    </li>
                                                @endforeach
                                            @endif

                   </ul>
                </div>
             </div>
          </article>

       </div>
    </li>
	</ul>
                           
                            
                        </div>
                  <div class="mb-6">
				    <div class="border-bottom1 border-color-11 mt-3 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
						<div class="deals"> 
                     <hr>
                  </div>
                     </div>
				   <div class="border-bott">
					 

		<div id="accordion" class="accordion-container contentsarround">
		@if (Route::currentRouteName() != 'products.brand')	
				<article class="content-entry open">
				 <h4 class="font-size-14 mb-3 font-weight-bold article-title">Brands  <i></i></h4>
						<div class="accordion-content" style="display:block;">
							<div class="border-topsd">
						
							@foreach (\App\Models\Brand::all() as $brand)							
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input name="brand" onchange="filter()" value="{{ $brand->slug }}" type="checkbox" class="custom-control-input" id="brand{{$brand->id}}" @isset($brand_id) @if ($brand_id == $brand->id) checked @endif @endisset>
                              <label class="custom-control-label" for="brand{{$brand->id}}">{{ $brand->getTranslation('name') }} 
                              <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                              </label>
                           </div>
                        </div>
							@endforeach
						
                         
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapses" id="collapseBrand1">
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="brandGucci">
                                 <label class="custom-control-label" for="brandGucci">Cera 
                                 <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                 </label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="brandMango">
                                 <label class="custom-control-label" for="brandMango">Goeka 
                                 <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                 </label>
                              </div>
                           </div>
                            
                           
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                        <span class="link__icon text-gray-27 bg-white">
                        <span class="link__icon-inner">+</span>
                        </span>
                        <span class="link-collapse__default">Show more</span>
                        <span class="link-collapse__active">Show less</span>
                        </a>
								</div>
						</div>
					
				</article>
				@endif
				
				@if (get_setting('color_filter_activation'))
				<article class="content-entry">
						 <h4 class="font-size-14 mb-3 font-weight-bold article-title"> {{ translate('Filter by color')}} <i></i></h4>
						<div class="accordion-content">
								<div class="border-topsd">
								 <div class="border-bott"> 
                        <!-- Checkboxes -->
						@foreach ($first_five_color as $key => $color)
							
							<div class="form-group  align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="color{{$color->id}}" name="color"
										value="{{ $color->code }}"
										onchange="filter()"
															@if(isset($selected_color) && $selected_color == $color->code) checked @endif >
                              <label class="custom-control-label" for="color{{$color->id}}">{{$color->name}} <span class="text-gray-25 font-size-12 font-weight-normal"></span> <span class="mx-auto color_code">
							  <div style="background-color:{{$color->code}}" class="w-100 h-100"></div> </span></label>
                           </div>
                        </div>
						 @endforeach
                        
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapses2" id="collapseBrand1">
						@foreach ($colors as $key => $color)
                          <div class="form-group  align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="color{{$color->id}}" name="color"
										value="{{ $color->code }}"
										onchange="filter()"
															@if(isset($selected_color) && $selected_color == $color->code) checked @endif >
                              <label class="custom-control-label" for="color{{$color->id}}">{{$color->name}} <span class="text-gray-25 font-size-12 font-weight-normal"></span> <span class="mx-auto color_code">
							  <div style="background-color:{{$color->code}}" class="w-100 h-100"></div> </span></label>
                           </div>
                        </div>
						    @endforeach
                           
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
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
				<article class="content-entry">
				 <h4 class="font-size-14 mb-3 font-weight-bold article-title">Product Line  <i></i></h4>
						<div class="accordion-content">
							<div class="border-topsd">
							  <div class="border-bott"> 
                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                              <label class="custom-control-label" for="categoryTshirt">Fittings  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryShoes">
                              <label class="custom-control-label" for="categoryShoes">Showering <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryAccessories">
                              <label class="custom-control-label" for="categoryAccessories">Pipes and fittings<span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTops">
                              <label class="custom-control-label" for="categoryTops">Shower  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryBottom">
                              <label class="custom-control-label" for="categoryBottom">Wash basin  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapses5" id="collapseBrand1">
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                 <label class="custom-control-label" for="categoryShorts">Water closet <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryHats">
                                 <label class="custom-control-label" for="categoryHats">Lav faucet  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Bath spout <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
                        <span class="link__icon text-gray-27 bg-white">
                        <span class="link__icon-inner">+</span>
                        </span>
                        <span class="link-collapse__default5">Show more</span>
                        <span class="link-collapse__active5">Show less</span>
                        </a>
                        <!-- End Link -->
                     </div> 
							</div>
						</div>
					 
				</article>

				<article class="content-entry">
					 <h4 class="font-size-14 mb-3 font-weight-bold article-title">Product Type  <i></i></h4>
						<div class="accordion-content">
							<div class="border-topsd">
							 <div class="border-bott"> 
                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                              <label class="custom-control-label" for="categoryTshirt">Lav faucet  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryShoes">
                              <label class="custom-control-label" for="categoryShoes">Pipes and fittings <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryAccessories">
                              <label class="custom-control-label" for="categoryAccessories">Valve trim <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTops">
                              <label class="custom-control-label" for="categoryTops">Bath spout  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryBottom">
                              <label class="custom-control-label" for="categoryBottom">Counter top basin   <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapses6" id="collapseBrand1">
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                 <label class="custom-control-label" for="categoryShorts">Rainhead <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryHats">
                                 <label class="custom-control-label" for="categoryHats">Showerhead <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Shower arm <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
                        <span class="link__icon text-gray-27 bg-white">
                        <span class="link__icon-inner">+</span>
                        </span>
                        <span class="link-collapse__default6">Show more</span>
                        <span class="link-collapse__active6">Show less</span>
                        </a>
                        <!-- End Link -->
                     </div>
							</div>
						</div>
					 
				</article>
				<article class="content-entry">
						 <h4 class="font-size-14 mb-3 font-weight-bold article-title">Type/ Mounting Type  <i></i></h4>
						<div class="accordion-content">
							<div class="border-topsd">
							 <div class="border-bott"> 
                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                              <label class="custom-control-label" for="categoryTshirt">Valve trim  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryShoes">
                              <label class="custom-control-label" for="categoryShoes">P Trap  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryAccessories">
                              <label class="custom-control-label" for="categoryAccessories">Single flow  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTops">
                              <label class="custom-control-label" for="categoryTops">S Trap <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryBottom">
                              <label class="custom-control-label" for="categoryBottom">Manual valve   <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapses7" id="collapseBrand1">
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                 <label class="custom-control-label" for="categoryShorts">Pipe  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryHats">
                                 <label class="custom-control-label" for="categoryHats">Coupler <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Tee <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
                        <span class="link__icon text-gray-27 bg-white">
                        <span class="link__icon-inner">+</span>
                        </span>
                        <span class="link-collapse__default7">Show more</span>
                        <span class="link-collapse__active7">Show less</span>
                        </a>
                        <!-- End Link -->
                     </div>  
							</div>
						</div>
					 
				</article>
				<article class="content-entry">
			 <h4 class="font-size-14 mb-3 font-weight-bold article-title">Shape<i></i></h4>
						<div class="accordion-content">
								<div class="border-topsd">
								 <div class="border-bott"> 
                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                              <label class="custom-control-label" for="categoryTshirt">Square  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryShoes">
                              <label class="custom-control-label" for="categoryShoes">Round <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryAccessories">
                              <label class="custom-control-label" for="categoryAccessories">Oval  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryTops">
                              <label class="custom-control-label" for="categoryTops">Rectangle <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="categoryBottom">
                              <label class="custom-control-label" for="categoryBottom">Rectangular    <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                           </div>
                        </div>
                        <!-- End Checkboxes -->
                        <!-- View More - Collapse -->
                        <div class="collapses8" id="collapseBrand1">
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                 <label class="custom-control-label" for="categoryShorts">Geometric  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categoryHats">
                                 <label class="custom-control-label" for="categoryHats">Organic  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Rectengular  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Geometric rectangular  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Round & oval  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Square soft edges  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                           <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="categorySocks">
                                 <label class="custom-control-label" for="categorySocks">Square  <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                              </div>
                           </div>
                        </div>
                        <!-- End View More - Collapse -->
                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
                        <span class="link__icon text-gray-27 bg-white">
                        <span class="link__icon-inner">+</span>
                        </span>
                        <span class="link-collapse__default8">Show more</span>
                        <span class="link-collapse__active8">Show less</span>
                        </a>
                        <!-- End Link -->
                     </div>
								</div>
						</div>
					 
				</article>
			 

		</div>
 
 
<div class="range-slider">
   <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
	  <div class="mt-1 text-gray-111 d-flex mb-4"> 
         <div class="wrapper pro_range w-100 position-relative aiz-range-slider">
  <div class="values w-100 d-flow-root">
    <span id="range1" class="float-left slide_ranges_left" >
	 
	@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif 
	</span>
    <span id="range2" class="float-right"> @if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::max('unit_price') }} @endif </span>
  </div>
  <div class="container1   position-absolute  mt-2 pt-1">
    <div class="slider-track"></div>
    <input type="range" min="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif" max="10000" @if (isset($min_price)) value="{{ $min_price }}"
                                                        @elseif($products->min('unit_price') > 0)
                                                            value="{{ $products->min('unit_price') }}"
                                                        @else value="0" @endif id="slider-1" oninput="slideOne()">
    <input type="range" min="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif" max="10000" @if (isset($min_price)) value="{{ $min_price }}"
                                                        @elseif($products->max('unit_price') > 0)
                                                            value="{{ $products->max('unit_price') }}"
                                                        @else value="0" @endif id="slider-2" oninput="slideTwo()">
  </div>
</div>
                        
                        </div>
                      
                     </div>
					 
					 
 <style>
 .noUi-target {
    background: #FAFAFA;
    border-radius: 4px;
    border: 1px solid #D3D3D3;
    box-shadow: inset 0 1px 1px #f0f0f0, 0 3px 6px -5px #bbb;
}
.noUi-horizontal {
    height: 18px;
}
.noUi-target {
    position: relative;
}
 </style>
                <div class="range-slider">
				<h4 class="font-size-14 mb-3 font-weight-bold">Price range</h4>
                                            <div
                                                id="input-slider-range"
                                                data-range-value-min="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::min('unit_price') }} @endif"
                                                data-range-value-max="@if(\App\Models\Product::count() < 1) 0 @else {{ \App\Models\Product::max('unit_price') }} @endif"
                                            ></div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                                        @if (isset($min_price))
                                                            data-range-value-low="{{ $min_price }}"
                                                        @elseif($products->min('unit_price') > 0)
                                                            data-range-value-low="{{ $products->min('unit_price') }}"
                                                        @else
                                                            data-range-value-low="0"
                                                        @endif
                                                        id="input-slider-range-value-low"
                                                    ></span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                                        @if (isset($max_price))
                                                            data-range-value-high="{{ $max_price }}"
                                                        @elseif($products->max('unit_price') > 0)
                                                            data-range-value-high="{{ $products->max('unit_price') }}"
                                                        @else
                                                            data-range-value-high="0"
                                                        @endif
                                                        id="input-slider-range-value-high"
                                                    ></span>
                                                </div>
                                            </div>
                                        </div>
                      
                        <!-- End Link -->
                     </div>
                  </div>
                  
               </div>
               <div class="col-xl-9 col-wd-9gdot5">
			   
                  <div class="head-cnt work-center text-left" style="margin-bottom:20px;">
                     <div class="bounceIn animated">
                       <!-- <div class="our-latest-border" style="    margin: 0px;"></div>-->
                     <div class="row">
					 <div class="col-md-8">  <h5>Showing 593 results for Cement</h5></div>
					 <div class="col-md-4">
					<div class="woocommerce-ordering">
					<label class="mb-0 opacity-50">{{ translate('Sort by')}}</label>
						 <i class="fa fa-angle-down" aria-hidden="true"></i>
							<select name="sort_by" onchange="filter()" class="orderby" aria-label="Shop order">
								 <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                        <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>
                                        <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
							</select>
							<input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
					</div>
					 
					 </div>
					 </div>
                     </div>
                  </div>
                  <div class="row">
				   @foreach ($products as $key => $product)
                     <div class="col-md-3">
                         @include('frontend.partials.product_box_1',['product' => $product])
                     </div>
                      @endforeach
                     
                      
                  </div>
				   <nav class="paginations" aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="javascript:void(0);"> << </a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0);"> >> </a></li>
  </ul>
</nav>
               </div>
			     
            </div>
		</form>
            <!-- End Brand Carousel -->
         </div>
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
			   <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon1.png')}}" alt=""> <h3>All Under One roof</h3><p>Ebuildbazaar Stores from others is their pricing.</p></a></div>
			   <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon2.png')}}" alt=""><h3>Widest Product Range</h3><p>Ebuildbazaar Stores from others is their pricing.</p></a></div>
			   <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon3.png')}}" alt=""><h3>On Time Delivery</h3><p>Ebuildbazaar Stores from others is their pricing.</p></a></div>
			   <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon4.png')}}" alt=""><h3>Product Knowledge Support</h3><p>Ebuildbazaar Stores from others is their pricing.</p></a></div>
			   <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon5.png')}}" alt=""><h3>Genuine Products</h3><p>Ebuildbazaar Stores from others is their pricing.</p></a></div>
			   <div class="col-md-2"><a href="#1"><img src="{{static_asset('assets_web/img/iconon6.png')}}" alt=""><h3>365 Days Wholesale Rates</h3><p>Ebuildbazaar Stores from others is their pricing.</p></a></div>
			   </div>
			   </div>
		 </div>
		 </section>
		 <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
		noUiSlider: function(){
            if ($(".aiz-range-slider")[0]) {
                $(".aiz-range-slider").each(function () {
                    var c = document.getElementById("input-slider-range"),
                    d = document.getElementById("input-slider-range-value-low"),
                    e = document.getElementById("input-slider-range-value-high"),
                    f = [d, e];

                    noUiSlider.create(c, {
                        start: [
                            parseInt(d.getAttribute("data-range-value-low")),
                            parseInt(e.getAttribute("data-range-value-high")),
                        ],
                        connect: !0,
                        range: {
                            min: parseInt(c.getAttribute("data-range-value-min")),
                            max: parseInt(c.getAttribute("data-range-value-max")),
                        },
                    }),
                    
                    c.noUiSlider.on("update", function (a, b) {
                        f[b].textContent = a[b];
                    }),
                    c.noUiSlider.on("change", function (a, b) {
                        rangefilter(a);
                    });
                });
            }
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection

@section('script')
    
@endsection
