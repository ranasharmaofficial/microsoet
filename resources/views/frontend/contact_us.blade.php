@extends('frontend.master')

@section('title')Contact Us @endsection

@section('description') @endsection


@section('content')



<section class="pageTitle"
   style="background-image:url({{ static_asset('assets_web/img/contact-us.png')}});    height: 246px;">
   <div class="container"> </div>
</section>
<!--top banner end -->
<div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
   <section class="u-section-2 pb-1 mb-0">
      <div class="u-sheet u-valign-middle u-sheet-1">
         <div class="container">
            <div class="bottom-form w-50 m-auto">
               <div class="border-bottom1 border-color-111 mt-0 mb-3">
                  <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Get In Touch</h3>
                  <div class="deals">
                     <hr>
                  </div>
                  <p>Are easy to find, so a visitor can quickly get in touch with you. </p>
               </div>
            </div>
            <div class="u-repeater u-repeater-1 row">
               <div class="text-center col-md-3">
                  <div class="u-container-layout u-similar-container u-container-layout-3">
                     <h5 class="u-text u-text-2"><span class="u-file-icon u-icon u-text-white"> <i class="fa fa-phone"
                              aria-hidden="true"></i> </span>&nbsp;Call Us
                     </h5>
                     <p class="u-text u-text-3 mt-2"> +91 {{ env('CALL_NUMBER') }} </br> +91 8720039705</p>
                  </div>
               </div>
               <div class="text-center col-md-3">
                  <div class="u-container-layout u-similar-container u-container-layout-4">
                     <h5 class="u-text u-text-4"><span class="u-file-icon u-icon u-text-white"> <i
                              class="fa fa-envelope" aria-hidden="true"></i></span>&nbsp;Email Id
                     </h5>
                     <p class="u-text u-text-5 mt-2"> info.growciti@gmail.com </p>
                  </div>
               </div>
               <div class="text-center col-md-3">
                  <div class="u-container-layout u-similar-container u-container-layout-4">
                     <h5 class="u-text u-text-4"><span class="u-file-icon u-icon u-text-white"> <i
                              class="fa fa-map-marker" aria-hidden="true"></i></span>&nbsp;Location
                     </h5>
                     <p class="u-text u-text-5 mt-2"> Purnia BIhar - 854301 </p>
                     <p class="u-text u-text-5 mt-2"> Baodhapur Gwalior - 474008 </p>
                  </div>
               </div>
               <div class="text-center col-md-3">
                  <div class="u-container-layout u-similar-container u-container-layout-5">
                     <h5 class="u-text u-text-6"><span class="u-file-icon u-icon u-text-white"><i class="fa fa-clock"
                              aria-hidden="true"></i></span>&nbsp;Hours
                     </h5>
                     <p class="u-text u-text-7  mt-2">Mon – Fri : 10 am – 7 pm <br> Sat - Sun : 6 am – 8 pm </p>
                     <p class="u-text u-text-7 m-0 p-0"> </p>
                  </div>
               </div>
            </div>
         </div>

         <div class="u-layout-wrap u-layout-wrap-1 form_section">
            <div class="container">
               <div class="bottom-form my-4 my-5 mt-4">
                  <div class="row">
                     <div class="col-md-6 px-0">
                        <div class="u-container-layout u-valign-top u-container-layout-1">

                           <div class="u-expanded-width u-form u-form-1">
                              <form class="bottom-form_contact" method="post" action="{{ route('insertFormData') }}">
                                 @csrf
                     <div class="border-bottom1 border-color-111 mt-0 mb-3">
                              <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Send Us A Message</h3>
                              <div class="deals">
                                 <hr>
                              </div>
                           <p>
                                                 Include an email and phone number so visitors can get in touch with you on their first attempt.
                                                   </p>
                           </div>

                                                <div class="row">
                                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                      <div class="main-parenttttttT">
                                                         <div class="input-group mb-3 ">
                                                            <span class="input-group-addon">
                                                            <i class="fa-solid fa-user"></i>
                                                            </span>
                                                            <input type="text" name="full_name" class="form-control empty border-start-0" placeholder="Full Name" />
                                                            <span class="form-text text-danger errot-form-enq">@error('full_name')
                                                               {{$message}}
                                                               @enderror
                                                           </span>
                                                         </div>

                                                         <div class="input-group w-440 float-left mb-3">
                                                            <span class="input-group-addon">
                                                            <i class="fa-solid fa-envelope"></i>
                                                            </span>
                                                            <input type="text" name="email" class="form-control empty border-start-0" placeholder="Email Address" />
                                                            <span class="form-text text-danger errot-form-enq">@error('email')
                                                               {{$message}}
                                                               @enderror
                                                           </span>
                                                         </div>

                                                         <div class="input-group mb-3 float-left">
                                                            <span class="input-group-addon">
                                                            <i class="fa-solid fa-phone-flip"></i>
                                                            </span>
                                                            <input type="tel" name="phone_no" class="form-control empty border-start-0" placeholder="Phone Number" maxlength="10" minlength="10" />
                                                            <span class="form-text text-danger" errot-form-enq>@error('phone_no')
                                                               {{$message}}
                                                               @enderror
                                                           </span>
                                                         </div>

                                                         <div class="input-group mb-3">
                                                            <span class="input-group-addon text-aAaA  h-200">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                            </span>
                                                            <textarea name="message" class="form-control textareas h-200 border-start-0" placeholder="Your Message *"></textarea>
                                                            <span class="form-text text-danger" errot-form-enq>@error('message')
                                                               {{$message}}
                                                               @enderror
                                                           </span>
                                                         </div>
                                                         <input type="hidden" name="form_type" value="contact_page">

                                                         <!-- checkbox -->
                                                         <!-- 4 -->
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                      <div class="form-group">
                                                         <div class="btn-box">
                                                            <button type="submit" class="addto">
                                                               Submit
                                                               <svg class="position-relative ml-2" width="13px" height="10px"  viewBox="0 0 13 10"  >
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
                        <div class="u-container-layout u-container-layout-2">
                           <img src="{{ static_asset('assets_web/img/contact.png')}}" alt=""
                              class="img-responsive w-100">
                        </div>
                     </div>
                  </div>

               </div>
               {{-- <div class="maps_frame">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.4027871123026!2d77.07910411507885!3d28.467414082483298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb37fdd415bbe4f6!2zMjjCsDI4JzAyLjciTiA3N8KwMDQnNTIuNyJF!5e0!3m2!1sen!2sin!4v1662458156390!5m2!1sen!2sin"
                     width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                     referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div> --}}
            </div>
         </div>


      </div>
   </section>
</div>
@endsection
