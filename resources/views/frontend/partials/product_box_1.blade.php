
<div class="product-box h-auto pb-3 product_data">
   @if( home_discounted_base_price($product, false) != home_base_price($product, false))
      @if($product->discount_type == "percent")
         <div class="beachs">{{$product->discount}} % Off</div>
      @elseif($product->discount_type == "amount")
         <div class="beachs">₹{{$product->discount}} Off</div>
      @endif
   @endif
   <a href="{{route('product', $product->slug)}}">
   <img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{  $product->getTranslation('name')  }}"
      onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"></a>
   <div class="discrptions">

      @if($product->brand_id!=null)
         <div class="companyname">{{$product->brand->name}}</div>
      @endif
   </div>
   @php
      $qty = 0;
      foreach ($product->stocks as $key => $stock) {
         $qty += $stock->qty;
      }
   @endphp
   <div class="discrptions">
      <a href="{{ route('product', $product->slug) }}">
         <h5 class="desclist">{{ $product->getTranslation('name') }} </h5>
      </a>
      <h6>{{ home_discounted_base_price($product) }} &nbsp;
         @if( home_discounted_base_price($product, false) != home_base_price($product, false))
            <strike>₹{{$product->unit_price}}</strike>
         @endif
      </h6>
   </div>

   

   @if($product->is_cart_product == 1)
      <div class="discrptions_button buddonjdk {{$product->id}} active">
   @else
      <div class="discrptions_button buddonjdk {{$product->id}}">
   @endif


      <input type="hidden" value="{{$product->id}}" class="prod_id">
      @if( home_discounted_base_price($product, false) != home_base_price($product, false))
      <input type="hidden" value="{{ home_discounted_base_price($product, false) }}" class="prod_price">
      @else
      <input type="hidden" value="{{ home_base_price($product, false) }}" class="prod_price">
      @endif
      <input type="hidden" value="{{$product->name}}" class="prod_name">
      
      @if($qty>=1)
         <button id="btn1" type="button" class="btn cart active cart_buttons3 addToCartUButton"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="name">Add to cart</span> </button>         
         <div class="cart-add cart-add3 products_list ">
            <div class="input-group quantity_input mb-0">
               <div class="input-group w-auto justify-content-end align-items-center packageadd">
                  @if($product->cart_quantity >= 1)
                     <input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1_1 add_cart_button_minus" data-field="quantity">
                     <input type="number" step="1" max="10" value="{{$product->cart_quantity}}" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">
                  @else
                     <input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1_1 add_cart_button_minus" data-field="quantity" disabled>
                     <input type="number" step="1" max="10" value="1" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">
                  @endif
                  <input type="button" value="+" class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0_1 add_cart_button_plus" data-field="quantity">
                  <a href="{{url('cart')}}"> <h6 class="cart_buttons cart_icons1"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h6></a>
               </div>
            </div>
         </div>
         <button class="buttonbuynow productBuyNow"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now</button>
      @else
         <button class="outofstock">&nbsp;&nbsp;Out&nbsp;of&nbsp;Stock</button>
         <button class="buttonbuynow productBuyNow" disabled style="opacity:0.6;">
            <i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;
            Buy Now
         </button>
      @endif	
   </div>
</div>
 