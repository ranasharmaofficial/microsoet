<?php

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CommissionController;
use App\Models\Currency;
use App\Models\BusinessSetting;
use App\Models\ProductStock;
use App\Models\Address;
use App\Models\CustomerPackage;
use App\Models\Upload;
use App\Models\Translation;
use App\Models\City;
use App\Utility\CategoryUtility;
use App\Models\Wallet;
use App\Models\CombinedOrder;
use App\Models\User;
use App\Models\Addon;
use App\Models\Product;
use App\Models\Shop;
use App\Utility\SendSMSUtility;
use App\Utility\NotificationUtility;
use App\Models\Category;
use App\Models\ShipRocket;
use App\Models\SmsQueue;
use App\SmsTemplate;
// use Intervention\Image\ImageManagerStatic as Image;

//sensSMS function for OTP
if (!function_exists('sendSMS')) {
    function sendSMS($to, $from, $text, $template_id)
    {
        return SendSMSUtility::sendSMS($to, $from, $text, $template_id);
    }
}

//highlights the selected navigation on admin panel
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('areActiveRoutesHome')) {
    function areActiveRoutesHome(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) return $output;
        }
    }
}

//highlights the selected navigation on frontend
if (!function_exists('default_language')) {
    function default_language()
    {
        return env("DEFAULT_LANGUAGE");
    }
}

/**
 * Save JSON File
 * @return Response
 */

if (!function_exists('convert_to_usd')) {
    function convert_to_usd($amount)
    {
        $currency = Currency::find(get_setting('system_default_currency'));
        return (floatval($amount) / floatval($currency->exchange_rate)) * Currency::where('code', 'USD')->first()->exchange_rate;
    }
}

if (!function_exists('convert_to_kes')) {
    function convert_to_kes($amount)
    {
        $currency = Currency::find(get_setting('system_default_currency'));
        return (floatval($amount) / floatval($currency->exchange_rate)) * Currency::where('code', 'KES')->first()->exchange_rate;
    }
}

//filter products based on vendor activation system
if (!function_exists('filter_products')) {
    function filter_products($products)
    {
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            return $products->where('approved', '1')->where('published', '1')->where('auction_product', 0)->orderBy('created_at', 'desc')->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            return $products->where('published', '1')->where('auction_product', 0)->where('added_by', 'admin');
        }
    }
}

//filter services based on vendor activation system created by @AviSingh
if (!function_exists('filter_services')) {
    function filter_services($services)
    {
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            return $services->where('approved', '1')->where('published', '1')->orderBy('created_at', 'desc')->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            return $services->where('published', '1')->where('added_by', 'admin');
        }
    }
}

