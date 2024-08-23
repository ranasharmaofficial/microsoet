<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\BulkCart;
use App\Models\BulkCartCategory;
use Auth;
use Session;
use Cookie;
use App\Models\Search;
use App\Models\FlashDeal;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Shop;
use App\Models\Attribute;
use App\Models\AttributeCategory;
use App\Utility\CategoryUtility;
class BulkCartController extends Controller
{
    public function addBulkProdToCart(Request $request, $category_id = null, $brand_id = null){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_price = $request->input('product_price');

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $temp_user_id = null;
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');

            if($temp_user_id == null || $temp_user_id == ""){
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
        }
        $prod_check = Product::where('id',$product_id)->exists();
    
        if($prod_check)
        {
            if(BulkCart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                return response()->json(['status'=>'Already Added to Cart']);
            }
            else{	
                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->price = $product_price;
                $cartItem->total_price = $product_price*$product_qty;
                $cartItem->temp_user_id = $temp_user_id;
                $cartItem->user_id = $user_id;
                $cartItem->quantity = $product_qty;	
                $cartItem->variation = '';	
                $cartItem->save();
                //return response()->json(['status'=>'Added to Cart']);
                
                if(auth()->user() != null) {
                    $user_id = Auth::user()->id;
                    $carts = BulkCart::where('user_id', $user_id)->get();
                } else {
                    // $temp_user_id = $request->session()->get('temp_user_id');
                    $carts = BulkCart::where('temp_user_id', $temp_user_id)->get();
                }
                return array(
                    'status' => 'Added To Cart!',
                    'cart_count' => count($carts),
                    // 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                );
            }
        }
    }
    
	public function listing(Request $request)
    {
        return $this->index($request);
    }

    public function listingByCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->index($request, $category->id);
        }
        abort(404);
    }

    public function cartCountFunction()
    {
        $cartcount = BulkCart::where('user_id',Auth::id())->count();
        $sumcartamount = BulkCart::where('user_id',Auth::id())
                        ->sum('total_price');
        return response()->json(['count'=>$cartcount,'cart_amount'=>$sumcartamount]);
    }
    
    //goto product bulk product cart
    public function index(Request $request, $type=null)
    {
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $bulkCartQuery = BulkCart::where('user_id', $user_id);
            if($type != null){
                // dd("I am all category here");
                $bulkCartQuery->where('types', 'all_category');
            }else{
                // dd("I am from_product here");
                $bulkCartQuery->where('types', 'from_product');
            }
            $bulkcarts = $bulkCartQuery->get();
        } else {
            return view('frontend.user_login');
        }
        // dd($type);
        return view('frontend.view_bulk_product_cart', compact('bulkcarts', 'type'));
    }

    //goto All bulk product cart
    public function allBulkOrdercart(Request $request)
    {
        if ($request->type != null) {
            return $this->index($request, $request->type);
        }
        abort(404);
    }
    

    public function deleteFromCart(Request $request){
       
        // if(Auth::check())
        // {
            $prod_id = $request->input('prod_id');
            // if(BulkCart::where('id',$prod_id)->where('user_id', Auth::id())->exists())
            // {
                $cartItem = BulkCart::where('id',$prod_id)->first();
                $cartItem->delete();
                return response()->json(['status'=>"Removed from Cart"]);
            // }
        // }
        // else
        // {
        //     return response()->json(['status' => "Login to Your Account"]);
        // }

    }
    
	public function updateCartPlus(Request $request){
       
        
            $quantity = $request->input('quantity');
            $id = $request->input('id');
            // if(BulkCart::where('id',$id)->where('user_id', Auth::id())->exists())
            // {
				if(Auth::user() != null) {
					$user_id = Auth::user()->id;
					$cartItem = BulkCart::where('product_id',$id)->where('user_id', $user_id)->first();
					$carts = BulkCart::where('user_id', Auth::id())->get();
					$price = $cartItem->price;
					$cart_update = BulkCart::where('product_id', $request->id)->where('user_id',$user_id)->update([
                        'quantity' => $quantity,
                        'total_price' => $quantity*$price,
                    ]);
					return response()->json(['status'=>"Cart Updated!"]);
				}
				else{
					$user_id = null;
					$temp_user_id = $request->session()->get('temp_user_id');
					$cartItem = BulkCart::where('product_id',$id)->where('temp_user_id', $temp_user_id)->first();
					$carts = BulkCart::where('user_id', Auth::id())->get();
					$price = $cartItem->price;
					$cart_update = BulkCart::where('product_id', $request->id)->where('temp_user_id',$temp_user_id)->update([
                        'quantity' => $quantity,
                        'total_price' => $quantity*$price,
                    ]);
					return response()->json(['status'=>"Cart Updated!"]);
					
				}
                
                // return array(
                    // 'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                // );
            // }
        

    }
    public function updateCartMinus(Request $request){
       
        if(Auth::check())
        {
            $quantity = $request->input('quantity');
            $id = $request->input('id');
            if(BulkCart::where('id',$id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = BulkCart::where('id',$id)->where('user_id', Auth::id())->first();
                $carts = BulkCart::where('user_id', Auth::id())->get();
                $price = $cartItem->price;
                $cart_update = BulkCart::where('id', $request->id)
                            ->update([
                                    'quantity' => $quantity,
                                    'total_price' => $quantity*$price,
                                ]);
                // return response()->json(['status'=>"Cart Updated!"]);
                return array(
                    'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                );
            }
        }
        else
        {
            return response()->json(['status' => "Login to Your Account"]);
        }

    }
    public function showCartModal(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.partials.addToCart', compact('product'));
    }

    public function showCartModalAuction(Request $request)
    {
        $product = Product::find($request->id);
        return view('auction.frontend.addToCartAuction', compact('product'));
    }

	public function addCarts(Request $request){
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $product_id =  $request->input('product_id', []);
            $price =  $request->input('price', []);
            $quantity =  $request->input('quantity', []);
            $category_id =  $request->input('category');
            $types =  $request->input('types');

            // Check Exist category or not
            $check_exist_category = BulkCartCategory::where('user_id', $user_id)
            ->where('type', $types)
            ->first();
            // dd($check_exist_category);
            if($check_exist_category != null){
                if($check_exist_category->category_id != $category_id){
                    $check_exist_category->category_id = $category_id;
                    $check_exist_category->save();

                    $get_all_data = BulkCart::where('types', $types)
                        ->where('user_id', $user_id)
                        ->delete();
                }
                $bulk_cart_category_id = $check_exist_category->id;
                // dd($bulk_cart_category_id);
            }else{
                $insertCartCategory = new BulkCartCategory();
                $insertCartCategory->user_id = $user_id;
                $insertCartCategory->category_id = $category_id;
                $insertCartCategory->type = $types;
                $insertCartCategory->save();
                $bulk_cart_category_id = $insertCartCategory->id;
            }

            
            $results = [];
            foreach ($request->product_id as $key => $unit) {
                $check_cart_product = BulkCart::where('user_id', $user_id)
                ->where('types', $types)
                ->where('product_id', $unit)
                ->first();
    
                if($check_cart_product != null){
                    $new_quantity = $quantity[$key];
                    $cart_quantity = $check_cart_product->quantity;
                    $total_quantity = (int)$new_quantity + (int)$cart_quantity;
                    $check_cart_product->quantity = $total_quantity;
                    $check_cart_product->category_id = $category_id;
                    $check_cart_product->types = $types;
                    $check_cart_product->save();
                }else{
                    $results[] = [
                        "bulk_cart_category_id" => $bulk_cart_category_id,
                        "product_id" => $product_id[$key],
                        "price" => $price[$key],
                        "quantity" => $quantity[$key],
                        "category_id" => $category_id,
                        "types" => $types,
                        "user_id" => $user_id,
                        "variation" => '',
                    ];     
                }   
            }
            BulkCart::insert($results);      
            return redirect('bulk-cart')->with(session()->flash('alert-success', 'Bulk Products Added to cart!'));    

        }else{
            return view('frontend.user_login');
        }

	}

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $carts = array();
        $data = array();

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $data['user_id'] = $user_id;
            $carts = BulkCart::where('user_id', $user_id)->get();
        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;
            $carts = BulkCart::where('temp_user_id', $temp_user_id)->get();
        }

        $data['product_id'] = $product->id;
        $data['owner_id'] = $product->user_id;

        $str = '';
        $tax = 0;
        if($product->auction_product == 0){
            if($product->digital != 1 && $request->quantity < $product->min_qty) {
                return array(
                    'status' => 0,
                    'cart_count' => count($carts),
                    'modal_view' => view('frontend.partials.minQtyNotSatisfied', [ 'min_qty' => $product->min_qty ])->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                );
            }

            //check the color enabled or disabled for the product
            if($request->has('color')) {
                $str = $request['color'];
            }

            if ($product->digital != 1) {
                //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
                foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                    if($str != null){
                        $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                    }
                    else{
                        $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);
                    }
                }
            }

            $data['variation'] = $str;
				// dd($str);
				// die;
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;

            if($product->wholesale_product){
                $wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
                if($wholesalePrice){
                    $price = $wholesalePrice->price;
                }
            }

            $quantity = $product_stock->qty;

            if($quantity < $request['quantity']){
                return array(
                    'status' => 0,
                    'cart_count' => count($carts),
                    'modal_view' => view('frontend.partials.outOfStockCart')->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                );
            }

            //discount calculation
            $discount_applicable = false;

            if ($product->discount_start_date == null) {
                $discount_applicable = true;
            }
            elseif (strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
                strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date) {
                $discount_applicable = true;
            }

            if ($discount_applicable) {
                if($product->discount_type == 'percent'){
                    $price -= ($price*$product->discount)/100;
                }
                elseif($product->discount_type == 'amount'){
                    $price -= $product->discount;
                }
            }

            //calculation of taxes
            foreach ($product->taxes as $product_tax) {
                if($product_tax->tax_type == 'percent'){
                    $tax += ($price * $product_tax->tax) / 100;
                }
                elseif($product_tax->tax_type == 'amount'){
                    $tax += $product_tax->tax;
                }
            }

            $data['quantity'] = $request['quantity'];
            $data['price'] = $price;
            $data['tax'] = $tax;
            //$data['shipping'] = 0;
            $data['shipping_cost'] = 0;
            $data['product_referral_code'] = null;
            $data['cash_on_delivery'] = $product->cash_on_delivery;
            $data['digital'] = $product->digital;

            if ($request['quantity'] == null){
                $data['quantity'] = 1;
            }

            if(Cookie::has('referred_product_id') && Cookie::get('referred_product_id') == $product->id) {
                $data['product_referral_code'] = Cookie::get('product_referral_code');
            }

            if($carts && count($carts) > 0){
                $foundInCart = false;

                foreach ($carts as $key => $cartItem){
                    $product = Product::where('id', $cartItem['product_id'])->first();
                    if($product->auction_product == 1){
                        return array(
                            'status' => 0,
                            'cart_count' => count($carts),
                            'modal_view' => view('frontend.partials.auctionProductAlredayAddedCart')->render(),
                            'nav_cart_view' => view('frontend.partials.cart')->render(),
                        );
                    }

                    if($cartItem['product_id'] == $request->id) {
                        $product_stock = $product->stocks->where('variant', $str)->first();
                        $quantity = $product_stock->qty;
                        if($quantity < $cartItem['quantity'] + $request['quantity']){
                            return array(
                                'status' => 0,
                                'cart_count' => count($carts),
                                'modal_view' => view('frontend.partials.outOfStockCart')->render(),
                                'nav_cart_view' => view('frontend.partials.cart')->render(),
                            );
                        }
                        if(($str != null && $cartItem['variation'] == $str) || $str == null){
                            $foundInCart = true;

                            $cartItem['quantity'] += $request['quantity'];

                            if($product->wholesale_product){
                                $wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
                                if($wholesalePrice){
                                    $price = $wholesalePrice->price;
                                }
                            }

                            $cartItem['price'] = $price;

                            $cartItem->save();
                        }
                    }
                }
                if (!$foundInCart) {
                    BulkCart::create($data);
                }
            }
            else{
                BulkCart::create($data);
            }

            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = BulkCart::where('user_id', $user_id)->get();
            } else {
                $temp_user_id = $request->session()->get('temp_user_id');
                $carts = BulkCart::where('temp_user_id', $temp_user_id)->get();
            }
            return array(
                'status' => 'Added To Cart!',
                'cart_count' => count($carts),
                'modal_view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }
        else{
            $price = $product->bids->max('amount');

            foreach ($product->taxes as $product_tax) {
                if($product_tax->tax_type == 'percent'){
                    $tax += ($price * $product_tax->tax) / 100;
                }
                elseif($product_tax->tax_type == 'amount'){
                    $tax += $product_tax->tax;
                }
            }

            $data['quantity'] = 1;
            $data['price'] = $price;
            $data['tax'] = $tax;
            $data['shipping_cost'] = 0;
            $data['product_referral_code'] = null;
            $data['cash_on_delivery'] = $product->cash_on_delivery;
            $data['digital'] = $product->digital;

            if(count($carts) == 0){
                BulkCart::create($data);
            }
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = BulkCart::where('user_id', $user_id)->get();
            } else {
                $temp_user_id = $request->session()->get('temp_user_id');
                $carts = BulkCart::where('temp_user_id', $temp_user_id)->get();
            }
            return array(
                'status' => 1,
                'cart_count' => count($carts),
                'modal_view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }
    }

    //removes from Cart
    public function removeFromCart(Request $request, $type=null)
    {
        BulkCart::destroy($request->id);
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $bulkcarts = BulkCart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $bulkcarts = BulkCart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($bulkcarts),
            'cart_view' => view('frontend.partials.bulk_cart', compact('bulkcarts', 'type'))->render(),
            // 'nav_cart_view' => view('frontend.partials.cart')->render(),
        );
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request, $type=null)
    {
        // dd($request);
        $cartItem = BulkCart::findOrFail($request->id);

        if($cartItem['id'] == $request->id){
			
            $product = Product::find($cartItem['product_id']);
			if($cartItem['variation']!=='') { 
				$product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();
				$quantity = $product_stock->qty;
				$price = $product_stock->price;

				if($quantity >= $request->quantity) {
					if($request->quantity >= $product->min_qty){
						$cartItem['quantity'] = $request->quantity;
					}
				}

				if($product->wholesale_product){
					$wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
					if($wholesalePrice){
						$price = $wholesalePrice->price;
					}
				}
			}
			else{
				$cartItem['quantity'] = $request->quantity;
			}
            $cartItem->save();
        }

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $bulkcarts = BulkCart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $bulkcarts = BulkCart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($bulkcarts),
            'cart_view' => view('frontend.partials.bulk_cart', compact('bulkcarts','type'))->render(),
            // 'nav_cart_view' => view('frontend.partials.cart')->render(),
        );
    }
	public function proUpdateQuantit(Request $request)
    {
        $cartItem = BulkCart::findOrFail($request->id);
		dd($cartItem);die;
        // if($cartItem['id'] == $request->id){
            $product = Product::find($cartItem['product_id']);
            $product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();
            $quantity = $product_stock->qty;
            $price = $product_stock->price;

            if($quantity >= $request->quantity) {
                if($request->quantity >= $product->min_qty){
                    $cartItem['quantity'] = $request->quantity;
                }
            }

            if($product->wholesale_product){
                $wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
                if($wholesalePrice){
                    $price = $wholesalePrice->price;
                }
            }

            $cartItem->save();
        // }

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = BulkCart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = BulkCart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($carts),
            'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
            'nav_cart_view' => view('frontend.partials.cart')->render(),
        );
    }
}