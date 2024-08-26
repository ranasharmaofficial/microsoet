@extends('frontend.master')

@section('title')
@endsection

@section('homepage')
@endsection


@section('content')


<div class="category-slider-2 product-wrapper no-arrow">
    @foreach (\App\Models\Category::get() as $category)
    <div>
        <a href="{{ route('products.category', $category->slug) }}" class="category-box category-dark bg-transparent mt-0">
            <div>
                <img src="{{ uploaded_asset($category->icon) }}" class="blur-up lazyload" alt="{{ $category->name }}">
                <h5>{{ $category->name }}</h5>
            </div>
        </a>
    </div>
    @endforeach


    {{-- <div>
        <a href="shop-left-sidebar.html" class="category-box category-dark">
            <div>
                <img src="../assets/svg/1/cup.svg" class="blur-up lazyload" alt="">
                <h5>Beverages</h5>
            </div>
        </a>
    </div>

    <div>
        <a href="shop-left-sidebar.html" class="category-box category-dark">
            <div>
                <img src="../assets/svg/1/meats.svg" class="blur-up lazyload" alt="">
                <h5>Meats & Seafood</h5>
            </div>
        </a>
    </div>

    <div>
        <a href="shop-left-sidebar.html" class="category-box category-dark">
            <div>
                <img src="../assets/svg/1/breakfast.svg" class="blur-up lazyload" alt="">
                <h5>Breakfast</h5>
            </div>
        </a>
    </div>

    <div>
        <a href="shop-left-sidebar.html" class="category-box category-dark">
            <div>
                <img src="../assets/svg/1/frozen.svg" class="blur-up lazyload" alt="">
                <h5>Frozen Foods</h5>
            </div>
        </a>
    </div>

    <div>
        <a href="shop-left-sidebar.html" class="category-box category-dark">
            <div>
                <img src="../assets/svg/1/milk.svg" class="blur-up lazyload" alt="">
                <h5>Milk & Dairies</h5>
            </div>
        </a>
    </div>

    <div>
        <a href="shop-left-sidebar.html" class="category-box category-dark">
            <div>
                <img src="../assets/svg/1/pet.svg" class="blur-up lazyload" alt="">
                <h5>Pet Food</h5>
            </div>
        </a>
    </div> --}}
</div>

