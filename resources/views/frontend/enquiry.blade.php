@extends('frontend.master')

@section('title')Enquiry  @endsection

@section('description') @endsection


@section('content')

<style>
    label {
    color: #000;
    cursor: pointer;
    font-weight: 400;
}
</style>



    <section class="pageTitle"
        style="background-image:url({{ static_asset('assets_web/img/enquiry.jpg')}});height: 240px; background-size: contain;">
        <div class="container"> </div>
    </section>
    <!--top banner end -->
    <div class="form_section">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form class="bottom-form" method="post" action="{{route('productRequestQuote')}}">
                    @csrf
                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Send Us An Enquiry
                        </h3>
                        <div class="deals">
                            <hr>
                        </div>
                        <p>
                            Send Us An Enquiry from our specialists on your Products.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="main-parenttttttT">
                                <div class="input-group" style="margin-bottom: 10px">
                                    <span class="input-group-addon">
                                       <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control"
                                       placeholder="Full Name" />
                                      <span class="form-text text-danger errot-form-enq">@error('name')
                                          {{$message}}
                                          @enderror
                                      </span>
                                 </div>
                                 <div class="input-group w-440" style="margin-bottom: 10px; float: left">
                                    <span class="input-group-addon">
                                       <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control empty"
                                       placeholder="Email Address" />
                                 <span class="form-text text-danger errot-form-enq">@error('email'){{$message}}@enderror</span>
</div>

                                 <div class="input-group w-440" style="margin-bottom: 10px; float: left">
                                    <span class="input-group-addon">
                                       <i class="fa-solid fa-phone-flip"></i>
                                    </span>
                                    <input type="tel" name="phone" class="form-control empty"
                                       placeholder="Phone Number" maxlength="10" minlength="10" />
                                   <span class="form-text text-danger errot-form-enq">@error('phone'){{$message}}@enderror</span>
                                 </div>


                                <div class="input-group mb-3">
                                    <span class="input-group-addon text-aAaA  h-200">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </span>
                                    <textarea name="message" class="form-control textareas h-200" placeholder="Message"></textarea>
                                </div>
                            <input type="hidden" name="form_type" value="enquiry_page" >
                                <div class="ginput_container ginput_container_checkbox">
                                    <ul class="gfield_checkbox" id="input_18_14">
                                        @foreach (\App\Models\Category::where('parent_id','=','0')->where('type','1')->get() as $key => $category)
                                        <li class="gchoice_18_14_1">
                                           <input name="category" id="pro_cat{{$category->id}}" type="radio" value="{{$category->name}}"
                                              id="choice_18_14_1" />
                                           <label for="pro_cat{{$category->id}}" id="label_18_14_1">{{$category->name}}</label>
                                        </li>
                                     @endforeach
                                     </ul>
                                </div>
                                <!-- checkbox -->
                                <!-- 4 -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="btn-box">
                                    <button type="submit" class="addto">
                                        Submit
                                        <svg class="position-relative ml-2" width="13px" height="10px"
                                            viewBox="0 0 13 10">
                                            <path d="M1,5 L11,5"></path>
                                            <polyline points="8 1 12 5 8 9"></polyline>
                                        </svg>
                                    </button>
                                    <!--  <input  value="submit_project" type="hidden"  name="submit_project" /> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!-- form end here -->
    @endsection


