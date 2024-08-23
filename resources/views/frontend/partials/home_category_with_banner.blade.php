@if(get_setting('home_categories2') != null) 
    @php $home_categories = json_decode(get_setting('home_categories2')); @endphp
    @foreach ($home_categories as $key => $value)
        @php $category = \App\Models\Category::find($value); @endphp
        @if(json_decode(get_setting('home_categories2_images'), true)[$key])
            @php 
                $cat_img = json_decode(get_setting('home_categories2_images'), true)[$key];
            @endphp
            <!-- <section class="woldeens_eldeos">
                <div class="container">
                    <div class="home-category-info-norm">
                        <div class="category-list">

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="border-bottom1 border-color-111 mt-3 mb-3">
                                        <div class="border-botb-3">
                                            <a href="{{ route('cat', $category->slug) }}" class="view-link">
                                                View all 
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> {{ $category->getTranslation('name') }}</h3>
                                        <div class="deals"><hr></div>
                                    </div>
                                </div>
                            </div>

                            <div class="category-info">

                                <a href="{{ json_decode(get_setting('home_categories2_links'), true)[$key] }}" class="w-35">
                                    <div class="banner-info">
                                        <img class="lazyload w-100 h-100" src="{{ uploaded_asset(json_decode(get_setting('home_categories2_images'), true)[$key]) }}">
                                    </div>
                                </a>

                                <div class="product-item d-flow-root">
                                    @php 
                                        $first_category =\App\Models\Category::where('parent_id', $value)->take(8)->get();
                                    @endphp
                                   	@foreach ($first_category as $key => $first_level_id)
									@php
										$subcat = \App\Models\Category::find($first_level_id->id);
									@endphp
                                        <div class="product-info w-25 float-left d-block">
											<a href="{{ route('products.category', $subcat->slug) }}">
                                                <div class="item-info">
                                                    <h4 class="d-block">
                                                        {{ $subcat->getTranslation('name') }}
                                                    </h4>
                                                    <div class=" d-flex">
                                                        <div class="info-sub w-50">
                                                            <span class="paragronid">{{ $subcat->short_description }}</span> 
                                                        </div>
                                                        <img class="zoom-in lazyload w-50" alt="{{ $subcat->getTranslation('name') }}" src="{{ uploaded_asset($subcat->home_image) }}">
                                                    </div>
                                                </div>
                                            </a>
                                           
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>   -->
        @else
            <div class="headsections111 dkjfksjjksdfjis dkhgikdikdind34fvbb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="border-bottom1 border-color-111 mt-3 mb-3">
                                <div class="border-botb-3">
                                    <a href="{{ route('cat', $category->slug) }}" class="view-link">
                                        View all 
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">
                                    {{ $category->getTranslation('name') }} 
                                </h3>
                                <div class="deals"> <hr> </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme trending001">
                        @php 
                            $first_category = \App\Models\Category::where('parent_id', $value)->take(8)->get();
                        @endphp
                        
                        @foreach ($first_category as $key => $first_level_id)
                            @php
                                $subcat = \App\Models\Category::find($first_level_id->id);
                            @endphp
                            <div class="item">
                                <div class="product-box">
                                    <img src="{{ uploaded_asset($subcat->home_image) }}" alt="{{ $subcat->getTranslation('name') }}">
                                    <div class="discrptions">
                                        <h5> {{ $subcat->getTranslation('name') }} </h5>
                                    </div>
                                    <div class="discrptions_button mt-2">
                                        <h5>
                                            <a href="{{ route('products.category', $subcat->slug) }}">
                                                View Detail
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif