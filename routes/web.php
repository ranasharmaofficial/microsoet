<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
// use App\Mail\SupportMailManager;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceCartController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController as ForgotPasswordAuth;
use App\Http\Controllers\SiteMapController;
//demo

//check delivery service available
Route::post('check_delivery_service_available', 'HomeController@check_delivery_service_available')->name('check_delivery_service_available');
Route::post('check_delivery_free_or_charge', 'HomeController@check_delivery_free_or_charge')->name('check_delivery_free_or_charge');

Route::get('/test_mail_template', 'SendmailerController@checkMailTemplate')->name('test_mail_template');
Route::get('/email_test', 'SendmailerController@sendMail')->name('email_test');

// route for uploading data in db
Route::get('/upload_discounted_price_db', 'SearchController@upload_discounted_price_db')->name('upload_discounted_price_db');
Route::get('/move_on_master_product', 'HomeController@moveOnMasterProduct')->name('move_on_master_product');

//Created by Ankit: 08-05-24
Route::get('home-category-product', 'HomeController@homeCategoryProduct')->name('home-category-product');

Route::get('home-calling-all-category', 'HomeController@callingAllCategory')->name('home-calling-category');
Route::get('home-calling-all-products', 'HomeController@callingAllProducts')->name('home-calling-products');
Route::get('home-calling-all-brands', 'HomeController@callingAllBrands')->name('home-calling-brands');
//Created by Vicky - 3 Dec 2022
Route::get('getHeaderProductsMenu', 'HomeController@getHeaderProductsMenu')->name('getHeaderProductsMenu');
Route::get('getHeaderServiceMenu', 'HomeController@getHeaderServiceMenu')->name('getHeaderServiceMenu');

//new and blog page leave kiya hal filal
Route::get('/advertise', 'StaticController@advertise')->name('frontend.advertise');
Route::get('/enquiry', 'StaticController@enquiry')->name('frontend.enquiry');
Route::get('/become-seller', 'StaticController@seller')->name('frontend.selller');
Route::get('/help-center', 'StaticController@helpcenter')->name('frontend.helpcenter');
Route::get('/appointment', 'StaticController@appointment')->name('frontend.appointment');
Route::get('/about-us', 'StaticController@aboutus')->name('frontend.aboutus');
Route::get('/residentilal', 'StaticController@residentilal')->name('frontend.residentilal');
Route::get('/commercial', 'StaticController@commercial')->name('frontend.commercial');
Route::get('/architect', 'StaticController@architect')->name('frontend.architect');
Route::get('/interior-exterior', 'StaticController@interior')->name('frontend.interior');
Route::get('/building', 'StaticController@building')->name('frontend.building');
Route::get('/blog', 'StaticController@blog')->name('frontend.blog');
Route::get('/news-media', 'StaticController@news')->name('frontend.news');
Route::get('/talk-to', 'StaticController@talkto')->name('frontend.talk');
Route::get('/plumber-electrician', 'StaticController@plumber')->name('frontend.plumber');
Route::get('/sales-partner', 'StaticController@salespartner')->name('frontend.sales');
Route::get('/material-supplier', 'StaticController@material')->name('frontend.material');
Route::get('/labour-suppllier', 'StaticController@labour')->name('frontend.labour');
Route::get('/engineer-architect-associates', 'StaticController@engineerarchitect')->name('frontend.engineer');
Route::get('/career', 'StaticController@career')->name('frontend.career');
Route::get('/contact-us', 'StaticController@contact')->name('frontend.contact');
Route::get('/policy', 'StaticController@policy')->name('frontend.policy');
Route::get('/disclaimer', 'StaticController@disclaimer')->name('frontend.disclaimer');
Route::get('/order-free-sample', 'StaticController@orderFreeSample')->name('frontend.orderFreeSample');
Route::get('/hire-now', 'StaticController@hireNow')->name('frontend.hirenow');
Route::get('/design-explorer', 'StaticController@designExplorer')->name('frontend.designExplorer');
Route::get('/collaboration', 'StaticController@collaboration')->name('frontend.collaboration');
Route::get('/collaborationDetails', 'StaticController@collaborationDetails')->name('frontend.collaborationDetails');
Route::get('/collaborationOwner', 'StaticController@collaborationOwner')->name('frontend.collaborationOwner');

Route::get('/buy_sell', 'StaticController@buy_sell')->name('frontend.buy_sell');
Route::get('/buy_list', 'StaticController@buy_list')->name('frontend.buy_list');
Route::get('/builderprojectdetails', 'StaticController@builderprojectdetails')->name('frontend.builderprojectdetails');

Route::get('/investors', 'StaticController@investors')->name('frontend.investors');
Route::get('/investorszone', 'StaticController@investorszone')->name('frontend.investorszone');
Route::get('/investorszonecommercial', 'StaticController@investorszonecommercial')->name('frontend.investorszonecommercial');
Route::get('/projectdetails', 'StaticController@projectdetails')->name('frontend.projectdetails');

Route::get('seller_register_success', 'HomeController@sellerRegistrationSuccess')->name('seller_register_success');

