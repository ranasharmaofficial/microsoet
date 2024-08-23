@extends('frontend.master') 
@section('meta_title')
	{{ $detailedProduct->meta_title }}
@stop 
@section('meta_description')
	{{$detailedProduct->meta_description }}@stop @section('meta_keywords')
	{{ $detailedProduct->tags }}
@stop 
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
<meta property="product:price:currency" content="{{ $currency }}" />
<meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}"> 
@endsection 
@section('content')
<section class="pageTitle product-detail_banner"
	style="background-image:url({{static_asset('assets_web/img/orderbanner.png')}})">
	<div class="container"> </div>
</section>
<!--top banner end -->
<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
	<div class="container">
		<div class="row">
			<div class="col-md-12 breadmcrumsize">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb"> 
						<li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
						<li class="breadcrumb-item"><a
								href="product-building.php">{{$detailedProduct->category->getTranslation('name') }}</a>
						</li>
						<li class="breadcrumb-item"> {{ $detailedProduct->getTranslation('name') }}</li>
						<li class="breadcrumb-item active" aria-current="page"> Bulk Order</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="container details-product">
		<div class="row">
			<div class="col-xl-9 col-wd-9gdot5">
				<div class="row">
					<div class="col-md-6">
						<div class="product-box mb-0 zoom-left_hegt">
							<!--<div class="beachs">10% Off</div>-->
							<div class="zoom-left"> 
								<img id="zoom_03" src="{{ uploaded_asset($detailedProduct->thumbnail_img) }}"
									data-zoom-image="{{ uploaded_asset($detailedProduct->thumbnail_img) }}" />
								<div class="clearfix"></div>
								<div id="gallery_01"> 
									@foreach ($photos as $key => $photo)
									<a href="#" class="elevatezoom-gallery active" data-update=""
										data-image="{{ uploaded_asset($photo) }}"
										data-zoom-image="{{ uploaded_asset($photo) }}"> 
										<img src="{{ uploaded_asset($photo) }}" width="100" /> 
									</a> 
									@endforeach 
									
									@foreach($detailedProduct->stocks as $key => $stock) 
										@if($stock->image != null) 
										<a href="javascript:void(0);" class="elevatezoom-gallery active" data-update=""
											data-image="{{ uploaded_asset($stock->image) }}"
											data-zoom-image="{{ uploaded_asset($stock->image) }}">
											<img src="{{ uploaded_asset($stock->image) }}" width="100" />
										</a> 
										@endif 
									@endforeach
								</div>
							</div>
						</div>
						
					</div>

					<div class="col-md-6">
						<div class="product-box1">
							<div class="discrptions">
								<h5 class="showcatlist">{{ $detailedProduct->getTranslation('name') }} </h5>
								<div class="pricebox mt-2">
									<div class="d-flex d-inlinemob">
										<div class="title w-60 pt-2">
											<h4 class="tag-line325"> Made In India
												<img class="flag-detls" src="{{static_asset('assets_web/img/in.jpg')}}" alt="">
											</h4>
										</div>
										<div class="d-flex align-items-center w-40 m-0">
											<div class="col-auto">
												<h4 class="tag-line325"><span class="mr-2 opacity-50">
													{{ translate('Sold by')}}: </span>
													@if ($detailedProduct->added_by == 'seller')
														<a href="" class="text-reset">{{ $detailedProduct->user->shop->name}}</a>
													@else
														{{ translate('Inhouse product') }}
													@endif
												</h4>
											</div> 
											
											@if ($detailedProduct->brand != null)
												<div class="col-auto"> 
													<a href="{{ route('products.brand',$detailedProduct->brand->slug) }}">
														<img class="icon-imagw mx-2" height="40"
															src="{{ uploaded_asset($detailedProduct->brand->logo) }}"
															alt="{{ $detailedProduct->brand->getTranslation('name') }}">
													</a>
												</div> 
											@endif
										</div>
									</div>
									<div class="clearfix"></div>

									<div class="d-flex"> 
										@if(home_price($detailedProduct) != home_discounted_price($detailedProduct))
											<div class="price">
												<h3> {{ home_discounted_price($detailedProduct) }}</h3>
											</div> 
											<div class="cutprice mx-2">
												<h3>
													{{ home_price($detailedProduct) }}
												</h3>
											</div> 
										@endif

										<div id="show_total_price" class="price d-none">Total Price:
											<div id="total_price" class=""></div>
										</div> 
									</div>
									<div class="title">Inclusive of all taxes</div>
									<p class="col-cpvc-2">CPVC SDR 11 CPVC Pipes 40 mm 1.50 
										<a href="#descriptions1">More Details</a> 
									</p>
								</div>
							</div> 
							<img class="w-100 mb-2" src="{{static_asset('assets_web/img/productcoupon.jpg')}} alt=""> 

							<!---Brand section start--->
							<div class="backtabs-dp_servicespros2 mt-2">
								<div class="optionbox">
									<div class="clear-fix"></div>
									@if ($detailedProduct->brand != null)
									<h4 class="dthd">Brands : 
										<span>
											<a href="#1" style="color: inherit;text-decoration: none;">
												{{$detailedProduct->brand->name}}
											</a>
										</span>
									</h4>
									@endif
									<ul class="optbrand">
										@if ($detailedProduct->brand != null)
										<!--for current product-->
										<li>
											<a href="javascript:void(0);" class="detbrand selected">
												<img src="{{ uploaded_asset($detailedProduct->brand->logo) }}"
													height="30" class="loadimg" alt="">
												<span class="price">
													{{home_discounted_base_price($detailedProduct)}}
												</span>
											</a>
											<!-- detbrand -->
										</li>
										<!--for current product-->
										@endif
										<!--for other products-->
									

										@foreach($brand_products as $brandproducts)
										<li>
											<a href="{{route('product',$brandproducts->slug )}}" class="detbrand">
												@if($brandproducts->brand !=null)
												<img src="{{ uploaded_asset($brandproducts->brand->logo) }}" height="30"
													class="loadimg" alt="">
												@else
												<img src="" height="30"
													class="loadimg" alt="">
												@endif
												<span class="price">{{home_discounted_base_price($brandproducts)}}</span>
											</a>
											<!-- detbrand -->
										</li>
										@endforeach


									</ul>
								</div>
								<hr />


							</div>
							<!---Brand section end--->
							<h4>Highlights</h4>
							<ul class="ulproducts ulproducts4">
								<li>
									<b>Sub Category </b>&nbsp; :&nbsp; 
									{{ $detailedProduct->category->getTranslation('name') }}
								</li>
								<li>
									<b>Products </b>&nbsp; :&nbsp; 
									{{ $detailedProduct->getTranslation('name') }}
								</li>
								<li>
									<b>Brand </b>&nbsp; :&nbsp; 
									{{ $detailedProduct->brand->getTranslation('name') }}
								</li>
								<li>
									<b>SKU </b>&nbsp; :&nbsp; 
									{{ $detailedProduct->sku}}
								</li>
							</ul>
						</div>
					</div>
					<div id="descriptions1"></div>
				</div>
				<div class="cards_sections bulk-order3">
					<div class="container1">
						<div class="card">
							<div class="card-header gutters-5">
								<div class="row">
									<div class="col col-md-8 col-sm-12 text-center text-md-left">
										<h5 class="mb-md-0 h6"
											style="text-align:left;line-height:40px !important;text-transform: uppercase;">
											Bulk Order for Builder</h5>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="discrptions_button">
											<h6 style="margin:0px;     padding: 0px;   text-align: center;"> <a
													href="bulk-order2.php"
													style="height: 33px;padding: 3px 15px;line-height: 26px;margin: 0px;">All
													Category Bulk Order</a> </h6>
										</div>
									</div>
								</div>
								<p class="para-dets"> Make bulk orders easy and fast. Simply search the product you want
									to add, put in your desired quantity, and add to cart. Fewer clicks to check out!
									You can set quantity limits on individual products. The look and text of the form is
									customizable, too! Login to see prices by Wholesale Pricing Discount and products
									hidden by Wholesale Lock Manager. 
								</p>
								
								<!-- Filter Section Start -->
								<div class="wof_top_bar">
									<div class="wof_filter_button_wrapper">
										<div class="multiselect">
											<div class="selectBox" onclick="showCheckboxes()">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
												<select>
												<option>Select Third Category</option>
												</select>
												<div class="overSelect"></div>
											</div>
											<div id="checkboxes">                                                    
												@foreach($category_list as $category)
													<label for="{{$category->id}}">
														<input class="third_category" name="third_category" type="checkbox" id="{{$category->id}}" value="{{$category->id}}"/>
														{{$category->name}}
													</label>
												@endforeach
											</div>
										</div>
									</div>

									<div class="wof_sort_by_main_wrapper" style="white-space:nowrap;">
										<div class="wof_sort_by_button_wrapper form-relative"> 
											<span class="lbl_sort_by">Sort by&nbsp; &nbsp;
												<i class="fa fa-angle-down" aria-hidden="true"></i>
											</span> 
										</div>

										<div class="sort-by-dropdown-content" tabindex="-1" style="display: none;">
											<div class="sort-by-option title-ascending-sort-container">
												<input type="radio" class="sort_by title-ascending-sort"
													name="sort_by" value="newest">
												<label for="title-ascending-sort">Newest</label>
											</div>
											<div class="sort-by-option title-descending-sort-container">
												<input type="radio" class="sort_by title-descending-sort" 
													name="sort_by" value="oldest">
												<label for="title-descending-sort">Oldest</label>
											</div>
											<div class="sort-by-option created-ascending-sort-container">
												<input type="radio" class="sort_by created-ascending-sort"
													name="sort_by" value="price-asc">
												<label for="created-ascending-sort">Price low to high</label>
											</div>
											<div class="sort-by-option created-descending-sort-container">
												<input type="radio" class="sort_by created-descending-sort" 
													name="sort_by" value="price-desc">
												<label for="created-descending-sort">Price High to low</label>
											</div>
										</div>
									</div>

									<input type="text" placeholder="Search by product name..."
										class="wof_txt_search" id="keywords" name="keywords" autocomplete="off">
									<div class="wof_search_icon"> 
										<i class="fa fa-search" aria-hidden="true"></i>
									</div>

									<div class="typed-bulk-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px;">
										<div class="search-bulk-preloader absolute-top-center">
											<div class="dot-loader"><div></div><div></div><div></div></div>
										</div>
										<div class="search-nothing d-none p-3 text-center fs-16">
					
										</div>
										<div id="search-content" class="text-left">
										</div>
									</div>

									<div class="file-input">
										<input type="file" id="file" class="file">
										<label for="file">Upload Parchi</label>
									</div>

									<div class="wof_cart_widget_wrapper"
										style=" background-color: #1274c0; border-radius: 5px; border: none;">
										<i class="fa fa-cart-arrow-down" aria-hidden="true"
											style="color: #fff;   padding-right: 5px;"></i>
										<span class="lbl_cart_total" style="color:#fff;">0</span>
									</div>

								</div>
								<!-- Filter Section End -->
							</div>

							<div class="card-body">
								<form method="post" action="{{route('bulkproduct.addCarts')}}">
									@csrf
									<input type="hidden" name="category" value="{{$detailedProduct->category_id}}">
									<input type="hidden" name="types" value="from_product">
									<div class="table-crack-overflow">
										<table class="table aiz-table mb-0 footable footable-1 breakpoint-lg">
											<thead>
												<tr class="footable-header">
													<th
														style="  line-height:25px;     width: 35px;  padding-right: 0px;">
														S. No.</th>
													<th style="line-height:25px;    width: 70px;">Product</th>
													<th style="width: 110px;   line-height: 25px;">Item</th>
													<th style="width: 45px;">Price in {{$currency}}
														<br>(Per Piece)
													</th>
													<th style="width: 45px;line-height: 25px;">Discount %</th>
													<th style="width: 40px;line-height: 25px;"> <span>GST %</span>
													</th>
													<th style="position:relative;    width:60px;">
														<div>Enter Qty.
															<br> (Piece)
														</div>
														<div><img
																src="{{static_asset('assets_web/img/DownArrowTMT.gif')}}"
																style="width: 9px;position: absolute;top: 27px;right: 19px;">
														</div>
													</th>
													<th style="width: 66px;"> Amount <span> 18%</span> GST Paid
													</th>
												</tr>
											</thead>
											
											<tbody id='ckeckboxselect'>
												
											</tbody>
										</table>
									</div>

									<!-- <table id="tbTol" class="tmttbldgn table-bordered "
										style="width:100%; font-size:13px; text-align:center;">
										<tbody>
											<tr>
												<td colspan="4" class="align-left border-right"> 
													<b style="font-size:14px;  margin-right:14px;  padding-left:5px;">
													TOTAL
													</b> 
												</td>
												<td style="width:10%; border-left:1px solid #ccc; text-align:center;">
													<input id="txtplistqtytotl" name="text" type="button"
														class="AlltotleQTY" value=""
														style="background-color:#fff; border:1px solid #fff; ">
												</td>
												<td style="width:10%; border-left: 1px solid #ccc;">
													<input name="final_total_price" id="final_total_price" type="text" class="Alltotle"
														value="0"
														style="background-color:#fff; border:1px solid #fff; ">
												</td>
											</tr>
										</tbody>
									</table> -->

									<table style="width: 100%; margin: 0px;border: 1px solid #ccc;">
										<tbody>
											<tr style="width:100%;">
												<td style="width:50%; text-align:left; font-size:12px; padding-left:10px;">
													<!-- <span> Price Update Date : 04/Dec/2021 </span> 
													<br>
													<div style="margin:10px;"></div>-->
													<div> <b>Note </b>: To make a Quotation, you first need to <a
															href="{{url('login')}}">login</a> </div>
												</td>
												<td style="width:50%;  margin:10px 0px;">
													<div class="snipcart-details">
														<a href="#1">
															<input type="submit" value="Go To Cart" id="addpiece"
																class="button" style="padding:12px 50px;">
														</a>
													</div>
													<!-- <input name="text" class="Alltotle" value="0"> -->
												</td>
											</tr>
										</tbody>
									</table>
								</form>
								<div class="col-md-saa left">
									<div class="closedirs">
										
										<!-- Comparizon TMT End -->
										<div class="clearfix"></div>
										<div style="font-size:13px; margin-bottom:10px;    margin-top: 10px;">
											<b>Delivery Location</b> : Udaipur (Rajasthan)
										</div>
										<div class="clearfix"> </div>
										<div>
											<table class="col-sm-12">
												<tbody>
													<tr>
														<!-- Shipping Police -->
														<td
															style=" text-align:center; padding: 15px 5px; border:1px solid #dfdfdf;">
															<img src="{{static_asset('assets_web/img/icons_Shipping_apnagharmart.png')}}"
																style="width:25%;">
															<br> <a href="shipping-policy.php"
																style="background-color:#fff; color:#EF4E28; border:1px solid #fff; font-size:12px;">
																Shipping Policy</a>
														</td>
														<!-- Cancellation Policy -->
														<td
															style=" text-align:center;   padding: 15px 5px;border:1px solid #dfdfdf;">
															<img src="{{static_asset('assets_web/img/icons_cancel_apnagharmart.png')}}"
																style="width:25%;">
															<br> <a href="cancellation-policy.php"
																style="background-color:#fff; color:#EF4E28; border:1px solid #fff; font-size:12px;">
																Cancellation Policy</a>
														</td>
														<!-- Return Police -->
														<td
															style=" text-align:center;   padding: 15px 5px;  border:1px solid #dfdfdf; ">
															<img src="{{static_asset('assets_web/img/icons_return_apnagharmart.png')}}"
																style=" width:25%; ">
															<br> <a href="return-policy.php"
																style="background-color:#fff; color:#EF4E28; border:1px solid #fff; font-size:12px;">
																Return Policy</a>
														</td>
														<!-- Made in  India-->
														<td class=""
															style="text-align:center;     padding: 15px 5px; border:1px solid #dfdfdf;">
															<img src="{{static_asset('assets_web/img/flugin.jpg')}}"
																style="width:30%;">
															<br>
															<label style="font-size:13px;">Made in India</label>
															<br>
														</td>
													</tr>
												</tbody>
											</table>
											<div class="clearfix" style="padding:3px;"> </div>
											<p style="    font-size: 13px;  margin: 0px;">Sold by : growciti. </p>
											<div style="padding-top:14px;">
												<a href="https://api.whatsapp.com/send?text=Share%20" data-text=""
													data-href="" data-type="WhatsApp Share" data-bdcolor=""
													data-fcolor="#ffffff" data-bgcolor="#4eb64f" data-temp="template_1"
													data-image="" aria-describedby="a11y-external-message"
													target="_blank"
													style="background-color:#4EB64F; padding: 6px; border-radius: 18px;">
													<i class="fa-brands fa-whatsapp" aria-hidden="true"
														style="color:#fff; font-size:16px; padding-left:5px;"></i> <b
														style="color:#fff; font-size:14px; padding-right:5px;"> Share
														on Whatsapp</b> </a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--  <div class="row mx-2"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination" style="justify-content:end;"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>-->
						</div>
					</div>
				</div>
			</div>

			
			<div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
				<div class="md-hide">
					<div class="deliverybox"> <span class="title"><i class="fa fa-map-marker"></i>Delivery by 24th
							April</span>
							<form><input type="number" name="pincode" value="670002" placeholder="Enter Pincode"> <a href="#"
								class="changebulk">Change</a></form>
						<ul class="row delivery">
							<li class="col-md-4"> <img src="{{static_asset('assets_web/img/shipping.svg')}}"
									class="loadimg delimg" alt=""> <span class="name">Priority</span> <span
									class="status">Delivery</span> </li>
							<li class="col-md-4"> <img src="{{static_asset('assets_web/img/cancellation.svg')}}"
									class="loadimg delimg" alt=""> <span class="name">Cancellation</span> <span
									class="status">Allowed</span> </li>
						</ul>
						<div class="details">
							<p style="display: none;"><i class="fa fa-inr" aria-hidden="true"></i> Cash on Delivery
								Available</p>
							<p><i class="fa fa-inr" aria-hidden="true"></i> Online Payment Available</p>
						</div>
					</div>
					<!-- deliverybox -->
				</div>
				<div class="cartPointsPan">
					<div class="pointsWrap">
						<div class="icons"><img src="{{static_asset('assets_web/img/iconcome1.svg')}}"
								alt="Lowest Price Guaranteed"></div>
						<div class="pointLabel">Lowest Price Guaranteed</div>
					</div>
					<div class="pointsWrap">
						<div class="icons"><img src="{{static_asset('assets_web/img/iconcome2.svg')}}"
								alt="Worldwide Delivery"></div>
						<div class="pointLabel">Worldwide Delivery</div>
					</div>
					<div class="pointsWrap">
						<div class="icons"><img src="{{static_asset('assets_web/img/iconcome3.svg')}}"
								alt="Easily Track your Order"></div>
						<div class="pointLabel">Easily Track your Order</div>
					</div>
					<div class="pointsWrap">
						<div class="icons"><img src="{{static_asset('assets_web/img/iconcome4.svg')}}"
								alt="Buy Products on Credit"></div>
						<div class="pointLabel">Buy Products on Credit</div>
					</div>
					<div class="scheduledCallback">
						<div><img src="{{static_asset('assets_web/img/iconcome5.svg')}}" alt="scheduleCallback"></div>
						<div>
							<div>Any Confusion "No worries"</div>
							<button type="button" class="btn btn-default">Request A Call Back</button>
							<div class="hide">
								<div class="modal">
									<div class="modalInnerContent callbackModal m">
										<div class="modalHeader">
											<div class="modalTitle">Request A Call Back</div>
											<button type="button" class="btn close">
												<svg width="14" height="14" viewBox="0 0 24 24"
													style="display: inline-block; vertical-align: middle;">
													<path
														d="M14.6,12l8.8-8.8C23.8,2.8,24,2.4,24,1.9s-0.2-1-0.5-1.3c-0.7-0.7-1.9-0.7-2.6,0L12,9.4L3.2,0.6c-0.7-0.7-1.9-0.7-2.6,0s-0.7,1.9,0,2.6L9.4,12l-8.8,8.8c-0.7,0.7-0.7,1.9,0,2.6s1.9,0.7,2.6,0l8.8-8.8l8.8,8.8c0.4,0.4,0.8,0.5,1.3,0.5s1-0.2,1.3-0.5c0.4-0.4,0.5-0.8,0.5-1.3s-0.2-1-0.5-1.3L14.6,12z"
														fill="#000"></path>
												</svg>
											</button>
										</div>
										<div class="modalContent">
											<iframe title="Contact form" frameborder="0" src="#2"
												style="height: 650px; width: 99%; border: none;"></iframe>
										</div>
									</div> <span role="button" tabindex="0" class="backdropOverlay"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Form enquiry start here -->
				<aside id="sidebar" class="sidebar-wrap" style="margin-bottom:30px;">
					<div class="property-form-wrap">
						<div class="property-form clearfix">
							<form method="post" action="{{route('makeEnquiry')}}" enctype="multipart/form-data"> @csrf
								<div class="agent-details">
									<div class="d-flex align-items-center">
										<div class="agent-image">
											<img class="rounded" src="{{ static_asset('assets/img/avatar-place.png') }}" alt="Brittany Watkins" width="70" height="70">
										</div>
										<ul class="agent-information list-unstyled">
											<li class="agent-name">
												<i class="fa fa-user-o" aria-hidden="true"></i> Admin
											</li>
										</ul>
									</div>
								</div>
								<div class="form-group">
									<input class="form-control" name="name" required value="" type="text" placeholder="Name">
								</div>
								<!-- form-group -->
								<div class="form-group">
									<input class="form-control" name="phone" required value="" type="text" placeholder="Phone">
								</div>
								<!-- form-group -->
								<div class="form-group">
									<input class="form-control" name="email" required value="" type="email" placeholder="Email">
								</div>
								<!-- form-group -->
								<div class="form-group form-group-textarea">
									<textarea class="form-control hz-form-message" name="message" rows="4" placeholder="Message">
										Hello, I am interested in [Modern Apartment]
									</textarea>
								</div>
								<!-- form-group -->
								<div class="form-group">
									<div class="dropdown1 bootstrap-select1 form-control1">
										<select required name="user_type" class="selectpicker form-control"
											title="Select">
											<option class="bs-title-option" value="">Selected</option>
											<option value="buyer">I'm a buyer</option>
											<option value="tennant">I'm a tennant</option>
											<option value="agent">I'm an agent</option>
											<option value="other">Other</option>
										</select>
									</div>
									<!-- selectpicker -->
								</div>
								<!-- form-group -->
								<div class="form-group">
									<label class="control control--checkbox m-0 hz-terms-of-use">
										<input type="checkbox" name="privacy_policy">By submitting this form I agree to
										<a target="_blank" href="#1">Terms of Use</a> 
									</label>
								</div>
								<!-- form-group -->
								<button type="submit" class="houzez_agent_property_form btn btn-secondary btn-half-width"> 
									<span class="btn-loader houzez-loader-js"></span> 
									Send Message
								</button>
								<a href="tel:999999999" class="btn btn-secondary-outlined btn-half-width">
									<span class="hide-on-click">Call</span>
								</a> 
								<a target="_blank" href="https://api.whatsapp.com/send, I am interested in [Modern Apartment]"
									class="btn btn-secondary-outlined btn-full-width mt-10">
									<i class="houzez-icon icon-messaging-whatsapp mr-1"></i> 
									WhatsApp
								</a>
							</form>
						</div>
						<!-- property-form -->
					</div>
					<!-- property-form-wrap -->
				</aside>
				<!--Form enquiry end here -->
			</div>
		</div>
	</div>
