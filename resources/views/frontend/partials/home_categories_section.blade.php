<style>
.sliderProductHeader{
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    background: rgb(255, 255, 255);
    padding: 0px 12px;
}
.headerStripContainer{
    display: flex;
    flex: 1 1 0%;
    background: transparent;
}
.slideHeaderContain{
    display: flex;
    flex-direction: column;
    -webkit-box-pack: center;
    justify-content: center;
    padding: 16px 0px;
}
.textButtonContainer{
    display: flex;
    gap: 4px;
    flex-direction: row;
    max-width: 50%;
    -webkit-box-align: center;
    align-items: center;
    cursor: pointer;
}
.productButtonText{
    font-size: 20px;
    font-family: inherit;
    font-weight: 600;
    line-height: 32px;
    color: rgb(12, 131, 31);
}
.productListWrapper{
    display: flex;
    position: relative;
    flex-direction: column;
    background: rgb(255, 255, 255);
}
.productListContainer{
    max-width: 100%;
    /* overflow: auto hidden; */
    scrollbar-width: none;
    display: flex;
    flex-direction: row;
    -webkit-box-align: center;
    align-items: center;
    padding-bottom: 20px;
    column-gap: 20px;
    /* margin-left: 12px;
    margin-right: 12px; */
}
.productTypeCard{
    cursor: pointer;
    flex: 0 1 0%;
    min-width: 179px;
    max-width: 179px
}
@media only screen and (max-width: 600px) {
    .productTypeCard{
        min-width: 167px;
        max-width: 167px
    }
}
.productContainer{
    min-width: 100%;
    grid-column: span 6;
    padding-bottom: 0.75rem;
    gap: 0.125rem;
    align-items: flex-start;
    flex-direction: column;
    display: flex;
    position: relative;
    cursor: pointer;
    background: rgb(255, 255, 255);
    border: 0.5px solid rgb(232, 232, 232);
    box-shadow: rgba(0, 0, 0, 0.04) 2px 2px 8px;
    border-radius: 8px;
}
.productImageContainer{
    border-radius: 12px;
    overflow: hidden;
    width: 100%;
    position: relative;
}
.productImage{
    width: 100%;
    height: 100%;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
}
.productImageStyle{
    height: 140px;
    width: 140px;
    cursor: default;
    border-radius: 0px;
}
.productImageStyle img{
    border-radius: 0px;
    object-fit: fill;
    cursor: default;
}
.detailsContainer{
    box-sizing: border-box;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    width: 100%;
}
.productETAContainer{
    margin-bottom: 7px;
    gap: 0.25rem;
    display: flex;
    flex-wrap: wrap;
    overflow: hidden;
    height: 15px;
    width: 90%;
}
.proETABadge{
    border-radius: 4px;
    border-width: 0px;
    padding: 0px 4px;
    background-color: rgb(248, 248, 248);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}
.contentContainer{
    flex-direction: column;
    width: 100%;
    display: flex;
}
.titleAndVariantContainer{
    flex-direction: column;
    display: flex;
    margin-bottom: 0.5rem;
}
.productTitle{
    overflow: hidden;
    color: rgb(31, 31, 31);
    font-weight: 600;
    font-size: 13px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    line-height: 18px;
    width: 100%;
    height: 36px;
    margin-bottom: 6px;
}
.quantity{
    align-items: center;
    display: flex;
    height: 26px;
    width: 100%;
}
.proQty{
    height: 13px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    /* overflow: hidden; */
    text-overflow: ellipsis;
}
.priceAndATCContainer{
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    width: 100%;
}
.addToCartButton{
    cursor: pointer !important;
    width: 66px !important;
    border: 1px solid rgb(49, 134, 22) !important;
    height: 31px !important;
    color: rgb(49, 134, 22) !important;
    font-weight: 600 !important;
    font-size: 13px !important;
    background-color: rgb(247, 255, 249) !important;
    border-radius: 0.375rem !important;
    gap: 0.125rem;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    font-family: inherit;
}
.outOfStockButton{
    width: 96px;
    border: 1px solid rgb(224, 220, 212);
    height: 31px;
    color: rgb(119, 118, 118);
    font-weight: 600;
    font-size: 13px;
    background-color: rgb(247, 255, 249);
    border-radius: 0.375rem;
    gap: 0.125rem;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    font-family: inherit;
}
.product_cat_carousel_jsdgsdkjhkl.owl-theme {
    position: relative;
}
.product_cat_carousel_jsdgsdkjhkl.owl-theme .owl-next, .product_cat_carousel_jsdgsdkjhkl.owl-theme .owl-prev {
    margin-top: -20px;
    top: 40%;
    box-sizing: border-box;
    font-size: 0px;
    height: 34px;
    width: 34px;
    background: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0.2) 0px 3px 5px -1px, rgba(0, 0, 0, 0.14) 0px 6px 10px 0px, rgba(0, 0, 0, 0.12) 0px 1px 18px 0px;
    border-radius: 50%;
    position: absolute;
    z-index: 2;
    right: unset;
    display: initial;
    border: 4px solid transparent;
    align-self: center;
    cursor: pointer;
}
.product_cat_carousel_jsdgsdkjhkl.owl-theme .owl-next:hover, .product_cat_carousel_jsdgsdkjhkl.owl-theme .owl-prev:hover {
    background: #f3f2f2;
    transition: 0.5s;
}
.product_cat_carousel_jsdgsdkjhkl.owl-theme .owl-prev {
  left: -15px;
}
.product_cat_carousel_jsdgsdkjhkl.owl-theme .owl-next {
  right: -13px;
}
.products_list input.quantity.quantity-field.border-0.text-center.w-25 {
    height: 31px;
    width: 35px !important;
    margin: 0px !important;
}
input.button-minus.border.rounded-circle.quantity-left-minus.icon-shape.icon-sm.mx-1_1 {
    margin-right: 0px !important;
    background: #25AE5F !important;
    color: #fff !important;
    border-radius: 0 !important;
}
input.button-plus.border.rounded-circle.quantity-right-plus.icon-shape.icon-sm.lh-0_1 {
    margin-left: 0px !important;
    background: #25AE5F !important;
    color: #fff !important;
    border-radius: 0 !important;
}
.products_list input.quantity.quantity-field.border-0.text-center.w-25 {
    border-radius: 0 !important;
    border-color: #25AE5F !important;
}
</style>
<div id="cat_product"></div>

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
                    $('#cat_product').html(response.data);
                    
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