Route::post('getPinCodeDetails', [HomeController::class, 'getPinCodeDetails'])->name('getPinCodeDetails');
// form route starts from here
Route::post('addinteriorformdata', [StaticController::class, 'addformdata']);
Route::post('submitenquiryform', [StaticController::class, 'addenquiryformdata']);
Route::post('submitcareerform', [StaticController::class, 'addcareerformdata']);
Route::post('addHireNow', [StaticController::class, 'addHireNow'])->name('addHireNow');
Route::post('insertFormData', [StaticController::class, 'insertFormData'])->name('insertFormData');
Route::post('comming_soon/enquiry_form', [StaticController::class,'comming_soon_form'])->name('frontend.comming_soon.enquiry_form');

//same route for every form

//route for career form
//Route::post('addcareerformdata', [StaticController::class,'addcareerformdata']);

Route::get('/demo/cron_1', 'DemoController@cron_1');
Route::get('/demo/cron_2', 'DemoController@cron_2');
Route::get('/convert_assets', 'DemoController@convert_assets');
Route::get('/convert_category', 'DemoController@convert_category');
Route::get('/convert_tax', 'DemoController@convertTaxes');
Route::get('/insert_product_variant_forcefully', 'DemoController@insert_product_variant_forcefully');
Route::get('/update_seller_id_in_orders/{id_min}/{id_max}', 'DemoController@update_seller_id_in_orders');
Route::get('/migrate_attribute_values', 'DemoController@migrate_attribute_values');

Route::get('/refresh-csrf', function () {
    return csrf_token();
});

Route::get('sitemap.xml', 'SiteMapController@sitemap');
Route::get('sitemap', 'SiteMapController@categoryWiseSitemap');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared by @RanaSharma";
});

Route::post('/aiz-uploader', 'AizUploadController@show_uploader');
Route::post('/aiz-uploader/upload', 'AizUploadController@upload');
Route::get('/aiz-uploader/get_uploaded_files', 'AizUploadController@get_uploaded_files');
Route::post('/aiz-uploader/get_file_by_ids', 'AizUploadController@get_preview_files');
Route::get('/aiz-uploader/download/{id}', 'AizUploadController@attachment_download')->name('download_attachment');


Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('/verification-confirmation/{code}', 'Auth\VerificationController@verification_confirmation')->name('email.verification.confirmation');
Route::get('/email_change/callback', 'HomeController@email_change_callback')->name('email_change.callback');
Route::post('/password/reset/email/submit', 'HomeController@reset_password_with_code')->name('password.update');


Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');

Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('/admin/login', 'HomeController@admin_login')->name('admin.login');
Route::get('/login', 'HomeController@login')->name('login');
Route::get('/vendor-login', 'HomeController@vendorLogin')->name('vendor-login');
Route::get('register', function () {
    return redirect('login');
});
Route::group(['middleware' => ['XssSanitizer']], function () {
    Route::post('/auth/register', [AuthRegisterController::class, 'register'])->name('auth.register');
    Route::post('/auth/login', [AuthLoginController::class, 'login'])->name('auth.login');
    Route::post('/auth/admin/login', [AuthLoginController::class, 'admin_login'])->name('auth.admin.login');

    Route::get('/forgot_password', [ForgotPasswordAuth::class, 'index'])->name('forgot_password');
    Route::post('/send_password_reset_link', [ForgotPasswordAuth::class, 'send_password_reset_link'])->name('forgot_password.send_password_reset_link');
    Route::get('/reset_password', [ForgotPasswordAuth::class, 'reset_password'])->name('forgot_password.reset_password');
    Route::post('/reset_password_auth', [ForgotPasswordAuth::class, 'reset_password_auth'])->name('forgot_password.reset_password_auth');

});

Route::post('/users/login/cart', 'HomeController@cart_login')->name('cart.login.submit');

//Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::post('/home/section/featured', 'HomeController@load_featured_section')->name('home.section.featured');
Route::post('/home/section/best_selling', 'HomeController@load_best_selling_section')->name('home.section.best_selling');
Route::post('/home/section/home_categories', 'HomeController@load_home_categories_section')->name('home.section.home_categories');
Route::post('/home/section/best_sellers', 'HomeController@load_best_sellers_section')->name('home.section.best_sellers');
//category dropdown menu ajax call
Route::post('/category/nav-element-list', 'HomeController@get_category_items')->name('category.elements');



//Flash Deal Details Page
Route::get('/flash-deals', 'HomeController@all_flash_deals')->name('flash-deals');
Route::get('/flash-deal/{slug}', 'HomeController@flash_deal_details')->name('flash-deal-details');

Route::post('productRequestQuote', 'HomeController@productRequestQuote')->name('productRequestQuote');
Route::post('insertCallRequest', 'HomeController@insertCallRequest')->name('insertCallRequest');
Route::post('productnotifyme', 'HomeController@productnotifyme')->name('productnotifyme');
Route::post('bookAppointment', 'StaticController@bookAppointment')->name('bookAppointment');

// Route::get('/sitemap.xml', function () {
//     return base_path('sitemap.xml');
// });


Route::get('/customer-products', 'CustomerProductController@customer_products_listing')->name('customer.products');
Route::get('/customer-products?category={category_slug}', 'CustomerProductController@search')->name('customer_products.category');
Route::get('/customer-products?city={city_id}', 'CustomerProductController@search')->name('customer_products.city');
Route::get('/customer-products?q={search}', 'CustomerProductController@search')->name('customer_products.search');
Route::get('/customer-products/admin', 'IyzicoController@initPayment')->name('profile.edit');
Route::get('/customer-product/{slug}', 'CustomerProductController@customer_product')->name('customer.product');
Route::get('/customer-packages', 'HomeController@premium_package_index')->name('customer_packages_list_show');

