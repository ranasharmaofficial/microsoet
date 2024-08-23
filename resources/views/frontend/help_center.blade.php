
@extends('frontend.master')

@section('title')Help Center @endsection

@section('description') @endsection


@section('content')

      <!--top banner end -->
      <div class="discription_section new-post" style="background:#ffefe4">
         <div class="container">
          
            <div class="privacky_sectionsds">
               <div class="help_centers m-auto w-40 text-center justify-content-center">
                  <h3 class="section-title mt-0 mb-0 pb-0 font-size-18">Help center</h3>
                  <p class="pt-2 mt-0">Welcome To eBuildBazaar's Support Page. Here you can resolve your issues - all in a jiffy!</p>
                  <form method="get" action="/search" id="search">
                     <input class="rounded-pill mt-4 border-0 w-100 px-5 py-2 shadow-none" name="" type="text" size="40" placeholder="Search..." />
                     <div class="d-flex justify-content-end mt-2">
                        <p>Want personalized help?</p>
                        <button type="submit" class="addto w-30 px-2 py-1 border-0 rounded-pill bg-orange color-white mx-2 mt-2">Sign in</button>
                     </div>
                  </form>
               </div>
               <div class="row mt-4">
                  <div class="col-md-6">
                     <div class="d-xl-block col-wd-2gdot5 box-shadow stateles mt-3">
                        <div class="mb-8 border border-0 border-color-3 borders-radius-6">
                           <div class="d-flex">
                              <h3>Faq</h3>
                              <p class="mx-3 my-0">Find your answers to common queries.</p>
                           </div>
                           <ul class="list-unstyled mb-0 border-0 p-0 sidebar-navbar view-all pivacy_policys help_center_cents">
                              <li class="listing-botoms p-0  border-0">
                                 <div class="mt-md-n1ddd div-tab-dps_pol mt-3">
                                    <ul class="nav nav-pills d-flex">
                                       <li class="col-tabs_pol col-tabs_pol-1 w-auto px-2 border-color border-solid border-1 rounded-pill tabs-dps-tab_pol active nav-item">
                                          <a class="d-flex"><span class="material-symbols-outlined">local_shipping</span> <span class="mx-1">Delivery </span></a>
                                       </li>
                                       <li class="col-tabs_pol col-tabs_pol-2 mx-1 px-2  w-auto  border-solid  rounded-pill border-color border-1 tabs-dps-tab_pol nav-item">
                                          <a class="d-flex"><span class="material-symbols-outlined">free_cancellation</span> <span class="mx-1">Cancellations and Returns </span></a>
                                       </li>
                                       <li class="col-tabs_pol col-tabs_pol-3 w-auto px-2  mx-1  border-solid rounded-pill border-1 border-color tabs-dps-tab_pol nav-item">
                                          <a class="d-flex"><span class="material-symbols-outlined">currency_rupee</span> <span class="mx-1">Payment </span>   </a>
                                       </li>
                                       <li class="col-tabs_pol col-tabs_pol-4 w-auto px-2  mx-1  border-solid rounded-pill border-1 border-color tabs-dps-tab_pol nav-item">
                                          <a class="d-flex"><span class="material-symbols-outlined">wallet</span><span class="mx-1">Wallet </span>  </a>
                                       </li>
                                    </ul>
                                 </div>
                              </li>
                           </ul>
                           <div class="div-tab-dps_pol help-cneter-centers sections mt-3">
                              <ul>
                                 <li class="col-tabs_pol-1 tabs-dps-tab_pol  active">
                                    <div class="tab-content policys_eckolion  p-0 border-0 shadow-none">
                                       <div class="row m-auto">
                                          <div class="col-md-12">
                                             <div class="ebuild_terms product-box1">
                                                <div class="discrptions">
                                                   <!--<div class="border-bottom1 border-color-111 mt-3 mb-3">
                                                      <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> What issue are you facing?</h3>
                                                      <div class="deals">
                                                         <hr>
                                                      </div>
                                                      </div>-->
                                                   <div class="help_centerswer">
                                                      <div id="accordion" class="accordion-container">
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title open rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to track my order
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: block;">
                                                               <p>Select an item to track,check order status or call the delivery agent </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to manage my order
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Select an item to change address,delivery date,and more </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want help with returns & refunds
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Select an item to create or track returns & refunds</p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want help with other issues
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Offers,payment,growciti & all other issues </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to contact the seller
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>growciti.com is a marketplace on which third-party sellers sell products to customers. To contact a seller,please send a letter with the below address on the envelope and include product page URL so it can be forwarded to the seller.
                                                               </p>
                                                               <p><strong>I want to contact the seller about a grievance</strong></p>
                                                               <p>Address</p>
                                                               <p>To,<br>
                                                                  "Include Seller's name"  <br>          
                                                                  Seller Mailbox: Contact Seller<br>
                                                                  F-47, 1st Floor, Galleria Market,  
                                                                  Gurgaon, Haryana, India<br>
                                                                  Contact: +91 9999999999, 0117999531
                                                               </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article> 
														 <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to manage my order
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Select an item to change address,delivery date,and more </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want help with returns & refunds
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Select an item to create or track returns & refunds</p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want help with other issues
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Offers,payment,growciti & all other issues </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to contact the seller
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>growciti.com is a marketplace on which third-party sellers sell products to customers. To contact a seller,please send a letter with the below address on the envelope and include product page URL so it can be forwarded to the seller.
                                                               </p>
                                                               <p><strong>I want to contact the seller about a grievance</strong></p>
                                                               <p>Address</p>
                                                               <p>To,<br>
                                                                  "Include Seller's name"  <br>          
                                                                  Seller Mailbox: Contact Seller<br>
                                                                  F-47, 1st Floor, Galleria Market,  
                                                                  Gurgaon, Haryana, India<br>
                                                                  Contact: +91 9999999999, 0117999531
                                                               </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
														 <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to manage my order
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Select an item to change address,delivery date,and more </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want help with returns & refunds
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Select an item to create or track returns & refunds</p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want help with other issues
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>Offers,payment,growciti & all other issues </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1">
                                                               I want to contact the seller
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                               <p>growciti.com is a marketplace on which third-party sellers sell products to customers. To contact a seller,please send a letter with the below address on the envelope and include product page URL so it can be forwarded to the seller.
                                                               </p>
                                                               <p><strong>I want to contact the seller about a grievance</strong></p>
                                                               <p>Address</p>
                                                               <p>To,<br>
                                                                  "Include Seller's name"  <br>          
                                                                  Seller Mailbox: Contact Seller<br>
                                                                  F-47, 1st Floor, Galleria Market,  
                                                                  Gurgaon, Haryana, India<br>
                                                                  Contact: +91 9999999999, 0117999531
                                                               </p>
                                                               <a class="vie_buttoms">View More</a>
                                                            </div>
                                                         </article>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="col-tabs_pol-2 tabs-dps-tab_pol">
                                    <div class="tab-content policys_eckolion  p-0 border-0 shadow-none">
                                       <div class="row m-auto">
                                          <div class="col-md-12">
                                             <div class="ebuild_terms product-box1">
                                                <div class="discrptions">
                                                   <!-- <div class="border-bottom1 border-color-111 mt-3 mb-3">
                                                      <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> Cancellations and Returns</h3>
                                                      <div class="deals">
                                                         <hr>
                                                      </div>
                                                      </div>-->
                                                   <div>
                                                      <div class="help_centerswer">
                                                         <div id="accordion" class="accordion-container">
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title  rounded-pill open d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  If I request for a replacement, when will I get it?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content  bg-transprant border-0" style="display: block;">
                                                                  <p>SuperCoins calculation happens at the order level. You will get to know about the SuperCoins deducted after you've cancelled or returned an item as it will be recalculated on the basis of the updated order value.
                                                                     To know more about the program click here. For more information on SuperCoins <a href="supercoins_ebb.php">click here</a> 
                                                                  </p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  Which products are not eligible for returns?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>The following table contains a list of products that are not eligible for returns as per the seller’s Returns Policy:</p>
                                                                  <table style="border: none; border-collapse: collapse;margin-top:10px;">
                                                                     <tbody>
                                                                        <tr style="height: 0px;">
                                                                           <td style="    vertical-align: top;
                                                                              background-color: #f9f9f9;
                                                                              padding: 10px;
                                                                              border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Category</span></p>
                                                                           </td>
                                                                           <td style="    vertical-align: top;
                                                                              background-color: #f9f9f9;
                                                                              padding: 10px;
                                                                              border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Products that can’t be returned</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 31px;">
                                                                           <td style="vertical-align: top; padding: 7px 7px 7px 7px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Auto Accessories</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Additives, Air Fresheners, Brighteners, Cleaners, Bike/Car Stickers, Degreasers, Dent/Scratch Removers, Filler Putty, Headlight Vinyl Films, Liquid Solutions, Lubricants, Polish, Power Steering Fluids, Sealants, Oils and Wax</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Automobiles</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cars, Mopeds, Motorcycles and Scooters</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Bath and Spa</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Bath Bubble/Salt/Sponge/Wash, Body Wash, Loofahs, Scrubs, Shampoos and Soaps</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Baby Care</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Bottle Nipples, Breast Nipple Care, Breast Pumps, Diapers, Ear Syringes, Nappy, Wet Reminder, Wipes and Wipe Warmers</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cleaning Products</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cleaning Gels, Detergents, Detergent Pods, Fabric Wash Products, Surface Cleaners, Stain Removers and Washing Bars/Powder</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Computer Accessories</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Blank/Educational Media, CDs/DVDs, Ink Toners, Music, Movies and Software</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Food and Nutrition</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Canned Food, Condiments, Drinks, Fruits, Health Supplements, Meat, Seafood, Syrups, Vegetables and other Edible Products</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Fashion</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Baby Dolls, Clothing Freebies, Lingerie Wash-bags, Shapewear, Socks, Stockings and Swimsuits</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Footwear Accessories</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Oils, Glue, Grease, Socks, Shoe Deodorants/Polish Creams/Sprays and Wax</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Gardening Products</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Plant Saplings, Plant Seeds and Soil Manure</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Health Care</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Antiseptic, Band Aid, Body Pain Relief, Eye Drops, First Aid Tape, Glucometer Lancet/Strip, Healthcare Devices and Kits, Medical Dressing/Gloves and pH Test Strip</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Home Products</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Adhesives, Barbeque wood, Bird/Insect Repellent, Contact Cement, Crack Fillers, Inks, Guitar/Yoyo Friction Stickers, Marker Refills, Mosquito Coil/Vaporiser/Vaporiser Refills, Naphthalene Balls, Scuba/Smoking-Pipe Mouthpieces and Sprays</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Hygiene</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cannula, Contact Lens, e-Hookah, Fake Moustache, Female Urination Devices, Menstrual Cups, Needles, Panty Liners, Shaving Products, Smoking Patch, Straws, Sweat Pads, Tampons, Teeth Whitening Products/Wipes, Tissues, Toilet Tissue Aid, Toilet Rolls and Women Intimate Care</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Innerwear</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Bra Accessories, Briefs, Boxers, Lingerie Sets, Panty, Garter, Trunks and Vests</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Jewellery</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Coins</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 40px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Music Instrument Accessories</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Mouthpiece Cap/Pad/Set, Oils and Polish</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Party Supplies</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Balloons, Candles, Cut-outs, Decoration articles and Whistles</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Festive Supplies</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Hookah Charcoal/Flavor/Mouth-tip, Incense Sticks and Holi/Rangoli Color</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Personal Care</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Conditioners, Creams, Deodorants, Electric Ear Cleaners, Eyebrow/Eyelash/Hair Styling Products, Eye Mask, Face Wash, Face Care/Fairness Products, Fragrance, Fresheners, Gels, Hair Care, Kajal, Lens Solution, Lip Plumper/Stain, Blackhead/Makeup/Nail Paint Removers, Mascara, Mehendi, Nail Sanding Pad, Oils, Oral Hygiene Products, Perfumes, Hand/Toothbrush Sanitizers, Serums, Talc, Sunscreen, Tanning Liquid, Tattoo, Toners and Wigs</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Pet Supplies</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Aquarium Consumables, Hair Styling, Health Care/Medicinal Products, Horse Girth/Grooming Kit/Braid Tail Bag/Hay/Liniment/Poultice, Inhaler Masks, Litter Box Enclosures, Litter Scoops, Pet Chew, Pet Food/Treat, Pet Pad, Pet Hygiene/Personal Care Products, Poultice, Tail Wraps, Waste Bags and Water Troughs</span></p>
                                                                           </td>
                                                                        </tr>
                                                                        <tr style="height: 0px;">
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Sexual Wellness</span></p>
                                                                           </td>
                                                                           <td style="vertical-align: middle; padding: 3px 3px 3px 3px; border: solid #ccc 1px;">
                                                                              <p style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size:13px; letter-spacing: 0.5px; font-family: Arial; color: #888; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Condoms, Fertility Kit/Supplement, Lubricants, Pregnancy Kits, Sexual Massagers, Sexual/Pleasure Enhancement Products and Vaginal Dilators</span></p>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                                  <p>Kindly always check a product's Returns Policy on the product page. <a href="javascript:void(0);">click here</a> to view the Returns Policy.  <br></p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  Can items be returned after the time period mentioned in the seller's Returns Policy?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>No, sellers will not be able to accept returns after the time period mentioned in the seller's Returns Policy.  </p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  Do I have to return the freebie when I return a product?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content" style="display: none;">
                                                                  <p>Yes, the freebie has to be returned along with the product.  </p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  How do returns work?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>You can raise a request to return your items with these simple steps:<br>
                                                                     1. Log into your growciti account<br>
                                                                     2. Go to My Orders<br>
                                                                     3. Click on 'Return' against the item you wish to return or exchange<br>
                                                                     4. Fill in the details and raise a return request<br>
                                                                     <br>Once you raise a request, you'll get an email and SMS confirming that your request is being processed. Based on the item, your request may be automatically approved or you may be contacted for more details. If the request is approved, the item will be picked up after which you will get a replacement or refund. You can also track the status of your return request instantly from the 'My Orders' section of your growciti account.
                                                                  </p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  I see the 'Cancel' button but I can't click on it. Why?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>A greyed out and disabled 'Cancel' button can mean any one of the following:
                                                                     1. The item has been delivered already<br>
                                                                     <br>
                                                                     OR<br>
                                                                     2. The item is non-refundable (e.g. Gift Card)
                                                                  </p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  What is the Buyer Protection policy?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>The Buyer Protection policy mediates buyer-seller disputes. In case a seller declines your request for a return of an item and you are not convinced with the reason given, you can write to us at resolution@growciti.com for Buyer Protection. You can dispute the resolution that the seller has shared for your issue until 45 days from the date of delivery and concern is looked into by us on a case-to-case basis.
                                                                  </p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  What should I do if I have an issue with my product after the return period?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>You can get in touch with the brand or an authorised service centre of the brand to claim the warranty for your product (wherever applicable).</p>
                                                               </div>
                                                            </article>
                                                            <article class="content-entry border-0">
                                                               <h4 class="article-title rounded-pill d-flex">
                                                                  <a class="dropdown-toggle1">
                                                                  How can I return or exchange an item?
                                                                  </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                               </h4>
                                                               <div class="accordion-content bg-transprant border-0" style="display: none;">
                                                                  <p>To return/exchange your order, follow these simple steps:<br>
                                                                     1. Go to My Orders<br>
                                                                     2. Choose the item you wish to return or exchange<br>
                                                                     3. Fill in the details<br>
                                                                     4. Choose Request Return.
                                                                  </p>
                                                               </div>
                                                            </article>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="col-tabs_pol-3 tabs-dps-tab_pol">
                                    <div class="tab-content policys_eckolion  p-0 border-0 shadow-none">
                                       <div class="row m-auto">
                                          <div class="col-md-12">
                                             <div class="ebuild_terms product-box1">
                                                <div class="discrptions">
                                                   <!--<div class="border-bottom1 border-color-111 mt-3 mb-3">
                                                      <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> growciti Payment</h3>
                                                      <div class="deals">
                                                         <hr>
                                                      </div>
                                                      </div>-->
                                                   <div class="help_centerswer">
                                                      <div id="accordion" class="accordion-container">
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill open d-flex">
                                                               <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                               What is growciti's credit card EMI payment option? 
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content border-0" style="display: block;">
                                                               <div class="dfgrwty">
                                                                  <p>With growciti’s credit card EMI option, you can choose to pay in easy installments of 3, 6, 9, 12, 18<em>, or 24 months</em>, with credit cards from the following banks:</p>
                                                                  <ul>
                                                                     <li>HDFC
                                                                     </li>
                                                                     <li>Citi
                                                                     </li>
                                                                     <li>ICICI
                                                                     </li>
                                                                     <li>Kotak
                                                                     </li>
                                                                     <li>Axis
                                                                     </li>
                                                                     <li>Induslnd
                                                                     </li>
                                                                     <li>SBI
                                                                     </li>
                                                                     <li>Standard Chartered
                                                                     </li>
                                                                     <li>HSBC
                                                                     </li>
                                                                  </ul>
                                                                  <p>*18 &amp; 24 months EMI options are available from select banks only. Please refer to the table below for more details:</p>
                                                                  <table style="border: 1; border-collapse: collapse; width: 100%;">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="vertical-align: top; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Banks
                                                                           </td>
                                                                           <td style="vertical-align: top; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Supports 18 &amp; 24 months tenure
                                                                           </td>
                                                                           <td style="vertical-align: top; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Minimum order value to avail 18 &amp; 24 months EMI options
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              HDFC
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 10,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Citi
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 10,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ICICI
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 10,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Kotak
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 4,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Axis
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 4,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              IndusInd
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 4,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              SBI
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              No
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              NA
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Standard Chartered
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              Yes
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              ₹ 4,000
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              HSBC
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              No
                                                                           </td>
                                                                           <td style="vertical-align: bottom; padding: 7px 7px 7px 7px; border: solid #999999 1px;">
                                                                              NA
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </div>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                               How can I order for large quantities of the product as part of a corporate order? 
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content" style="display: none;">
                                                               <p>     You can write to corporatesales@growciti.com for your corporate gifting requirements.</p>
                                                            </div>
                                                         </article>
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill d-flex">
                                                               <a class="dropdown-toggle1" href="javascript:;" role="button">
                                                               How can I label my saved cards? 
                                                               </a><i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content" style="display: none;">
                                                               <p>     
                                                                  You can specify a card label at the time of saving a card on growciti through the 'My Account' section. You can also add/edit the label anytime through 'My Saved Cards' in the 'My Account' section on growciti.
                                                               </p>
                                                            </div>
                                                         </article>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="col-tabs_pol-4 tabs-dps-tab_pol">
                                    <div class="tab-content policys_eckolion p-0 border-0 shadow-none">
                                       <div class="row m-auto">
                                          <div class="col-md-12">
                                             <div class="ebuild_terms product-box1">
                                                <div class="discrptions">
                                                   <!--<div class="border-bottom1 border-color-111 mt-3 mb-3">
                                                      <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> growciti Wallet</h3>
                                                      <div class="deals">
                                                         <hr>
                                                      </div>
                                                      </div>-->
                                                   <div class="help_centerswer">
                                                      <div id="accordion" class="accordion-container">
                                                         <article class="content-entry border-0">
                                                            <h4 class="article-title rounded-pill open d-flex position-relative">
                                                               <a class="dropdown-toggle1" href="javascript:(void);" role="button">
                                                               What can I do if the balance in my wallet is not enough to pay for my order?
                                                               </a> <i class="fa fa-angle-right position-absolute top-25" aria-hidden="true" style="right:17px"></i>
                                                            </h4>
                                                            <div class="accordion-content border-0" style="display: block;">
                                                               <p>You can pay part of the amount through your wallet and the remaining through any other prepaid payment modes like Credit/Debit Cards, growciti Gift Cards, and Netbanking.
                                                                  <br>Please note that wallet cannot be combined with Cash/Card on Delivery (CoD) payment mode for now, and bank offers will not applicable for partial payments from the wallet.
                                                               </p>
                                                            </div>
                                                         </article>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="d-xl-block col-wd-2gdot5 box-shadow stateles mt-3">
                        <div class="d-block bg-orange box-shadow py-3 px-5 border-radius-20">
                           <h3 class="color-whites">Let's Talk!</h3>
                           <p class="mx-0 my-0"> Schedule a 30 min one-to-one call to dicuss your goals & challenges</p>
                           <p class="mx-0 my-0 d-flex color-whites"><span class="rounded-circle bg-white color-gray w-30px text-center">!</span> <span class="mx-2">This call is optional but highly recommended !</span></p>
                        </div>
                        <h3 class="mt-3">Our Available Slots:</h3>
                        <div class="app mt-3">
                           <div class="app__main border-radius-20 box-shadow">
                              <div class="calendar">
                                 <div id="calendar"></div>
                              </div>
                           </div>
                           <div class="d-flex justify-content-end">
                              <a class="addto w-30 px-2 py-1 border-0 rounded-pill bg-orange color-white mx-2 mt-2 background-gray line-height-30">Back</a>
                              <a class="addto w-30 px-2 py-1 border-0 rounded-pill bg-orange color-white mx-2 mt-2 line-height-30">Continue With Calendly</a>
                           </div>
                        </div>
                     </div>
                     <div class="d-xl-block col-wd-2gdot5 box-shadow stateles mt-3">
                        <div class="border-radius-20 box-shadow d-flow-root">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="justify-content-center text-center w-75 m-auto">
                                    <div class="circle outer">
                                       <div class="circle inner" id="c1">
                                          <div class="circle inner" id="c2">
                                             <div class="circle inner" id="c3">
                                                <div class="circle inner" id="c4">
                                                   <div class="circle inner" id="c5">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <p class="text-center line-height-20">Your Support Team's raring to gol</p>
                              </div>
                              <div class="col-md-8">
                                 <h5 class="fs-6 fw-bold">Chat with a <br>Relationship Manager</h5>
                                 <div class="d-flex h6">
                                    <span class="d-block material-symbols-outlined fs-1 pt-3 mt-0">
                                    schedule
                                    </span>
                                    <p class="fs-5 mx-3  fw-bold">Duration <span class="fs-6 d-block w-100  fw-normal">30-40 mins</span></p>
                                 </div>
                              </div>
                           </div>
                           <hr>
                           <div class="box-paragraph-sechedule">
                              <p>It is a chance to connect with one of our team members to learn more about our platform and how we can help you grow your business.</p>
                              <ul class="fs-6 p-0 my-3 mb-0 mx-0">
                                 <li><span class="material-symbols-outlined">check</span>  Get branding support</li>
                                 <li><span class="material-symbols-outlined">check</span>  Low cost</li>
                                 <li><span class="material-symbols-outlined">check</span>  Efficient managing</li>
                                 <li><span class="material-symbols-outlined">check</span>  Pickup/delivery option</li>
                                 <li><span class="material-symbols-outlined">check</span>  Accounting</li>
                              </ul>
                           </div>
                           <div class="border-radius-20 bg-orange-light px-3 py-1 mt-3 w-55 justify-content-end float-end">
                              <p class="mt-0">Want to reach us the old-fashioned way? Here's our postal address.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--<div class="d-xl-block col-wd-2gdot5 box-shadow stateles my-4 rounded-pill">
                  <div class="d-flex">
                     <div class="w-90 text-start">
                        <p class="m-0">Didn't find an answer? <u> You can as k us here</u></p>
                     </div>
                     <div class="w-30 text-end">
                        <p class="m-0"><u>Give Us Feedback</u></p>
                     </div>
                  </div>
               </div>-->
               <div class="row mb-5 mt-3">
                  <div class="col-md-6">
                     <div class="d-xl-block Get_In_Touch col-wd-2gdot5 box-shadow stateles">
                        <div class="d-flex">
                           <h3>Get In Touch</h3>
                           <p class="mx-3 my-0">We'd love to hear from you.</p>
                        </div>
						<form class="bottom-form_contact ">
	 
                                   
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <div class="main-parenttttttT float-none">
										 
										
										  <label class="mb-2 mt-3 fw-bold">First Name*</label>	
                                             <div class="input-group mb-2 d-block position-relative">
											 
                                               <input type="text" name="full-name" class="form-control w-100 rounded-pill empty border" placeholder="Karan">
												  <span class="input-group-addon position-absolute end-25-top-25"> 
                                                <i class="fa-solid fa-user"></i>
                                                </span>
                                             </div>
                                             
                                             <label class="mb-2 mt-3 fw-bold">Last Name*</label>	
                                             <div class="input-group mb-2 d-block position-relative">
											 
                                               <input type="text" name="last-name" class="form-control w-100 rounded-pill empty border" placeholder="Sethi">
												  <span class="input-group-addon position-absolute end-25-top-25"> 
                                                <i class="fa-solid fa-user"></i>
                                                </span>
                                             </div>
											   <label class="mb-2 mt-3 fw-bold">Email ID/Phone number*</label>	
										
                                             <div class="input-group mb-2 d-block position-relative">
                                                
                                                <input type="text" name="full-name" class="form-control w-100 rounded-pill empty border" placeholder="+91 7303612266">
												<span class="input-group-addon position-absolute end-25-top-25 material-symbols-outlined">
                                              ad_units
                                                </span>
												 
                                             </div>
											 	 
                                           
                                            
                                             
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                       
                                        <label class="mb-2 mt-2 fw-bold">Query Category</label>	
										
                                             <div class="input-group mb-3 d-block position-relative">
                                               <select class="form-select form-control w-100 rounded-pill empty border" aria-label="Default select example">
  <option selected>Query Category</option>
  <option value="1">Construction Materials</option>
  <option value="2">Home Services</option>
  <option value="3">Payments & Invoices</option>
  <option value="4">Partnerships</option>
  <option value="5">Onboarding</option>
  <option value="6">Follow-up with Active project</option>
  <option value="7">Other</option>
