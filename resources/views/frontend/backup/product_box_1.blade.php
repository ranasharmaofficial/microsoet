<div class="product-box h-auto product_data pb-3">
   <div class="beachs">{{$product->discount}}% Off</div>
   <img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{  $product->getTranslation('name')  }}"
      onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
	
   <div class="discrptions">
      <a href="{{ route('product', $product->slug) }}">
         <h5 class="text-truncate-2">{{ $product->getTranslation('name') }} </h5>
      </a>
      <h6>MRP/- {{ home_discounted_base_price($product) }}</h6>
   </div>
   <!-- <ul class="ulproducts">
                              <li>In stock</li>
                              <li>Non returnable</li>
                              <li>Usually ships in 24-72 Hours</li>
                           </ul> -->
   @php
   $price = $product->unit_price - ($product->unit_price * $product->discount) / 100;
   @endphp
    
	
	 <div class="discrptions_button buddonjdk">
                            <h5 class="mask-overflow">
							<a href="{{ route('product', $product->slug) }}"><i class="fa fa-eye"></i></a>
							</h5>
							<form class="product_data" id="option-choice-form">
    @csrf
    <input type="hidden" name="id" class="prod_id" value="{{ $product->id }}">
	@if (count(json_decode($product->choice_options)) > 0)
    @foreach (json_decode($product->choice_options) as $key => $choice)
    <div class="tab-finish d-none">
        <div class="row no-gutters">
            <div class="col-sm-2">
                <p class="ucfirst">
                    {{ \App\Models\Attribute::find($choice->attribute_id)->getTranslation('name') }}:
                </p>
            </div>
            <div class="col-sm-10">
                <div class="aiz-radio-inline">
                    @foreach ($choice->values as $key => $value)
                    <label class="aiz-megabox pl-0 mr-2">
                        <input class="opacity attribute_id_{{ $choice->attribute_id }}" type="radio" name="attribute_id_{{ $choice->attribute_id }}"
                            value="{{ $value }}" @if($key==0) checked @endif>
                        <span
                            class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                            {{ $value }}
                        </span>
                    </label>
					
					
					
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    @if (count(json_decode($product->colors)) > 0)
    <div class="row no-gutters d-none">
        <div class="col-sm-2">
            <div class="opacity-50 my-0">
                <h6>{{ translate('Color')}}:</h6>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="aiz-radio-inline">
                @foreach (json_decode($product->colors) as $key => $color)
                <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip"
                    data-title="{{ \App\Models\Color::where('code', $color)->first()->name }}">
                    <input class="color" type="radio" name="color"
                        value="{{ \App\Models\Color::where('code', $color)->first()->name }}" @if($key==0) checked
                        @endif>
                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                        <span class="size-30px d-inline-block rounded" style="background:{{ $color }};"></span>
                    </span>
                </label>
                @endforeach
            </div>
        </div>
    </div>

    <hr>
    @endif

    <!-- Quantity + Add to cart -->
    <div class="row no-gutters d-none">
        <div class="col-sm-2">
            <div class="opacity-50 my-2">{{ translate('Quantity')}}:</div>
        </div>
        <div class="col-sm-10">
            <div class="product-quantity d-flex align-items-center">
                <div class="input-group w-60 justify-content-start align-items-center packageadd">
                    <input type="button" value="-"
                        class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 m-0"
                        data-field="quantity">
                    <input type="number" class="quantity" step="1" min="{{ $product->min_qty }}" max="10"
                        value="{{ $product->min_qty }}" name="quantity"
                        class="quantity quantity-field border-0 text-center m-0 w-25">
                    <input type="button" value="+"
                        class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm m-0 lh-0"
                        data-field="quantity">
                </div>

                @php
                $qty = 0;
                foreach ($product->stocks as $key => $stock) {
                $qty += $stock->qty;
                }
                @endphp
                <div class="avialable-amount w-40 opacity-60">
                    @if($product->stock_visibility_state == 'quantity')
                    (<span id="available-quantity">{{ $qty }}</span>
                    {{ translate('available')}})
                    @elseif($product->stock_visibility_state == 'text' && $qty >= 1)
                    (<span id="available-quantity">{{ translate('In Stock') }}</span>)
                    @endif
                </div>
            </div>
        </div>
    </div>
	<div class="cart-add d-block cart-add1 products_list ">
            <div class="input-group quantity_input mb-0">
                <div class="input-group w-100 justify-content-start align-items-center packageadd">
                    <input type="button" value="-"
                        class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 m-0"
                        data-field="quantity">
                    <input type="number" step="1" min="{{ $product->min_qty }}" max="10"
                        value="{{ $product->min_qty }}" name="quantity"
                        class="quantity quantity-field border-0 text-center m-0 w-25">
                    <input type="button" value="+"
                        class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm m-0 lh-0"
                        data-field="quantity">
                </div>
            </div>
        </div>
</form>
                              <button  type="button" class="btn cart active addToCartButtonProductList{{$product->id}}">
							  <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
							  <span class="name">Add to cart</span> 
							  </button>
							  
                             
                           </div>
	
	
</div>
 
 <script>
 $(document).ready(function() {
			// loadcart();
			$('.addToCartButtonProductList{{$product->id}}').click(function (e) { 
                e.preventDefault();
                var id = $(this).closest('.product_data').find('.prod_id').val();
                var color = $(this).closest('.product_data').find('.color').val();
                var quantity = $(this).closest('.product_data').find('.quantity').val();
				if($choice->attribute_id != null){
					var attribute_id_{{ $choice->attribute_id }} = $(this).closest('.product_data').find('.attribute_id_{{ $choice->attribute_id }}').val();
				}else{
					 var attribute_id = null;
				}

			   // alert(id);
			   // alert(color);
			   // alert(quantity);
			   // alert(attribute_id_{{ $choice->attribute_id }});
			   // alert(attribute_id_{{ $choice->attribute_id }});
			   // console.log(id);
			   // console.log(color);
			   // console.log(quantity);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    // url: '{{url('add-to-cart')}}',
					url: '{{ route('cart.addToCart') }}',
                    data: {
                       'id':id,
                       'color':color,
                       'quantity':quantity,
					   if(attribute_id_{{ $choice->attribute_id }}){
						   'attribute_id_{{ $choice->attribute_id }}':attribute_id_{{ $choice->attribute_id }},
					   }
                    },
                    success: function (data) {
                        // alert(response.status);
						 // toastr.info(response.status);
                         // loadcart();
						  toastr.info(data.status);
                       updateNavCart(data.nav_cart_view,data.cart_count);
						 //updateNavCart(data.nav_cart_view,data.cart_count);
                    }
                });
        });
		});
 </script>