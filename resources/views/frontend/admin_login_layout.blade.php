<!DOCTYPE html>
@if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description') )" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords') )">

    @yield('meta')

    @if(!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://growciti.in/public/assets_web/css/bootstrap.mins.css" rel="stylesheet">
    <link href="https://growciti.in/public/assets_web/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css">
    <link rel="icon" href="https://growciti.in/public/uploads/all/pxYqrEFudgc2RUXpviRPeO0sdBHhZ4q9pInSMsiG.webp">
    <link rel="stylesheet" href="https://growciti.in/public/assets_web/css/animate.min.css" />
    <link rel="stylesheet" href="https://growciti.in/public/assets_web/css/animate.compat.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://growciti.in/public/assets_web/css/jquery-ui.css" />
    <script src="https://growciti.in/public/assets_web/js/jquery.min.js" type="text/javascript"></script>
    <script src="https://growciti.in/public/assets_web/js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="https://growciti.in/public/assets_web/js/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">
    <style>
	.bg-primary{background-color:#1274c0 !important}
		.bg-warning1{background-color:#ff7713 !important}
		.bg-warning1:hover{background-color:#ff7713 !important}
		.text-info {color: #1274c0!important;}
		.height-330{height:330px}
		a{text-decoration:none;}
        .fs-45{font-size:45px;}
		.fs-5 {font-size: 18px !important;margin-bottom: 0px;}
		.sellers-admin p {font-size: 15px;}
		.f6_1 {font-size: 15px!important;}
        @media(max-width:991px) and (min-width:768px){
        .fs-45{font-size:25px;}
		.text-left {
			text-align: center!important;
		}
		.back_login{
			display:none;
		}
		.d-content{
			display:contents!important;
		}
		.vendor_shop {
			padding-left: 25px;
		}
		}
		@media(max-width:991px) and (min-width:600px){
		.w-50 {
			width: 100%!important;
		}
		.text-end {
			text-align: center!important;
		}
		}
        @media(max-width:767px) and (min-width:280px){
         .fs-45{font-size:25px;}
		 .height-330{height:auto}
		 .vendor_shop {
			height:auto;
			width: 100%;
			overflow:initial;
			margin-left: 29px;
		}
		.back_login{
			display:none;
		}
		.py-5{
			padding-top:0px!Important;
			padding-bottom:0px!Important;
		}
		.regbtn{
			text-align:center!Important;
		}
		.text-left {
			text-align: center!important;
		}
        }
	</style>



    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        :root{
            --primary: {{ get_setting('base_color', '#e62d04') }};
            --hov-primary: {{ get_setting('base_hov_color', '#c52907') }};
            --soft-primary: {{ hex2rgba(get_setting('base_color','#e62d04'),.15) }};
        }

        #map{
            width: 100%;
            height: 250px;
        }
        #edit_map{
            width: 100%;
            height: 250px;
        }

        .pac-container { z-index: 100000; }
    </style>

</head>
<body>
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column">
        @yield('content')
    </div>

    @yield('script')

    @php
        echo get_setting('footer_script');
    @endphp

    <!-- SCRIPTS -->
    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="https://growciti.in/public/assets_web/js/bootstrap.mins.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://growciti.in/public/assets_web/js/popper.mins.js"></script>
    <script src="https://growciti.in/public/assets_web/js/slick.min.js"></script>
    <script src="https://growciti.in/public/assets_web/js/plugins.js" type="text/javascript"></script>
    <script src="https://growciti.in/public/assets_web/js/jquery.elevatezoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://growciti.in/public/assets_web/js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
    <script src="{{static_asset('assets_web/js/sweetalert2.all.min.js')}}" type="text/javascript"></script>
    <!-- <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script> -->
</body>
</html>
