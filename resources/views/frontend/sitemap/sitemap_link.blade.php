@extends('frontend.master')
@section('title') Sitemap @endsection

@section('content')

<section class="sec_pad py-4 pb-4 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="erp_content_two">
                    <div class="seo_sec_title wow fadeInRight">
                        <div class="text-left">
                            <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pb-2 pt-2 mt-0 font-size-18">
                                    Product Categories
                                </h3>
                                <div class="deals">
                                <hr>
                                </div>
                            </div>
                        </div>
                        <div class="laksjde_df">
                            @foreach($first_product_categories as $first_pro_cat)
                                <h6 class="fw-bold mb-2">{{$first_pro_cat->name}}</h6>
                                @foreach($second_product_categories as $second_pro_cat)
                                    @if($first_pro_cat->id == $second_pro_cat->parent_id)
                                        <p class="d-inline-block"><a href="{{route('products.category', $second_pro_cat->slug)}}"><strong>{{$second_pro_cat->name}} : </strong></a></p>
                                        @foreach($third_product_categories as $third_pro_cat)
                                            @if($second_pro_cat->id == $third_pro_cat->parent_id)
                                                <p class="d-inline-block"><a href="{{route('products.category', $third_pro_cat->slug)}}">{{$third_pro_cat->name}},</a></p>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec_pad py-4 pb-4 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="erp_content_two">
                    <div class="seo_sec_title wow fadeInRight">
                        <div class="text-left">
                            <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pb-2 pt-2 mt-0 font-size-18">
                                    Service Categories
                                </h3>
                                <div class="deals">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="laksjde_df">
                            @foreach($first_service_categories as $first_ser_cat)
                                <h6 class="fw-bold mb-2">{{$first_ser_cat->name}}</h6>
                                @foreach($second_service_categories as $second_ser_cat)
                                    @if($first_ser_cat->id == $second_ser_cat->parent_id)
                                        <p class="d-inline-block"><a href="{{route('products.category', $second_ser_cat->slug)}}"><strong>{{$second_pro_cat->name}}</strong></a></p>
                                        @foreach($third_service_categories as $third_ser_cat)
                                            @if($second_ser_cat->id == $third_ser_cat->parent_id)
                                                <p class="d-inline-block"><a href="{{route('products.category', $third_ser_cat->slug)}}">{{$third_pro_cat->name}}</a></p>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection