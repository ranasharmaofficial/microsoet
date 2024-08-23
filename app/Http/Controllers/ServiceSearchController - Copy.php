<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Service;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\AttributeCategory;
use App\Models\MasterService;
use App\Models\ServiceCart;
use App\Utility\CategoryUtility;
use Auth;

class ServiceSearchController extends Controller
{
    public function index(Request $request, $category_id = null, $brand_id = null)
    {
        $category = "";
        $category_ids = [];
        $latestslug = $request->category_slug;
        $query = $request->keyword;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
       
        $selected_attribute_values = array();

        $first_five_color = Color::orderBy('id', 'desc')->limit(5)->get();
        $colors = Color::all();
        $selected_color = null;

        $conditions = ['published' => 1, 'approved' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        // if($seller_id != null){
        //     $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        // }

        $services = Service::where($conditions);

        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;
            $services->whereIn('category_id', $category_ids);
            $attribute_ids = AttributeCategory::whereIn('category_id', $category_ids)->pluck('attribute_id')->toArray();
            $attributes = Attribute::whereIn('id', $attribute_ids)->get();
        }
        $service_list = $services->whereIn('category_id', $category_ids);
        $min_price_value = $service_list->min('unit_price'); //Added by Avi
        $max_price_value = $service_list->max('unit_price'); //Added by Avi


        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $services->where(function ($q) use ($query){
                foreach (explode(' ', trim($query)) as $word) {
                    $q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%')->orWhereHas('service_translations', function($q) use ($word){
                        $q->where('name', 'like', '%'.$word.'%');
                    });
                }
            });
        } 

        // get category wise brands, Used on product list page @Avinash
        $get_filter_brand = $service_list->groupBy('brand_id')->orderBy('brand_id', 'ASC')->get()->pluck('brand_id');
        $filter_brand_data = Brand::whereIn('id', $get_filter_brand)->orderBy('name', 'ASC')->get();
        
        // Get Master Service list used as service type
        $get_master_ids = $service_list->groupBy('master_service_id')->pluck('master_service_id');
        $filter_master_products = MasterService::select('id', 'name', 'thumbnail_img')->whereIn('id', $get_master_ids)->get();

        // get category wise selected product attributes, Used on product list page @Avinash
        $get_filter_attribute = $service_list->pluck('attributes');
        $decode_attribute = json_decode($get_filter_attribute);
        $attribute_ids = [];
        foreach($decode_attribute as $attribute){
            $attributes = json_decode($attribute);
            foreach($attributes as $attribute){
                $check_exist_attribute = (in_array($attribute, $attribute_ids));
                if($check_exist_attribute == false){
                    $attribute_ids[] = $attribute;
                }
            }
        }
        $attributes = Attribute::whereIn('id', $attribute_ids)->orderBy('name', 'ASC')->get();
       
        // get category wise selected product attributes_values, Used on product list page @Avinash
        $get_filter_attribute_choice = $service_list->pluck('choice_options');
        $attribute_choice_value_list = [];
        $attribute_choice_value = [];
        $decode_attribute_choice = json_decode($get_filter_attribute_choice);
        foreach($decode_attribute_choice as $attribute_choice){
            $attribute_choices = json_decode($attribute_choice);
            foreach($attribute_choices as $choice){
                $attribute_choice_value['attribute_id'] = $choice->attribute_id;
                foreach($choice->values as $value){
                    $attribute_choice_value['value'] = $value;
                    if(!in_array($attribute_choice_value, $attribute_choice_value_list, true)){
                        array_push($attribute_choice_value_list, $attribute_choice_value );
                    }
                } 
            }            
        }
        $get_filter_colors = $service_list->pluck('colors');

        $product_lists = filter_services($service_list)->with('taxes')->get();

		$categories = Category::where('level', 0)->where('type','2')->orderBy('order_level', 'ASC')->get();
		$catName = Category::where('id', $category_id)->first();
        $checkLevel = Category::select('id', 'level')->find($category_id);
        if($checkLevel->level == 0){
            $first_category = Category::find($category_id);
            $second_category = null;
            $third_category = null;

            $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
            $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
            $all_third_category_first = [];
            $all_third_category_all = [];
        }elseif($checkLevel->level == 1){
            $second_category = Category::find($category_id);
            $first_category = Category::find($second_category->parent_id);
            $third_category = null;

            $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
            $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
            $all_third_category_first = $this->getCategoryData($second_category->id, 5, null);
            $all_third_category_all = $this->getCategoryData($second_category->id, 5, 5);
        }elseif($checkLevel->level == 2){
            $third_category = Category::find($category_id);
            $second_category = Category::find($third_category->parent_id);
            $first_category = Category::find($second_category->parent_id);

            $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
            $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
            $all_third_category_first = $this->getCategoryData($second_category->id, 5, null);
            $all_third_category_all = $this->getCategoryData($second_category->id, 5, 5);
        }else{
            abort(404);
        }

        $data = [
            'sr_number1' => 1,
            'sr_number2' => 1,
            'filter_brand_data' => $filter_brand_data,
            'first_category' => $first_category,
            'all_second_category_first' => $all_second_category_first,
            'all_second_category_all' => $all_second_category_all,
            'all_third_category_first' => $all_third_category_first,
            'all_third_category_all' => $all_third_category_all,
            'latestslug' => $latestslug,
            'product_lists' => $product_lists,
            'attribute_ids' => $attribute_ids,
            'attribute_choice_value_list' => $attribute_choice_value_list,
            'services' => $service_list,
            'catName' => $catName,
            'first_five_color' => $first_five_color,
            'categories' => $categories,
            'query' => $query,
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'sort_by' => $sort_by,
            // 'brand_id' => $brand_id,
            'seller_id' => $seller_id,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'min_price_value' => $min_price_value, //Added by Avi
            'max_price_value' => $max_price_value, //Added by Avi
            'attributes' => $attributes,
            'selected_attribute_values' => $selected_attribute_values,
            'colors' => $colors,
            'selected_color' => $selected_color,
            'filter_master_products' => $filter_master_products,
        ];
        
        return view('frontend.service_listing', $data);
    }

    //common function used in index function for finding categories lists
    public function getCategoryData($parent_id, $limit, $skip){
        $query = Category::where('parent_id',$parent_id)
            ->orderBy('order_level', 'ASC')
            ->where('type', 2);
        if($limit != null){
            $query->limit($limit);
        }
        if($skip != null){
            $query->take(PHP_INT_MAX)
                ->skip($skip);
        }
        $category_data = $query->get();
        return $category_data;
    }

    // Used for product list through Ajax
    public function getFilteredServices(Request $request){
        $output = '';
        $master_product_data = '';
        $brand_data = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));

        $pageNumber = $request->page;
        $category = Category::where('slug', $request->slug)->first();
        $category_ids = CategoryUtility::children_ids($category->id);
        $category_ids[] = $category->id;

        $product_list = Service::whereIn('category_id',$category_ids);
        $conditions = ['approved' => 1, 'published' => 1];

        if($request->has('brand')) {
            $brand_ids = Brand::whereIn('slug', $request->brand)->get()->pluck('id');
            $product_list->whereIn('brand_id', $brand_ids);
        }

        if($request->has('master_service_id')) {
            $product_list->where('master_service_id', $request->master_service_id);
        }

        if($request->has('attribute')) {
            $selected_attribute_values = $request->attribute;
            foreach ($selected_attribute_values as $key => $value) {
                $str = '"' . $value . '"';
                $product_list->where('choice_options', 'like', '%' .$str. '%');
            }
        }
        
        if($request->min_price != null && $request->max_price != null){
            $product_list->where('unit_price', '>=', $request->min_price)->where('unit_price', '<=', $request->max_price);
        }

        switch ($request->sort_by) {
            case 'newest':
                $product_list->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $product_list->orderBy('created_at', 'asc');
                break;
            case 'price-asc':
                $product_list->orderBy('unit_price', 'asc');
                break;
            case 'price-desc':
                $product_list->orderBy('unit_price', 'desc');
                break;
            default:
                $product_list->orderBy('unit_price', 'asc');
                break;
        }
        $product_listing = $product_list->where($conditions);
        $product_lists = $product_listing->paginate(20, ['*'], 'page', $pageNumber);

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $get_cart_product = ServiceCart::select('service_id', 'quantity')->where('user_id', $user_id)->get();
        }else{
            $temp_user_id = $request->session()->get('temp_user_id');
            $get_cart_product = ($temp_user_id != null) ? ServiceCart::select('service_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
        }

        foreach($product_lists as $key => $list){
            $product_lists[$key]->is_cart_product = 0;
            if($get_cart_product != null){
                foreach($get_cart_product as $cart) {
                    if($cart->service_id == $list->id){
                        $product_lists[$key]->is_cart_product = 1;
                    }
                }
            } 
        }

        if($product_lists != null){
			foreach($product_lists as $row){
			    $img  = uploaded_asset($row->thumbnail_img);
                // $discount_price = home_discounted_base_price($row);
                // $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qty = 0;  foreach ($row->stocks as $key => $stock) { $qty += $stock->qty; } 

                $output .= '<div class="col-md-4 col-sm-6 product_data">
                <div class="product-box services">';
                    if($request->has('master_service_id')){
                        if($row->is_cart_product){
                            $output .= '<button class="addser-position-absolute">
                                <i class="fa fa-check-circle"></i> Shortlisted
                            </button>';
                        }else{
                            $output .= '<button class="addservicebtn addToServiceCart addser-position-absolute">
                                <i class="fa fa-plus-circle"></i> Shortlist
                            </button>';
                        }
                        
                    }
                    
                    $output .= '<a href="'.route('service', $row->slug).'">    
                        <div class="ser-prd-img position-relative">';
                        if($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp &&  $row->discount_type == "percent"){
                            $output .= '<div class="beachs2  position-absolute"><p>'.$row->discount.' % Off</p></div>'; 
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);

                        }elseif($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp && $row->discount_type == "amount") {
                            $output .= '<div class="beachs2  position-absolute"><p>₹'.$row->discount.' Off</p></div>';
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);
                        }else{
                            $discount_price = home_base_price($row, false);  
                            $discount_show_price = home_base_price($row, true);; 
                            $original_show_price = '';
                        }

                        $output .= '<div class="beach3  position-absolute">
                                <p>'.$discount_show_price.'  Per Sq. Ft.</p>
                            </div>
                            <img src="'.$img.'" alt="'.$row->name.'">
                        </div>
                    </a>
                    <div class="discrptions">
                        <a href="'.route('service', $row->slug).'">
                            <h5> '.$row->name.'</h5>
                        </a>
                        <h6> '.$row->user->shop->name.' <span> '.$row->user->shop->city.', '.$row->user->shop->state.'</span></h6>
                    </div>
                    <input type="hidden" value="'.$row->id.'" class="prod_id">                
                    <input type="hidden" value="'.$discount_price.'" class="prod_price">
            		<input type="hidden" value="'.$row->name.'" class="serv_prod_name">
                    <input type="hidden" value="'.$img.'" class="serv_prod_img">
                    <input type="hidden" value="1" class="input-number">
                    <ul class="item-amenities d-flex item-amenities-with-icons">
                        <li class="h-beds"><span class="hz-figure">'.$row->total_employee.' <i class="fa fa-users" aria-hidden="true"></i></span> Employee</li>
                        <li class="h-baths border-left border-right"><span class="hz-figure">'.$row->total_projects.'+ <i class="fa fa-file-image" aria-hidden="true"></i></span> No. Of Projects</li>
                        <li class="h-area"><span class="hz-figure">'.$row->min_order.' <i class="far fa-square"></i></span> Min. Order </li>
                    </ul>
                    <div class="border-bottom d-flex1">';
                    
                    if(Auth::user() != null){
                        $output .= '<button class="addserviceaquote" data-toggle="modal" data-target="#myModaladdress" id="getUser" >Get A Quote</button>
                        <a data-toggle="modal" data-target="#askPriceModal'.$row->id.'" class="buttonbuynow askpricebtn">  Ask Price</a>';
                    }else{ 
                        $output .= '<a href="'.url('login').'" class="addserviceaquote">Get A Quote</a>
                        <a href="'.url('login').'" class="buttonbuynow askpricebtn"> Ask Price</a>';  
                    }
                    $output .= '</div>';
                    $output .= '<div class="item-footer clearfix">
                                    <div class="item-author">
                                        <i class="fa fa-user mr-1"></i>
                                        Working Exp.
                                    </div>
                                    <div class="item-date">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        '.$row->working_exp.' years +
                                    </div>
                                </div>
                            </div>
                        </div>'; 
           
                    $output .= '<div id="askPriceModal'.$row->id.'" class="modal fade prolidneis in" role="dialog">
                        <div class="modal-dialog" id="modal-dialog45">   
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="box-soldid1back box-soldid2">&nbsp;
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form_section pt-0 pb-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="post" action="'.route('service_enquiry.insertServiceEnquiry').'" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                                    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                                        <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                                                            <strong>Ask Price</strong> by adding a few details of your requirement
                                                        </h3>
                                                        <div class="deals">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="adid" required name="service_id" value="'.$row->id.'">
                                                    <input type="hidden" name="service_name" value="'.$row->name.'">
                                                    <input type="hidden" name="category_id" value="'.$row->category_id.'">
                                                    <input type="hidden" name="vendor_id" value="'.$row->user_id.'">
                                                        
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 askalertlft">
                                                            <img src="'.$img.'" alt="'.$row->name.'">
                                                            <h3>'.$row->name.'</h3>
                                                            <p class="soldbytxt"><span>Sold By -</span> '.$row->user->shop->name.'</p>
                                                            <p class="contype">
                                                                <span>Short Description: '.$row->short_description.'</span>
                                                                <span>No. Of Projects Completed: More than '.$row->total_projects.'</span>
                                                                <span>Service Location/City: '.$row->user->shop->city.'</span>
                                                                <span>Professional Assistance: As per requirement</span>
                                                            </p>
                                                        </div>
                                                    
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                            <div class="main-parenttttttT row">
                                                                <div class="js-form-message form-group">
                                                                    <label class="formpoplabel">Nature of work</label>
                                                                    <div class="ginput_container ginput_container_checkbox">
                                                                        <input type="text" name="nature_work" class="form-control empty" value="'.$row->category->name.'" placeholder="Nature of work" readonly>
                                                                    </div>
                                                                </div>
                                                                
                                                                

                                                                <div class="js-form-message form-group">
                                                                    <label class="formpoplabel">Enter You Service Location</label>
                                                                    <input type="text" name="location" required class="form-control empty" placeholder="Service Location/City">
                                                                </div>
                                                                
                                                                <div class="js-form-message form-group col-md-6">
                                                                    <label class="formpoplabel">Address</label>
                                                                    <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Address" >
                                                                </div>
                                                                
                                                                <div class="js-form-message form-group col-md-6">
                                                                    <label class="formpoplabel">city</label>
                                                                    <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="City" >
                                                                </div>
                                                                
                                                                <div class="js-form-message form-group col-md-6">
                                                                    <label class="formpoplabel">State</label>
                                                                    <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="State" >
                                                                </div>
                                                                <div class="js-form-message form-group col-md-6">
                                                                    <label class="formpoplabel">Landmark</label>
                                                                    <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Landmark (Optional)" >
                                                                </div>
                                                                
                                                                <div class="js-form-message form-group col-md-6">
                                                                    <label class="formpoplabel">Pincode</label>
                                                                    <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Pincode" >
                                                                </div>
                                                                
                                                                <div class="js-form-message form-group col-md-6">
                                                                    <label class="formpoplabel">Alternate Phone No. (Optional)</label>
                                                                    <input type="text" name="gst" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" class="form-control empty" placeholder="Alternate Phone No. (Optional)" >
                                                                </div>

                                                                <div class="js-form-message form-group">
                                                                    <label class="formpoplabel">Additional requirement</label>
                                                                    <textarea name="additional_requirement" required class="form-control textareas h-200" placeholder="Additional requirement"></textarea>
                                                                </div>
                                                                <!-- 4 -->
                                                            </div>
                                                        </div>
                                                            
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <div class="btn-box">
                                                                    <button type="submit" class="addto">
                                                                        Submit
                                                                        <svg class="position-relative ml-2" width="13px" height="10px" viewBox="0 0 13 10">
                                                                            <path d="M1,5 L11,5"></path>
                                                                            <polyline points="8 1 12 5 8 9"></polyline>
                                                                        </svg>
                                                                    </button>
                                                                    <!--  <input  value="submit_project" type="hidden"  name="submit_project" /> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
			}
            $output .= '<div>' .$product_lists->render(). '</div>';
		}
        
        $data = [
            'master_service_id' =>$request->master_service_id,
            'output' => $output,
            'product_listing' => $product_lists,
        ];

		return Response::json([
            'status' => true,
            'data' => $data,
        ], 200);

    }

    public function setServiceListHtml($product_lists){
        $output = '';
        if($product_lists != null){
			foreach($product_lists as $row){
			    $img  = uploaded_asset($row->thumbnail_img);

                $discount_price = home_discounted_base_price($row);
                $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qty = 0;  foreach ($row->stocks as $key => $stock) { $qty += $stock->qty; } 
                
                $output .= '<div class="grid-item col-md-3 col-cat-box">
                    <div class="product-box h-auto pb-3 product_data">';  
                        if($row->discount_type == "percent"){
                            $output .= '<div class="beachs">'.$row->discount.' % Off</div>'; 
                        }elseif($row->discount_type == "amount") {
                            $output .= '<div class="beachs">'.$row->discount.'Flat Off</div>';
                        }
                        
                        $output .= '<a href="'.route('product', $row->slug).'"><img src="'.$img.'" alt="'.$row->name.'" onerror="this.onerror=null;this.src='.static_asset('assets/img/placeholder.jpg').';"></a>';
                        
                        if($row->brand_id != null){
                            $output .= '<div class="discrptions">
                                                <div class="companyname">'.$row->brand->name.'</div>
                                        </div>';
                        }
                        
                        $output .= '<div class="discrptions">
                            <a href="'.route('product', $row->slug).'">
                                <h5 class="desclist">'.$row->name.'</h5>
                            </a>
                            <h6>'.home_discounted_base_price($row).' <strike>' .home_base_price($row) .'</strike></h6>
                        </div>
                        <div class="discrptions_button buddonjdk '.$row->id.'">';
                        

                        $output .= '<input type="hidden" value="'.$row->id.'" class="prod_id">
                            <input type="hidden" value="'.$filter_discount_price.'" class="prod_price">
							<input type="hidden" value="'.$row->name.'" class="prod_name">
							<input type="hidden" value="'.$img.'" class="prod_img">';
                                $output .= '<button id="btn1" type="button" class="btn cart active cart_buttons3 addToCartUButton"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="name">Add to cart</span> </button>
                                <div class="cart-add cart-add3 products_list ">
                                    <div class="input-group quantity_input mb-0">
                                        <div class="input-group w-auto justify-content-end align-items-center packageadd">
                                            
                                            <input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1_1 add_cart_button_minus" data-field="quantity" ';
                                            
                                            
                                            $output .= 'disabled><input type="number" step="1" max="10" value="1" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                            
                                            $output .= '<input type="button" value="+" class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0_1 add_cart_button_plus" data-field="quantity">
                                            <a href="'.url('cart').'"> <h6 class="cart_buttons cart_icons1"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h6></a>
                                        </div>
                                    </div>
                                </div>							
							    <button class="buttonbuynow productBuyNow"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now</button>';
                            
							$output .= '</div>         
                    </div>
                </div>';
			}

            $output .= '<div>' .$product_lists->render(). '</div>';
		}

    }
    

    public function listingByCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->index($request, $category->id);
        }
        abort(404);
    }

    public function askQuoteModal(Request $request){
        $service_id = $request->service_id;

        $data = [
            'service_id' => $service_id,
        ];

		return Response::json([
            'status' => true,
            'data' => $data,
        ], 200);

    }

   
}