//cache products based on category
if (!function_exists('get_cached_products')) {
    function get_cached_products($category_id = null)
    {
        $products = \App\Models\Product::where('published', 1)->where('approved', '1')->where('auction_product', 0);
        $verified_sellers = verified_sellers_id();
        if (get_setting('vendor_system_activation') == 1) {
            $products = $products->where(function ($p) use ($verified_sellers) {
                $p->where('added_by', 'admin')->orWhere(function ($q) use ($verified_sellers) {
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        } else {
            $products = $products->where('added_by', 'admin');
        }

        if ($category_id != null) {
            return Cache::remember('products-category-' . $category_id, 86400, function () use ($category_id, $products) {
                $category_ids = CategoryUtility::children_ids($category_id);
                $category_ids[] = $category_id;
                return $products->whereIn('category_id', $category_ids)->latest()->take(12)->get();
            });
        } else {
            return Cache::remember('products', 86400, function () use ($products) {
                return $products->latest()->take(12)->get();
            });
        }
    }
}

if (!function_exists('verified_sellers_id')) {
    function verified_sellers_id()
    {
        return Cache::rememberForever('verified_sellers_id', function () {
            return App\Models\Seller::where('verification_status', 1)->pluck('user_id')->toArray();
        });
    }
}

if (!function_exists('get_system_default_currency')) {
    function get_system_default_currency()
    {
        return Cache::remember('system_default_currency', 86400, function () {
            return Currency::findOrFail(get_setting('system_default_currency'));
        });
    }
}

//converts currency to home default currency
if (!function_exists('convert_price')) {
    function convert_price($price)
    {
        if (Session::has('currency_code') && (Session::get('currency_code') != get_system_default_currency()->code)) {
            $price = floatval($price) / floatval(get_system_default_currency()->exchange_rate);
            $price = floatval($price) * floatval(Session::get('currency_exchange_rate'));
        }
        return $price;
    }
}

//gets currency symbol
if (!function_exists('currency_symbol')) {
    function currency_symbol()
    {
        if (Session::has('currency_symbol')) {
            return Session::get('currency_symbol');
        }
        return get_system_default_currency()->symbol;
    }
}

//formats currency
if (!function_exists('format_price')) {
    function format_price($price)
    {
        if (get_setting('decimal_separator') == 1) {
            $fomated_price = number_format($price, get_setting('no_of_decimals'));
        } else {
            $fomated_price = number_format($price, get_setting('no_of_decimals'), ',', ' ');
        }

        if (get_setting('symbol_format') == 1) {
            return currency_symbol() . $fomated_price;
        } else if (get_setting('symbol_format') == 3) {
            return currency_symbol() . ' ' . $fomated_price;
        } else if (get_setting('symbol_format') == 4) {
            return $fomated_price . ' ' . currency_symbol();
        }
        return $fomated_price . currency_symbol();
    }
}

//formats price to home default price with convertion
if (!function_exists('single_price')) {
    function single_price($price)
    {
        return format_price(convert_price($price));
    }
}

if (! function_exists('discount_in_percentage')) {
    function discount_in_percentage($product)
    {
        try {
            $base = home_base_price($product, false);
            $reduced = home_discounted_base_price($product, false);
            $discount = $base - $reduced;
            $dp = ($discount * 100) / $base;
            return round($dp);
        } catch (Exception $e) {

        }
        return 0;
    }
}

//Shows Price on page based on low to high
if (!function_exists('home_price')) {
    function home_price($product, $formatted = true)
    {
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if ($lowest_price > $stock->price) {
                    $lowest_price = $stock->price;
                }
                if ($highest_price < $stock->price) {
                    $highest_price = $stock->price;
                }
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $lowest_price += ($lowest_price * $product_tax->tax) / 100;
                $highest_price += ($highest_price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $lowest_price += $product_tax->tax;
                $highest_price += $product_tax->tax;
            }
        }

        if ($formatted) {
            if ($lowest_price == $highest_price) {
                return format_price(convert_price($lowest_price));
            } else {
                return format_price(convert_price($lowest_price)) . ' - ' . format_price(convert_price($highest_price));
            }
        } else {
            return $lowest_price . ' - ' . $highest_price;
        }
    }
}

//Shows Price on page based on low to high with discount
if (!function_exists('home_discounted_price')) {
    function home_discounted_price($product, $formatted = true)
    {
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if ($lowest_price > $stock->price) {
                    $lowest_price = $stock->price;
                }
                if ($highest_price < $stock->price) {
                    $highest_price = $stock->price;
                }
            }
        }

        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $lowest_price -= ($lowest_price * $product->discount) / 100;
                $highest_price -= ($highest_price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $lowest_price -= $product->discount;
                $highest_price -= $product->discount;
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $lowest_price += ($lowest_price * $product_tax->tax) / 100;
                $highest_price += ($highest_price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $lowest_price += $product_tax->tax;
                $highest_price += $product_tax->tax;
            }
        }

        if ($formatted) {
            if ($lowest_price == $highest_price) {
                return format_price(convert_price($lowest_price));
            } else {
                return format_price(convert_price($lowest_price)) . ' - ' . format_price(convert_price($highest_price));
            }
        } else {
            return $lowest_price . ' - ' . $highest_price;
        }
    }
}

//Shows Base Price
if (!function_exists('home_base_price_by_stock_id')) {
    function home_base_price_by_stock_id($id)
    {
        $product_stock = ProductStock::findOrFail($id);
        $price = $product_stock->price;
        $tax = 0;

        foreach ($product_stock->product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;
        return format_price(convert_price($price));
    }
}
if (!function_exists('home_base_price')) {
    function home_base_price($product, $formatted = true)
    {
        $price = $product->unit_price;
        $tax = 0;

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;
        return $formatted ? format_price(convert_price($price)) : $price;
    }
}

//Shows Base Price with discount
if (!function_exists('home_discounted_base_price_by_stock_id')) {
    function home_discounted_base_price_by_stock_id($id)
    {
        $product_stock = ProductStock::findOrFail($id);
        $product = $product_stock->product;
        $price = $product_stock->price;
        $tax = 0;

        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;

        return format_price(convert_price($price));
    }
}

//Shows Base Price with discount
if (!function_exists('home_discounted_base_price')) {
    function home_discounted_base_price($product, $formatted = true)
    {
        $price = $product->unit_price;
        $tax = 0;

        $discount_applicable = false;

        if ($product->discount_start_date == null) {
            $discount_applicable = true;
        } elseif (
            strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        ) {
            $discount_applicable = true;
        }

        if ($discount_applicable) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        foreach ($product->taxes as $product_tax) {
            if ($product_tax->tax_type == 'percent') {
                $tax += ($price * $product_tax->tax) / 100;
            } elseif ($product_tax->tax_type == 'amount') {
                $tax += $product_tax->tax;
            }
        }
        $price += $tax;

        return $formatted ? format_price(convert_price($price)) : $price;
    }
}

if (!function_exists('renderStarRating')) {
    function renderStarRating($rating, $maxRating = 5)
    {
        $fullStar = "<i class = 'las la-star active'></i>";
        $halfStar = "<i class = 'las la-star half'></i>";
        $emptyStar = "<i class = 'las la-star'></i>";
        $rating = $rating <= $maxRating ? $rating : $maxRating;

        $fullStarCount = (int)$rating;
        $halfStarCount = ceil($rating) - $fullStarCount;
        $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

        $html = str_repeat($fullStar, $fullStarCount);
        $html .= str_repeat($halfStar, $halfStarCount);
        $html .= str_repeat($emptyStar, $emptyStarCount);
        echo $html;
    }
}

function translate($key, $lang = null)
{
    if($lang == null){
        $lang = App::getLocale();
    }

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));

    $translations_default = Cache::rememberForever('translations-'.env('DEFAULT_LANGUAGE', 'en'), function () {
        return Translation::where('lang', env('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
    });

    if(!isset($translations_default[$lang_key])){
        $translation_def = new Translation;
        $translation_def->lang = env('DEFAULT_LANGUAGE', 'en');
        $translation_def->lang_key = $lang_key;
        $translation_def->lang_value = $key;
        $translation_def->save();
        Cache::forget('translations-'.env('DEFAULT_LANGUAGE', 'en'));
    }

    $translation_locale = Cache::rememberForever('translations-'.$lang, function () use ($lang) {
        return Translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
    });

    //Check for session lang
    if(isset($translation_locale[$lang_key])){
        return $translation_locale[$lang_key];
    }
    elseif(isset($translations_default[$lang_key])){
        return $translations_default[$lang_key];
    }
    else{
        return $key;
    }
}

function remove_invalid_charcaters($str)
{
    $str = str_ireplace(array("\\"), '', $str);
    return str_ireplace(array('"'), '\"', $str);
}

function getShippingCost($carts, $index)
{
    $admin_products = array();
    $seller_products = array();

    $cartItem = $carts[$index];
    $product = Product::find($cartItem['product_id']);

    if ($product->digital == 1) {
        return 0;
    }

    foreach ($carts as $key => $cartItem) {
        $product = Product::find($cartItem['product_id']);
        if ($product->added_by == 'admin') {
            array_push($admin_products, $cartItem['product_id']);
        } else {
            $product_ids = array();
            if (isset($seller_products[$product->user_id])) {
                $product_ids = $seller_products[$product->user_id];
            }
            array_push($product_ids, $cartItem['product_id']);
            $seller_products[$product->user_id] = $product_ids;
        }
    }

    if (get_setting('shipping_type') == 'flat_rate') {
        return get_setting('flat_rate_shipping_cost') / count($carts);
    }
    elseif (get_setting('shipping_type') == 'seller_wise_shipping') {
        if ($product->added_by == 'admin') {
            return get_setting('shipping_cost_admin') / count($admin_products);
        } else {
            return Shop::where('user_id', $product->user_id)->first()->shipping_cost / count($seller_products[$product->user_id]);
        }
    }
    elseif (get_setting('shipping_type') == 'area_wise_shipping') {
        $shipping_info = Address::where('id', $carts[0]['address_id'])->first();
        $city = City::where('id', $shipping_info->city_id)->first();
        if ($city != null) {
            if ($product->added_by == 'admin') {
                return $city->cost / count($admin_products);
            } else {
                return $city->cost / count($seller_products[$product->user_id]);
            }
        }
        return 0;
    }
    else {
        if($product->is_quantity_multiplied && get_setting('shipping_type') == 'product_wise_shipping') {
            return  $product->shipping_cost * $cartItem['quantity'];
        }
        return $product->shipping_cost;
    }
}

function timezones()
{
    return Timezones::timezonesToArray();
}

if (!function_exists('app_timezone')) {
    function app_timezone()
    {
        return config('app.timezone');
    }
}

if (!function_exists('api_asset')) {
    function api_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return $asset->file_name;
        }
        return "";
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if($id != null){
            if (($asset = \App\Models\Upload::find($id)) != null) {
                // if($user_type = \App\Models\User::select('user_type')->find($asset->user_id)){
                    return my_asset($asset->file_name, $asset->user_type);
                // }
            }
            return null;
        }
        return null;
    }
}

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $user_type, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            if($user_type == "seller"){
                return $vendor = env('VENDOR_BASE_URL') . '/' . $path;
            }else{
                return app('url')->asset('public/' . $path, $secure);
            }
        }
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}


