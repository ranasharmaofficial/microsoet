<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceTax;
use App\Models\ServiceStock;
use App\Models\ServiceTranslation;
use App\Models\ProductTranslation;
use App\Models\ProductStock;
use App\Models\Category;
use App\Models\FlashDealProduct;
use App\Models\ProductTax;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\Color;
use App\Models\User;
use App\Models\ServiceBoughtTogether;
use App\Models\RelatedService;
use App\Models\ServiceOtherInfo;
use App\Utility\CategoryUtility;
use App\Models\Type;

use Auth;
use Carbon\Carbon;
use Combinations;
use Illuminate\Support\Str;
use Artisan;
use Cache;

// export data
use App\Exports\ServiceExport;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource. Need to remove this function.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_services(Request $request)
    {
        $type = 'In House';
        $col_name = null;
        $query = null;
        $sort_search = null;

        $services = Service::where('added_by', 'admin')->where('auction_product',0);

        if ($request->type != null){
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $services = $services->orderBy($col_name, $query);
            $sort_type = $request->type;
        }
        if ($request->search != null){
            $services = $services
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $services = $services->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('backend.services.index', compact('services','type', 'col_name', 'query', 'sort_search'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller_services(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;

        $category = Category::select('id','name')->where('parent_id',0)->where('type', 2)->get();

        $services = Service::where('added_by', 'seller')->orderBy('created_at', 'desc')->where('auction_product',0);

        if (($request->has('third_category') && !empty($request->third_category)) && ($request->has('second_category') && !empty($request->second_category)) && ($request->has('first_category') && !empty($request->first_category))) {
            $third_category = $request->third_category;
            $category_ids[] = $third_category;
            $services = $services->whereIn('category_id', $category_ids);
        }
        if (empty($request->third_category) && ($request->has('second_category') && !empty($request->second_category)) && ($request->has('first_category') && !empty($request->first_category))) {
            $second_category = $request->second_category;
            $category_ids = CategoryUtility::children_ids($second_category);
            $category_ids[] = $second_category;
            $services = $services->whereIn('category_id', $category_ids);
        }
        if ((empty($request->third_category)) && (empty($request->second_category)) && ($request->has('first_category') && !empty($request->first_category))) {
            $first_category = $request->first_category;
            $category_ids = CategoryUtility::children_ids($first_category);
            $category_ids[] = $first_category;
            $services = $services->whereIn('category_id', $category_ids);
        }
        if ($request->has('user_id') && $request->user_id != null) {
            $services = $services->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null){
            $services = $services->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $services = $services->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);
        $type = 'Seller';

        return view('backend.services.index', compact('services','type', 'col_name', 'query', 'seller_id', 'sort_search', 'category'));
    }

    public function all_services(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;

        $category = Category::select('id','name')->where('parent_id',0)->where('type', 2)->get();

        $services = Service::orderBy('created_at', 'desc')->where('auction_product',0);

        if (($request->has('third_category') && !empty($request->third_category)) && ($request->has('second_category') && !empty($request->second_category)) && ($request->has('first_category') && !empty($request->first_category))) {
            $third_category = $request->third_category;
            $category_ids[] = $third_category;
            $services = $services->whereIn('category_id', $category_ids);
        }

        if (empty($request->third_category) && ($request->has('second_category') && !empty($request->second_category)) && ($request->has('first_category') && !empty($request->first_category))) {
            $second_category = $request->second_category;
            $category_ids = CategoryUtility::children_ids($second_category);
            $category_ids[] = $second_category;
            $services = $services->whereIn('category_id', $category_ids);
        }

        if ((empty($request->third_category)) && (empty($request->second_category)) && ($request->has('first_category') && !empty($request->first_category))) {
            $first_category = $request->first_category;
            $category_ids = CategoryUtility::children_ids($first_category);
            $category_ids[] = $first_category;
            $services = $services->whereIn('category_id', $category_ids);
        }

        if ($request->has('user_id') && $request->user_id != null) {
            $services = $services->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null){
            $services = $services
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $services = $services->paginate(15);
        $type = 'All';

        return view('backend.services.index', compact('services','type', 'col_name', 'query', 'seller_id', 'sort_search', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)->where('type',2)
            ->with('childrenCategories')
            ->get();
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('backend.services.create', compact('categories','services'));
    }

    public function add_more_choice_option(Request $request) {
        $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();
        $html = '';

        foreach ($all_attribute_values as $row) {
            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
        }
        echo json_encode($html);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;
        $service->name = $request->name;
        $service->added_by = $request->added_by;
        if(Auth::user()->user_type == 'seller'){
            $service->user_id = Auth::user()->id;
            if(get_setting('product_approve_by_admin') == 1) {
                $service->approved = 0;
            }
        }
        else{
            $service->user_id = User::where('user_type', 'admin')->first()->id;
        }
        $service->category_id = $request->category_id;
        $service->type_id = $request->type;
        $service->brand_id = $request->brand_id;
        $service->barcode = $request->barcode;
        $service->service_image = $request->service_image;
        $service->photos = $request->photos;
        $service->thumbnail_img = $request->thumbnail_img;
        $service->unit = $request->unit;
        $service->min_qty = $request->min_qty;
        $service->low_stock_quantity = $request->low_stock_quantity;
        $service->stock_visibility_state = $request->stock_visibility_state;
        $service->external_link = $request->external_link;
        $service->external_link_btn = $request->external_link_btn;

        $tags = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $service->tags = implode(',', $tags);
        $service->description = $request->description;
        // $service->overview = $request->overview;
        $service->warranty = $request->warranty;
        $service->our_services = $request->our_services;
        $service->about = $request->about;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->video_provider = $request->video_provider;
        $service->video_link = $request->video_link;
        $service->unit_price = $request->unit_price;
        $service->discount = $request->discount;
        $service->discount_type = $request->discount_type;

        $service->total_employee = $request->total_employee;
        $service->min_order = $request->min_order;
        $service->total_projects = $request->total_projects;

        if ($request->date_range != null) {
            $date_var               = explode(" to ", $request->date_range);
            $service->discount_start_date = strtotime($date_var[0]);
            $service->discount_end_date   = strtotime( $date_var[1]);
        }

        $service->shipping_type = $request->shipping_type;
        $service->est_shipping_days  = $request->est_shipping_days;

        if ($request->has('shipping_type')) {
            if($request->shipping_type == 'free'){
                $service->shipping_cost = 0;
            }
            elseif ($request->shipping_type == 'flat_rate') {
                $service->shipping_cost = $request->flat_shipping_cost;
            }
            elseif ($request->shipping_type == 'product_wise') {
                $service->shipping_cost = json_encode($request->shipping_cost);
            }
        }
        if ($request->has('is_quantity_multiplied')) {
            $service->is_quantity_multiplied = 1;
        }

        $service->meta_title = $request->meta_title;
        $service->meta_description = $request->meta_description;

        if($request->has('meta_img')){
            $service->meta_img = $request->meta_img;
        } else {
            $service->meta_img = $service->thumbnail_img;
        }

        if($service->meta_title == null) {
            $service->meta_title = $service->name;
        }

        if($service->meta_description == null) {
            $service->meta_description = strip_tags($service->description);
        }

        if($service->meta_img == null) {
            $service->meta_img = $service->thumbnail_img;
        }

        if($request->hasFile('pdf')){
            $service->pdf = $request->pdf->store('uploads/services');
        }

		if($request->broucher){
            $service->broucher = $request->broucher;
        }

        $service->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));

        if(Service::where('slug', $service->slug)->count() > 0){
            flash(translate('Another product exists with same slug. Please change the slug!'))->warning();
            return back();
        }

        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $service->colors = json_encode($request->colors);
        }
        else {
            $colors = array();
            $service->colors = json_encode($colors);
        }

        $choice_options = array();

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_'.$no;

                $item['attribute_id'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $service->attributes = json_encode($request->choice_no);
        }
        else {
            $service->attributes = json_encode(array());
        }

		///service images video_link here
		if($request->service_video_links){
            $service->service_video_links =  json_encode($request->service_video_links);
        }else{
			$service->service_video_links =  json_encode(array());
		}
		///service images video_link here

		if($request->service_video_images){
            $service->service_video_images =  json_encode($request->service_video_images);
        }else{
			$service->service_video_images =  json_encode(array());
		}


        $service->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        $service->published = 1;
        if($request->button == 'unpublish' || $request->button == 'draft') {
            $service->published = 0;
        }

        if ($request->has('cash_on_delivery')) {
            $service->cash_on_delivery = 1;
        }
        if ($request->has('featured')) {
            $service->featured = 1;
        }
        if ($request->has('todays_deal')) {
            $service->todays_deal = 1;
        }
        $service->cash_on_delivery = 0;
        if ($request->cash_on_delivery) {
            $service->cash_on_delivery = 1;
        }
        //$variations = array();

        $service->save();

        //VAT & Tax
        if($request->tax_id) {
            foreach ($request->tax_id as $key => $val) {
                $service_tax = new ServiceTax;
                $service_tax->tax_id = $val;
                $service_tax->service_id = $service->id;
                $service_tax->tax = $request->tax[$key];
                $service_tax->tax_type = $request->tax_type[$key];
                $service_tax->save();
            }
        }

		//Bought Togther Option Start
		if($request->boughtproducts) {
			foreach ($request->boughtproducts as $key => $bproduct) {
				$flash_deal_product = new ServiceBoughtTogether;
				$flash_deal_product->items_id = $bproduct;
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Bought Togther Option End

		//Realated Products Option Start
		if($request->relatedproducts) {
			foreach ($request->relatedproducts as $key => $releproduct) {
				$flash_deal_product = new RelatedService;
				$flash_deal_product->items_id = $releproduct;
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Realated Products Option End

		//Other Info Start
		if($request->service_key) {
			foreach ($request->service_key as $key => $service_key) {
				$flash_deal_product = new ServiceOtherInfo;
				$flash_deal_product->key_name = $service_key;
				$flash_deal_product->key_value = $request->service_value[$key];
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Other Info End

        //combinations start
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                foreach ($request[$name] as $key => $eachValue) {
                    array_push($data, $eachValue);
                }
                array_push($options, $data);
            }
        }

        //Generates the combinations of customer choice options
        $combinations = Combinations::makeCombinations($options);
        if(count($combinations[0]) > 0){
            $service->variant_product = 1;
            foreach ($combinations as $key => $combination){
                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                            $color_name = Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }
                $service_stock = ServiceStock::where('service_id', $service->id)->where('variant', $str)->first();
                if($service_stock == null){
                    $service_stock = new ServiceStock;
                    $service_stock->service_id = $service->id;
                }

                $service_stock->variant = $str;
                $service_stock->price = $request['price_'.str_replace('.', '_', $str)];
                $service_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
                $service_stock->qty = $request['qty_'.str_replace('.', '_', $str)];
                $service_stock->image = $request['img_'.str_replace('.', '_', $str)];
                $service_stock->save();
            }
        }
        else{
            $service_stock              = new ServiceStock;
            $service_stock->service_id  = $service->id;
            $service_stock->variant     = '';
            $service_stock->price       = $request->unit_price;
            $service_stock->sku         = $request->sku;
            $service_stock->qty         = $request->current_stock;
            $service_stock->save();
        }
        //combinations end

	    $service->save();

        // Product Translations
        $service_translation = ServiceTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'service_id' => $service->id]);
        $service_translation->name = $request->name;
        $service_translation->unit = $request->unit;
        $service_translation->description = $request->description;
        $service_translation->save();

        flash(translate('Service has been inserted successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
            return redirect()->route('services.all');
        }
        else{
            if(addon_is_activated('seller_subscription')){
                $seller = Auth::user()->seller;
                $seller->remaining_uploads -= 1;
                $seller->save();
            }
            return redirect()->route('seller.products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function admin_service_edit(Request $request, $id)
     {
        $service = Service::findOrFail($id);
        $types = Type::select('id','name')->where('third_category_id',$service->category_id)->where('status', 1)->get();
        $services = Service::orderBy('created_at', 'desc')->get();


        $lang = $request->lang;
        $tags = json_decode($service->tags);
        $categories = Category::where('parent_id', 0)->where('type',2)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
            $service_other_infos = ServiceOtherInfo::where('service_id', $service->id)
            ->get();
        return view('backend.services.edit', compact('service', 'types', 'services', 'categories', 'tags','lang','service_other_infos'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seller_product_edit(Request $request, $id)
    {
        $service = Product::findOrFail($id);
        if($service->digital == 1) {
            return redirect('digitalproducts/' . $id . '/edit');
        }
        $lang = $request->lang;
        $tags = json_decode($service->tags);
        $categories = Category::all();
        return view('backend.product.products.edit', compact('product', 'categories', 'tags','lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service                    = Service::findOrFail($id);
        $service->category_id       = $request->category_id;
        $service->type_id           = $request->type;
        $service->brand_id          = $request->brand_id;
        $service->barcode           = $request->barcode;
        $service->overview           = $request->overview;
        $service->warranty           = $request->warranty;
		$service->our_services       = $request->our_services;
        $service->about              = $request->about;
        $service->short_description = $request->short_description;
        $service->cash_on_delivery = 0;
        $service->featured = 0;
        $service->todays_deal = 0;
        $service->is_quantity_multiplied = 0;

        if($request->lang == env("DEFAULT_LANGUAGE")){
            $service->name          = $request->name;
            $service->unit          = $request->unit;
            $service->description   = $request->description;
            $service->slug          = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->slug)));
        }

        if($request->slug == null){
            $service->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        }

        if(Service::where('id', '!=', $service->id)->where('slug', $service->slug)->count() > 0){
            flash(translate('Another product exists with same slug. Please change the slug!'))->warning();
            return back();
        }
		$service->service_image = $request->service_image;
        $service->photos                 = $request->photos;
        $service->thumbnail_img          = $request->thumbnail_img;
        $service->min_qty                = $request->min_qty;
        $service->low_stock_quantity     = $request->low_stock_quantity;
        $service->stock_visibility_state = $request->stock_visibility_state;
        $service->external_link = $request->external_link;
        $service->external_link_btn = $request->external_link_btn;

        $tags = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $service->tags           = implode(',', $tags);

        $service->video_provider = $request->video_provider;
        $service->video_link     = $request->video_link;
        $service->unit_price     = $request->unit_price;
        $service->discount       = $request->discount;
        $service->discount_type     = $request->discount_type;

        $service->total_employee = $request->total_employee;
        $service->min_order = $request->min_order;
        $service->total_projects = $request->total_projects;

        if ($request->date_range != null) {
            $date_var               = explode(" to ", $request->date_range);
            $service->discount_start_date = strtotime($date_var[0]);
            $service->discount_end_date   = strtotime( $date_var[1]);
        }
        $service->shipping_type  = $request->shipping_type;
        $service->est_shipping_days  = $request->est_shipping_days;

        if ($request->has('shipping_type')) {
            if($request->shipping_type == 'free'){
                $service->shipping_cost = 0;
            }
            elseif ($request->shipping_type == 'flat_rate') {
                $service->shipping_cost = $request->flat_shipping_cost;
            }
            elseif ($request->shipping_type == 'product_wise') {
                $service->shipping_cost = json_encode($request->shipping_cost);
            }
        }

        if ($request->has('is_quantity_multiplied')) {
            $service->is_quantity_multiplied = 1;
        }
        if ($request->has('cash_on_delivery')) {
            $service->cash_on_delivery = 1;
        }

        if ($request->has('featured')) {
            $service->featured = 1;
        }

        if ($request->has('todays_deal')) {
            $service->todays_deal = 1;
        }

        $service->meta_title        = $request->meta_title;
        $service->meta_description  = $request->meta_description;
        $service->meta_img          = $request->meta_img;

        if($service->meta_title == null) {
            $service->meta_title = $service->name;
        }

        if($service->meta_description == null) {
            $service->meta_description = strip_tags($service->description);
        }

        if($service->meta_img == null) {
            $service->meta_img = $service->thumbnail_img;
        }

        $service->pdf = $request->pdf;
		if($request->broucher){
            $service->broucher = $request->broucher;
        }
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $service->colors = json_encode($request->colors);
        }else {
            $colors = array();
            $service->colors = json_encode($colors);
        }

        $choice_options = array();

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_'.$no;

                $item['attribute_id'] = $no;

                $data = array();
                foreach ($request[$str] as $key => $eachValue) {
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        foreach ($service->stocks as $key => $stock) {
            $stock->delete();
        }

        if (!empty($request->choice_no)) {
            $service->attributes = json_encode($request->choice_no);
        }
        else {
            $service->attributes = json_encode(array());
        }
        $service->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        //combinations start
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                foreach ($request[$name] as $key => $item) {
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        if(count($combinations[0]) > 0){
            $service->variant_product = 1;
            foreach ($combinations as $key => $combination){
                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                            $color_name = Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }

                $service_stock = ServiceStock::where('service_id', $service->id)->where('variant', $str)->first();
                if($service_stock == null){
                    $service_stock = new ServiceStock;
                    $service_stock->service_id = $service->id;
                }
                if(isset($request['price_'.str_replace('.', '_', $str)])) {
                    $service_stock->variant = $str;
                    $service_stock->price = $request['price_'.str_replace('.', '_', $str)];
                    $service_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
                    $service_stock->qty = 0;
                    $service_stock->image = $request['img_'.str_replace('.', '_', $str)];
                    $service_stock->save();
                }
            }
        }else{
            $service_stock              = new ServiceStock;
            $service_stock->service_id  = $service->id;
            $service_stock->variant     = '';
            $service_stock->price       = $request->unit_price;
            $service_stock->sku         = $request->sku;
            $service_stock->qty         = 0;
            $service_stock->save();
        }

        $service->save();

	    //Bought Togther Option Start
		if($request->boughtservices) {
			ServiceBoughtTogether::where('service_id', $service->id)->delete();
			foreach ($request->boughtservices as $key => $bproduct) {
				$flash_deal_product = new ServiceBoughtTogether;
				$flash_deal_product->items_id = $bproduct;
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Bought Togther Option End

		//Realated Products Option Start
		if($request->relatedservices) {
			RelatedService::where('service_id', $service->id)->delete();
			foreach ($request->relatedservices as $key => $releproduct) {
				$flash_deal_product = new RelatedService;
				$flash_deal_product->items_id = $releproduct;
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Realated Products Option End

        //VAT & Tax
        if($request->tax_id) {
            ServiceTax::where('service_id', $service->id)->delete();
            foreach ($request->tax_id as $key => $val) {
                $service_tax = new ServiceTax;
                $service_tax->tax_id = $val;
                $service_tax->service_id = $service->id;
                $service_tax->tax = $request->tax[$key];
                $service_tax->tax_type = $request->tax_type[$key];
                $service_tax->save();
            }
        }

		//Bought Togther Option Start
		if($request->boughtproducts) {
			foreach ($request->boughtproducts as $key => $bproduct) {
				ServiceBoughtTogether::where('service_id', $service->id)->delete();
				$flash_deal_product = new ServiceBoughtTogether;
				$flash_deal_product->items_id = $bproduct;
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Bought Togther Option End

		//Realated Products Option Start
		if($request->relatedproducts) {
			foreach ($request->relatedproducts as $key => $releproduct) {
				RelatedService::where('service_id', $service->id)->delete();
				$flash_deal_product = new RelatedService;
				$flash_deal_product->items_id = $releproduct;
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Realated Products Option End

		//Bought Togther Option Start
		if($request->service_key) {
			ServiceOtherInfo::where('service_id', $service->id)->delete();
			foreach ($request->service_key as $key => $service_key) {
				$flash_deal_product = new ServiceOtherInfo;
				$flash_deal_product->key_name = $service_key;
				$flash_deal_product->key_value = $request->service_value[$key];
				$flash_deal_product->service_id = $service->id;
				$flash_deal_product->save();
			}
        }
		//Bought Togther Option End

        // Service Translations
        $service_translation                = ServiceTranslation::firstOrNew(['lang' => $request->lang, 'service_id' => $service->id]);
        $service_translation->name          = $request->name;
        $service_translation->unit          = $request->unit;
        $service_translation->description   = $request->description;
        $service_translation->save();

        flash(translate('Service has been updated successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        foreach ($service->service_translations as $key => $service_translations) {
            $service_translations->delete();
        }

        foreach ($service->stocks as $key => $stock) {
            $stock->delete();
        }
        Service::destroy($id);
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        return back();
    }

    public function bulk_product_delete(Request $request) {
        if($request->id) {
            foreach ($request->id as $service_id) {
                $this->destroy($service_id);
            }
        }

        return 1;
    }

    /**
     * Duplicates the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Request $request, $id)
    {
        $service = Product::find($id);
        if(Auth::user()->id == $service->user_id || Auth::user()->user_type == 'staff'){
            $service_new = $service->replicate();
            $service_new->slug = $service_new->slug.'-'.Str::random(5);
            $service_new->save();

            foreach ($service->stocks as $key => $stock) {
                $service_stock              = new ProductStock;
                $service_stock->product_id  = $service_new->id;
                $service_stock->variant     = $stock->variant;
                $service_stock->price       = $stock->price;
                $service_stock->sku         = $stock->sku;
                $service_stock->qty         = $stock->qty;
                $service_stock->save();

            }

            flash(translate('Product has been duplicated successfully'))->success();
            if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
              if($request->type == 'In House')
                return redirect()->route('products.admin');
              elseif($request->type == 'Seller')
                return redirect()->route('products.seller');
              elseif($request->type == 'All')
                return redirect()->route('products.all');
            }
            else{
                if (addon_is_activated('seller_subscription')) {
                    $seller = Auth::user()->seller;
                    $seller->remaining_uploads -= 1;
                    $seller->save();
                }
                return redirect()->route('seller.products');
            }
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function get_products_by_brand(Request $request)
    {
        $services = Product::where('brand_id', $request->brand_id)->get();
        return view('partials.product_select', compact('products'));
    }

    public function updateTodaysDeal(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->todays_deal = $request->status;
        $service->save();
        Cache::forget('todays_deal_products');
        return 1;
    }

    public function updatePublished(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->published = $request->status;

        if($service->added_by == 'seller' && addon_is_activated('seller_subscription')){
            $seller = $service->user->seller;
            if($seller->invalid_at != null && $seller->invalid_at != '0000-00-00' && Carbon::now()->diffInDays(Carbon::parse($seller->invalid_at), false) <= 0){
                return 0;
            }
        }

        $service->save();
        return 1;
    }

    public function updateServiceApproval(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->approved = $request->approved;

        if($service->added_by == 'seller' && addon_is_activated('seller_subscription')){
            $seller = $service->user->seller;
            if($seller->invalid_at != null && Carbon::now()->diffInDays(Carbon::parse($seller->invalid_at), false) <= 0){
                return 0;
            }
        }

        $service->save();
        return 1;
    }

    public function updateFeatured(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->featured = $request->status;
        if($service->save()){
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            return 1;
        }
        return 0;
    }

    public function updateSellerFeatured(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->seller_featured = $request->status;
        if($service->save()){
            return 1;
        }
        return 0;
    }

    public function sku_combination(Request $request)
    {
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $service_name = $request->name;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.services.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
        $service = Product::findOrFail($request->id);

        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $service_name = $request->name;
        $unit_price = $request->unit_price;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.services.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }

    public function relatedProductss(Request $request)
    {
        $service_ids = $request->product_ids;
        return view('backend.services.related_products', compact('service_ids'));
    }

    public function boughtTogethers(Request $request)
    {
        $service_ids = $request->bought_prod;
        return view('backend.services.bought_togethers', compact('service_ids'));
    }

    public function related_services_edit(Request $request)
    {
        $service_ids = $request->product_ids;
        $items_id = $request->items_id;
        return view('backend.services.related_products_edit', compact('service_ids', 'items_id'));
    }
    public function bought_together_edit(Request $request)
    {
        $boughtproducts = $request->product_ids;
        $items_id = $request->items_id;
        return view('backend.services.bought_together_edit', compact('boughtproducts', 'items_id'));
    }

    public function get_service_data()
    {
        return Excel::download(new ServiceExport, 'ebb_services.xlsx');
    }

}
