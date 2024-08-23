@extends('frontend.layouts.app')

@section('content')

<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">

        <div class="container details-product product-catpro pt-0 pb-5">
            <div class="row">
                <div class="col-xl-12 col-wd-9gdot5">
                    <div class="bottom-form1 w-100 m-auto pb-2">
                        <div class="border-bottom1 border-color-111 mt-0 mb-2">
                            <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18"> Flash Deal
                            </h3>
                            <div class="deals">
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($all_flash_deals as $single)
                            <div class="col-md-4 mb-2">
                                <a href="{{ route('flash-deal-details', $single->slug) }}">
                                    <div class="product-box pb-0 h-auto">
                                        <img class="mb-0 h-auto" src="{{ uploaded_asset($single->banner) }}" alt="{{ $single->title }}">
                                        <div class="discrptions heidk-font-size-14">
                                            <h6>{{ $single->title }}</h6>
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

@endsection
