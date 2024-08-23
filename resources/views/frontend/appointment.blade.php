@extends('frontend.master')

@section('title')Appointment @endsection

@section('description') @endsection


@section('content')

    <section class="pageTitle" style="background-image:url({{ static_asset('assets_web/img/book-appointment.png')}});    height: 246px;">
        <div class="container"> </div>
    </section>
 
    <div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
     
        <section class="u-section-2 pb-0 mb-0">
            <div class="u-sheet u-valign-middle u-sheet-1">
                 <div class="u-layout-wrap u-layout-wrap-1 form_section">
                    <div class="container">
                        <div class="bottom-form my-4 my-5 mt-4">
                            <div class="row">
                                <div class="col-md-6 px-0">
                                    <div class="u-container-layout u-valign-top u-container-layout-1">

                                        <div class="u-expanded-width u-form u-form-1">
                                            <form class="bottom-form_contact" method="post" action="{{ route('bookAppointment') }}">
                                               @csrf
                                                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                    <h3
                                                        class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                                                        Get An Appointment</h3>
                                                    <div class="deals">
                                                        <hr>
                                                    </div>
                                                    <p>
                                                        Include an email and phone number so visitors can get in touch
                                                        with you on their first attempt.
                                                    </p>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="main-parenttttttT">
                                                            <div class="input-group mb-3 ">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </span>
                                                                <input type="text" name="name" class="form-control empty border-start-0"
                                                                    placeholder="Full Name" />
                                                             <span class="form-text text-danger errot-form-appoint">@error('name')
                                                                {{$message}}
                                                                @enderror
                                                            </span>       
                                                            </div>
                                                            
                                                            <div class="input-group w-440 float-left mb-3">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-envelope"></i>
                                                                </span>
                                                                <input type="email" name="email"
                                                                    class="form-control empty border-start-0"
                                                                    placeholder="Email Address" />
                                                               <span class="form-text text-danger errot-form-appoint">@error('email')
                                                                {{$message}}
                                                                @enderror
                                                            </span>     
                                                            </div>
                                                            
                                                            <div class="input-group mb-3 float-left">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-solid fa-phone-flip"></i>
                                                                </span>
                                                                <input type="tel" name="phone"
                                                                    class="form-control empty border-start-0"
                                                                    placeholder="Phone Number" maxlength="10"
                                                                    minlength="10" />
                                                             <span class="form-text text-danger errot-form-appoint">@error('phone')
                                                                {{$message}}
                                                                @enderror
                                                            </span>      
                                                            </div>
                                                            
                                                            <div class="d-flex align-items-center mb-3">

                                                                <!-- input type date starts here -->
                                                                <div class="input-group w-50   ">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar-alt "></i>
                                                                    </span>
                                                                    <input type="date" id="Date"
                                                                        class="form-control empty" name="date">
                                                                </div>
                                                                <!-- input type date ends here -->

                                                                <div class="input-group w-50 mb-0">
                                                                    <span class="input-group-addon ms-2">
                                                                        <i class="fa fa-clock"></i>
                                                                    </span>
                                                                    <input type="time" id="Time"
                                                                        class="form-control empty" name="Time">
                                                                </div>
                                                                <!-- time -->
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <span class="input-group-addon text-aAaA  h-200">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </span>
                                                                <textarea name="message" class="form-control textareas h-200 border-start-0" placeholder="Your Message *"></textarea>
                                                    <span class="form-text text-danger errot-form-appoint">@error('message')
                                                    {{$message}}
                                                    @enderror
                                                </span>
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
                                                                    <svg class="position-relative ml-2" width="13px"
                                                                        height="10px" viewBox="0 0 13 10">
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
                                    </div>
                                </div>
                                <div class="col-md-6 px-0">
                                    <div class="u-container-layout u-container-layout-2 h-100">
                                        <img src="{{ static_asset('assets_web/img/get-appointments.png')}}" alt="" class="img-responsive w-100 h-100">
                                    </div>
                                </div>
                            </div>

                        </div>
                 
                    </div>
                </div>


            </div>
        </section>
    </div>
    @endsection