<!-- Home Section Start -->
    <section class="home-section pt-2">
        <div class="container-fluid-lg p-0 m-0">
            <div class="row g-4 m-0 p-0">
                <div class="col-xl-2 ratio_65 d-none d-md-block">
                    <div class="row g-4 p-0 m-0">

                        @foreach ($product_category->take(9) as $category)
                            <div class="col-xl-6 col-md-6 p-0 m-0">
                                <div class="home-contain text-center banner-left-cart">
                                    <a href="{{ route('products.category', $category->slug) }}">
                                        <img src="{{ uploaded_asset($category->icon) }}" alt="{{ $category->name }}">
                                        <p>{{ $category->name }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="col-xl-6 col-md-6 p-0 m-0">
                            <div class="home-contain text-center banner-left-cart">
                                <a href="#">
                                    <img src="{{ asset('public/assets_web/images/television (1).png') }}" alt="">
                                    <p>T.V</p>
                                </a>
                            </div>
                        </div>
                       <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                           <a href="#">
                           <img src="{{ asset('public/assets_web/images/laptop-screen (1).png')}}" alt="">
                           <p>Laptop</p>
                           </a>
                       </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                           <a href="#">
                           <img src="{{ asset('public/assets_web/images/cctv-camera (1).png')}}" alt="">
                           <p>CCTV</p>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                          <a href="#"> <img src="{{ asset('public/assets_web/images/pc (1).png')}}" alt="">
                          <p>Mouse</p></a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                           <a href="#">
                           <img src="{{ asset('public/assets_web/images/printer (2).png')}}" alt="">
                           <p>Printer</p>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                          <a href="#">
                          <img src="{{ asset('public/assets_web/images/pendrive-outlined.png')}}" alt="">
                          <p>Pendrive</p>
                          </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                          <a href="#">
                          <img src="{{ asset('public/assets_web/images/ytd.png')}}" alt="">
                          <p>Keyboard</p>
                          </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                           <a href="#">
                           <img src="{{ asset('public/assets_web/images/hard-disk.png')}}" alt="">
                           <p>Hard-disk</p>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                          <a href="#">
                          <img src="{{ asset('public/assets_web/images/computer.png')}}" alt="">
                          <p>Destop</p>
                          </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-md-6 p-0 m-0">
                        <div class="home-contain text-center banner-left-cart">
                          <a href="#">
                          <img src="{{ asset('public/assets_web/images/fan.png')}}" alt="">
                          <p>Fan</p>
                          </a>
                        </div>
                     </div> --}}

                    </div>
                </div>
				@if (get_setting('home_slider_images') != null)
                <div class="col-xl-6 ratio_65">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
						@php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                            @foreach ($slider_images as $key => $value)
                            <div onclick="window.location.href='{{ json_decode(get_setting('home_slider_links'), true)[$key] }}'" class="carousel-item @if($key+1==1) active @endif">
                                <img src="{{ uploaded_asset($slider_images[$key]) }}" class="d-block w-100 rounded"
                                    alt="..." class="banner-slider-n">
                            </div>
							@endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
				@endif
                <div class="col-xl-4 ratio_65">
                    <div class="row g-4">

                        <div class="col-xl-6 col-md-6">
                            <div class="home-contain text-center">
                                <a href="#"><img src="{{ asset('public/assets_web/images/right-t.png') }}"
                                        alt="" class="right-side-banner"> </a>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6">
                            <div class="home-contain text-center">
                                <a href="#">
                                    <img src="{{ asset('public/assets_web/images/right-twod.png') }}" alt=""
                                        class="right-side-banner">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="home-contain text-center">
                                <a href="#"><img src="{{ asset('public/assets_web/images/ty0.png') }}" alt=""
                                        class="right-side-banner"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="home-contain text-center">
                                <img src="{{ asset('public/assets_web/images/y987.png') }}" alt=""
                                    class="right-side-banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Home Section End -->
    <!-- banner-card -->
    <section class="banner-section ratio_60 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container-fluid-lg">
            <div class="banner-slider slick-initialized slick-slider">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 1292px; transform: translate3d(0px, 0px, 0px);">
                        <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false"
                            tabindex="0" style="width: 323px;">
                            <div class="banner-contain hover-effect bg-size blur-up lazyloaded"
                                style="background-image: url(&quot;{{ asset('public/assets_web/images/vegetable/banner/pmk.png') }}&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">
                                <img src="{{ asset('public/assets_web/images/vegetable/banner/pmk.png') }}"
                                    class="bg-img blur-up lazyload" alt="" style="display: none;">
                                <div class="banner-details">
                                    <div class="banner-box">
                                        <h6 class="text-danger">5% OFF</h6>
                                        <h5>Apple iPhone 15 <br>(Pink, 256 GB)</h5>
                                        <h6 class="text-content">256 GB ROM </h6>
                                    </div>
                                    <a href="shop-left-sidebar.html" class="banner-button text-white" tabindex="0">Shop
                                        Now <i class="fa-solid fa-right-long ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="0"
                            style="width: 323px;">
                            <div class="banner-contain hover-effect bg-size blur-up lazyloaded"
                                style="background-image: url(&quot;{{ asset('public/assets_web/images/vegetable/banner/bards.png') }}&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">
                                <img src="{{ asset('public/assets_web/images/vegetable/banner/bards.png') }}"
                                    class="bg-img blur-up lazyload" alt="" style="display: none;">
                                <div class="banner-details">
                                    <div class="banner-box">
                                        <h6 class="text-danger">5% OFF</h6>
                                        <h5>Boult Y1 Pro</h5>
                                        <h6 class="text-content">60Hz</h6>
                                    </div>
                                    <a href="shop-left-sidebar.html" class="banner-button text-white" tabindex="0">Shop
                                        Now <i class="fa-solid fa-right-long ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="0"
                            style="width: 323px;">
                            <div class="banner-contain hover-effect bg-size blur-up lazyloaded"
                                style="background-image: url(&quot;{{ asset('public/assets_web/images/vegetable/banner/coolar.png') }}&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">
                                <img src="{{ asset('public/assets_web/images/vegetable/banner/coolar.png') }}"
                                    class="bg-img blur-up lazyload" alt="" style="display: none;">
                                <div class="banner-details">
                                    <div class="banner-box">
                                        <h6 class="text-danger">5% OFF</h6>
                                        <h5>Thomson 105 <br>L Desert Air Cooler</h5>
                                        <h6 class="text-content">Grey, 105 L Desert Air </h6>
                                    </div>
                                    <a href="shop-left-sidebar.html" class="banner-button text-white" tabindex="0">Shop
                                        Now <i class="fa-solid fa-right-long ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" tabindex="0"
                            style="width: 323px;">
                            <div class="banner-contain hover-effect bg-size blur-up lazyloaded"
                                style="background-image: url(&quot;{{ asset('public/assets_web/images/vegetable/banner/tus.png') }}&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">
                                <img src="{{ asset('public/assets_web/images/vegetable/banner/tus.png') }}"
                                    class="bg-img blur-up lazyload" alt="" style="display: none;">
                                <div class="banner-details">
                                    <div class="banner-box">
                                        <h6 class="text-danger">5% OFF</h6>
                                        <h5>dji OSMO Action <br> 3 Adventure</h5>
                                        <h6 class="text-content">(Black, 12 MP)</h6>
                                    </div>
                                    <a href="shop-left-sidebar.html" class="banner-button text-white" tabindex="0">Shop
                                        Now <i class="fa-solid fa-right-long ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-card -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
			{{-- <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                    <div class="p-sticky">
                        <div class="category-menu">
                            <h3>Category</h3>
                            <ul>
                                <li>
                                    <div class="category-list">
                                        <img src="{{ asset('public/assets_web/images/all_brands.png') }}" alt="">
                                        <h5>
                                            <a href="shop-left-sidebar.html">All Brands</a>
                                        </h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-list">
                                        <img src="{{ asset('public/assets_web/images/desktop.png') }}" alt="">
                                        <h5>
                                            <a href="shop-left-sidebar.html">desktop</a>
                                        </h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-list">
                                        <img src="{{ asset('public/assets_web/images/laptop.jpg') }}" alt="">
                                        <h5>
                                            <a href="shop-left-sidebar.html">Laptop</a>
                                        </h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-list">
                                        <img src="{{ asset('public/assets_web/images/cctv.jpg') }}" alt="">
                                        <h5>
                                            <a href="shop-left-sidebar.html">CCTV</a>
                                        </h5>
                                    </div>
                                </li>
                                <!-- <li>
                                          <div class="category-list">
                                              <img src="../assets/svg/1/frozen.svg" class="blur-up lazyload" alt="">
                                              <h5>
                                                  <a href="shop-left-sidebar.html">Frozen Foods</a>
                                              </h5>
                                          </div>
                                          </li>
                                          <li>
                                          <div class="category-list">
                                              <img src="../assets/svg/1/biscuit.svg" class="blur-up lazyload" alt="">
                                              <h5>
                                                  <a href="shop-left-sidebar.html">Biscuits & Snacks</a>
                                              </h5>
                                          </div>
                                          </li>
                                          <li>
                                          <div class="category-list">
                                              <img src="../assets/svg/1/grocery.svg" class="blur-up lazyload" alt="">
                                              <h5>
                                                  <a href="shop-left-sidebar.html">Grocery & Staples</a>
                                              </h5>
                                          </div>
                                          </li>
                                          <li>
                                          <div class="category-list">
                                              <img src="../assets/svg/1/drink.svg" class="blur-up lazyload" alt="">
                                              <h5>
                                                  <a href="shop-left-sidebar.html">Wines & Alcohol Drinks</a>
                                              </h5>
                                          </div>
                                          </li>
                                          <li>
                                          <div class="category-list">
                                              <img src="../assets/svg/1/milk.svg" class="blur-up lazyload" alt="">
                                              <h5>
                                                  <a href="shop-left-sidebar.html">Milk & Dairies</a>
                                              </h5>
                                          </div>
                                          </li>
                                          <li class="pb-30">
                                          <div class="category-list">
                                              <img src="../assets/svg/1/pet.svg" class="blur-up lazyload" alt="">
                                              <h5>
                                                  <a href="shop-left-sidebar.html">Pet Foods</a>
                                              </h5>
                                          </div>
                                          </li> -->
                            </ul>
                            <ul class="value-list">
                                <li>
                                    <div class="category-list">
                                        <h5 class="ms-0 text-title">
                                            <a href="shop-left-sidebar.html">Value of the Day</a>
                                        </h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-list">
                                        <h5 class="ms-0 text-title">
                                            <a href="shop-left-sidebar.html">Top 50 Offers</a>
                                        </h5>
                                    </div>
                                </li>
                                <li class="mb-0">
                                    <div class="category-list">
                                        <h5 class="ms-0 text-title">
                                            <a href="shop-left-sidebar.html">New Arrivals</a>
                                        </h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ratio_156 section-t-space">
                            <div class="home-contain hover-effect">
                                <img src="../assets/images/vegetable/banner/8.jpg')}}" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Electronic</h6>
                                        <h3 class="text-uppercase fw-normal"><span class="theme-color fw-bold">Shop
                                                Now</span> </h3>
                                        <h3 class="fw-light">every hour</h3>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ratio_medium section-t-space">
                            <div class="home-contain hover-effect">
                                <img src="../assets/images/vegetable/banner/11.jpg')}}" class="img-fluid blur-up lazyload"
                                    alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h4 class="text-yellow text-exo home-banner">Organic</h4>
                                        <h2 class="text-uppercase fw-normal mb-0 text-russo theme-color">fresh</h2>
                                        <h2 class="text-uppercase fw-normal text-title">Vegetables</h2>
                                        <p class="mb-3">Super Offer to 50% Off</p>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-t-space">
                            <div class="category-menu">
                                <h3>Trending Products</h3>
                                <ul class="product-list border-0 p-0 d-block">
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('public/assets_web/images/pom.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html" class="text-title">
                                                        <h6 class="name">15-fb0040AX HP Victus AMD Ryzen 5-5600H 15.6
                                                            inches/39.6 cm FHD Gaming Laptop (8GB RAM/512GB SSD/GTX 1650 4GB
                                                            Graphics/144Hz/9ms Response Time/Windows 11/MSO/Backlit KB/B&O
                                                            Audio/Xbox Pass, 30 Day)
                                                        </h6>
                                                    </a>
                                                    <span>55,000</span>
                                                    <h6 class="price theme-color">25% OFF</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('public/assets_web/images/blackcemra.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html" class="text-title">
                                                        <h6 class="name">Wireless 4 MP Hikvision CCTV Bullet Camera, For
                                                            Outdoor Use</h6>
                                                    </a>
                                                    <span>₹ 4,000/ PieceGet Latest Price</span>
                                                    <h6 class="price theme-color">30% OFF</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('public/assets_web/images/printer3.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html" class="text-title">
                                                        <h6 class="name">HP Smart Tank 670 All-in-One Auto Duplex WiFi
                                                            Integrated Ink Tank Colour Wired Color Home Inkjet Printers,
                                                            Scanner, Copier- High Capacity Tank (6000 Black, 8000 Colour)
                                                            with Automatic Ink</h6>
                                                    </a>
                                                    <span>₹17,499</span>
                                                    <h6 class="price theme-color">33.33% Off</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-0">
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('public/assets_web/images/samsungtv.png') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html" class="text-title">
                                                        <h6 class="name">Samsung 24-inch (60.46cm) FHD Flat 1,920 x 1,080
                                                            Monitor, IPS, 75 Hz, Bezel Less Design, AMD FreeSync, Flicker
                                                            Free, HDMI, D-sub, (LS24C310EAWXXL, Black)</h6>
                                                    </a>
                                                    <span> ₹7,599</span>
                                                    <h6 class="price theme-color">90% Off</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>--}}
                
				<div class="col-xxl-12 col-xl-12">
				{{-- <div class="title title-flex">
                        <div>
                            <h2>Top Save Today</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                            <p>Don't miss this opportunity at a special discount just for this week.</p>
                        </div>
                        <div class="timing-box">
                            <div class="timing">
                                <i data-feather="clock"></i>
                                <h6 class="name">Expires in :</h6>
                                <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                    <ul>
                                        <li>
                                            <div class="counter">
                                                <div class="days">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="hours">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="minutes">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="seconds">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-b-space">
                        <div class="product-border border-row overflow-hidden">
                            <div class="product-box-slider no-arrow">
                                <div>
                                    <div class="row m-0">
                                        <div class="col-12 px-0">
                                            <div class="product-box">
                                                <div class="product-image">
                                                    <a href="{{ url('product_detail.php') }}">
                                                        <img src="{{ asset('public/assets_web/images/hp2.png') }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <ul class="product-option">
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="View">
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#view">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Compare">
                                                            <a href="compare.html">
                                                                <i data-feather="refresh-cw"></i>
                                                            </a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Wishlist">
                                                            <a href="wishlist.html" class="notifi-wishlist">
                                                                <i data-feather="heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-detail">
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">HP All-in-One PC Ryzen 5 7520U 27-inch(68.6cm)
                                                            FHD IPS Display, 16GB LPDDR5, 1TB SSD, AMD Radeon Graphics,
                                                            Wireless Keyboard and mouse combo, FHD Camera, (Win 11, MSO,
                                                            Shell White,</h6>
                                                    </a>
                                                    <h5 class="sold text-content">
                                                        <span class="theme-color price">₹ 56,990</span>
                                                        <del>₹ 73,264</del>
                                                    </h5>
                                                    <div class="product-rating mt-sm-2 mt-1">
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
                                                        <h6 class="theme-color">In Stock</h6>
                                                    </div>
                                                    <div class="add-to-cart-box">
                                                        <button class="btn btn-add-cart addcart-button">Add
                                                            <span class="add-icon">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </span>
                                                        </button>
                                                        <div class="cart_qty qty-box">
                                                            <div class="input-group">
                                                                <button type="button" class="qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input"
                                                                    type="text" name="quantity" value="0">
                                                                <button type="button" class="qty-right-plus"
                                                                    data-type="plus" data-field="">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0">
                                            <div class="product-box">
                                                <div class="product-image">
                                                    <a href="product-left-thumbnail.html">
                                                        <img src="{{ asset('public/assets_web/images/pc.png') }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <ul class="product-option">
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="View">
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#view">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Compare">
                                                            <a href="compare.html">
                                                                <i data-feather="refresh-cw"></i>
                                                            </a>
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Wishlist">
                                                            <a href="wishlist.html" class="notifi-wishlist">
                                                                <i data-feather="heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-detail">
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">HP Slim Desktop 13th Gen Intel Core i3-13100 (8
                                                            GB RAM/512 GB SSD/Intel UHD Graphics 510SP Black Wireless
                                                            Keyboard and Mou...
                                                            HP Slim Desktop 13th Gen Intel Core i3-13100 (8 GB RAM/512 GB
                                                            SSD/Intel UHD Graphics 510SP Black Wireless Keyboard and Mouse
                                                            combo/Win11/MSO/1 Year Warranty,Dark Black) S01-
                                                        </h6>
                                                    </a>
                                                    <h5 class="sold text-content">
                                                        <span class="theme-color price">₹ 39,460</span>
                                                        <del> ₹ 46,055</del>
                                                    </h5>
                                                    <div class="product-rating mt-sm-2 mt-1">
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
                                                        <h6 class="theme-color">In Stock</h6>
                                                    </div>
                                                    <div class="add-to-cart-box">
                                                        <button class="btn btn-add-cart addcart-button">Add
                                                            <span class="add-icon">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </span>
                                                        </button>
                                                        <div class="cart_qty qty-box">
                                                            <div class="input-group">
                                                                <button type="button" class="qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input"
                                                                    type="text" name="quantity" value="0">
                                                                <button type="button" class="qty-right-plus"
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
                                </div>
                                  
                                 
                            </div>
                        </div>
                    </div>
				--}}

					@include('frontend.partials.home_prducts_rana')
					@include('frontend.partials.home_brands_rana')

					<div class="title d-block py-5">
                        <div>
                            <h2>Our best Seller</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                            <p>A virtual assistant collects the products from your list</p>
                        </div>
                    </div>
                    <div class="best-selling-slider product-wrapper wow fadeInUp">
                        <div>
                            <ul class="product-list">
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/l2o.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Intel Core i5-12400 Desktop Processor 18M Cache, up
                                                        to 4.40 GHz LGA 1700 Socket</h6>
                                                </a>
                                                <span>₹13,279</span>
                                                <h6 class="price theme-color">57%</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/keyword.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">HP 150 Wired Keyboard, Quick, Comfy and
                                                        Ergonomically Design, 12Fn Shortcut Keys, Plug and Play USB
                                                        Connection and LED Indicator, 3 Years Warranty</h6>
                                                </a>
                                                <span>615</span>
                                                <h6 class="price theme-color">10% Off</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/moused.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Dell WM126 Wireless Mouse, 1000DPI, 2.4 Ghz with
                                                        USB Nano Receiver, Optical Tracking, 12-Months Battery Life, Plug
                                                        and Play, Ambidextrous, Connect Up To 6 Compatible Devices With One
                                                        Receiver - Black</h6>
                                                </a>
                                                <span>729</span>
                                                <h6 class="price theme-color">50%off</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/l9.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">ZEBRONICS-Transformer-M with a High-Performance
                                                        Gold-Plated USB Mouse: 6 Buttons, Multi-Color LED
                                                        Lights,High-Resolution Sensor with max 3600 DPI, and DPI
                                                        Switch(Black)</h6>
                                                </a>
                                                <span>₹299</span>
                                                <h6 class="price theme-color">20%off</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="product-list">
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/paindrivefirst.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">SanDisk Ultra Dual Drive Luxe Type C, Gold, 256GB,
                                                        Up to 400MB/s Transfer Speed, USB 3.2 Gen 1, 5 Y Warranty</h6>
                                                </a>
                                                <span>-38% ₹2,155</span>
                                                <h6 class="price theme-color"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/i8.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Amazon Basics 128 GB USB 2.0 Pen Drive |Flash Drive
                                                        | with Key Ring (Metal)</h6>
                                                </a>
                                                <span>-60% ₹599</span>
                                                <h6 class="price theme-color"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/fanc.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Computer fan</h6>
                                                </a>
                                                <span>1500</span>
                                                <h6 class="price theme-color">20% off</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/ram.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Consistent 8GB DDR3 1600MHz Desktop RAM (Memory)
                                                        U-DIMM | Long-DIMM | DT PC3-1600 Single Channel Memory with 3 Years
                                                        Manufacturer Warranty (Made in India)</h6>
                                                </a>
                                                <span>₹655</span>
                                                <h6 class="price theme-color">50% off</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="product-list">
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/fane.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Good Life Refined Sunflower Oil</h6>
                                                </a>
                                                <span>1 L</span>
                                                <h6 class="price theme-color">₹ 10.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/fane.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">PGSA2Z 80mm AC Plug Fan (120V/110V/220V) with
                                                        Adjustable Speed Controller for PC, Doorway, Receiver, Xbox, DVR,
                                                        Router, Home Theater, AV Cabinets - Enhanced Cooling Solution
                                                        (Black)</h6>
                                                </a>
                                                <span>₹616</span>
                                                <h6 class="price theme-color">25%OFF</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/FAN2.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Hoteon USB Desk Fan, Portable Table Cooling Fan
                                                        with 3 Speed Strong Wind, 4.6in Desktop Fan with Dual Modes, Powered
                                                        by USB, Quiet Operation Fan for Home Office Outdoor Travel (White &
                                                        Grey)</h6>
                                                </a>
                                                <span>₹1,379</span>
                                                <h6 class="price theme-color">26% off</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('public/assets_web/images/FAN45.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Hoteon USB Desk Fan, 4 Speeds Oscillating Table
                                                        Fan, USB Rechargeable Fan with 4000mAh Battery, Micro/Type C Input
                                                        Quiet Personal Mini Fan for Home Office (Silver)</h6>
                                                </a>
                                                <span> ₹2,089</span>
                                                <h6 class="price theme-color">87%</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- <script>
       $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax({
            method: "GET",
            url: "{{route('home-category-product')}}",
            success: function (response) {
                if (response.status == true) {
                  console.log(response.data);
                    $('#cat_product').html(response.data);
                } else {
                    console.log('Error: Response status is not true');
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', error);
            }
        });
      });

    </script> --}}

    <div class="container mx-auto p-6 rounded-lg mb-10">
    <div class="heading text-center mb-6 capitalize" id="yojnaCat">
        <!-- Categories will be appended here -->
    </div>
    <div class="main capitalize" id="callingYojna">
        <!-- Yojnas will be appended here under respective categories -->
    </div>
</div>


@endsection