// if (!function_exists('isHttps')) {
//     function isHttps()
//     {
//         return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
//     }
// }

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}


if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('AWS_URL') . '/';
        } else {
            return getBaseURL() . 'public/';
        }
    }
}


if (!function_exists('isUnique')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function isUnique($email)
    {
        $user = \App\Models\User::where('email', $email)->first();

        if ($user == null) {
            return '1'; // $user = null means we did not get any match with the email provided by the user inside the database
        } else {
            return '0';
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        if ($lang == false) {
            $setting = $settings->where('type', $key)->first();
        } else {
            $setting = $settings->where('type', $key)->where('lang', $lang)->first();
            $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        }
        return $setting == null ? $default : $setting->value;
    }
}

function hex2rgba($color, $opacity = false)
{
    return Colorcodeconverter::convertHexToRgba($color, $opacity);
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if (Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff')) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isSeller')) {
    function isSeller()
    {
        if (Auth::check() && Auth::user()->user_type == 'seller') {
            return true;
        }
        return false;
    }
}

if (!function_exists('isCustomer')) {
    function isCustomer()
    {
        if (Auth::check() && Auth::user()->user_type == 'customer') {
            return true;
        }
        return false;
    }
}

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

// duplicates m$ excel's ceiling function
if (!function_exists('ceiling')) {
    function ceiling($number, $significance = 1)
    {
        return (is_numeric($number) && is_numeric($significance)) ? (ceil($number / $significance) * $significance) : false;
    }
}

if (!function_exists('get_images')) {
    function get_images($given_ids, $with_trashed = false)
    {
        if (is_array($given_ids)) {
            $ids = $given_ids;
        } elseif ($given_ids == null) {
            $ids = [];
        } else {
            $ids = explode(",", $given_ids);
        }


        return $with_trashed
            ? Upload::withTrashed()->whereIn('id', $ids)->get()
            : Upload::whereIn('id', $ids)->get();
    }
}

//for api
if (!function_exists('get_images_path')) {
    function get_images_path($given_ids, $with_trashed = false)
    {
        $paths = [];
        $images = get_images($given_ids, $with_trashed);
        if (!$images->isEmpty()) {
            foreach ($images as $image) {
                $paths[] = !is_null($image) ? $image->file_name : "";
            }
        }

        return $paths;
    }
}

//for api
if (!function_exists('checkout_done')) {
    function checkout_done($combined_order_id, $payment)
    {
        $combined_order = CombinedOrder::find($combined_order_id);

        foreach ($combined_order->orders as $key => $order) {
            $order->payment_status = 'paid';
            $order->payment_details = $payment;
            $order->save();

            try {
                NotificationUtility::sendOrderPlacedNotification($order);
                calculateCommissionAffilationClubPoint($order);
            } catch (\Exception $e) {

            }
        }
    }
}

//for api
if (!function_exists('wallet_payment_done')) {
    function wallet_payment_done($user_id, $amount, $payment_method, $payment_details)
    {
        $user = \App\Models\User::find($user_id);
        $user->balance = $user->balance + $amount;
        $user->save();

        $wallet = new Wallet;
        $wallet->user_id = $user->id;
        $wallet->amount = $amount;
        $wallet->payment_method = $payment_method;
        $wallet->payment_details = $payment_details;
        $wallet->save();
    }
}

if (!function_exists('purchase_payment_done')) {
    function purchase_payment_done($user_id, $package_id)
    {
        $user = User::findOrFail($user_id);
        $user->customer_package_id = $package_id;
        $customer_package = CustomerPackage::findOrFail($package_id);
        $user->remaining_uploads += $customer_package->product_upload;
        $user->save();

        return 'success';
    }
}

//Commission Calculation
if (!function_exists('calculateCommissionAffilationClubPoint')) {
    function calculateCommissionAffilationClubPoint($order)
    {
        (new CommissionController)->calculateCommission($order);

        if (addon_is_activated('affiliate_system')) {
            (new AffiliateController)->processAffiliatePoints($order);
        }

        if (addon_is_activated('club_point')) {
            if ($order->user != null) {
                (new ClubPointController)->processClubPoints($order);
            }
        }

        $order->commission_calculated = 1;
        $order->save();
    }
}

// Addon Activation Check
if (!function_exists('addon_is_activated')) {
    function addon_is_activated($identifier, $default = null)
    {
        $addons = Cache::remember('addons', 86400, function () {
            return Addon::all();
        });

        $activation = $addons->where('unique_identifier', $identifier)->where('activated', 1)->first();
        return $activation == null ? false : true;
    }
}

function set_active($route) {
    if( is_array($route) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}


// Get All category level wise

function get_level_category_list($level = null, $type = null, $parent_id = null)
{
    $category_list = Category::select('*');
    if($parent_id != null || $parent_id != ""){
        $category_list = $category_list->where('parent_id', $parent_id);
    }
    if($level != null || $level != ""){
        $category_list = $category_list->where('level', $level);
    }
    if($type != null || $type != ""){
        $category_list = $category_list->where('type', $type);
    }
    $category_list = $category_list->get();
    return $category_list;
}

    // phone number verification
    function storeSms($user, $userdata)
    {
        $sms_queue = new SmsQueue;
        $sms_queue->sms_indentifier = $userdata['sms_indentifier'];
        $sms_queue->sms_from = $userdata['sms_from'];
        $sms_queue->sms_to = $userdata['sms_to'];
        $sms_queue->sms_body = $userdata['sms_body'];
        $sms_queue->template_id = $userdata['template_id'];
        $sms_queue->user_id = $userdata['user_id'];
        $sms_queue->save();

    }

    // order placed message
    // Order Confirmed: Thank you for shopping at eBuildBazaar!
    // Your order [[ordercode]] is confirmed.
    // Please check your Orders page for all updates at eBb website [[link]].
    // Thanks from Triple Play Infra.
    function storeOrderPlaceMessage($order)
    {
        $sms_template   = SmsTemplate::where('identifier','order_placed')->first();
        $sms_body       = $sms_template->sms_body;
        $sms_body       = str_replace('[[code]]', $order->code, $sms_body);
        // $sms_body       = str_replace('[[site_name]]', env('APP_NAME'), $sms_body);
        $template_id    = $sms_template->template_id;
        $sms_queue = new SmsQueue;
        $sms_queue->sms_indentifier = $sms_template->identifier;
        $sms_queue->sms_from = env('APP_NAME');
        $sms_queue->sms_to = $user->phone;
        $sms_queue->sms_body = $sms_body;
        $sms_queue->template_id = $sms_template->template_id;
        $sms_queue->save();
    }

    // Get ShipRocket token

    function getToken(){
        $shiprocketEmailId      =   env('SHIPROCKET_EMAIL');
        $shiprocketPassword     =   env('SHIPROCKET_PASSWORD');
        if(ShipRocket::all()->last() == null){
            $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
                'header' => 'Content-Type: application/json',
                'email' => $shiprocketEmailId,
                'password' => $shiprocketPassword,
            ]);

            $token  =   $response->json()['token'];
            $first_name  =   $response->json()['first_name'];
            $last_name  =   $response->json()['last_name'];
            $email  =   $response->json()['email'];
            $company_id  =   $response->json()['company_id'];

            // Save record into the table
            $shiprocketToken             =   new ShipRocket();
            $shiprocketToken->token      =   $token;
            $shiprocketToken->first_name =   $first_name;
            $shiprocketToken->last_name  =   $last_name;
            $shiprocketToken->email      =   $email;
            // $shiprocketToken->password   =   $password;
            $shiprocketToken->company_id =   $company_id;
            $shiprocketToken->save();

        }
        else{
            $timeNow            =   Carbon::now(new \DateTimeZone('Asia/Kolkata'));
            $lastTokenTime      =   Carbon::parse(ShipRocket::all()->last()->updated_at->jsonSerialize())->timezone('Asia/Kolkata')->format('Y-m-d H:i:s');
            $hoursDifference    =   $timeNow->diffInHours($lastTokenTime);
            $token              =   null;

            if($hoursDifference > 23){
                // Create new token if token more than a day old
                $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
                    'header' => 'Content-Type: application/json',
                    'email' => $shiprocketEmailId,
                    'password' => $shiprocketPassword,

                ]);
                $token  =   $response->json()['token'];
                $first_name  =   $response->json()['first_name'];
                $last_name  =   $response->json()['last_name'];
                $email  =   $response->json()['email'];
                // $password  =   $response->json()['password'];
                $company_id  =   $response->json()['company_id'];
                // Save record into the table

                $shiprocketToken                =   new ShipRocket();
                $shiprocketToken->token         =   $token;
                $shiprocketToken->first_name    =   $first_name;
                $shiprocketToken->last_name     =   $last_name;
                $shiprocketToken->email         =   $email;
                // $shiprocketToken->password      =   $password;
                $shiprocketToken->company_id    =   $company_id;

                $shiprocketToken->save();

            }
            else{
                // Get current token
                $token      =   ShipRocket::all()->last()->token;
            }
        }
        return $token;
    }

    //send message configurations

    function sendTextMessage($data)
    {
        if(isset($data->sms_body)){
            $text =  $data->sms_body;
        }else{
            $text = '';
        }

        // dd($data->sms_to);
        $curl = curl_init();
        $post_fields = array();
        $post_fields["method"] = "sendMessage";
        $post_fields["send_to"] = $data->sms_to;
        // $post_fields["send_to"] = "918825171386";
        $post_fields["msg"] = $text;
        $post_fields["msg_type"] = "TEXT";
        $post_fields["userid"] = env('GUPSHUP_USER_ID');
        $post_fields["password"] = env('GUPSHUP_PASSWORD');
        $post_fields["auth_scheme"] = "plain";
        $post_fields["format"] = "json";
        $post_fields["v"] = "1.1";
        // dd($post_fields);
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://enterprise.smsgupshup.com/GatewayAPI/rest",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $post_fields
        ));
        $response = curl_exec($curl);


        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }

        // dd($response[0]['id']);

        try {

            if($response){

                $result = json_decode($response);
                updateSmsTextMessage($data->id, 2, $result->response->id);

                return true;
            }
            // dd('i am response');

        } catch (Exception $e) {
            // dd($e);
            updateSmsTextMessage($data->id, 3, null, $e->getMessage());
            return true;

        }

    }

    function updateSmsTextMessage($id, $status, $respons_code=null, $error_msg=null){
        $sms_q_update = SmsQueue::findOrFail($id);
        $sms_q_update->status = $status;
        $sms_q_update->send_at = Carbon::now()->toDateTimeString();
        $sms_q_update->response_id = $respons_code;
        $sms_q_update->error_msg = $error_msg;
        $sms_q_update->save();
        return true;
    }


