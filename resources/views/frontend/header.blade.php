<style>
    #header_bg {
        background: rgb(50, 95, 227);
        background: linear-gradient(90deg, rgba(50, 95, 227, 0.8044467787114846) 20%, rgba(199, 45, 45, 1) 100%, rgba(0, 212, 255, 1) 100%);
        opacity: none;
    }

</style>
<!-- Header Start -->
<header class="pb-0 ">
    <div id="header_bg"  class="top-nav top-header sticky-header fixed-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars text-white"></i>
                            </span>
                        </button>
                        <a href="{{ url('') }}" class="web-logo nav-logo">
                            <img src="{{ asset('public/assets_web/images/logo.png') }}"
                                class="img-fluid blur-up lazyload" alt="" style="width:14rem">
                        </a>
                        <div class="middle-box">
                            <div class="location-box">
                                <button class="btn location-button" data-bs-toggle="modal"
                                    data-bs-target="#locationModal">
                                    <span class="location-arrow ps-4">
                                        All<i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" style="border: transparent;" class="form-control"
                                        placeholder="I'm searching for...">
                                    <button class="btn" type="button" id="button-addon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search font-light">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x font-light">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="contact-us.html" class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-phone-call">
                                                <path
                                                    d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>24/7 Delivery</h6>
                                            <h5>+91 888 104 2340</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-heart">
                                            <path
                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                                <li id="cart_items" class="right-side">
                                    @include('frontend.partials.cart')
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>Hello,</h6>
                                            <h5>My Account</h5>
                                        </div>
                                    </div>
                                    @if (Auth::check() && Auth::user()->user_type !== 'admin')
                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href={{ url('profile') }}>My Profile </a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href={{ url('logout') }}>Logout</a>
                                                </li>

                                            </ul>
                                        </div>
                                    @else
                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href={{ url('/login') }}>User Login</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href={{ url('/vendor-login') }}>Vendor Login</a>
                                                </li>

                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:84px; padding-top:22px ; padding-bottom:10px" class="container-fluid-lg header-bottom-s   d-md-block">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">
                        <button class="dropdown-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left">
                                <line x1="17" y1="10" x2="3" y2="10"></line>
                                <line x1="21" y1="6" x2="3" y2="6"></line>
                                <line x1="21" y1="14" x2="3" y2="14"></line>
                                <line x1="17" y1="18" x2="3" y2="18"></line>
                            </svg>
                            <span>All Categories</span>
                        </button>
                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <ul class="category-list" id="callingAllCategory">
                                @foreach (\App\Models\Category::where('parent_id', 0)->get() as $key => $category)
                                    <li class="onhover-category-list">
                                        <a href="" class="category-name">
                                            <img src="{{ uploaded_asset($category->icon) }}" alt="">
                                            <h6>{{ $category->name }}</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            @foreach (\App\Models\Category::where('parent_id', $category->id)->get() as $subcat)
                                                @php
                                                    $chcatex = \App\Models\Category::where(
                                                        'parent_id',
                                                        $subcat->id,
                                                    )->exists();
                                                @endphp
                                                <div class="list-1">
                                                    <div class="category-title-box">
                                                        <h5>{{ $subcat->name }}</h5>
                                                    </div>
                                                    @if ($chcatex)
                                                        <ul>
                                                            @foreach (\App\Models\Category::where('parent_id', $subcat->id)->get() as $chcat)
                                                                <li>
                                                                    <a
                                                                        href="{{ route('products.category', $chcat->slug) }}">{{ $chcat->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            @endforeach

                                        </div>
                                    </li>
                                @endforeach

                                {{-- <li class="onhover-category-list">
                                    <a href="javascript:void(0)" class="category-name">
                                        <h6>More....</h6>
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button"
                                        data-bs-dismiss="offcanvas"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0)">Home</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">All Categories
                                            </a>
                                            <ul class="dropdown-menu" id="callingAllCat">
                                                <li>
                                                    <a class="dropdown-item" href="#">desktop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Laptop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Printer</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">CCTV</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Accessories</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">All Brands
                                            </a>
                                            <ul class="dropdown-menu" id="callingAllBrands">
                                                <li>
                                                    <a class="dropdown-item" href="#">desktop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Laptop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Printer</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">CCTV</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Accessories</a>
                                                </li>
                                            </ul>
                                        </li>
                                        {{-- <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">All Brands
                                 </a>
                                 <!-- <div class="dropdown-menu dropdown-menu-3 dropdown-menu-2">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="dropdown-column m-0">
                                                <h5 class="dropdown-header">
                                                    Product Pages </h5>
                                                <a class="dropdown-item" href="product-left-thumbnail.html">Product
                                                    Thumbnail</a>
                                                <a class="dropdown-item" href="product-4-image.html">Product Images</a>
                                                <a class="dropdown-item" href="product-slider.html">Product Slider</a>
                                                <a class="dropdown-item" href="product-sticky.html">Product Sticky</a>
                                                <a class="dropdown-item" href="product-accordion.html">Product Accordion</a>
                                                <a class="dropdown-item" href="product-circle.html">Product Tab</a>
                                                <a class="dropdown-item" href="product-digital.html">Product Digital</a>

                                                <h5 class="custom-mt dropdown-header">Product Features
                                                </h5>
                                                <a class="dropdown-item" href="product-circle.html">Bundle (Cross Sale)</a>
                                                <a class="dropdown-item" href="product-left-thumbnail.html">Hot Stock
                                                    Progress <label class="menu-label">New</label>
                                                </a>
                                                <a class="dropdown-item" href="product-sold-out.html">SOLD OUT</a>
                                                <a class="dropdown-item" href="product-circle.html">
                                                    Sale Countdown</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="dropdown-column m-0">
                                                <h5 class="dropdown-header">
                                                    Product Variants Style </h5>
                                                <a class="dropdown-item" href="product-rectangle.html">Variant Rectangle</a>
                                                <a class="dropdown-item" href="product-circle.html">Variant Circle <label class="menu-label">New</label></a>
                                                <a class="dropdown-item" href="product-color-image.html">Variant Image
                                                    Swatch</a>
                                                <a class="dropdown-item" href="product-color.html">Variant Color</a>
                                                <a class="dropdown-item" href="product-radio.html">Variant Radio Button</a>
                                                <a class="dropdown-item" href="product-dropdown.html">Variant Dropdown</a>
                                                <h5 class="custom-mt dropdown-header">Product Features
                                                </h5>
                                                <a class="dropdown-item" href="product-left-thumbnail.html">Sticky
                                                    Checkout</a>
                                                <a class="dropdown-item" href="product-dynamic.html">Dynamic Checkout</a>
                                                <a class="dropdown-item" href="product-sticky.html">Secure Checkout</a>
                                                <a class="dropdown-item" href="product-bundle.html">Active Product view</a>
                                                <a class="dropdown-item" href="product-bundle.html">
                                                    Active
                                                    Last Orders
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="dropdown-column m-0">
                                                <h5 class="dropdown-header">
                                                    Product Features </h5>
                                                <a class="dropdown-item" href="product-image.html">Product Simple</a>
                                                <a class="dropdown-item" href="product-rectangle.html">
                                                    Product Classified <label class="menu-label">New</label>
                                                </a>
                                                <a class="dropdown-item" href="product-size-chart.html">Size Chart <label class="menu-label">New</label></a>
                                                <a class="dropdown-item" href="product-size-chart.html">Delivery &
                                                    Return</a>
                                                <a class="dropdown-item" href="product-size-chart.html">Product Review</a>
                                                <a class="dropdown-item" href="product-expert.html">Ask
                                                    an Expert</a>
                                                <h5 class="custom-mt dropdown-header">Product Features
                                                </h5>
                                                <a class="dropdown-item" href="product-bottom-thumbnail.html">Product
                                                    Tags</a>
                                                <a class="dropdown-item" href="product-image.html">Store
                                                    Information</a>
                                                <a class="dropdown-item" href="product-image.html">Social Share <label class="menu-label warning-label">Hot</label>
                                                </a>
                                                <a class="dropdown-item" href="product-left-thumbnail.html">Related Products
                                                    <label class="menu-label warning-label">Hot</label>
                                                </a>
                                                <a class="dropdown-item" href="product-right-thumbnail.html">Wishlist &
                                                    Compare</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 d-xl-block d-none">
                                            <div class="dropdown-column m-0">
                                                <div class="menu-img-banner">
                                                    <a class="text-title" href="product-circle.html">
                                                        <img src="../assets/{{ asset('public/assets_web/images/mega-menu.png')}}" alt="banner">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> -->
                              </li> --}}
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">desktop
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Dell</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Hp</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Lenvo</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Acer</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Asus</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Laptop
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Dell</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Hp</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Lenvo</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Acer</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Asus</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Printer
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">HP</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Canon</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Brother</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Epson</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">TVS</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">CCTV
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">HK Vision</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">CP Plus</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Dahua</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Prama</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Uniview</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Honeywell</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Zebion</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Hi Focus</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="about-list right-nav-about">
                        {{-- <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-language"
                                    data-bs-toggle="dropdown">
                                    <img src="../assets/{{ asset('public/assets_web/images/country/united-states.png') }}"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                    <span>English</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="english">
                                            <img src="{{ asset('public/assets_web/images/country/united-kingdom.png') }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <span>English</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li> --}}
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-top">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-3 d-xxl-block d-none">
                <div class="top-left-header">
                    <span class="text-white"></span>
                </div>
            </div>
            {{-- <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                <div class="header-offer">
                    <div class="notification-slider">
                        <div>
                            <div class="timer-notification">
                                <h6><strong class="me-1">Welcome to Microsoft</strong>Wrap new offers/gift
                                    every single day on Weekends.<strong class="ms-1">New Coupon Code: Fast024
                                    </strong>
                                </h6>
                            </div>
                        </div>
                        <div>
                            <div class="timer-notification">
                                <h6>Something you love is now on sale!
                                    <a href="shop-left-sidebar.html" class="text-white">Buy Now
                                        !</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-3">
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <li class="">
            <a href="{{ url('') }}">
                <i class="bi bi-house-door text-white" style="font-size: 20px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="bi bi-list text-white" style="font-size: 20px;"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="search-box">
                <i class="bi bi-search text-white" style="font-size: 20px;"></i>
                <span>Search</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="notifi-wishlist">
                <i class="bi bi-heart text-white" style="font-size: 20px;"></i>
                <span>My Wish</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i class="bi bi-cart text-white" style="font-size: 20px;"></i>
                <span>Cart</span>
            </a>
        </li>
    </ul>
</div>
<!-- mobile fix menu end -->
