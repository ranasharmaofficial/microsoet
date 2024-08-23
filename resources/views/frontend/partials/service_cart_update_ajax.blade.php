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
                                 <tbody style="border: 1px solid #d3d3d385; border-radius:10px;">
                                    @php
                                       $total=0;
                                    @endphp
                                    @foreach ($service_carts as $item)
                                       <tr class="product_data">
                                          <td data-th="Product">
                                             <div class="row p-2">
                                                @if ($item->service->thumbnail_img != null)
                                                   <div class="col-md-2 col-sm-6 hidden-xs">
                                                      <img src="{{ uploaded_asset($item->service->thumbnail_img) }}" alt="{{$item->service->name}}" class="cart-img" />
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
                              <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> Order Summary</h3>
                              <div class="deals"> 
                                 <hr>
                              </div>
                           </div>
                     
                           <div id="cart_total_price" class="table-responsive cartpage  product-list-cart">
                              <table class="table3 table-cartsummary">
                                 <tbody>
                                    <tr class="bd-nn1 mb-3">
                                       <td class="w-75 border-0">Price (<span class="cart_count"></span> Item)</td>
                                       <td class="w-25 border-0">₹ <span>{{$total}}</span></td>
                                    </tr>
                                    <tr class="bd-nn1 mb-3 border-0">
                                       <td class="w-75  border-0">Delivery Charge</td>
                                       <td class="w-25  border-0">₹ <span>0</span></td>
                                    </tr>
                                    <tr class="amount-pay">
                                       <td class="w-75">Amount Payable</td>
                                       <td class="w-25">₹ <span>{{$total+0}}</span></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="boxcol  product-list-cart  col-cartpoint p-4 pt-2">
                           <div class="">
                              <div class="cartPointsPan">
                                 <div class="pointsWrap">
                                    <div class="icons"><img src="{{static_asset('assets_web/img/iconcome1.svg')}}" alt="Lowest Price Guaranteed"></div>
                                    <div class="pointLabel">Lowest Price Guaranteed</div>
                                 </div>
                                 <div class="pointsWrap">
                                    <div class="icons"><img src="{{static_asset('assets_web/img/iconcome2.svg')}}" alt="Worldwide Delivery"></div>
                                    <div class="pointLabel">Worldwide Delivery</div>
                                 </div>
                                 <div class="pointsWrap">
                                    <div class="icons"><img src="{{static_asset('assets_web/img/iconcome3.svg')}}" alt="Easily Track your Order"></div>
                                    <div class="pointLabel">Easily Track your Order</div>
                                 </div>
                                 <div class="pointsWrap">
                                    <div class="icons"><img src="{{static_asset('assets_web/img/iconcome4.svg')}}" alt="Buy Products on Credit"></div>
                                    <div class="pointLabel">Buy Products on Credit</div>
                                 </div>
                                 <div class="scheduledCallback">
                                    <div><img src="{{static_asset('assets_web/img/iconcome5.svg')}}" alt="scheduleCallback"></div>
                                    <div>
                                       <div>Any Confusion "No worries"</div>
                                       <button type="button" class="btn btn-default">Request A Call Back</button>
                                       <div class="hide">
                                          <div class="modal">
                                             <div class="modalInnerContent callbackModal m">
                                                <div class="modalHeader">
                                                   <div class="modalTitle">Request A Call Back</div>
                                                   <button type="button" class="btn close">
                                                      <svg width="14" height="14" viewBox="0 0 24 24" style="display: inline-block; vertical-align: middle;">
                                                         <path d="M14.6,12l8.8-8.8C23.8,2.8,24,2.4,24,1.9s-0.2-1-0.5-1.3c-0.7-0.7-1.9-0.7-2.6,0L12,9.4L3.2,0.6c-0.7-0.7-1.9-0.7-2.6,0s-0.7,1.9,0,2.6L9.4,12l-8.8,8.8c-0.7,0.7-0.7,1.9,0,2.6s1.9,0.7,2.6,0l8.8-8.8l8.8,8.8c0.4,0.4,0.8,0.5,1.3,0.5s1-0.2,1.3-0.5c0.4-0.4,0.5-0.8,0.5-1.3s-0.2-1-0.5-1.3L14.6,12z" fill="#000"></path>
                                                      </svg>
                                                   </button>
                                                </div>
                                                <div class="modalContent"><iframe title="Contact form" frameborder="0" src="#2" style="height: 650px; width: 99%; border: none;"></iframe></div>
                                             </div>
                                             <span role="button" tabindex="0" class="backdropOverlay"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
			
			<script>
			//Remove service from service cart
			$('.delete-service-cart-item').click(function (e) {
				e.preventDefault();
				$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
				var id =  $(this).closest('.product_data').find('.cart_id').val();

				$.ajax({
					method: "POST",
					url: '{{ route('service_cart.ServiceremoveFromCart') }}',
					data: {
						'id':id,
					},
					success: function (data) {
						// toastr.info("Removed from Service Cart!");
						updateServiceNavCart(data.service_nav_cart_view,data.service_cart_count);
						$('#service-cart-summary').html(data.service_cart_view);
					}
				});
			});
			
			function updateServiceNavCart(view, count, amount) {
				$('.service_cart-count').html(count);
				$('#service_cart_items').html(view);
				$('.service_cart-amount').html(amount);
			}
			</script>