@extends('frontend.master')

@section('content')

<section class="pageTitle product-detail_banner" style="background-image:url({{static_asset('assets_web/img/orderbanner.png')}})">
   <div class="container"> </div>
</section>

<section class="bannerslid mb-5 pt-5 animated animate__fadeInUp wow">
  <div class="container">
    <div class="table-crack-border">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table aiz-table mb-0 footable footable-1 breakpoint-lg brdrnone">
        <tr>
          <td colspan="4">
            <div class="row">
              <div class="col-md-6 allsettertxt">More Sellers</div>
              <div class="col-md-6">
                <h5 class="fr">
                  <img src="{{uploaded_asset($pro->thumbnail_img)}}" class="sellerproImg">
                  <span class="sellerproTitle">{{$pro->name}}</span>
                </h5>
              </div>
            </div>
          </td>    
        </tr>

        <tr class="footable-header">
          <th>Seller Name</th>
          <th class="thwidth">Price</th>
          <th>Delivery</th>
          <th>&nbsp;</th>
        </tr>

        @foreach($products as $item)
          <tr class="product_data">
            <td colspan="4">
              <div class="row">
                <div class="col-md-3">
                  <span><strong>{{$item->user->shop->name}} </strong></span><br/>
                  <ul>
                    @if ($item->cash_on_delivery == 1)
                    <li>Cash On Delivery available</li>
                    @endif
                  
                    <li>7 Days Replacement Policy</li>
                  </ul>
                </div>

                <div class="col-md-3">

                  @if($item->discount != null && $item->discount_start_date <= $current_date_time && $item->discount_end_date >= $current_date_time)  
                    <strong class="pricestrong">{{ home_discounted_base_price($item) }}</strong> 
                    <input type="hidden" value="{{ home_discounted_base_price($item, false) }}" class="prod_price">

                    @if($item->discount_type == "percent")
                        <strike>{{ home_base_price($item) }}</strike> <span class="starrating">{{$item->discount}} % Off</span><br />
                    @else
                        <strike>{{ home_base_price($item) }}</strike> <span class="starrating">₹ {{$item->discount}} Flat Off</span><br />
                    @endif
                  @else
                    <input type="hidden" value="{{ home_base_price($item, false) }}" class="prod_price">
                    <strong class="pricestrong">{{ home_base_price($item) }}</strong> 
                  @endif

                  <ul class="offershowhide">
                    <li>10% off on SBI Credit Card, up to ₹750. On orders of ₹5000 and above</li>
                    <li class="collapseli">10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹5000 and above</li>
                    <li class="collapseli">5% Cashback on Flipkart Axis Bank Card</li>
                    <li class="collapseli">Get extra ₹1200 off (price inclusive of discount)</li>
                    <li class="collapseli">Get Google Nest hub at just ₹4999</li>
                    <li class="collapseli">Google Nest mini- attach 1999</li>
                    <li class="collapseli">Sign up for Flipkart Pay Later and get Flipkart Gift Card worth up to ₹500*</li>
                    <span class="showoffer">6 more offers</span>
                    <span class="hideoffer">Hide more offers</span>
                  </ul>
                </div>

                <div class="col-md-3">
                  <span class="deltxt">Usually delivered in 3 days Enter pincode for exact delivery dates/charges</span>
                </div>

                <input type="hidden" value="{{$item->id}}" class="prod_id">
                <input type="hidden" value="{{$item->name}}" class="prod_name">
                <input type="hidden" value="{{uploaded_asset($item->thumbnail_img)}}" class="prod_img">
                <input type="hidden" value="{{$item->min_qty}}" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">
                <div class="col-md-3">
                @php $qty = 0;  foreach ($item->stocks as $key => $stock) { $qty += $stock->qty; }@endphp
                
                @if($qty > 0)
                  <button id="btn1" type="button" class="btn cart active cart_buttons3 addToCartUButton">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                    <span class="name">Add to cart</span> 
                  </button>
                  <button class="buttonbuynow productBuyNow">
                    <i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now
                  </button>
                @else 
                  <button class="outofstock">&nbsp;&nbsp;Out&nbsp;of&nbsp;Stock</button>
                  <button class="buttonbuynow productBuyNow" disabled style="opacity:0.6;"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now</button>
                @endif
                </div>
              </div>
            </td>    
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</section>
        
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on('click', '.addToCartUButton', function () {
      var product_id = $(this).closest('.product_data').find('.prod_id').val();
      var product_qty = $(this).closest('.product_data').find('.input-number').val();
      var product_price = $(this).closest('.product_data').find('.prod_price').val();
			var prod_name = $(this).closest('.product_data').find('.prod_name').val();
			var prod_img = $(this).closest('.product_data').find('.prod_img').val();

			$(".printproname").text(prod_name);
			$(".printproimg").attr("src",prod_img);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          method: "POST",
          url: '{{url('add-to-cart')}}',
          data: {
              'product_id': product_id,
              'product_qty': product_qty,
              'product_price': product_price,
          },
          success: function (response) {
              // toastr.info(response.status);
              updateNavCart(response.nav_cart_view, response.cart_count, response.sum_cart_count);
              $('#product_data').html(response.product_box_view);
          }
      });

    });

    $(document).on('click', '.productBuyNow', function () {
      var product_id = $(this).closest('.product_data').find('.prod_id').val();
      var product_qty = $(this).closest('.product_data').find('.input-number').val();
      var product_price = $(this).closest('.product_data').find('.prod_price').val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          method: "POST",
          url: '{{url('product-buy-now')}}',
          data: {
              'product_id': product_id,
              'product_qty': product_qty,
              'product_price': product_price,
          },
          success: function (response) {
              // toastr.info(response.status);
              updateNavCart(response.nav_cart_view, response.cart_count, response.sum_cart_count);
              $('#product_data').html(response.product_box_view);
              setTimeout(function() {
                  /*Redirect to cart page after 1 sec*/
                  window.location.href ='{{url('cart')}}';
              }, 1000)
          }
      });
    });

    function updateNavCart(view, count, amount) {
        $('.cart-count').html(count);
        $('#cart_items').html(view);
        $('.cart-amount').html(amount);
    }


  });
</script>
@endsection
