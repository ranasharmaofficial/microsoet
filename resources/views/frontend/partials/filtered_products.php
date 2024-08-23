@if (count($prods) > 0)
@foreach ($prods as $key => $product)
<div class="col-md-3 col-cat-box">
    <div class="product-box h-auto pb-3 product_data">
        @if($product->discount!=null)<div class="beachs">{{$product->discount}}% Off</div>@endif
        <img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{  $product->getTranslation('name')  }}"
            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
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
                <h5>{{ $product->getTranslation('name') }} </h5>

            </a>
            <h6>{{ home_discounted_base_price($product) }}
                &nbsp;@if($product->discount!=null)<strike>₹{{$product->unit_price}}</strike>@endif</h6>
        </div>
        <!-- <ul class="ulproducts">
								  <li>In stock</li>
								  <li>Non returnable</li>
								  <li>Usually ships in 24-72 Hours</li>
							   </ul> -->
        @php
        $price = $product->unit_price - ($product->unit_price * $product->discount) / 100;
        @endphp

        <div class="discrptions_button01 buddonjdk01">
            <h5 class="mask-overflow">
                <a href="{{ route('product', $product->slug) }}"><i class="fa fa-eye"></i></a>
            </h5>
        </div>



        <div class="discrptions_button buddonjdk {{$product->id}} ">



            <input type="hidden" value="{{$product->id}}" class="prod_id">
            <input type="hidden" value="{{ $price }}" class="prod_price">
            @if($qty>=1)
            <button id="btn1" type="button" class="btn cart active cart_buttons3 addToCartUButton"><i
                    class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="name">Add to cart</span> </button>


            <div class="cart-add cart-add3 products_list ">
                <div class="input-group quantity_input mb-0">
                    <div class="input-group w-auto justify-content-end align-items-center packageadd">

                        <input type="button" value="&minus;"
                            class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1 add_cart_button_plus"
                            data-field="quantity">
                        <input type="number" step="1" max="10" value="1" name="quantity"
                            class="quantity quantity-field border-0 text-center w-25 input-number">
                        <input type="button" value="&plus;"
                            class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0 add_cart_button_plus"
                            data-field="quantity">
                        <a href="{{url('cart')}}">
                            <h6 class="cart_buttons cart_icons1"><i class="fa fa-cart-arrow-down"
                                    aria-hidden="true"></i></h6>
                        </a>
                    </div>
                </div>
            </div>
            @else

            <button type="button" class="btn bg-secondary"><span class="name">Out of Stock</span> </button>
            @endif

        </div>

    </div>
</div>
@endforeach
@endif