//Rana routes
Route::get('/cat/{catslug}', 'CatController@subCatbyCat')->name('cat');
Route::post('makeEnquiry', 'HomeController@makeEnquiry')->name('makeEnquiry');
Route::get('servicecat/{catslug}/', 'ServiceCatController@ServiceSubCatbyCat')->name('servicecat');
Route::get('/servicecategories', 'HomeController@all_service_category')->name('servicecategories.all');

//commented by Avinash Singh
// Route::get('/search', 'ServiceSearchController@index')->name('search');
// Route::get('/search?keyword={search}', 'ServiceSearchController@index')->name('suggestion.search');
Route::post('/ajax-search', 'ServiceSearchController@ajax_search')->name('search.ajax');
Route::get('/servicecategory/{category_slug}', 'ServiceSearchController@listingByCategory')->name('products.servicecategory');
Route::get('/brand/{brand_slug}', 'ServiceSearchController@listingByBrand')->name('products.brand');


Route::get('/search', 'LiveSearchController@index')->name('search');
Route::get('/search?keyword={search}&type={type}', 'LiveSearchController@index')->name('suggestion.search');
Route::get('get_search_filtered_products', 'LiveSearchController@get_search_filtered_products')->name('get_search_filtered_products');
Route::post('/ajax-search', 'SearchController@ajax_search')->name('search.ajax');
Route::get('get_search_filtered_services', 'LiveSearchController@get_search_filtered_services')->name('get_search_filtered_services');

Route::get('/category/{category_slug}', 'SearchController@listingByCategory')->name('products.category');
Route::get('/get_filtered_products', 'SearchController@get_filtered_products')->name('get_filtered_products');
Route::get('/get_filtered_services1', 'ServiceSearchController@getFilteredServices')->name('get_filtered_services1');

Route::get('/brand/{brand_slug}', 'SearchController@listingByBrand')->name('products.brand');

Route::post('getcategorybrands', 'HomeController@getcategorybrands')->name('getcategorybrands');
Route::get('getcatWiseBrands', 'HomeController@getcatWiseBrands')->name('getcatWiseBrands');

Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/bulkorder/{slug}', 'HomeController@bulkOrder')->name('bulkorder');
Route::get('/get_filter_bulk_order_data', 'HomeController@getFilterBulkOrderData')->name('get_filter_bulk_order_data');
Route::get('/get_store_products_in_session', 'HomeController@getStoreProductsInSession')->name('get_store_products_in_session');
Route::post('/product/variant_price', 'HomeController@variant_price')->name('products.variant_price');
Route::get('/shop/{slug}', 'HomeController@shop')->name('shop.visit');
Route::get('/shop/{slug}/{type}', 'HomeController@filter_shop')->name('shop.visit.type');

//All Bulk Order
Route::get('/all_bulkorder', 'BulkWebController@bulkOrderAllIndex')->name('all_bulkorder');
Route::get('/get_second_category_list', 'BulkWebController@setSecondCategoyListHtml')->name('get_second_category_list');
Route::get('/get_third_category_list', 'BulkWebController@setThirdCategoyListHtml')->name('get_third_category_list');
Route::get('/get_filter_all_bulk_order_data', 'BulkWebController@getFilterAllBulkOrderData')->name('get_filter_all_bulk_order_data');
Route::post('add-all-bulk-product-to-cart', 'BulkWebController@addToAllBulkCart')->name('add-all-bulk-product-to-cart');
Route::get('bulk_order_cart', 'BulkCartController@allBulkOrdercart')->name('bulk_order_cart');
Route::get('bulk/checkout', 'BulkCheckoutController@getCheckoutAllCategory')->name('bulk.checkout');

// Route::post('add-to-cart', [CartController::class,'addToCart']);
Route::post('addBoughtTogether', 'CartController@addBoughtTogether')->name('cart.addBoughtTogether');
Route::post('add-to-cart', [CartController::class, 'addToUserCart']);
Route::post('product-buy-now', [CartController::class, 'addToBuyNow']);
Route::get('load-cart-data', [CartController::class, 'cartCountFunction']);
Route::post('dele-cart-item', [CartController::class, 'deleteFromCart']);
// Route::post('update-cart-qty-plus', [CartController::class, 'updateCartPlus']);
// Route::post('update-cart-qty-minus', [CartController::class, 'updateCartMinus']);
Route::get('/cart', 'CartController@index')->name('cart');

