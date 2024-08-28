			<div id="cat_product">
				@php
					$current_timestamp = strtotime(date('Y-m-d H:i:s'));
				@endphp

				@if(get_setting('top10_brands') != null)
				@php $top10_brands = json_decode(get_setting('top10_brands')); @endphp
				@foreach($top10_brands as $key => $value)
				@php $brand = \App\Models\Brand::find($value); @endphp
					<!--- Raana Products start -->
					<div class="title d-block py-5">
                        <h2>{{ $brand->name }}</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        {{-- <p>A virtual assistant collects the products from your list rana sharma</p> --}}
                    </div>
					@php
						$product_lists = App\Models\Product::where('published',1)->where('approved',1)->where('brand_id', $brand->id)->limit(10)->get();
					@endphp
                    <div class="product-border overflow-hidden wow fadeInUp">
                        <div class="product-box-slider no-arrow">
                            @if(count($product_lists)>0)
								@foreach($product_lists as $item)

								@php
								$product_url = route('product', $item->slug);
								$item->cart_quantity = 0;
                                $totalQty = 0; // Initialize total quantity
                                if($item->stocks){
                                    foreach ($item->stocks as $key => $stock) {
                                        $totalQty += $stock->qty; // Accumulate total quantity
                                    }
                                }

                                if($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp &&  $item->discount_type == "percent"){
                                    $output .= '<div class="beachs">'.$item->discount.' % Off</div>';
                                    $discount_price = home_discounted_base_price($item, false);
                                    $discount_show_price = home_discounted_base_price($item, true);
                                    $original_show_price = home_base_price($item, true);

                                }elseif($item->discount_start_date <= $current_timestamp && $item->discount_end_date >= $current_timestamp && $item->discount_type == "amount") {
                                    $output .= '<div class="beachs">₹'.$item->discount.' Off</div>';
                                    $discount_price = home_discounted_base_price($item, false);
                                    $discount_show_price = home_discounted_base_price($item, true);
                                    $original_show_price = home_base_price($item, true);
                                }else{
                                    $discount_price = home_base_price($item, false);
                                    $discount_show_price = home_discounted_base_price($item, true);
                                    $original_show_price = home_base_price($item, true);
                                }
								@endphp
							<div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="{{ $product_url }}">
                                                    <img src="{{ uploaded_asset($item->thumbnail_img) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#view">
                                                            <i data-feather="eye"></i>
                                                        </a>
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Compare">
                                                        <a href="compare.html">
                                                            <i data-feather="refresh-cw"></i>
                                                        </a>
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist">
                                                        <a href="wishlist.html" class="notifi-wishlist">
                                                            <i data-feather="heart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="{{ $product_url }}">
                                                    <h6 class="name h-100">{{ \Illuminate\Support\Str::limit($item->getTranslation('name'), 45, '...') }}
                                                    </h6>
                                                </a>
                                                <h5 class="sold text-content">
                                                    <span class="theme-color price"> {{ $discount_show_price }}</span>
                                                    <del> 19% Off</del>
                                                </h5>
                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>
                                                <div class="add-to-cart-box d-none">
                                                    <button class="btn btn-add-cart addcart-button">Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus"
                                                                data-type="minus" data-field="">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input"
                                                                type="text" name="quantity" value="0">
                                                            <button type="button" class="qty-right-plus"
                                                                data-type="plus" data-field="">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							@endforeach
							@endif

                        </div>
                    </div>
                    @endforeach
					<!-- Rana Products  --->
				@endif
			</div>


				<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // AJAX call to fetch home-category-product
        $.ajax({
            method: "GET",
            url: "{{route('home-category-product')}}",
            success: function (response) {
                if (response.status == true) {
                    $('#cat_products').html(response.data);

                } else {
                    console.log('Error: Response status is not true');
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', error);
            }
        });


        //Add to cart button function
        $(document).on('click', '.addToCartUButton', function () {
            var product_data = $(this).closest('.product_data');
            var product_id = product_data.find('.prod_id').val();
            var product_qty = product_data.find('.qty').val();
            var product_price = product_data.find('.prod_price').val();
            var prod_name = product_data.find('.product_name').val();
            var prod_img = product_data.find('.prod_img').val();

            $(".printproname").text(prod_name);
            $(".printproimg").attr("src", prod_img);

            $.ajax({
                method: "POST",
                url: "{{url('add-to-cart')}}",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                    'product_price': product_price
                },
                success: function (response) {
                    updateNavCart(response.nav_cart_view, response.cart_count, response.sum_cart_count);
                    $('#product-box').html(response.product_box_view);
                    //$('.buddonjdk').addClass('active');
                    //$('.addToCartUButton').addClass('d-none');
                }
            });
        });

    });
</script>
