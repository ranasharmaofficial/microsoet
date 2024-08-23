@extends('frontend.master')
@section('content')
   <section class="pageTitle" style="    background-image: url({{static_asset('assets_web/img/small_banner.jpg')}});height: 240px; background-size: contain;">
      <div class="container">
      </div>
   </section>
   <!--top banner end -->
   <div class="discription_section new-post carts_nbs">
      <div class="container">
         <div class="row ">
            <div class="col-md-8 breadmcrumsize ">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>  
                     <li class="breadcrumb-item active" aria-current="page"> Service Cart </li>
                  </ol>
               </nav>
            </div>
            <div class="col-md-4">
            </div>
         </div>
         <div id="service-cart-summary" class="justify-content-between1">
            @if( $service_carts && count($service_carts) > 0 )
               <div class="row p-2">
                  <div class="col-md-12">
                     <div class="boxcol p-4  pt-2">
                        <div class="container1">
                     
                           <div class="border-bottom1 border-color-11 mt-3 mb-3">
                              <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> 
                                 <i class="fa-solid fa-cart-shopping"></i> My Service Cart
                              </h3>
                              <div class="deals"> 
                                 <hr>
                              </div>
                           </div>

                           <div class="row">
                           <div class="col-md-6 border">
                           <div class="row p-2">
                              <table class="table1" id="cart" class="table table-hover table-condensed">
                                 <tbody style=">
                                    @php
                                       $total=0;
                                       
                                    @endphp
                                    @foreach ($service_carts as $item)
                                       @if(isset($item->service))
                                       <tr class="product_data">
                                          <td data-th="Product">
                                             <div class="row p-2">
                                                @if ($item->service->thumbnail_img != null)
                                                   <div class="col-md-2 col-sm-6 hidden-xs">
                                                      <img src="{{ uploaded_asset($item->service->thumbnail_img) }}" alt="{{$item->service->name}}" class="cart-img" />
                                                   </div>
                                                @else
                                                   <div class="col-md-2 col-sm-6 hidden-xs">
                                                      <img src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{$item->service->name}}" class="cart-img" />
                                                   </div>
                                                @endif
                                                
                                                <div class="col-md-7 col-sm-6 text-cart">
                                                <h4 class="nomargin">{{$item->service->name}}</h4>
                                                
                                                <div class="row">
                                                   <div class="col-sm-4 ">
                                                   <p class="pp-cart m-0"><i class="fa-solid fa-indian-rupee-sign"></i> {{$item->price+$item->tax}}</p>
                                                   <p class="pp-cart m-0">Total: {{$item->quantity}} X {{$item->price+$item->tax}} = <i class="fa-solid fa-indian-rupee-sign"></i>  {{$item->quantity*($item->price+$item->tax)}}</p>
                                                   </div>
                                                </div>
                                                </div>
                                                <input type="hidden" class="prod_id" value="{{$item->service_id}}">
                                                <input type="hidden" class="cart_id" value="{{$item->id}}">
                                                <div class="col-md-3 col-sm-12 input-cart">
                                                   <div class="cart-add cart-add1 d-block">
                                                      <button class="remove float-right w-75 m-0 d-flow-root delete-service-cart-item">Remove <i class="fa-solid fa-trash-can"></i></button>
                                                   </div>
                                                </div>
                                                <div class=" col-lg-12 bd-bt "></div>
                                             </div>
                                          </td>
                                       </tr>
                                       @php
                                             $total +=$item->price * $item->quantity;
                                       @endphp
                                       @endif
                                    @endforeach     
                                 </tbody>
                              </table>
                              </div>
                              </div>
                              
                              <div class="col-md-6 border">
                              <div class="row p-2">
                              <div class="js-form-message form-group border-bottom">
                                                                <h5 class="formpoplabel fs-18">Get A Quote</h5>
                                                                
                                                            </div>
                              <div class="js-form-message form-group">
                                                                <label class="formpoplabel">Nature of work</label>
                                                                <div class="ginput_container ginput_container_checkbox">
                                                                    <input type="text" name="nature_work" class="form-control empty" value="Nature of work" placeholder="Nature of work" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                        <div class="js-form-message form-group col-md-6" style="position:relative;">
															<i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                                                <label class="formpoplabel">Property Type</label>
                                                                <select class="form-control" name="state" id="state">
                                                    <option value="">---Select Property Type---</option>
                                                    <option value="New Construction">New Construction</option>
                                                    <option value="Structural Modification">Structural Modification</option>
                                                    <option value="Renovation">Renovation</option>
                                                    <option value="Interior Design / Other">Interior Design / Other</option>
                                                </select>
                                                            </div>
                                                            
                                                            
                                                            <div class="js-form-message form-group col-md-6" style="position:relative;">
															<i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                                                <label class="formpoplabel">Building Type</label>
                                                                <select class="form-control" name="state" id="state">
                                                    <option value="">---Select Building Type---</option>
                                                    <option value="Residential">Residential</option>
                                                    <option value="Interior Design">Interior Design</option>
                                                    <option value="Business Building">Business Building</option>
                                                    <option value="Healthcare or Lab Facility">Healthcare or Lab Facility</option>
                                                    <option value="Industrial">Industrial</option>
                                                    <option value="Academic">Academic</option>
                                                    <option value="Landscape">Landscape</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                            </div>
                                                            
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Size of Project</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Square Meter" >
                                                            </div>
															
															<div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Number of rooms</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Number of rooms" >
                                                            </div>
                                                            
                                                            
                                                            <div class="js-form-message form-group col-md-6" style="position:relative;">
															<i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                                                <label class="formpoplabel">Number of floors</label>
                                                                <select class="form-control" name="florr" id="floor">
                                                    
                                                    <option value="Ground floor only">Ground floor only</option>
                                                    <option value="1 floor">1 floor</option>
                                                    <option value="2 floors">2 floors</option>
                                                    <option value="3 floors">3 floors</option>
                                                    <option value="More than 3 floors">More than 3 floors</option>
                                                    <option value="Basement">Basement</option>
                                                </select>
                                                            </div>
                                                            
                                                            
                                                           <div class="js-form-message form-group col-md-6" style="position:relative;">
															<i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                                                <label class="formpoplabel">Architectural Tasks</label>
                                                                <select class="form-control" name="florr" id="floor">
                                                    <option value="">---Select Architectural Tasks---</option>
                                                    <option value="Concept Design">Concept Design</option>
                                                    <option value="Schematic Design">Schematic Design</option>
                                                    <option value="Detailed Design">Detailed Design</option>
                                                    <option value="Tender">Tender</option>
                                                    <option value="All">All</option>
                                                </select>
                                                            </div> 
                                                            
                                                            <div class="js-form-message form-group col-md-6">
                                                                <label class="formpoplabel">Site Address</label>
                                                                <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Site Address" >
                                                            </div>
                                                            
                                                            
                                                            
                                                            <div class="js-form-message form-group col-md-6" style="position:relative;">
															<i class="fa fa-angle-down" aria-hidden="true" style="top:40px; position:absolute; right:20px;"></i>
                                                                <label class="formpoplabel">Required Services</label>
                                                                <select class="form-control" name="florr" id="floor">
                                                    <option value="">---Select Required Services---</option>
                                                    <option value="">Lawful Development Certificate Full Pack</option>
                                                    <option value="">Planning Permission Full Pack</option>
                                                    <option value="">Building Control Full Pack</option>
                                                    <option value="">Thames Water BO Agreement Full Pack</option>
                                                    <option value="">Planning Appeal</option>
                                                    <option value="">Party Wall Agenting</option>
                                                    <option value="">Party Wall Surveying</option>
                                                    <option value="">Planning Drawings only (PDF)</option>
                                                    <option value="">Building Control Drawings only (PDF)</option>
                                                    <option value="">Structural Calculations only (PDF)</option>
                                                    <option value="">Planning Documentation only (PDF)</option>
                                                </select>
                                                            </div> 
                                                            
                                                            <div class="js-form-message form-group">
                                                                <label class="formpoplabel">Additional requirement</label>
                                                                <textarea name="additional_requirement" required class="form-control textareas h-200" placeholder="Additional requirement"></textarea>
                                                            </div>
                              </div>
                              </div> 
                           </div>
                                 
                           <div class="d-flow-root">
                              <div class="d-flex mt-2 float-right">
                                 <div class="cont2">
                                    <a href="{{url('checkout/servicecheckout')}}" class="">  Proceed to checkout</a>
                                 </div>
                                 <div class="continue ">
                                    <a href="{{url('')}}" class="">
                                       <i class="fa-solid fa-cart-shopping"></i> Continue Shopping
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!--<div class="col-md-3">
                     <div class="col-sidkild">
                        <div class=" boxcol  product-list-cart p-4 pt-2">
                           <div class="border-bottom1 border-color-11 mt-3 mb-3">
                              <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18">Get A Quote</h3>
                              <div class="deals"> 
                                 <hr>
                              </div>
                           </div>
                     
                           <div id="cart_total_price" class="table-responsive cartpage  product-list-cart">
                              <form class="js-validate" method="post" action="" novalidate="novalidate">
             
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" aria-label="First Name" requireddata-msg="Please enter a valid First Name." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name"  aria-label="Last Name" requireddata-msg="Please enter a valid Last Name." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Phone No." aria-label="Phone No" requireddata-msg="Please enter a valid Phone No." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="pin" id="pincode" placeholder="Pin Code" aria-label="Pin Code" requireddata-msg="Please enter a valid Pin Code." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" onclick="get_state_city()" name="house_no" placeholder="House/Plot No" aria-label="Email address" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Full Address" aria-label="Full address" >
                    </div>
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="area" placeholder="Street/Locality/Area" aria-label="Area" requireddata-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                  <div class="js-form-message form-group mb-3">
                        <input type="text" class="form-control" name="city" id="cityid" placeholder="City" >
                    </div>
                  <div class="js-form-message form-group mb-3">
                    <input type="text" class="form-control" name="state" id="stateid" placeholder="State">
					</div>
                  
				                    
                <div class="mb-600 d-flex w-100">
                     <div class="mb-3 w-auto"><button onclick="window.location.href='{{url('profile')}}'" class="btn edit-address1_1 btn-primary-dark-w px-5 w-100">Cencel</button></div>
                     <div class="mb-3 w-50 mx-3"><button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Submit</button></div>
                  </div>
               </form>
                           </div>
                           
                           
                        </div>
                        
                     </div>
                  </div>-->
               </div>
            @else
               <div class="row p-2">
                  <div class="col-md-12">
                     <div class="boxcol p-4  pt-2">
                        <div class="container1">
                           <div class="border-bottom1 border-color-11 mt-3 mb-3">
                              <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> <i class="fa-solid fa-cart-shopping"></i> My Cart</h3>
                              <div class="deals"> 
                                 <hr>
                              </div>
                           </div>
                           
                           <div class="shadow-sm bg-white p-4 rounded">
                              <div class="text-center p-3">
                                 <i class="las la-frown la-3x opacity-60 mb-3"></i>
                                 <h3 class="h4 fw-700">{{translate('Your Cart is empty')}}</h3>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            @endif
         </div>
      </div>
   </div>
@endsection

