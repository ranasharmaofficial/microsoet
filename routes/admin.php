<?php

/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register admin routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
use App\Http\Controllers\ServiceController;

Route::post('/update', 'UpdateController@step0')->name('update');
Route::get('/update/step1', 'UpdateController@step1')->name('update.step1');
Route::get('/update/step2', 'UpdateController@step2')->name('update.step2');

Route::get('/admin', 'AdminController@admin_dashboard')->name('admin.dashboard')->middleware(['auth', 'admin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    //Update Routes
    Route::resource('categories', 'CategoryController');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
    Route::post('/categories/featured', 'CategoryController@updateFeatured')->name('categories.featured');
    Route::post('getCategoryName','CategoryController@getCategoryName')->name('getCategoryName');
    Route::resource('brands', 'BrandController');
    Route::get('/brands/edit/{id}', 'BrandController@edit')->name('brands.edit');
    Route::get('/brands/destroy/{id}', 'BrandController@destroy')->name('brands.destroy');

    Route::get('add-category','CategoryController@addCategory')->name('categories.addcategory');
    Route::get('category-list','CategoryController@categoryList')->name('categories.categorylist');
    Route::post('getSubCategoriesName','CategoryController@getSubCategoriesName')->name('getSubCategoriesName');
    Route::post('getFirstCatOrderLevel','CategoryController@getFirstCatOrderLevel')->name('getFirstCatOrderLevel');
    Route::post('getSecondOrderLevel','CategoryController@getSecondOrderLevel')->name('getSecondOrderLevel');

    /** Service Type Routes */
    Route::resource('types', 'TypeController');
    Route::get('/types/edit/{id}', 'TypeController@edit')->name('types.edit');
    Route::get('/types/destroy/{id}', 'TypeController@destroy')->name('types.destroy');
    Route::get('/get_category_wise_type', 'TypeController@getCategoryWiseType')->name('get_category_wise_type');

    Route::get('/products/admin', 'ProductController@admin_products')->name('products.admin');
    Route::get('/products/seller', 'ProductController@seller_products')->name('products.seller');
    Route::get('/products/all', 'ProductController@all_products')->name('products.all');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::get('/products/admin/{id}/edit', 'ProductController@admin_product_edit')->name('products.admin.edit');
    Route::get('/products/seller/{id}/edit', 'ProductController@seller_product_edit')->name('products.seller.edit');
    Route::post('/products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('/products/featured', 'ProductController@updateFeatured')->name('products.featured');
    Route::post('/products/approved', 'ProductController@updateProductApproval')->name('products.approved');
    Route::post('/products/get_products_by_subcategory', 'ProductController@get_products_by_subcategory')->name('products.get_products_by_subcategory');
    Route::post('/bulk-product-delete', 'ProductController@bulk_product_delete')->name('bulk-product-delete');

    Route::post('/products/related_products', 'ProductController@relatedProductss')->name('products.related_products');
    Route::post('/products/bought_togethers', 'ProductController@boughtTogethers')->name('products.bought_togethers');
    Route::post('/products/related_products_edit', 'ProductController@related_products_edit')->name('products.related_products_edit');
    Route::post('/products/bought_together_edit', 'ProductController@bought_together_edit')->name('products.bought_together_edit');

    Route::resource('sellers', 'SellerController');

    // Route::get('/approved_seller_export/{status}', 'SellerController@get_approved_seller_data')->name('approved_seller.export');
    Route::get('/approved_seller_export', 'SellerController@get_approved_seller_data')->name('approved_seller.export');
    Route::get('/unapproved_seller_export', 'SellerController@get_unapproved_seller_data')->name('unapproved_seller.export');


    Route::post('/sellers/updateProfileData', 'SellerController@updateProfileData')->name('sellers.updateProfileData');
    Route::get('/category-update-request', 'SellerController@categoryRequest')->name('categoryUpdateRequest');
    Route::post('/sellers/updateCategoryRequest', 'SellerController@updateCategoryRequest')->name('sellers.updateCategoryRequest');
    Route::get('sellers_ban/{id}', 'SellerController@ban')->name('sellers.ban');
    Route::get('/sellers/destroy/{id}', 'SellerController@destroy')->name('sellers.destroy');
    Route::post('/bulk-seller-delete', 'SellerController@bulk_seller_delete')->name('bulk-seller-delete');
    Route::get('/sellers/view/{id}/verification', 'SellerController@show_verification_request')->name('sellers.show_verification_request');
    Route::get('/sellers/approve/{id}', 'SellerController@approve_seller')->name('sellers.approve');
    Route::get('/sellers/reject/{id}', 'SellerController@reject_seller')->name('sellers.reject');
    Route::get('/sellers/login/{id}', 'SellerController@login')->name('sellers.login');
    Route::post('/sellers/payment_modal', 'SellerController@payment_modal')->name('sellers.payment_modal');
    Route::get('/seller/payments', 'PaymentController@payment_histories')->name('sellers.payment_histories');
    Route::get('/seller/payments/show/{id}', 'PaymentController@show')->name('sellers.payment_history');

    Route::resource('customers', 'CustomerController');
    Route::get('customers_ban/{customer}', 'CustomerController@ban')->name('customers.ban');
    Route::get('/customers/login/{id}', 'CustomerController@login')->name('customers.login');
    Route::get('/customers/address/{id}', 'CustomerController@getCustomerAddress')->name('customers.address');
    Route::get('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');
    Route::post('/bulk-customer-delete', 'CustomerController@bulk_customer_delete')->name('bulk-customer-delete');
    Route::get('/user_export', 'CustomerController@get_user_data')->name('user.export');


    Route::get('franchise/list', 'CustomerController@franchise_list')->name('franchise.list');
    Route::get('franchise/add-franchise', 'CustomerController@franchise_add')->name('franchise.add');
    Route::post('franchise/saveFranchise', 'CustomerController@saveFranchise')->name('franchise.save');
    Route::post('franchise/franchise_pincodeStore', 'CustomerController@franchise_pincodeStore')->name('franchise_pincode.store');
    Route::get('/franchise/pin-code/{id}', 'CustomerController@franchisePinCode')->name('franchise_pin_code.view');


    Route::get('/newsletter', 'NewsletterController@index')->name('newsletters.index');
    Route::post('/newsletter/send', 'NewsletterController@send')->name('newsletters.send');
    Route::post('/newsletter/test/smtp', 'NewsletterController@testEmail')->name('test.smtp');

    Route::resource('profile', 'ProfileController');

    Route::post('/business-settings/update', 'BusinessSettingsController@update')->name('business_settings.update');
    Route::post('/business-settings/update/activation', 'BusinessSettingsController@updateActivationSettings')->name('business_settings.update.activation');
    Route::get('/general-setting', 'BusinessSettingsController@general_setting')->name('general_setting.index');
    Route::get('/activation', 'BusinessSettingsController@activation')->name('activation.index');
    Route::get('/payment-method', 'BusinessSettingsController@payment_method')->name('payment_method.index');
    Route::get('/file_system', 'BusinessSettingsController@file_system')->name('file_system.index');
    Route::get('/social-login', 'BusinessSettingsController@social_login')->name('social_login.index');
    Route::get('/smtp-settings', 'BusinessSettingsController@smtp_settings')->name('smtp_settings.index');
    Route::get('/google-analytics', 'BusinessSettingsController@google_analytics')->name('google_analytics.index');
    Route::get('/google-recaptcha', 'BusinessSettingsController@google_recaptcha')->name('google_recaptcha.index');
    Route::get('/google-map', 'BusinessSettingsController@google_map')->name('google-map.index');
    Route::get('/google-firebase', 'BusinessSettingsController@google_firebase')->name('google-firebase.index');

    //Facebook Settings
    Route::get('/facebook-chat', 'BusinessSettingsController@facebook_chat')->name('facebook_chat.index');
    Route::post('/facebook_chat', 'BusinessSettingsController@facebook_chat_update')->name('facebook_chat.update');
    Route::get('/facebook-comment', 'BusinessSettingsController@facebook_comment')->name('facebook-comment');
    Route::post('/facebook-comment', 'BusinessSettingsController@facebook_comment_update')->name('facebook-comment.update');
    Route::post('/facebook_pixel', 'BusinessSettingsController@facebook_pixel_update')->name('facebook_pixel.update');

    Route::post('/env_key_update', 'BusinessSettingsController@env_key_update')->name('env_key_update.update');
    Route::post('/payment_method_update', 'BusinessSettingsController@payment_method_update')->name('payment_method.update');
    Route::post('/google_analytics', 'BusinessSettingsController@google_analytics_update')->name('google_analytics.update');
    Route::post('/google_recaptcha', 'BusinessSettingsController@google_recaptcha_update')->name('google_recaptcha.update');
    Route::post('/google-map', 'BusinessSettingsController@google_map_update')->name('google-map.update');
    Route::post('/google-firebase', 'BusinessSettingsController@google_firebase_update')->name('google-firebase.update');
    //Currency
    Route::get('/currency', 'CurrencyController@currency')->name('currency.index');
    Route::post('/currency/update', 'CurrencyController@updateCurrency')->name('currency.update');
    Route::post('/your-currency/update', 'CurrencyController@updateYourCurrency')->name('your_currency.update');
    Route::get('/currency/create', 'CurrencyController@create')->name('currency.create');
    Route::post('/currency/store', 'CurrencyController@store')->name('currency.store');
    Route::post('/currency/currency_edit', 'CurrencyController@edit')->name('currency.edit');
    Route::post('/currency/update_status', 'CurrencyController@update_status')->name('currency.update_status');

    //Tax
    Route::resource('tax', 'TaxController');
    Route::get('/tax/edit/{id}', 'TaxController@edit')->name('tax.edit');
    Route::get('/tax/destroy/{id}', 'TaxController@destroy')->name('tax.destroy');
    Route::post('tax-status', 'TaxController@change_tax_status')->name('taxes.tax-status');


    Route::get('/verification/form', 'BusinessSettingsController@seller_verification_form')->name('seller_verification_form.index');
    Route::post('/verification/form', 'BusinessSettingsController@seller_verification_form_update')->name('seller_verification_form.update');
    Route::get('/vendor_commission', 'BusinessSettingsController@vendor_commission')->name('business_settings.vendor_commission');
    Route::post('/vendor_commission_update', 'BusinessSettingsController@vendor_commission_update')->name('business_settings.vendor_commission.update');

    Route::resource('/languages', 'LanguageController');
    Route::post('/languages/{id}/update', 'LanguageController@update')->name('languages.update');
    Route::get('/languages/destroy/{id}', 'LanguageController@destroy')->name('languages.destroy');
    Route::post('/languages/update_rtl_status', 'LanguageController@update_rtl_status')->name('languages.update_rtl_status');
    Route::post('/languages/key_value_store', 'LanguageController@key_value_store')->name('languages.key_value_store');

    //App Trasnlation
    Route::post('/languages/app-translations/import', 'LanguageController@importEnglishFile')->name('app-translations.import');
    Route::get('/languages/app-translations/show/{id}', 'LanguageController@showAppTranlsationView')->name('app-translations.show');
    Route::post('/languages/app-translations/key_value_store', 'LanguageController@storeAppTranlsation')->name('app-translations.store');
    Route::get('/languages/app-translations/export/{id}', 'LanguageController@exportARBFile')->name('app-translations.export');

    // website setting
    Route::group(['prefix' => 'website'], function() {
        Route::get('/footer', 'WebsiteController@footer')->name('website.footer');
        Route::get('/header', 'WebsiteController@header')->name('website.header');
        Route::get('/appearance', 'WebsiteController@appearance')->name('website.appearance');
        Route::get('/pages', 'WebsiteController@pages')->name('website.pages');
        Route::get('/add-cat-brands', 'WebsiteController@addCategoryWiseBrands')->name('website.add-cat-brands');
        Route::get('/cat-wise-brand-list', 'WebsiteController@categoryWiseBrandList')->name('website.cat-wise-brand-list');
        Route::post('/uploadCatWiseBrands', 'WebsiteController@uploadCatWiseBrands')->name('website.uploadCatWiseBrands');
        Route::get('/edit-cat-wise-brand/{id}', 'WebsiteController@edit_cat_wise')->name('edit-cat-wise-brand/{id}');
        Route::post('/editcatwisebrand', 'WebsiteController@editcatwisebrand')->name('website.editcatwisebrand');
        Route::get('/catwisebrand/destroy/{id}', 'WebsiteController@destroycatbrand')->name('website.destroycatbrand');
        Route::get('/catwiseoffer/destroy/{id}', 'WebsiteController@destroycatoffer')->name('website.destroycatoffer');
        Route::get('/cat-wise-offer-list', 'WebsiteController@categoryWiseOfferList')->name('website.cat-wise-offer-list');
        Route::get('/add-cat-offers', 'WebsiteController@addCategoryWiseOffers')->name('website.add-cat-offers');
        Route::post('/uploadCatWiseOffer', 'WebsiteController@uploadCatWiseOffer')->name('website.uploadCatWiseOffer');
        Route::get('/edit-cat-wise-offer/{id}', 'WebsiteController@editCatOffer')->name('edit-cat-wise-offer/{id}');
        Route::post('/edit_cat_offer', 'WebsiteController@edit_cat_offer')->name('website.edit_cat_offer');
        Route::resource('custom-pages', 'PageController');
        Route::get('/custom-pages/edit/{id}', 'PageController@edit')->name('custom-pages.edit');
        Route::get('/custom-pages/destroy/{id}', 'PageController@destroy')->name('custom-pages.destroy');
        Route::get('home-category-section','WebsiteController@homeCatSectionList')->name('website.home-category-section');
        Route::get('add-home-category-section','WebsiteController@addHomeCatSectionList')->name('website.add-home-category-section');
        Route::post('uploadHomeCategorySection','WebsiteController@uploadHomeCategorySection')->name('website.uploadHomeCategorySection');
        Route::get('/homecatsec/destroy/{id}','WebsiteController@destroyHomeCatSection')->name('website.destroyhomecatesection');
        Route::get('/edit-home-cat-section/{id}', 'WebsiteController@editHomeCatSection')->name('website.edit-home-cat-section/{id}');
        Route::post('updatehomeCatSection', 'WebsiteController@updatehomeCatSection')->name('website.updatehomeCatSection');
    });

    Route::resource('roles', 'RoleController');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
    Route::get('/roles/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');

    Route::resource('staffs', 'StaffController');
    Route::get('/staffs/destroy/{id}', 'StaffController@destroy')->name('staffs.destroy');

    Route::resource('flash_deals', 'FlashDealController');
    Route::get('/flash_deals/edit/{id}', 'FlashDealController@edit')->name('flash_deals.edit');
    Route::get('/flash_deals/destroy/{id}', 'FlashDealController@destroy')->name('flash_deals.destroy');
    Route::post('/flash_deals/update_status', 'FlashDealController@update_status')->name('flash_deals.update_status');
    Route::post('/flash_deals/update_featured', 'FlashDealController@update_featured')->name('flash_deals.update_featured');
    Route::post('/flash_deals/update_on_home', 'FlashDealController@update_on_home')->name('flash_deals.update_on_home');
    Route::post('/flash_deals/product_discount', 'FlashDealController@product_discount')->name('flash_deals.product_discount');

    Route::post('/flash_deals/product_discount_edit', 'FlashDealController@product_discount_edit')->name('flash_deals.product_discount_edit');

    Route::get('flash_deals_items', 'FlashDealController@flash_deal_item')->name('flash_deals_item.index');
    Route::get('flash_deals_items_create', 'FlashDealController@flash_deals_items_create')->name('flash_deals_item.create');
    Route::post('flash_deals_items_store', 'FlashDealController@flash_deals_items_store')->name('flash_deals_item.store');
    Route::post('flash_deals_items_update', 'FlashDealController@flash_deals_items_update')->name('flash_deals_item.update');
    Route::get('/flash_deals_item/destroy/{id}', 'FlashDealController@flash_deals_item_destroy')->name('flash_deals_item.destroy');
    Route::get('/flash_deals_item/edit/{id}', 'FlashDealController@flash_deals_item_edit')->name('flash_deals_item.edit');

    //Subscribers
    Route::get('/subscribers', 'SubscriberController@index')->name('subscribers.index');
    Route::get('/subscribers/destroy/{id}', 'SubscriberController@destroy')->name('subscriber.destroy');

    // Route::get('/orders', 'OrderController@admin_orders')->name('orders.index.admin');
    // Route::get('/orders/{id}/show', 'OrderController@show')->name('orders.show');
    // Route::get('/sales/{id}/show', 'OrderController@sales_show')->name('sales.show');
    // Route::get('/sales', 'OrderController@sales')->name('sales.index');
    // All Orders
    Route::get('/all_orders', 'OrderController@all_orders')->name('all_orders.index');
    Route::get('/all_orders/{id}/show', 'OrderController@all_orders_show')->name('all_orders.show');

    // Inhouse Orders
    Route::get('/inhouse-orders', 'OrderController@admin_orders')->name('inhouse_orders.index');
    Route::get('/inhouse-orders/{id}/show', 'OrderController@show')->name('inhouse_orders.show');

    // Seller Orders
    Route::get('/seller_orders', 'OrderController@seller_orders')->name('seller_orders.index');
    Route::get('/seller_orders/{id}/show', 'OrderController@seller_orders_show')->name('seller_orders.show');

    Route::post('/bulk-order-status', 'OrderController@bulk_order_status')->name('bulk-order-status');


    // Pickup point orders
    Route::get('orders_by_pickup_point', 'OrderController@pickup_point_order_index')->name('pick_up_point.order_index');
    Route::get('/orders_by_pickup_point/{id}/show', 'OrderController@pickup_point_order_sales_show')->name('pick_up_point.order_show');

    Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
    Route::post('/bulk-order-delete', 'OrderController@bulk_order_delete')->name('bulk-order-delete');

    Route::post('/pay_to_seller', 'CommissionController@pay_to_seller')->name('commissions.pay_to_seller');

    //Reports
    Route::get('/stock_report', 'ReportController@stock_report')->name('stock_report.index');
    Route::get('/in_house_sale_report', 'ReportController@in_house_sale_report')->name('in_house_sale_report.index');
    Route::get('/seller_sale_report', 'ReportController@seller_sale_report')->name('seller_sale_report.index');
    Route::get('/wish_report', 'ReportController@wish_report')->name('wish_report.index');
    Route::get('/user_search_report', 'ReportController@user_search_report')->name('user_search_report.index');
    Route::get('/wallet-history', 'ReportController@wallet_transaction_history')->name('wallet-history.index');

    //Blog Section
    Route::resource('blog-category', 'BlogCategoryController');
    Route::get('blog/create', 'BlogController@create')->name('blog.create');
    Route::post('store', 'BlogController@store')->name('blog.store');
    Route::post('update', 'BlogController@update')->name('blog.update');
    Route::get('blog/{id}/edit', 'BlogController@edit')->name('blog.edit');
    Route::get('blog/all', 'BlogController@index')->name('blog.index');
    Route::get('/blog-category/destroy/{id}', 'BlogCategoryController@destroy')->name('blog-category.destroy');

    Route::get('/blog/destroy/{id}', 'BlogController@destroy')->name('blog.destroy');
    Route::get('/blog/destroy/{id}', 'NewsController@destroynews')->name('blog.destroy');
    Route::post('/blog/change-status', 'BlogController@change_status')->name('blog.change-status');

    Route::get('/blog/news', 'NewsController@news')->name('blog.news');

    //Enquiry Section
    // Route::resource('enquiry','EnquiryController');
    Route::get('/enquiry', 'EnquiryController@index')->name('enquiry');
    Route::get('/enq/destroy/{id}', 'EnquiryController@destroy')->name('enq.destroy');
    Route::get('/enquiry/product-enquiry','EnquiryController@productEnquiry')->name('enq.productEnquiry');
    Route::get('/enquiry/hire-now-request','EnquiryController@hireNowRequest')->name('enq.hireNowRequest');
    Route::get('/enquiry/hireNowdelete/{id}','EnquiryController@hireNowdelete')->name('enq.hireNowdelete');
    Route::get('/enquiry/common-enquiry','EnquiryController@commonEnquiry')->name('enq.commonEnquiry');
    Route::get('/enquiry/commonEnqdelete/{id}','EnquiryController@commonEnqdelete')->name('enq.commonEnqdelete');
    // Route::get('/enquiry/product-enq','EnquiryController@productEnq')->name('enqs.productEnquiry');
    // Route::resource('/enquiry/product-enquiry','productEnquiry');
    //Coupons
    Route::resource('coupon', 'CouponController');
    Route::get('/coupon/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');

    //Reviews
    Route::get('/reviews', 'ReviewController@index')->name('reviews.index');
    Route::post('/reviews/published', 'ReviewController@updatePublished')->name('reviews.published');

    //Support_Ticket
    Route::get('support_ticket/', 'SupportTicketController@admin_index')->name('support_ticket.admin_index');
    Route::get('support_ticket/{id}/show', 'SupportTicketController@admin_show')->name('support_ticket.admin_show');
    Route::post('support_ticket/reply', 'SupportTicketController@admin_store')->name('support_ticket.admin_store');

    //Pickup_Points
    Route::resource('pick_up_points', 'PickupPointController');
    Route::get('/pick_up_points/edit/{id}', 'PickupPointController@edit')->name('pick_up_points.edit');
    Route::get('/pick_up_points/destroy/{id}', 'PickupPointController@destroy')->name('pick_up_points.destroy');

    //conversation of seller customer
    Route::get('conversations', 'ConversationController@admin_index')->name('conversations.admin_index');
    Route::get('conversations/{id}/show', 'ConversationController@admin_show')->name('conversations.admin_show');

    Route::post('/sellers/profile_modal', 'SellerController@profile_modal')->name('sellers.profile_modal');
    Route::post('/sellers/approved', 'SellerController@updateApproved')->name('sellers.approved');

    Route::resource('attributes', 'AttributeController');
    Route::get('/attributes/edit/{id}', 'AttributeController@edit')->name('attributes.edit');
    Route::get('/attributes/destroy/{id}', 'AttributeController@destroy')->name('attributes.destroy');

    //Attribute Value
    Route::post('/store-attribute-value', 'AttributeController@store_attribute_value')->name('store-attribute-value');
    Route::get('/edit-attribute-value/{id}', 'AttributeController@edit_attribute_value')->name('edit-attribute-value');
    Route::post('/update-attribute-value/{id}', 'AttributeController@update_attribute_value')->name('update-attribute-value');
    Route::get('/destroy-attribute-value/{id}', 'AttributeController@destroy_attribute_value')->name('destroy-attribute-value');

    //Colors
    Route::get('/colors', 'AttributeController@colors')->name('colors');
    Route::post('/colors/store', 'AttributeController@store_color')->name('colors.store');
    Route::get('/colors/edit/{id}', 'AttributeController@edit_color')->name('colors.edit');
    Route::post('/colors/update/{id}', 'AttributeController@update_color')->name('colors.update');
    Route::get('/colors/destroy/{id}', 'AttributeController@destroy_color')->name('colors.destroy');

    Route::resource('addons', 'AddonController');
    Route::post('/addons/activation', 'AddonController@activation')->name('addons.activation');

    Route::get('/customer-bulk-upload/index', 'CustomerBulkUploadController@index')->name('customer_bulk_upload.index');
    Route::post('/bulk-user-upload', 'CustomerBulkUploadController@user_bulk_upload')->name('bulk_user_upload');
    Route::post('/bulk-customer-upload', 'CustomerBulkUploadController@customer_bulk_file')->name('bulk_customer_upload');
    Route::get('/user', 'CustomerBulkUploadController@pdf_download_user')->name('pdf.download_user');
    //Customer Package

    Route::resource('customer_packages', 'CustomerPackageController');
    Route::get('/customer_packages/edit/{id}', 'CustomerPackageController@edit')->name('customer_packages.edit');
    Route::get('/customer_packages/destroy/{id}', 'CustomerPackageController@destroy')->name('customer_packages.destroy');

    //Classified Products
    Route::get('/classified_products', 'CustomerProductController@customer_product_index')->name('classified_products');
    Route::post('/classified_products/published', 'CustomerProductController@updatePublished')->name('classified_products.published');

    //Shipping Configuration
    Route::get('/shipping_configuration', 'BusinessSettingsController@shipping_configuration')->name('shipping_configuration.index');
    Route::post('/shipping_configuration/update', 'BusinessSettingsController@shipping_configuration_update')->name('shipping_configuration.update');

    // Route::resource('pages', 'PageController');
    // Route::get('/pages/destroy/{id}', 'PageController@destroy')->name('pages.destroy');

    Route::resource('countries', 'CountryController');
    Route::post('/countries/status', 'CountryController@updateStatus')->name('countries.status');

    Route::resource('states','StateController');
	Route::post('/states/status', 'StateController@updateStatus')->name('states.status');

    Route::resource('cities', 'CityController');
    Route::get('/cities/edit/{id}', 'CityController@edit')->name('cities.edit');
    Route::get('/cities/destroy/{id}', 'CityController@destroy')->name('cities.destroy');
    Route::post('/cities/status', 'CityController@updateStatus')->name('cities.status');

    Route::view('/system/update', 'backend.system.update')->name('system_update');
    Route::view('/system/server-status', 'backend.system.server_status')->name('system_server');

    // uploaded files
    Route::any('/uploaded-files/file-info', 'AizUploadController@file_info')->name('uploaded-files.info');
    Route::resource('/uploaded-files', 'AizUploadController');
    Route::get('/uploaded-files/destroy/{id}', 'AizUploadController@destroy')->name('uploaded-files.destroy');

    Route::get('/all-notification', 'NotificationController@index')->name('admin.all-notification');

    Route::get('/cache-cache', 'AdminController@clearCache')->name('cache.clear');

    // Order Configuration
    Route::get('/order-configuration', 'BusinessSettingsController@order_configuration')->name('order_configuration.index');

    // Admin Bulk Order Request routes
    Route::get('/bulkorders/request', 'AdminBulkOrderController@allBulkOrderRequest')->name('bulkorders.request');
    Route::get('/bulkorders/destroy/{id}', 'AdminBulkOrderController@destroy')->name('bulkorders.destroy');
    Route::post('/bulkorders/bulk_delete', 'AdminBulkOrderController@bulkDelete')->name('bulkorders.bulk_delete');
    Route::get('/bulkorders/{id}/show', 'AdminBulkOrderController@all_orders_show')->name('bulkorders.show');

    // product master
    // Route::resource('product-master', 'ProductMasterController');
    Route::get('/product-master/all', 'ProductMasterController@all_products')->name('productmasters.all');
    Route::get('/product-master/create', 'ProductMasterController@create')->name('productmasters.create');
    Route::get('/product-master/{id}/edit', 'ProductMasterController@admin_product_edit')->name('productmasters.edit');

    // Common route for category wise filter on Product master and product
    Route::get('/product-master/get-first-level', 'ProductMasterController@categorylevel')->name('product-master.get-first-level');
    Route::get('/product-master/get-second-level', 'ProductMasterController@categorylevel2')->name('product-master.get-second-level');
    Route::get('/product-master/get-third-level', 'ProductMasterController@categorylevel3')->name('product-master.get-third-level');
    Route::get('/product-master/get-brand-list', 'ProductMasterController@brandlistcategorywise')->name('product-master.get-brand-list');


    //services blades routes by @Rana
    Route::get('/services/all','ServiceController@all_services')->name('services.all');
    Route::get('/services/seller', 'ServiceController@seller_services')->name('services.seller');
    Route::post('/services/approved', 'ServiceController@updateServiceApproval')->name('services.approved');
    Route::post('/services/featured', 'ServiceController@updateFeatured')->name('services.featured');
    Route::get('/services/create','ServiceController@create')->name('services.create');
    Route::get('/services/admin/{id}/edit', 'ServiceController@admin_service_edit')->name('services.admin.edit');
    Route::post('/services/related_services', 'ServiceController@relatedProductss')->name('services.related_services');
    Route::post('/services/bought_togethers', 'ServiceController@boughtTogethers')->name('services.bought_togethers');
    Route::post('/services/related_services_edit', 'ServiceController@related_services_edit')->name('services.related_services_edit');
    Route::post('/services/bought_together_edit', 'ServiceController@bought_together_edit')->name('services.bought_together_edit');
    Route::get('/services/reviews', 'ReviewController@serviceReviewIndex')->name('service.reviews');

    // Service Order routes by @AviSingh
    Route::get('/service/all_orders', 'ServiceOrderController@all_orders')->name('service.all_orders.index');
    Route::get('/service/all_orders/{id}/show', 'ServiceOrderController@all_orders_show')->name('service.all_orders.show');
    Route::get('/service/orders/destroy/{id}', 'ServiceOrderController@destroy')->name('service.orders.destroy');
    Route::post('/service-bulk-order-delete', 'ServiceOrderController@bulk_order_delete')->name('service-bulk-order-delete');
    Route::get('/service/service-quotation-request', 'ServiceOrderController@serviceQuotationRequest')->name('service.service-quotation-request');
    Route::get('/service/quote_request/quotedestroy/{id}', 'ServiceOrderController@quotedestroy')->name('service.quote_request.quotedestroy');

    // Master Service routes by @Rana
    Route::get('/master_services/all','MasterServiceController@all_services')->name('master_services.all');
    Route::post('/masterservices/store','MasterServiceController@store')->name('masterservices.store');
    Route::get('/master_services/create','MasterServiceController@create')->name('master_services.create');
    Route::get('/master_services/admin/{id}/edit', 'MasterServiceController@admin_service_edit')->name('master_services.admin.edit');
    Route::get('/master_services/admin/{id}/delete', 'MasterServiceController@destroy')->name('master_services.destroy');
    Route::post('/master_services/related_services', 'MasterServiceController@relatedProductss')->name('master_services.related_services');
    Route::post('/master_services/related_services_edit', 'MasterServiceController@related_services_edit')->name('master_services.related_services_edit');
    Route::post('/master_services/update/{id}', 'MasterServiceController@update')->name('master_services.update');

    // Cooming Soon Enquiry Page
    Route::get('/comming_soon/enquiry', 'EnquiryController@adminCommingSoonIndex')->name('comming_soon.enquiry');

    Route::get('/sms-list', 'SmsQueueList@sms_list')->name('sms_list');
    Route::get('/email-list', 'SmsQueueList@email_list')->name('email_list');

    Route::get('/master_product_export', 'ProductMasterController@get_master_product_data')->name('get_master_product_data.export');
    Route::get('/_product_export', 'ProductController@get_product_data')->name('get_product_data.export');
    Route::get('/_service_export', 'ServiceController@get_service_data')->name('get_service_data.export');

    // Route::get('/master_product_export', [ProductMasterController::class, 'get_master_product_data'])->name('get_master_product_data.export');

    Route::resource('sitemaps', 'SiteMapController');
    Route::get('/sitemaps/destroy/{id}', 'SiteMapController@destroy')->name('sitemaps.destroy');
    Route::post('/sitemaps/update/{id}', 'SiteMapController@update')->name('sitemaps.update');

});