</select>
                                               <!-- <input type="tel" name="full-name" class="form-control w-100 rounded-pill empty border" placeholder="Phone Number" maxlength="10" minlength="10">
												 <span class="input-group-addon position-absolute end-25-top-25">
                                                <i class="fa-solid fa-phone-flip"></i>
                                                </span>-->
                                             </div>
                                             
									     <label class="mb-2 mt-3 fw-bold">Issue (optional)</label>
									    <div class="input-group mb-3 d-block position-relative">
                                               
                                                <textarea name="message" class="form-control textareas form-control w-100 border-radius-20 height-165 empty border" placeholder="Your Message"></textarea>
												 <span class="input-group-addon position-absolute  material-symbols-outlined end-25-top-25">
                                               sms
                                                </span>
                                             </div>
                                          
                                       </div>
                                       
                                       
                                       <div class="form-group col-md-12 text-center">
                                             <div class="btn-box">
                                                <button type="submit" class="addto border-0">
                                                   Submit Form
                                                    
                                                </button> 
                                             </div>
                                          </div>
                                    </div>
                                 </form>
						<!--<div class="row">
						<div class="col-md-6">
						
						</div>
						<div class="col-md-6">
						</div>
						</div>-->
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="Reach_Out d-xl-block col-wd-2gdot5 box-shadow stateles">
                        <div class="d-flex">
                           <h3>Reach Out!</h3>
                           <p class="mx-3 my-0">Couldn't find your answers ? Contact us here!</p>
						  
                        </div>  
						   <div class="mt-md-n1ddd div-tab-dps_pol mt-3">
                                    <ul class="nav nav-pills d-flex"> 
                                       <li class="col-tabs_pol w-47 mb-3 px-2 border-color border-solid border-0 rounded-pill tabs-dps-tab_pol bg-orange-light nav-item">
                                          <a href="mailto:enquiries@ebuildbazaar.in" class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">mark_email_unread</span> <span class="mx-1 color-gray">Enquiries:<br /> enquiries@ebuildbazaar.in</span></a>
                                       </li>
                                       <li class="col-tabs_pol px-2 mb-3 w-47 mx-3  w-auto  border-solid  rounded-pill border-color border-0 tabs-dps-tab_pol bg-orange-light nav-item">
                                          <a href="mailto:info@ebuildbazaar.in" class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">mark_email_unread</span> <span class="mx-1 color-gray">Corporate Enquiries:<br /> info@ebuildbazaar.in</span></a>
                                       </li>
                                       
                                       <li class="col-tabs_pol w-47 mb-3 px-2 border-color border-solid border-0 rounded-pill tabs-dps-tab_pol bg-orange-light nav-item">
                                          <a href="mailto:care@ebuildbazaar.in" class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">mark_email_unread</span> <span class="mx-1 color-gray">Customer care:<br /> care@ebuildbazaar.in</span></a>
                                       </li>
                                       <li class="col-tabs_pol px-2 mb-3 w-47 mx-3  w-auto  border-solid  rounded-pill border-color border-0 tabs-dps-tab_pol bg-orange-light nav-item">
                                          <a class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">phone_in_talk</span> <span class="mx-1 color-gray">Customer Care:<br /> +91 7303612266</span></a>
                                       </li>
                                       <!--<li class="col-tabs_pol w-47 mb-3 px-2  border-solid rounded-pill border-0 border-color tabs-dps-tab_pol nav-item bg-orange-light">
                                          <a class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">phone_in_talk</span> <span class="mx-1 color-gray">0124-2350149 <br>TP Infra Support </span>   </a>
                                       </li>
                                       <li class="col-tabs_pol w-47 mb-3 px-2  mx-3  border-solid rounded-pill border-0 border-color tabs-dps-tab_pol nav-item bg-orange-light">
                                          <a class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">fax</span><span class="mx-1 color-gray">0124-4900200<br>eBuildBazaar Support </span>  </a>
                                       </li>
									   
                                       <li class="col-tabs_pol w-70 mb-3 px-2 mx-0  border-solid rounded-pill border-0 border-color tabs-dps-tab_pol nav-item bg-orange-light">
                                          <a class="d-flex"><span class="material-symbols-outlined bg-orange rounded-circle w60">location_on</span><span class="mx-1 color-gray">Galleria Market Basement, DLF Phase-IV, Gurgaon, 122009 </span>  </a>
                                       </li>-->
                                    </ul>
                                 </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- form end here -->
      @endsection
 