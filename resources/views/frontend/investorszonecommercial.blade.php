@extends('frontend.master')
@section('title') Collaboration  @endsection
@section('description') @endsection
@section('style')
    <style>
        .h-350 {
            height: 350px !important;
        }

        .h-835 {
            height: 835px !important;
        }

        .nav-pills .tabs-dps-tab_pol.active a {
            background-color: #1274c0;
            color: #fff !important;
        }

        .bg-blue {
            background: #1274c0;
        }

        .h-215 {
            height: 215px;
        }

        .bg-orange {
            background: #ff7713
        }

        .owl-carousel600.asbf .owl-dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .h-250 {
            height: 250px;
        }

        .owl-carousel600.asbf .owl-stage-outer {
            margin-top: 0px;
            padding-top: 0px;
        }

        .border-yellow {
            border-color: #ff7713 !important;
        }

        .color-orange {
            color: #ff7713 !important;
        }

        .tabs-dps-tab_pol.active .border-yellow {
            border-color: #1274c0 !important;
        }

        .tabs-dps-tab_pol.active .color-orange {
            color: #fff !important;
        }

        .owl-carousel_down .owl-dots {
            position: absolute;
            right: 0px;
            top: 40%;
        }

        .owl-carousel_down .owl-dot span {
            margin: 5px auto !important;
        }

        .owl-carousel_down .owl-dot {
            width: 100%;
        }

        .owl-carousel_down img {
            height: 455px;
        }

        .opacity-1 {
            opacity: 1;
        }

        #input_18_14 .m-1 {
            margin: 2px !important;
        }
        .owl-carousel_down .owl-nav{
            display:none;
        }
        .owl-carousel600 .owl-nav{
            display:none;
        }
        .form-above_footer .contact-form {
            height: 910px;    
            margin-bottom: 90px;
        }
    </style>
@endsection

@section('content')




<section class="gallerysin gallerysin2 py-5 pt-4">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="bottom-form m-auto">
                  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                     <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18 text-left"><span class="font-capital">Investors Zone</span> &raquo; Commercial Projects
                     </h3>
                     <div class="deals slodnaprder">
                        <hr>
                     </div>
                  </div>
               </div>
               <div class="home-our-services container">
         <div class="row">
            
            <div class="col-md-12">
               <div class="left herotext universal mt-3 h-auto">
               <div class="border-bottom1">
                        <h5> Filter Investors:</h5>
                     </div>
                     
                  <div class="row border-bottom py-2 mb-4">
                  <div class="col-md-6 mb-2"><input type="text" name="name" class="form-control br-radius-none" placeholder="Location" autocomplete="off"></div><div class="col-md-3 mb-2"><input type="text" name="name" class="form-control br-radius-none" placeholder="Pincode" autocomplete="off"></div><div class="col-md-3 mb-2"><button class="filterbtn w-100"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button></div>
                 </div>
                 
                 <div class="row">
                 <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div> 
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div> 
                 <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div> 
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div> 
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div>
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
                    </div>
                    </div>
                </div> 
                <div class="grid-item col-md-4 col-sm-12 product-catpro">
                    <div class="product-box h-auto row mx-1">
                    <div class="col-md-5">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0" />
                    </div>
                    
                    <div class="col-md-7 land_box">
                    <h3>Vikash Kumar</h3>
                    <span>Land Size: 1000 Sqr. Ft.</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    <a href="javascript:void(0);" class="addserviceaquote" data-toggle="modal" data-target="#myModalowner"><i class="fa fa-phone" aria-hidden="true"></i> Send Enquiry</a>
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
   </section>
   
   
   
   <div id="myModalowner" class="modal fade prolidneis in" role="dialog">
            <div class="modal-dialog w-50" id="modal-dialog45">
                <div class="modal-content">
                    
                    <div class="modal-body">
                                <div class="form_section pt-0 pb-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="'.route('service_enquiry.insertServiceEnquiry').'" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                                                <input type="hidden" name="_token" value="'. csrf_token().'">
                                                <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                    <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18 text-left">
                                                        <strong>Send Enquiry</strong> for Investors
                                                    <button type="button" class="close" data-dismiss="modal">×</button></h3>
                                                    <div class="deals">
                                                        <hr>
                                                    </div>
                                                </div>
                                                    
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 askalertlft py-3">
                                                       
                                                        <div class="row">
                    <div class="col-md-2 col-sm-6">
                    <img src="https://ebuildbazaar.in/public/uploads/all/YqSBNFlbrk96Gi1849yyHRoPct5xVpUf8gnA31NP.webp" class="mb-0 mt-0" style="border-radius:100%;">
                    </div>
                    
                    <div class="col-md-10 col-sm-6 land_box">
                    <h3><strong>Vikash Kumar</strong></h3>
                    <span>Min. Investment: <i class="fa fa-inr left_pos"></i> 1000.00</span>
                    <label>Building Type: Commercial</label>
                    <p>South West Delhi, New Delhi- 110010</p>
                    </div>
                    </div>
                                                    </div>
                                                
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="main-parenttttttT row">

                                                            <div class="js-form-message form-group border-bottom">
                                                                <label class="formpoplabel">Please share your contact</label>   
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Name</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Name" >
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Mobile</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Mobile" >
                                                            </div>
															
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Email</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Email" >
                                                            </div>
                                                            
                                                            
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Description</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Description" >
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <div class="btn-box">
                                                                <button type="submit" class="addto">
                                                                    Submit
                                                                    <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                                                        <path d="M1,5 L11,5"></path>
                                                                        <polyline points="8 1 12 5 8 9"></polyline>
                                                                    </svg>
                                                                </button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                   </div>     
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
    <script>
        $('.owl-carousel400').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                items: 1
                },
                600: {
                items: 2
                },
                1000: {
                items: 3
                }
            }
        });
        $('.owl-carousel600').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            dots: true,
            nav: false,
            responsive: {
                0: {
                items: 1

                },
                600: {
                items: 1
                },
                1000: {
                items: 1
                }
            }
        });

        $('.owl-carousel_down').owlCarousel({
            animateOut: 'fadeOut',
            loop: true,
            autoplay: true,
            nav: false,
            items: 1,
            margin: 0,
            smartSpeed: 300
        });
    </script>
@endsection