Route::post('/cart/show-cart-modal', 'CartController@showCartModal')->name('cart.showCartModal');
Route::post('/cart/addtocart', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/cart/buyNow', 'CartController@buyNow')->name('cart.buyNow');
Route::post('/cart/removeFromCart', 'CartController@removeFromCart')->name('cart.removeFromCart');
Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.updateQuantity');
Route::post('/cart/updateCartPlus', 'CartController@updateCartPlus')->name('cart.updateCartPlus');
Route::post('/cart/updateCartMinus', 'CartController@updateCartMinus')->name('cart.updateCartMinus');
Route::post('/cart/storeDeliveryCharge', 'CartController@storeDeliveryCharge')->name('cart.storeDeliveryCharge');
Route::post('/cart/checkSaveDeliveryCharge', 'CartController@checkSaveDeliveryCharge')->name('cart.checkSaveDeliveryCharge');

//cart page qty
// updateCartQtyPlus
Route::post('/cart/updateCartQtyPlus', 'CartController@updateCartQtyPlus')->name('cart.updateCartQtyPlus');
Route::post('/cart/updateCartQtyMinus', 'CartController@updateCartQtyMinus')->name('cart.updateCartQtyMinus');

Route::post('add-bulk-product-to-cart', 'BulkCartController@addCarts')->name('bulkproduct.addCarts');
Route::post('/bulk_cart/updateQuantity', 'BulkCartController@updateQuantity')->name('bulk_cart.updateQuantity');
Route::get('/bulk-cart', 'BulkCartController@index')->name('bulk-cart');
Route::post('/bulk_cart/remove_from_cart', 'BulkCartController@removeFromCart')->name('bulk_cart.remove_from_cart');

//Checkout Routes
Route::group(['prefix' => 'checkout', 'middleware' => ['user', 'verified', 'unbanned']], function () {
    Route::get('/', 'CheckoutController@get_shipping_info')->name('checkout.shipping_info');
    Route::any('/delivery_info', 'CheckoutController@store_shipping_info')->name('checkout.store_shipping_infostore');
    Route::post('/payment_select', 'CheckoutController@store_delivery_info')->name('checkout.store_delivery_info');
    Route::get('/servicecheckout', 'CheckoutController@get_service_shipping_info')->name('servicecheckout.service_shipping_info');
    //bulk order route
    Route::get('bulkcheckout', 'BulkCheckoutController@get_shipping_info')->name('bulkcheckout.shipping_info');
    Route::post('BulkpayOnDelivery', 'BulkOrderController@BulkpayOnDelivery')->name('BulkpayOnDelivery');
    Route::get('/order-confirmed', 'CheckoutController@order_confirmed')->name('order_confirmed');
    Route::post('/payment', 'CheckoutController@checkout')->name('payment.checkout');
    Route::post('/get_pick_up_points', 'HomeController@get_pick_up_points')->name('shipping_info.get_pick_up_points');
    Route::get('/payment-select', 'CheckoutController@get_payment_info')->name('checkout.payment_info');
    Route::post('/apply_coupon_code', 'CheckoutController@apply_coupon_code')->name('checkout.apply_coupon_code');
    Route::post('/remove_coupon_code', 'CheckoutController@remove_coupon_code')->name('checkout.remove_coupon_code');
    //Club point
    Route::post('/apply-club-point', 'CheckoutController@apply_club_point')->name('checkout.apply_club_point');
    Route::post('/remove-club-point', 'CheckoutController@remove_club_point')->name('checkout.remove_club_point');
    Route::post('pay-on-deliverys', 'CheckoutController@payOnDelivery')->name('checkout.pay-on-deliverys');
});
Route::post('pay-on-delivery', 'OrderController@payOnDelivery')->name('pay-on-delivery');
//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END
// SSLCOMMERZ Start
Route::get('/sslcommerz/pay', 'PublicSslCommerzPaymentController@index');
Route::POST('/sslcommerz/success', 'PublicSslCommerzPaymentController@success');
Route::POST('/sslcommerz/fail', 'PublicSslCommerzPaymentController@fail');
Route::POST('/sslcommerz/cancel', 'PublicSslCommerzPaymentController@cancel');
Route::POST('/sslcommerz/ipn', 'PublicSslCommerzPaymentController@ipn');
//SSLCOMMERZ END
//Stipe Start
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('/stripe/create-checkout-session', 'StripePaymentController@create_checkout_session')->name('stripe.get_token');
Route::any('/stripe/payment/callback', 'StripePaymentController@callback')->name('stripe.callback');
Route::get('/stripe/success', 'StripePaymentController@success')->name('stripe.success');
Route::get('/stripe/cancel', 'StripePaymentController@cancel')->name('stripe.cancel');
//Stripe END

Route::get('/compare', 'CompareController@index')->name('compare');
Route::get('/compare/reset', 'CompareController@reset')->name('compare.reset');
Route::post('/compare/addToCompare', 'CompareController@addToCompare')->name('compare.addToCompare');

Route::resource('subscribers', 'SubscriberController');

Route::get('/brands', 'HomeController@all_brands')->name('brands.all');
Route::get('/categories', 'HomeController@all_categories')->name('categories.all');
Route::get('/sellers', 'HomeController@all_seller')->name('sellers');
Route::get('/coupons', 'HomeController@all_coupons')->name('coupons.all');
Route::get('/inhouse', 'HomeController@inhouse_products')->name('inhouse.all');

Route::get('/vendor_agreement', 'HomeController@sellerpolicy')->name('sellerpolicy');
Route::get('/returnpolicy', 'HomeController@returnpolicy')->name('returnpolicy');
Route::get('/supportpolicy', 'HomeController@supportpolicy')->name('supportpolicy');
Route::get('/terms_of_services', 'HomeController@terms')->name('terms');
Route::get('/privacy_policy', 'HomeController@privacypolicy')->name('privacypolicy');

Route::get('email-verify', 'HomeController@verifyEmail')->name('email-verify');
Route::post('verifyOtpOfEmail', 'HomeController@verifyOtpOfEmail')->name('verifyOtpOfEmail');

Route::group(['middleware' => ['user', 'verified', 'unbanned']], function () {


    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/new-user-verification', 'HomeController@new_verify')->name('user.new.verify');
    Route::post('/new-user-email', 'HomeController@update_email')->name('user.change.email');

    Route::post('/user/update-profile', 'HomeController@userProfileUpdate')->name('user.profile.update');
    Route::get('edit_profile', 'HomeController@editProfile')->name('edit_profile');
    Route::post('updateProfile', 'HomeController@updateProfile')->name('updateProfile');
    Route::get('my_addressbook', 'HomeController@myAddressBook')->name('my_addressbook');
    Route::get('my-bank-details', 'HomeController@bankDetail')->name('my-bank-details');
    Route::post('addAddress', 'HomeController@addAddress')->name('addAddress');
    Route::post('checkLogin', 'HomeController@checkLogin')->name('checkLogin');
    Route::post('getaddressdetails', 'HomeController@getaddressdetails')->name('getaddressdetails');
    Route::post('updateAddressDetails', 'HomeController@updateAddressDetails')->name('updateAddressDetails');
    Route::post('setDefaultAddress', 'HomeController@setDefaultAddress')->name('setDefaultAddress');
    Route::post('removeMyAddress', 'HomeController@removeMyAddress')->name('removeMyAddress');
    Route::get('manage-payments', 'HomeController@managePayments')->name('manage-payments');
    Route::post('addPaymentCards', 'HomeController@addPaymentCards')->name('addPaymentCards');
    Route::get('change-password', 'HomeController@changePassword')->name('change-password');
    Route::post('userPasswordChange', 'HomeController@userPasswordChange')->name('userPasswordChange');

    Route::resource('purchase_history', 'PurchaseHistoryController');
    Route::get('order-details/{id}', 'PurchaseHistoryController@orderDetails')->name('order-details');
    Route::post('/purchase_history/details', 'PurchaseHistoryController@purchase_history_details')->name('purchase_history.details');
    Route::get('/purchase_history/order_cancel/{id}', 'PurchaseHistoryController@order_cancel')->name('purchase_history.order_cancel');
    Route::get('/purchase_history/destroy/{id}', 'PurchaseHistoryController@destroy')->name('purchase_history.destroy');
    Route::get('product_return', 'PurchaseHistoryController@productReturn')->name('product_return');
    Route::get('help_support', 'PurchaseHistoryController@helpSupport')->name('help_support');
    Route::get('favourite_store', 'PurchaseHistoryController@favouriteStore')->name('favourite_store');
    Route::get('feedback', 'PurchaseHistoryController@feedback')->name('feedback');
    Route::get('ebbbucks-balance', 'PurchaseHistoryController@ebbbucksBalance')->name('ebbbucks-balance');
    Route::get('ebbbucks-cluesbucks', 'PurchaseHistoryController@cluesBucks')->name('chat');
    Route::get('chat', 'PurchaseHistoryController@chat')->name('ebbbucks-cluesbucks');
    Route::resource('wishlists', 'WishlistController');
    Route::post('/wishlists/remove', 'WishlistController@remove')->name('wishlists.remove');
    Route::post('/cancel_product_order', 'PurchaseHistoryController@cancel_product_order')->name('cancel_product_order');

    // Service Purchage History by @AviSingh
    Route::resource('service/purchase_history', 'ServicePurchaseHistoryController');
    Route::get('service/order-details/{id}', 'ServicePurchaseHistoryController@orderDetails')->name('service.order-details');
    Route::post('service/purchase_history/details', 'ServicePurchaseHistoryController@purchase_history_details')->name('service.purchase_history.details');
    Route::get('service/purchase_history/destroy/{id}', 'ServicePurchaseHistoryController@destroy')->name('service.purchase_history.destroy');
    Route::get('service/product_return', 'ServicePurchaseHistoryController@productReturn')->name('service.product_return');
    Route::get('service/help_support', 'ServicePurchaseHistoryController@helpSupport')->name('service.help_support');
    Route::get('service/favourite_store', 'ServicePurchaseHistoryController@favouriteStore')->name('service.favourite_store');
    Route::get('service/feedback', 'ServicePurchaseHistoryController@feedback')->name('service.feedback');
    Route::get('service/enquiry', 'ServicePurchaseHistoryController@enquiry')->name('service.enquiry');


    //bulk order purchase history routes
    Route::resource('bulk_purchase_history', 'BulkPurchaseHistoryController');
    Route::get('bulk-order-details/{id}', 'BulkPurchaseHistoryController@orderDetails')->name('bulk-order-details');
    Route::post('/purchase_history/details', 'BulkPurchaseHistoryController@purchase_history_details')->name('purchase_history.details');
    Route::get('/purchase_history/destroy/{id}', 'BulkPurchaseHistoryController@destroy')->name('purchase_history.destroy');

    Route::get('/wallet', 'WalletController@index')->name('wallet.index');
    Route::post('/recharge', 'WalletController@recharge')->name('wallet.recharge');

    Route::resource('support_ticket', 'SupportTicketController');
    Route::post('support_ticket/reply', 'SupportTicketController@seller_store')->name('support_ticket.seller_store');

    Route::post('/customer_packages/purchase', 'CustomerPackageController@purchase_package')->name('customer_packages.purchase');
    Route::resource('customer_products', 'CustomerProductController');
    Route::get('/customer_products/{id}/edit', 'CustomerProductController@edit')->name('customer_products.edit');
    Route::post('/customer_products/published', 'CustomerProductController@updatePublished')->name('customer_products.published');
    Route::post('/customer_products/status', 'CustomerProductController@updateStatus')->name('customer_products.update.status');

    Route::get('digital_purchase_history', 'PurchaseHistoryController@digital_index')->name('digital_purchase_history.index');

    Route::get('/all-notifications', 'NotificationController@index')->name('all-notifications');
});

Route::get('/customer_products/destroy/{id}', 'CustomerProductController@destroy')->name('customer_products.destroy');

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'verified', 'user']], function () {
    Route::get('/products', 'HomeController@seller_product_list')->name('seller.products');
    Route::get('/product/upload', 'HomeController@show_product_upload_form')->name('seller.products.upload');
    Route::get('/product/{id}/edit', 'HomeController@show_product_edit_form')->name('seller.products.edit');
    Route::resource('payments', 'PaymentController');

    Route::get('/shop/apply_for_verification', 'ShopController@verify_form')->name('shop.verify');
    Route::post('/shop/apply_for_verification', 'ShopController@verify_form_store')->name('shop.verify.store');

    Route::get('/reviews', 'ReviewController@seller_reviews')->name('reviews.seller');

    //digital Product
    Route::get('/digitalproducts', 'HomeController@seller_digital_product_list')->name('seller.digitalproducts');
    Route::get('/digitalproducts/upload', 'HomeController@show_digital_product_upload_form')->name('seller.digitalproducts.upload');
    Route::get('/digitalproducts/{id}/edit', 'HomeController@show_digital_product_edit_form')->name('seller.digitalproducts.edit');

    //Coupon
    Route::get('/coupons', 'CouponController@sellerIndex')->name('seller.coupon.index');
    Route::get('/coupons/create', 'CouponController@sellerCreate')->name('seller.coupon.create');
    Route::post('/coupons/store', 'CouponController@sellerStore')->name('seller.coupon.store');
    Route::get('/coupon/edit/{id}', 'CouponController@sellerEdit')->name('seller.coupon.edit');
    Route::get('/coupon/destroy/{id}', 'CouponController@sellerDestroy')->name('seller.coupon.destroy');
    Route::patch('/coupons/update/{id}', 'CouponController@sellerUpdate')->name('seller.coupon.update');

    //Upload
    Route::any('/uploads/', 'AizUploadController@index')->name('my_uploads.all');
    Route::any('/uploads/new', 'AizUploadController@create')->name('my_uploads.new');
    Route::any('/uploads/file-info', 'AizUploadController@file_info')->name('my_uploads.info');
    Route::get('/uploads/destroy/{id}', 'AizUploadController@destroy')->name('my_uploads.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/products/store/', 'ProductController@store')->name('products.store');
    Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
    Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
    Route::get('/products/duplicate/{id}', 'ProductController@duplicate')->name('products.duplicate');
    Route::post('/products/sku_combination', 'ProductController@sku_combination')->name('products.sku_combination');
    Route::post('/products/sku_combination_edit', 'ProductController@sku_combination_edit')->name('products.sku_combination_edit');
    Route::post('/products/seller/featured', 'ProductController@updateSellerFeatured')->name('products.seller.featured');
    Route::post('/products/published', 'ProductController@updatePublished')->name('products.published');

    Route::post('/products/add-more-choice-option', 'ProductController@add_more_choice_option')->name('products.add-more-choice-option');
    Route::get('invoice/{order_id}', 'InvoiceController@invoice_download')->name('invoice.download');
    Route::get('service_invoice/{order_id}', 'InvoiceController@download_service_invoice')->name('service_invoice.download');

    // product master
    Route::post('/product-master/store/', 'ProductMasterController@store')->name('productmasters.store');
    Route::get('/product-master/destroy/{id}', 'ProductMasterController@destroy')->name('productmasters.destroy');
    Route::post('/product-master/update/{id}', 'ProductMasterController@update')->name('productmasters.update');

    //services routes
    Route::post('/services/store/', 'ServiceController@store')->name('services.store');
    Route::post('/services/update/{id}', 'ServiceController@update')->name('services.update');
    Route::get('/services/destroy/{id}', 'ServiceController@destroy')->name('services.destroy');
    Route::post('/services/published', 'ServiceController@updatePublished')->name('services.published');

    Route::resource('orders', 'OrderController');
    Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
    Route::post('/orders/details', 'OrderController@order_details')->name('orders.details');
    Route::post('/orders/update_delivery_status', 'OrderController@update_delivery_status')->name('orders.update_delivery_status');
    Route::post('/orders/update_payment_status', 'OrderController@update_payment_status')->name('orders.update_payment_status');
    Route::post('/orders/update_tracking_code', 'OrderController@update_tracking_code')->name('orders.update_tracking_code');
    Route::post('/orders/update_item_status', 'OrderController@update_item_status')->name('orders.update_item_status');
    Route::post('/orders/getItemDetails', 'OrderController@getItemDetails')->name('orders.getItemDetails');
    Route::post('/orders/sendReturnRequest', 'OrderController@sendReturnRequest')->name('orders.sendReturnRequest');

    //Cancelled service order
    Route::get('/service_orders/destroy/{id}', 'ServiceOrderController@destroy')->name('service_orders.destroy');
    Route::post('/service_order/quotation', 'ServiceOrderController@ServiceOrderQuotation')->name('service_orders.quotation');
    Route::post('/service_modal_details', 'ServiceOrderController@servicemodalDetails')->name('service_modal_details');
    Route::post('/service_ask_price_modal', 'ServiceOrderController@serviceAskPriceModal')->name('service_ask_price_modal');

    //Delivery Boy Assign
    Route::post('/orders/delivery-boy-assign', 'OrderController@assign_delivery_boy')->name('orders.delivery-boy-assign');

    Route::resource('/reviews', 'ReviewController');

    Route::resource('/withdraw_requests', 'SellerWithdrawRequestController');
    Route::get('/withdraw_requests_all', 'SellerWithdrawRequestController@request_index')->name('withdraw_requests_all');
    Route::post('/withdraw_request/payment_modal', 'SellerWithdrawRequestController@payment_modal')->name('withdraw_request.payment_modal');
    Route::post('/withdraw_request/message_modal', 'SellerWithdrawRequestController@message_modal')->name('withdraw_request.message_modal');

    Route::resource('conversations', 'ConversationController');
    Route::get('/conversations/destroy/{id}', 'ConversationController@destroy')->name('conversations.destroy');
    Route::post('conversations/refresh', 'ConversationController@refresh')->name('conversations.refresh');
    Route::resource('messages', 'MessageController');

    //Product Bulk Upload
    Route::get('/product-bulk-upload/index', 'ProductBulkUploadController@index')->name('product_bulk_upload.index');
    Route::post('/bulk-product-upload', 'ProductBulkUploadController@bulk_upload')->name('bulk_product_upload');
    Route::get('/product-csv-download/{type}', 'ProductBulkUploadController@import_product')->name('product_csv.download');
    Route::get('/vendor-product-csv-download/{id}', 'ProductBulkUploadController@import_vendor_product')->name('import_vendor_product.download');
    Route::group(['prefix' => 'bulk-upload/download'], function () {
        Route::get('/category', 'ProductBulkUploadController@pdf_download_category')->name('pdf.download_category');
        Route::get('/brand', 'ProductBulkUploadController@pdf_download_brand')->name('pdf.download_brand');
        Route::get('/seller', 'ProductBulkUploadController@pdf_download_seller')->name('pdf.download_seller');
    });

    //Product Export
    Route::get('/product-bulk-export', 'ProductBulkUploadController@export')->name('product_bulk_export.index');

    Route::resource('digitalproducts', 'DigitalProductController');
    Route::get('/digitalproducts/edit/{id}', 'DigitalProductController@edit')->name('digitalproducts.edit');
    Route::get('/digitalproducts/destroy/{id}', 'DigitalProductController@destroy')->name('digitalproducts.destroy');
    Route::get('/digitalproducts/download/{id}', 'DigitalProductController@download')->name('digitalproducts.download');
    //Reports
    Route::get('/commission-log', 'ReportController@commission_history')->name('commission-log.index');
    //Coupon Form
    Route::post('/coupon/get_form', 'CouponController@get_coupon_form')->name('coupon.get_coupon_form');
    Route::post('/coupon/get_form_edit', 'CouponController@get_coupon_form_edit')->name('coupon.get_coupon_form_edit');
});

