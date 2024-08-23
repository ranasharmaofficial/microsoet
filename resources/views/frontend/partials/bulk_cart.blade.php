@if( $bulkcarts && count($bulkcarts) > 0 )
   <div class="row p-2">
      <div class="col-md-9">
         <div class="boxcol p-4  pt-2">
            <div class="container1">
               <div class="border-bottom1 border-color-11 mt-3 mb-3">
                  <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18"> <i class="fa-solid fa-cart-shopping"></i> My Bulk Product Cart</h3>
                  <div class="deals"> 
                     <hr>
                  </div>
               </div>
               
               <div id="">
                  <table class="table1" id="cart" class="table table-hover table-condensed">
                     <tbody style="border: 1px solid #d3d3d385; border-radius:10px;">
                        @php
                           $total=0;
                        @endphp

                        @foreach ($bulkcarts as $item)
                        <tr class="product_data">
                           <td data-th="Product">
                              <div class="row p-2">
                                 <div class="col-sm-3 hidden-xs">
                                    <a href="{{ route('product', $item->product->slug) }}"><img src="{{ uploaded_asset($item->product->thumbnail_img) }}" alt="{{$item->product->name}}" class="cart-img" /></a>
                                 </div>
                                 <div class="col-sm-6 text-cart">
                                    <a href="{{ route('product', $item->product->slug) }}"> <h4 class="nomargin">{{$item->product->name}}</h4></a>
                                    <div class="row p-2">
                                       <div class="col-sm-4 ">
                                          <p class="pp-cart m-0"><i class="fa-solid fa-indian-rupee-sign"></i> {{$item->price}}</p>
                                          <p class="pp-cart m-0">Total: {{$item->quantity}} X {{$item->price}} = <i class="fa-solid fa-indian-rupee-sign"></i>  {{$item->quantity*$item->price}}</p>
                                       </div>
                                    </div>
                                 </div>
                                 <input type="hidden" class="prod_id" value="{{$item->id}}">
                                 <div class="col-sm-3 input-cart">
                                    <div class="cart-add cart-add1 d-block">
                                       <div class="input-group quantity_input justify-content-end">
                                          <div class="input-group w-auto justify-content-end align-items-center packageadd">
                                             <input type="button" value="-" class="bulk-button-minus button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 " data-field="quantity[{{ $item->id }}]">
                                             <input type="number" data-id="{{ $item->id }}" step="1" max="10" value="{{ $item->quantity }}" min="{{ $item->product->min_qty }}" max="" name="quantity[]" class="bulk-quantity quantity quantity-field border-0 text-center w-25 qty">
                                             <input type="button" value="+" class="bulk-button-plus button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0" data-field="quantity[{{ $item->id }}]">
                                          </div>
                                       </div>
                                       <button class="remove float-right w-75 m-0 d-flow-root delete_bulk_cart_item">Remove <i class="fa-solid fa-trash-can"></i></button>
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
                     
               <div class="d-flow-root">
                  <div class="d-flex mt-2 float-right">
                     <div class="cont2">
                        @if($type == "all_category")
                           <a href="{{route('bulk.checkout', ['type' => 'all_category'])}}" class="">Proceed to checkout</a>
                        @else 
                           <a href="{{route('bulkcheckout.shipping_info')}}" class="">Proceed to checkout</a>
                        @endif
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

      <div class="col-md-3">
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
      </div>
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
  // $( document ).ready(function() {

      // plus button functionaity on add to bulk cart
      $(document).on('click', '.bulk-button-plus', function(e) {
         console.log('I am plus button for bulk order');
         e.preventDefault();
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

            var quantity = $(this).closest('.product_data').find('.qty').val();
            console.log(quantity);
            var id = $(this).closest('.product_data').find('.prod_id').val();
            
            $.ajax({
            url: '{{route('bulk_cart.updateQuantity')}}',
            method: "POST",
            data: {
                     'quantity':quantity,
                     'id':id,
                  },
            success: function (response) {
               // alert(response.status);
               // toastr.info(response.status);
               updateNavCart(response.nav_cart_view,response.cart_count,response.sum_cart_count);
               $('#cart-summary').html(response.cart_view);
               //  loadcart();
            }
         });
      });

      $(document).on('click', '.bulk-button-minus', function(e) {
         console.log("I am minus bulk btn");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         var quantity = $(this).closest('.product_data').find('.qty').val();
         console.log(quantity);
         var id = $(this).closest('.product_data').find('.prod_id').val();
            
         $.ajax({
            url: '{{route('bulk_cart.updateQuantity')}}',
            method: "POST",
            data: {
                     'quantity':quantity,
                     'id':id,
                  },
            success: function (response) {
               // alert(response.status);
               // toastr.info(response.status);
               // updateNavCart(response.nav_cart_view,response.cart_count);
               $('#cart-summary').html(response.cart_view);
               var quantity_value = $('.bulk-quantity').val();
               // console.log("I am bulk minus button click function")
               // console.log(quantity_value);
               //  loadcart();
            }
         });
      });

      // Remove Product from cart 
      $('.delete_bulk_cart_item').click(function (e) {
         console.log("i am bulk remove btn");
         e.preventDefault();
         $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });
         var id =  $(this).closest('.product_data').find('.prod_id').val();

         $.ajax({
            method: "POST",
            url: '{{ route('bulk_cart.remove_from_cart') }}',
            data: {
               'id':id,
            },
            success: function (data) {
               console.log("i am bulk response");
               console.log(data);

               // toastr.info("Removed from Cart!");
               // updateNavCart(data.cart_view);
               $('#cart-summary').html(data.cart_view);

            }
         });
      });
      
   // });
</script>