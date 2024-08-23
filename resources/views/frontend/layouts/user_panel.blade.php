@extends('frontend.master')
@section('content')

<section class="pageTitle" style="background-image:url({{static_asset('assets_web/img/banner/login.png')}});;height: 240px; background-size: contain;"> </section>
    <div class="breadcomety7u7y pt-4 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 breadmcrumsize">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--top banner end -->
    <div class="reservation000225">
        <section class="luxry">
            <div class="container min-container">
                <!--<div class="border-bottom1 border-color-111 mt-0 mb-3">
                    <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Hello Ujjwal Kumar</h3>
                    <div class="deals">
                        <hr>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                        @include('frontend.inc.user_side_nav')
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-8 col-12">
  
                        @yield('panel_content')
                    
					</div>
                </div>
            </div>
        </section>
        
		
		
		
		
    </div>
@endsection