Route::resource('seller', 'ShopController');
Route::get('/track-your-order', 'HomeController@trackOrder')->name('orders.track');
Route::get('/more-seller', 'HomeController@moreSeller')->name('moreSeller');

Route::get('/instamojo/payment/pay-success', 'InstamojoController@success')->name('instamojo.success');

Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');

Route::get('/paystack/payment/callback', 'PaystackController@handleGatewayCallback');

Route::get('/vogue-pay', 'VoguePayController@showForm');
Route::get('/vogue-pay/success/{id}', 'VoguePayController@paymentSuccess');
Route::get('/vogue-pay/failure/{id}', 'VoguePayController@paymentFailure');

//Iyzico
Route::any('/iyzico/payment/callback/{payment_type}/{amount?}/{payment_method?}/{combined_order_id?}/{customer_package_id?}/{seller_package_id?}', 'IyzicoController@callback')->name('iyzico.callback');

Route::post('/get-city', 'CityController@get_city')->name('get-city');

//Address
Route::post('/get-states', 'AddressController@getStates')->name('get-state');
Route::post('/get-cities', 'AddressController@getCities')->name('get-city');
Route::resource('addresses', 'AddressController');
Route::post('/addresses/update/{id}', 'AddressController@update')->name('addresses.update');
Route::get('/addresses/destroy/{id}', 'AddressController@destroy')->name('addresses.destroy');
Route::get('/addresses/set_default/{id}', 'AddressController@set_default')->name('addresses.set_default');