</div>

<div class="headsections111">
	<div class="container">
		<div class="service-pros m-0 p-0">
			<div class="head-cnt work-center text-center mb-0">
				<div class="bounceIn animated">
					<h4>{{ translate('Related products')}}</h4>
					<hr class="underlinskd">
				</div>
			</div>
		</div>
		<div class="owl-carousel owl-theme trending0"> 
			@foreach($related_product_list as $key => $related_product)
				<div class="item">
					<div class="product-box">
						<div class="beachs">{{$related_product->discount}}% Off</div> <img
							src="{{ uploaded_asset($related_product->thumbnail_img) }}"
							alt="{{ $related_product->getTranslation('name') }}">
						<div class="discrptions">
							<h5>{{ $related_product->getTranslation('name') }} </h5>
							<h6>{{ home_discounted_base_price($related_product) }}</h6>
						</div>
						<div class="discrptions_button">
							<h5><a href="{{ route('product', $related_product->slug) }}">View Detail</a></h5>
							<h6><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h6>
						</div>
					</div>
				</div> 
			@endforeach
		</div>
	</div>
</div> 

@include('frontend.partials.youmaylike')
@include('frontend.partials.why_buy_product_section')



@endsection

@section('script')
<script>
	$("input[type=checkbox]").on("click", function () {
		var product_id = $(this).data("id");
		var product_code = $(this).data("code");
		if ($(this).is(":checked")) {
			$("#product-item-" + product_id).css("border", "#d96557 3px solid");
			$("#product-" + product_id).val(product_code);
		}
		else if ($(this).is(":not(:checked)")) {
			$("#product-item-" + product_id).css("border", "none");
			$("#product-" + product_id).val("");
		}
	});

	$(document).ready(function () {
		onChageLoadData();

		// filter by sort by filter 
		$('.sort_by').change(function() {
			get_common_filter_function();
		});

		// filter by third category filter
		$('.third_category').change(function() {
			get_common_filter_function();
		});

		// filter/Search by Product Name
		$('#keywords').on('keyup', function(){
			var searchKey = $('#keywords').val();
			var sort_by = $( 'input[name=sort_by]:checked' ).val();
			var third_category = get_category_array();
			if(searchKey.length > 2){
				onChageLoadData(third_category, sort_by, searchKey);
			}
        });

		// Return checked brands in array 
        function get_category_array(){
            var category_arr = [];
            $('.third_category:checked').each(function () {
                category_arr[i++] = $(this).val();
            });
            category_arr = category_arr.filter(function( element ) {
                return element !== undefined;
            });
            return category_arr;
        }

		// Get all variable value
		function get_common_filter_function(){
            var sort_by = $( 'input[name=sort_by]:checked' ).val();
			var third_category = get_category_array();
			onChageLoadData(third_category, sort_by);
        }

		// common ajax for fiter data by sort by and third category and search keywords wise
		function onChageLoadData(third_category, sort_by, searchKey){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});

			jQuery.ajax({
				url: "{{ route('get_filter_bulk_order_data') }}",
				method: "get",
				data: {
					slug: "{{$slug}}",
					sort_by: sort_by,
					third_category: third_category,
					searchKey: searchKey,
				},
				success: function(result){
					console.log (result);
					if(result.status == true){
					    $('#ckeckboxselect').html(result.data);
					}
				}
			});
		}

	});

	var expanded = false;
	function showCheckboxes() {
		var checkboxes = document.getElementById("checkboxes");
		if (!expanded) {
			checkboxes.style.display = "block";
			expanded = true;
		} else {
			checkboxes.style.display = "none";
			expanded = false;
		}
	}

</script>
@endsection