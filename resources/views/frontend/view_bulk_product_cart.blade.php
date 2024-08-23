@extends('frontend.master')

@section('content')

<style>
   input.button-plus.border.rounded-circle.quantity-right-plus.icon-shape.icon-sm.lh-0 {
    background: #ff6c00;
    width: 30px;
    color: #fff;
    font-size: 18px;
    border: none;
    box-shadow: none;
    height: 30px;
    text-align: center;
    padding: 0px;
}
input.button-minus.border.rounded-circle.quantity-left-minus.icon-shape.icon-sm.mx-1{
    background:#1274c0;
    width: 30px;
    color: #fff;
    font-size: 18px;
    border: none;
    box-shadow: none;
    height: 30px;
    text-align: center;
    padding: 0px;
}
input.quantity.quantity-field.border-0.text-center.w-25 {
    border: 1px solid #ccc !important;
    height: 30px;
    width: 65px !important;
    margin: 0px !important;
}
   </style>
   
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
                  <li class="breadcrumb-item active" aria-current="page"> Bulk Product Cart     </li>
               </ol>
               </nav>
            </div>
            <div class="col-md-4">
            </div>
         </div>
         <div id="cart-summary" class="justify-content-between1">
            @include('frontend.partials.bulk_cart')
         </div>
      </div>
   </div>
   
@endsection

@section('script')
<script>
   $( document ).ready(function() {

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
      
   });
</script>
@endsection