//payhere below
Route::get('/payhere/checkout/testing', 'PayhereController@checkout_testing')->name('payhere.checkout.testing');
Route::get('/payhere/wallet/testing', 'PayhereController@wallet_testing')->name('payhere.checkout.testing');
Route::get('/payhere/customer_package/testing', 'PayhereController@customer_package_testing')->name('payhere.customer_package.testing');

Route::any('/payhere/checkout/notify', 'PayhereController@checkout_notify')->name('payhere.checkout.notify');
Route::any('/payhere/checkout/return', 'PayhereController@checkout_return')->name('payhere.checkout.return');
Route::any('/payhere/checkout/cancel', 'PayhereController@chekout_cancel')->name('payhere.checkout.cancel');

Route::any('/payhere/wallet/notify', 'PayhereController@wallet_notify')->name('payhere.wallet.notify');
Route::any('/payhere/wallet/return', 'PayhereController@wallet_return')->name('payhere.wallet.return');
Route::any('/payhere/wallet/cancel', 'PayhereController@wallet_cancel')->name('payhere.wallet.cancel');

Route::any('/payhere/seller_package_payment/notify', 'PayhereController@seller_package_notify')->name('payhere.seller_package_payment.notify');
Route::any('/payhere/seller_package_payment/return', 'PayhereController@seller_package_payment_return')->name('payhere.seller_package_payment.return');
Route::any('/payhere/seller_package_payment/cancel', 'PayhereController@seller_package_payment_cancel')->name('payhere.seller_package_payment.cancel');

