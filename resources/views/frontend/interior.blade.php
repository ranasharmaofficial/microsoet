@extends('frontend.master')

@section('title')Interior/Exterior Designing  @endsection

@section('description') @endsection


@section('content')



    <section
      class="pageTitle p-0"
      style="background-image: url({{ static_asset('assets_web/img/slider4a.jpg')}}); height: 375px"
    >
      <div class="container">
        <div class="build_tag-banner pt-3 w-30 h-450 left-0 background-white text-left">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              @php
              $form_type = 'interiotr_exterior_page';
            @endphp  
            @include('frontend.partials.banner_form')
            </div>
          </div>
          <!-- <h3>General Contracting</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc
              justo sagittis suscipit ultrices.
            </p>
            <a href="contact_us.php" class="addto">Contact Us</a> -->
        </div>
      </div>
    </section>
    <!--top banner end -->
    <div class="ourservices services spacer py-5">
      <div class="content enhanced-page" id="nav-one">
        <div class="container">
          <div class="content_row row">
            <!-- <div class="col-md-6">
                        <img alt="" class="left edge-grab" src="img/abouts2.png" style="width:96%;">
                    </div> -->
            <div class="col-md-12">
              <div class="clm_66">
                <div class="aboutIfo">
                  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                    <h2>Interior / Exterior <strong> Expertise</strong></h2>
                    <div class="deals">
                      <hr />
                    </div>
                  </div>
                </div>
                <i class="pt-2">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                  eiusmod tempor et dolore magna aliqua enim ad minim veniam
                  quis nostrud.
                </i>

                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                  eiusmod tempor et dolore magna aliqua enim ad minim veniam
                  quis nostrud. Lorem ipsum dolor sit amet consectetur
                  adipisicing elit sed do eiusmod tempor et dolore magna aliqua
                  enim ad minim veniam quis nostrud. Lorem ipsum dolor sit amet
                  consectetur adipisicing elit sed do eiusmod tempor et dolore
                  magna aliqua enim ad minim veniam quis nostrud. Lorem ipsum
                  dolor sit amet consectetur adipisicing elit sed do eiusmod
                  tempor et dolore magna aliqua enim ad minim veniam quis
                  nostrud. Lorem ipsum dolor sit amet consectetur adipisicing
                  elit sed do eiusmod tempor et dolore magna aliqua enim ad
                  minim veniam quis nostrud.
                </p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                  eiusmod tempor et dolore magna aliqua enim ad minim veniam
                  quis nostrud. Lorem ipsum dolor sit amet consectetur
                  adipisicing elit sed do eiusmod tempor et dolore magna aliqua
                  enim ad minim veniam quis nostrud. Lorem ipsum dolor sit amet
                  consectetur adipisicing elit sed do eiusmod tempor et dolore
                  magna aliqua enim ad minim veniam quis nostrud.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <section class="four_card-section mt-3 lightbox-gallery">
      <div class="container">
        <div class="row">
          <h2 class="text-center my-2">Building the future</h2>
          <p class="text-center my-2">
            Sample text. Click to select the text box. Click again or double
            click to start editing the text.
          </p>
        </div>
     
        <!-- light box -->

        <div class="row photos my-3">
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 item">
            <a href="{{ static_asset('assets_web/img/Interior-Styling.png')}}" data-lightbox="photos" class="lb_all-link">
              <img class="img-fluid" src="{{ static_asset('assets_web/img/Interior-Styling.png')}}"/>
            </a>
          </div>
        
        </div>

        <!-- light box -->
      </div>
    </section>

    
    @endsection
 
