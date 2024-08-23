@extends('frontend.master') @section('meta_title'){{ $blog->meta_title }}@stop @section('meta_description'){{ $blog->meta_description }}@stop @section('meta_keywords'){{ $blog->meta_keywords }}@stop @section('meta')
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $blog->meta_title }}">
<meta itemprop="description" content="{{ $blog->meta_description }}">
<meta itemprop="image" content="{{ uploaded_asset($blog->meta_img) }}">
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="{{ $blog->meta_title }}">
<meta name="twitter:description" content="{{ $blog->meta_description }}">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="{{ uploaded_asset($blog->meta_img) }}">
<!-- Open Graph data -->
<meta property="og:title" content="{{ $blog->meta_title }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ route('blog.details', $blog->slug) }}" />
<meta property="og:image" content="{{ uploaded_asset($blog->meta_img) }}" />
<meta property="og:description" content="{{ $blog->meta_description }}" />
<meta property="og:site_name" content="{{ env('APP_NAME') }}" /> @if (get_setting('facebook_comment') == 1)
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId={{ env('FACEBOOK_APP_ID') }}&autoLogAppEvents=1" nonce="ji6tXwgZ"></script> @endif @endsection @section('content')
<section class="pageTitle" style="background-image:url({{static_asset('assets_web/img/banner/blog-banner-designs.png')}});    height: 246px;">
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
						<li class="breadcrumb-item"><a href="{{url('blog')}}">Blogs</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{$blog->title}} </li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="container details-product product-catpro ">
		<div class="row">
			<div class="col-xl-9 col-wd-9gdot5  mb-5">
				<div class="main-container fl-wrap fix-container-init blog-pages">
					<div class="blog-detail-banners mb-3"> <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($blog->banner) }}" alt=""> </div>
					<div class="section-title">
						<div class="deals" class="mb-1">
							<h3 class="mb-0"> {{$blog->title}}</h3> </div>
						<div class="deals">
							<hr> </div>
						<p class="mb-3">{{$blog->title}}</p>
					</div>
					<div class="single-post-header fl-wrap mt-3">
						<div class="author-link float-left">
							<a href="javascript:void(0);"><img src="{{static_asset('assets_web/img/auth3.jpg')}}" alt="" class="mx-2"> <span>By Admin</span></a>
						</div> <span class="post-date float-left"><i class="fa fa-clock"></i> Updated {{date('d-M-Y',strtotime($blog->created_at))}}</span>
						<ul class="post-opt float-right">
							<li><i class="fa fa-comments"></i> 4 </li>
							<li><i class="fa fa-eye"></i> 980 </li>
						</ul>
					</div>
					<div class="single-post-content_text">
						<h4 class="mb_head my-2 mt-3">Blogs Details</h4>
						{{-- <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor . Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor</p> --}}
						<div class="single-post-content_text_media fl-wrap">
							<div class="row">
								<div class="col-md-12">
									<p> {!! $blog->description !!} </p>
								</div>
							</div>
						</div>
						{{-- <h4 class="mb_head my-2 mt-3 mb-3">Comments</h4>
						<div class="comment-section">
							<div class=" d-flex">
								<div class="commetn-img"> <img src="img/autok.jpg" alt="comment"> </div>
								<div class="comment-text">
									<h2>Angela De</h2> <em>September 11 2020 at 900.am</em>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida sem sit amet molestie portitor. Suspendisse gravida sem sit amet molestie portitor? </p> <a href="#">Reply</a> </div>
							</div>
						</div>
						<div class="comment-section">
							<div class=" d-flex">
								<div class="commetn-img"> <img src="img/autok.jpg" alt="comment"> </div>
								<div class="comment-text">
									<h2>Angela De</h2> <em>September 11 2020 at 900.am</em>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida sem sit amet molestie portitor. Suspendisse gravida sem sit amet molestie portitor? </p> <a href="#">Reply</a> </div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
			<div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
				<div class="mb-8 border border-width-2 border-color-3 borders-radius-6 mb-3 blogs-border"> {{--
					<ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
						<!--<li class="link-category0">
                           <div class="dropdown-title"></div>
                        </li>-->
						<li class="listing-botoms"> <b>Blog Category</b>
							<ul class="list-unstyled dropdown-list listing_block filter p-0">
								<li><a class="dropdown-item1" href="javascript:void(0);"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blog1
                                            </a></li>
								<li><a class="dropdown-item1" href="javascript:void(0);"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blog2
                                            </a> </li>
								<li><a class="dropdown-item1" href="javascript:void(0);"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blog3
                                            </a> </li>
								<li><a class="dropdown-item1" href="javascript:void(0);"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blog4
                                            </a></li>
								<li><a class="dropdown-item1" href="javascript:void(0);"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blog6
                                            </a> </li>
							</ul>
						</li>
					</ul> --}} </div>
				<div class="box-widget fl-wrap">
					<div class="box-widget-content">
						<!-- content-tabs-wrap -->
						<div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
							<!--tabs -->
							<div class="tabs-container">
								<!--tab -->
								<div class="box-widget fl-wrap mt-2">
									<div class="section-title">
										<div class="deals" class="mb-1">
											<h3 class="mb-0 fs-14"> Follow Us</h3> </div>
										<div class="deals">
											<hr> </div>
									</div>
									<div class="box-widget-content">
										<div class="social-widget">
											<a href="https://www.facebook.com/eBuildBazaar.in" target="_blank" class="facebook-soc"> <i class="fab fa-facebook-f"></i> <span class="soc-widget-title">Follow us &nbsp; &nbsp; &nbsp;</span> <span class="soc-widget_counter"></span> </a>
											<a href="https://twitter.com/eBuildBazaar" target="_blank" class="twitter-soc"> <i class="fab fa-twitter"></i> <span class="soc-widget-title">Follow us</span> <span class="soc-widget_counter"></span> </a>
											<a href="https://www.youtube.com/channel/UCAYqGhXIK0owE7uMlhuKHvA" target="_blank" class="youtube-soc"> <i class="fab fa-youtube"></i> <span class="soc-widget-title">Follow us</span> <span class="soc-widget_counter"></span> </a>
											<a href="https://www.instagram.com/ebuildbazaar" target="_blank" class="instagram-soc"> <i class="fab fa-instagram"></i> <span class="soc-widget-title">Follow us</span> <span class="soc-widget_counter"></span> </a>
										</div>
									</div>
								</div> {{--
								<div class="box-widget fl-wrap">
									<div class="section-title">
										<div class="deals" class="mb-1">
											<h3 class="mb-0 fs-14"> Popular Tags</h3> </div>
										<div class="deals">
											<hr> </div>
									</div>
									<div class="box-widget-content">
										<div class="tags-widget"> <a href="#">Blog1</a> <a href="#">Blog2</a> <a href="#">Blog3</a> <a href="#">Blog4</a> <a href="#">Blog5</a> <a href="#">Blog6</a> </div>
									</div>
								</div> --}}
								<div class="section-title">
									<div class="deals" class="mb-1">
										<h3 class="mb-0 fs-14"> Recent Blogs</h3> </div>
									<div class="deals">
										<hr> </div>
								</div>
								<div class="tab">
									<div class="tab-content1" style="">
										<div class="post-widget-container fl-wrap"> @foreach ($recent_blogs as $item)
											<!-- post-widget-item -->
											<div class="post-widget-item fl-wrap d-flex mb-3">
												<div class="post-widget-item-media"> <a href="{{ url(" blog ").'/'. $item->slug }}"><img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($item->banner) }}" alt="{{ $item->title }}"></a> </div>
												<div class="post-widget-item-content">
													<h4 class="mb-1"><a href="{{ url("blog").'/'. $item->slug }}"> {{ $item->title }}</a></h4>
													<ul class="pwic_opt d-flex">
														<li><span><i class="far fa-clock"></i> {{ date('d-M-Y', strtotime($item->created_at)) }}</span></li>
														{{-- <li class="mx-1"><span><i class="fa fa-commenting"></i> 12</span></li>
														<li><span><i class="fa fa-eye"></i> 654</span></li> --}}
													</ul>
												</div>
											</div>
											<!-- post-widget-item end -->@endforeach </div>
									</div>
								</div>
								<!--tab  end-->
								<div class="box-widget fl-wrap">
									<div class="section-title">
										<div class="deals" class="mb-1">
											<h3 class="mb-0 fs-14"> Subscribe</h3> </div>
										<div class="deals">
											<hr> </div>
									</div>
									<div class="box-widget-content">
										<div id="footer-twiit" class="fl-wrap">
											<div class="form-comment">
												<form id="comment" method="POST" action="{{ route('subscribers.store') }}" autocomplete="off">
                                       @csrf
													<input type="text" id="name" name="email" placeholder="Email">
													<input style="margin-left: -31px;" type="submit" class="submits" value="Subscribe" id="comment_id">
                                    </form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--tabs end-->
						</div>
						<!-- content-tabs-wrap end -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Brand Carousel -->
	</div>
</div> @endsection