Route::any('/payhere/customer_package_payment/notify', 'PayhereController@customer_package_notify')->name('payhere.customer_package_payment.notify');
Route::any('/payhere/customer_package_payment/return', 'PayhereController@customer_package_return')->name('payhere.customer_package_payment.return');
Route::any('/payhere/customer_package_payment/cancel', 'PayhereController@customer_package_cancel')->name('payhere.customer_package_payment.cancel');

//N-genius
Route::any('ngenius/cart_payment_callback', 'NgeniusController@cart_payment_callback')->name('ngenius.cart_payment_callback');
Route::any('ngenius/wallet_payment_callback', 'NgeniusController@wallet_payment_callback')->name('ngenius.wallet_payment_callback');
Route::any('ngenius/customer_package_payment_callback', 'NgeniusController@customer_package_payment_callback')->name('ngenius.customer_package_payment_callback');
Route::any('ngenius/seller_package_payment_callback', 'NgeniusController@seller_package_payment_callback')->name('ngenius.seller_package_payment_callback');

//bKash
Route::post('/bkash/createpayment', 'BkashController@checkout')->name('bkash.checkout');
Route::post('/bkash/executepayment', 'BkashController@excecute')->name('bkash.excecute');
Route::get('/bkash/success', 'BkashController@success')->name('bkash.success');

//Nagad
Route::get('/nagad/callback', 'NagadController@verify')->name('nagad.callback');

//aamarpay
Route::post('/aamarpay/success', 'AamarpayController@success')->name('aamarpay.success');
Route::post('/aamarpay/fail', 'AamarpayController@fail')->name('aamarpay.fail');

//Authorize-Net-Payment
Route::post('/dopay/online', 'AuthorizeNetController@handleonlinepay')->name('dopay.online');
//payku
Route::get('/payku/callback/{id}', 'PaykuController@callback')->name('payku.result');
//Blog Section
Route::get('/blog', 'FrontBlogController@allBlogs')->name('blog');
Route::get('/blog/{slug}', 'FrontBlogController@blogDetails')->name('blog.details');

//News and media section
Route::get('/news-media', 'FrontBlogController@newsMedia')->name('newsMedia');
Route::get('/news/{slug}', 'FrontBlogController@newsMediaDetails')->name('news.details');

//mobile app balnk page for webview
Route::get('/mobile-page/{slug}', 'PageController@mobile_custom_page')->name('mobile.custom-pages');

//Custom page
Route::get('/{slug}', 'PageController@show_custom_page')->name('custom-pages.show_custom_page');

// More seller Products and services
Route::get('/more-seller/{id}', 'HomeController@relatedProduct')->name('related-product');
Route::get('/more-seller/service/{id}', 'ServiceWebController@moreSellerService')->name('more-seller-service');

Route::get('/service/details', 'ServiceWebController@staticDetails')->name('service-detail');
Route::get('/service/category', 'ServiceWebController@categoryStaticDetails')->name('cat_details');

Route::get('/service/{slug}', 'ServiceWebController@service')->name('service');
Route::get('/service_list/{category_slug}', 'ServiceSearchController@listingByCategory')->name('services.servicecategory');

Route::post('/service/addToServiceCart', 'ServiceCartController@addToServiceCart')->name('service.addToServiceCart');
Route::post('/service/service_variant_price', 'ServiceWebController@service_variant_price')->name('service.service_variant_price');
Route::get('/services/servicecart', 'ServiceCartController@service_cart_list')->name('servicecart');
Route::post('service-pay-on-delivery', 'ServiceOrderController@ServicePayOnDelivery')->name('service-pay-on-delivery');
Route::post('addServiceBoughtTogether', 'ServiceCartController@addServiceBoughtTogether')->name('servicecart.addServiceBoughtTogether');
Route::post('/service_cart/removeFromCart', 'ServiceCartController@ServiceremoveFromCart')->name('service_cart.ServiceremoveFromCart');
Route::post('insertServiceEnquiry', 'ServiceWebController@insertServiceEnquiry')->name('service_enquiry.insertServiceEnquiry');
Route::post('service/cart_modal', [ServiceCartController::class, 'serviceCartModal'])->name('service.cart_modal');
Route::post('service-add-to-cart', [ServiceCartController::class, 'addToServiceUserCart']);


// User / Vendor  Login & Registration

Route::post('/send-mobile-otp', [AuthRegisterController::class, 'sendOtp'])->name('send.phone.otp');
Route::post('/verify-otp', [AuthRegisterController::class, 'verifyOtp'])->name('verify.phone.otp');

Route::post('/send-login-otp', [AuthLoginController::class, 'sendLoginOtp'])->name('send.login.otp');
Route::post('/verify-login-otp', [AuthLoginController::class, 'verifyLoginOtp'])->name('verify.login.otp');

Route::post('/send-vendor-mobile-otp', [AuthRegisterController::class, 'sendVendorOtp'])->name('send.vendor.phone.otp');
Route::post('/verify-vendor-otp', [AuthRegisterController::class, 'verifyVendorOtp'])->name('verify.vendor.phone.otp');
