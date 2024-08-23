<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
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
use App\Models\Address;
use App\Models\User;

use App\Utility\CategoryUtility;
class CartController extends Controller
{
    private $url = 'https://apiv2.shiprocket.in/v1/external/';

    public function addToUserCart(Request $request, $category_id = null, $brand_id = null){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_price = $request->input('product_price');

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $temp_user_id = null;
			// $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists();
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');
            if($temp_user_id == null || $temp_user_id == ""){
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
				// $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$temp_user_id)->exists();
            }
        }

        $prod_check = Product::where('id',$product_id)->exists();
        if($prod_check)
        {
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id', $user_id)->get();
                $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('product_id',$product_id)->where('user_id',$user_id)->first();
                        $check_product_quantity = $check_product_quantity->quantity;
                    }
            } else {
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                $check_product_av = Cart::where('product_id',$product_id)->where('temp_user_id',$temp_user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('product_id',$product_id)->where('temp_user_id',$temp_user_id)->first();
                        $check_prod_quantity = $check_product_quantity->quantity;
                    }
                // dd($check_prod_quantity);die;
            }

            if($check_product_av)
            {
                // return response()->json(['status'=>'Already Added to Cart']);
                    if(auth()->user() != null) {
                        $user_id = Auth::user()->id;
                        $carts = Cart::where('user_id', $user_id)->get();
                        $check_product_quantity = Cart::where('product_id',$product_id)->where('user_id',$user_id)->first();
                        if($check_product_quantity != null){
                            $check_prod_quantity = $check_product_quantity->quantity;
                            $total_qty = $product_qty+$check_prod_quantity;
                        }else{
                            $total_qty = $product_qty;
                        }

                        $cart_update = Cart::where('product_id', $product_id)->where('user_id', $user_id)
                                        ->update([
                                                'quantity' =>$total_qty,
                                                'total_price' => $total_qty*$product_price,
                                            ]);
                    }else{
                        $total_qty = $product_qty+$check_prod_quantity;
                        $cart_update = Cart::where('product_id', $product_id)->where('temp_user_id', $temp_user_id)
                                        ->update([
                                                'quantity' =>$total_qty,
                                                'total_price' => $total_qty*$product_price,
                                            ]);
                    }
                if(auth()->user() != null) {
                    $user_id = Auth::user()->id;
                    $carts = Cart::where('user_id', $user_id)->get();
                    $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
                } else {
                    // $temp_user_id = $request->session()->get('temp_user_id');
                    $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                    $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
                }
                return array(
                    'status' => 'Added To Cart!',
                    'cart_count' => count($carts),
                    'sum_cart_count' => $sumcartamount,
                    // 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                    'mobile_cart_nav' => view('frontend.partials.mobile_cart_nav')->render(),
                );
            }

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
                $carts = Cart::where('user_id', $user_id)->get();
				$sumamount = Cart::where('user_id',$user_id)->sum('total_price');
                $sumcartamount = filter_var($sumamount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            } else {
                // $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
                $sumcartamount = filter_var($sumamount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            }
            return array(
                'status' => 'Added To Cart!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
				// 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
                'mobile_cart_nav' => view('frontend.partials.mobile_cart_nav')->render(),
            );

	    }
    }

    //product list buy Now Start Here
    public function addToBuyNow(Request $request, $category_id = null, $brand_id = null){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_price = $request->input('product_price');

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $temp_user_id = null;
			// $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists();
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');

            if($temp_user_id == null || $temp_user_id == ""){
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
				// $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$temp_user_id)->exists();
            }
        }

        $prod_check = Product::where('id',$product_id)->exists();
        if($prod_check){
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id', $user_id)->get();
                $check_product_av = Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('product_id',$product_id)->where('user_id',$user_id)->first();
                        $check_product_quantity = $check_product_quantity->quantity;
                    }
            } else {
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                $check_product_av = Cart::where('product_id',$product_id)->where('temp_user_id',$temp_user_id)->exists();
                    if($check_product_av!=null)
                    {
                        $check_product_quantity = Cart::where('product_id',$product_id)->where('temp_user_id',$temp_user_id)->first();
                        $check_prod_quantity = $check_product_quantity->quantity;
                    }
                // dd($check_prod_quantity);die;
            }

            if($check_product_av)
            {
                // return response()->json(['status'=>'Already Added to Cart']);
                    if(auth()->user() != null) {
                        $user_id = Auth::user()->id;
                        $carts = Cart::where('user_id', $user_id)->get();
                        $check_product_quantity = Cart::where('product_id',$product_id)->where('user_id',$user_id)->first();
                        $check_prod_quantity = $check_product_quantity->quantity;
                        $total_qty = $product_qty+$check_prod_quantity;
                        $cart_update = Cart::where('product_id', $product_id)->where('user_id', $user_id)
                                        ->update([
                                                'quantity' =>$total_qty,
                                                'total_price' => $total_qty*$product_price,
                                            ]);
                    }else{
                        $total_qty = $product_qty+$check_prod_quantity;
                        $cart_update = Cart::where('product_id', $product_id)->where('temp_user_id', $temp_user_id)
                                        ->update([
                                                'quantity' =>$total_qty,
                                                'total_price' => $total_qty*$product_price,
                                            ]);
                    }
                if(auth()->user() != null) {
                    $user_id = Auth::user()->id;
                    $carts = Cart::where('user_id', $user_id)->get();
                    $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
                } else {
                    // $temp_user_id = $request->session()->get('temp_user_id');
                    $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                    $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
                }
                return array(
                    // 'status' => 'Added To Cart!',
                    'cart_count' => count($carts),
                    'sum_cart_count' => $sumcartamount,
                    // 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                );
            }

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
                $carts = Cart::where('user_id', $user_id)->get();
				$sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
            } else {
                // $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
            }
            return array(
                // 'status' => 'Added To Cart!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
				// 'product_box_view' => view('frontend.partials.product_box_ajax', compact('carts','products','check_cart_product_list'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );

	    }
    }

    //product list buy Now end Here
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
        $cartcount = Cart::where('user_id',Auth::id())->count();
        $sumcartamount = Cart::where('user_id',Auth::id())
                        ->sum('total_price');
        return response()->json(['count'=>$cartcount,'cart_amount'=>$sumcartamount]);
    }

    public function index(Request $request)
    {
        //dd($cart->all());
        $categories = Category::all();
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            if($request->session()->get('temp_user_id')) {
                Cart::where('temp_user_id', $request->session()->get('temp_user_id'))
                        ->update(
                                [
                                    'user_id' => $user_id,
                                    'temp_user_id' => null
                                ]
                );

                Session::forget('temp_user_id');
            }
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            // $carts = Cart::where('temp_user_id', $temp_user_id)->get();
            $carts = ($temp_user_id != null) ? Cart::where('temp_user_id', $temp_user_id)->get() : [] ;

            foreach($carts as $ci_item)
            {

            }


        }
        // $user_details = Address::where('user_id', Auth::user()->id)->first();
        return view('frontend.view_cart', compact('categories', 'carts'));
    }

    public function deleteFromCart(Request $request){

        // if(Auth::check())
        // {
            $prod_id = $request->input('prod_id');
            // if(Cart::where('id',$prod_id)->where('user_id', Auth::id())->exists())
            // {
                $cartItem = Cart::where('id',$prod_id)->first();
                $cartItem->delete();
                return response()->json(['status'=>"Removed from Cart"]);
            // }
        // }
        // else
        // {
        //     return response()->json(['status' => "Login to Your Account"]);
        // }

    }
    //product list and product details cart quantity update
	public function updateCartPlus(Request $request){
        $quantity = $request->input('quantity');
        $id = $request->input('id');
        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $cartItem = Cart::where('product_id',$id)->where('user_id', $user_id)->first();
            $carts = Cart::where('user_id', Auth::id())->get();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity + $quantity;
            $cart_update = Cart::where('product_id', $request->id)->where('user_id',$user_id)->update([
                'quantity' => $updated_quantity,
                'total_price' => $updated_quantity*$price,
            ]);
            $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
            return array(
                'quantity' => $quantity,
                'status' => 'Cart Updated!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');
            $cartItem = Cart::where('product_id',$id)->where('temp_user_id', $temp_user_id)->first();
            $carts = Cart::where('user_id', Auth::id())->get();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity + $quantity;
            $cart_update = Cart::where('product_id', $request->id)->where('temp_user_id',$temp_user_id)->update([
                'quantity' => $updated_quantity,
                'total_price' => $updated_quantity*$price,
            ]);
            $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
            return array(
                'quantity' => $quantity,
                'status' => 'Cart Updated!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }
    }
    //product list and product details cart quantity update
    public function updateCartMinus(Request $request){
        $quantity = $request->input('quantity');
        $id = $request->input('id');
        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $cartItem = Cart::where('product_id',$id)->where('user_id', $user_id)->first();
            $check_product_av = Cart::where('product_id',$id)->where('user_id',$user_id)->pluck('quantity')->first();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity - $quantity;
                if($check_product_av>1)
                {
                    $cart_update = Cart::where('product_id', $request->id)->where('user_id',$user_id)->update([
                        'quantity' => $updated_quantity,
                        'total_price' => $updated_quantity*$price,
                    ]);
                }

            $carts = Cart::where('user_id', Auth::id())->get();
            $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
            return array(
                'quantity' => $quantity,
                'status' => 'Cart Updated!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');
            $cartItem = Cart::where('product_id',$id)->where('temp_user_id', $temp_user_id)->first();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity - $quantity;
            $check_product_av = Cart::where('product_id',$id)->where('temp_user_id',$temp_user_id)->pluck('quantity')->first();
             if($check_product_av>1)
                {
                    $cart_update = Cart::where('product_id', $request->id)->where('temp_user_id',$temp_user_id)->update([
                        'quantity' => $updated_quantity,
                        'total_price' => $updated_quantity*$price,
                    ]);
                }
                $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
			    $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                return array(
                    'quantity' => $quantity,
                    'status' => 'Cart Updated!',
                    'cart_count' => count($carts),
                    'sum_cart_count' => $sumcartamount,
                    'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                );

        }
    }

    //view cart  page  details cart quantity update
	public function updateCartQtyPlus(Request $request){
        $quantity = $request->input('quantity');
        $id = $request->input('id');
        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $cartItem = Cart::where('product_id',$id)->where('user_id', $user_id)->first();
            // $carts = Cart::where('user_id', Auth::id())->get();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity + $quantity;
            $cart_update = Cart::where('product_id', $request->id)->where('user_id',$user_id)->update([
                'quantity' => $updated_quantity,
                'total_price' => $updated_quantity*$price,
            ]);

            $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
            $carts = Cart::where('user_id', Auth::id())->get();
            return array(
                'quantity' => $quantity,
                'status' => 'Cart Updated!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
                'cart_view_ajax' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');
            $cartItem = Cart::where('product_id',$id)->where('temp_user_id', $temp_user_id)->first();
            // dd($cartItem);
            // $carts = Cart::where('temp_user_id', $temp_user_id)->get();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity + $quantity;
            $cart_update = Cart::where('product_id', $request->id)->where('temp_user_id',$temp_user_id)->update([
                'quantity' => $updated_quantity,
                'total_price' => $updated_quantity*$price,
            ]);
            $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
            return array(
                'quantity' => $quantity,
                'status' => 'Cart Updated!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
                'cart_view_ajax' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }
    }
    //cart page quantity minus
    public function updateCartQtyMinus(Request $request){
        $quantity = $request->input('quantity');
        $id = $request->input('id');
        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $cartItem = Cart::where('product_id',$id)->where('user_id', $user_id)->first();
            $check_product_av = Cart::where('product_id',$id)->where('user_id',$user_id)->pluck('quantity')->first();
            // $carts = Cart::where('user_id', Auth::id())->get();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity - $quantity;
                if($check_product_av>1)
                {
                    $cart_update = Cart::where('product_id', $request->id)->where('user_id',$user_id)->update([
                        'quantity' => $updated_quantity,
                        'total_price' => $updated_quantity*$price,
                    ]);
                }else{
					$cart_update = Cart::where('product_id', $request->id)->where('user_id',$user_id)->delete();
				}


            $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
            $carts = Cart::where('user_id', $user_id)->get();
            return array(
                'quantity' => $quantity,
                'status' => 'Cart Updated!',
                'cart_count' => count($carts),
                'sum_cart_count' => $sumcartamount,
                'cart_view_ajax' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }else{
            $user_id = null;
            $temp_user_id = $request->session()->get('temp_user_id');
            $cartItem = Cart::where('product_id',$id)->where('temp_user_id', $temp_user_id)->first();
            // $carts = Cart::where('user_id', Auth::id())->get();
            $price = $cartItem->price;
            $updated_quantity = $cartItem->quantity - $quantity;
            $check_product_av = Cart::where('product_id',$id)->where('user_id',$user_id)->pluck('quantity')->first();
             if($check_product_av>1)
                {
                    $cart_update = Cart::where('product_id', $request->id)->where('temp_user_id',$temp_user_id)->update([
                        'quantity' => $updated_quantity,
                        'total_price' => $updated_quantity*$price,
                    ]);
                }
                $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                return array(
                    'quantity' => $quantity,
                    'status' => 'Cart Updated!',
                    'cart_count' => count($carts),
                    'sum_cart_count' => $sumcartamount,
                    'cart_view_ajax' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
                    'nav_cart_view' => view('frontend.partials.cart')->render(),
                );

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

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $carts = array();
        $data = array();

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $data['user_id'] = $user_id;
            $carts = Cart::where('user_id', $user_id)->get();
			$sumcartprice = Cart::where('user_id',$user_id)->sum('price');
			$sumcarttax = Cart::where('user_id',$user_id)->sum('tax');
			$sumcartamount = $sumcartprice+$sumcarttax;
        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
			$sumcartprice = Cart::where('temp_user_id',$temp_user_id)->sum('price');
			$sumcarttax = Cart::where('temp_user_id',$temp_user_id)->sum('tax');
			$sumcartamount = $sumcartprice+$sumcarttax;
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
                    'sum_cart_count' => $sumcartamount,
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
					'sum_cart_count' => $sumcartamount,
                    // 'modal_view' => view('frontend.partials.outOfStockCart')->render(),
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
			$data['total_price'] = $tax+$price;
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
							'sum_cart_count' => $sumcartamount,
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
								'sum_cart_count' => $sumcartamount,
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
                    Cart::create($data);
                }
            }
            else{
                Cart::create($data);
            }

            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id', $user_id)->get();
				$sumcartprice = Cart::where('user_id',$user_id)->sum('price');
				$sumcarttax = Cart::where('user_id',$user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;

            } else {
                $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumcartprice = Cart::where('temp_user_id',$temp_user_id)->sum('price');
				$sumcarttax = Cart::where('temp_user_id',$temp_user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;
            }
            return array(
                'status' => 'Added To Cart!',
                'cart_count' => count($carts),
				'sum_cart_count' => $sumcartamount,
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
			$data['total_price'] = $tax+$price;
            $data['shipping_cost'] = 0;
            $data['product_referral_code'] = null;
            $data['cash_on_delivery'] = $product->cash_on_delivery;
            $data['digital'] = $product->digital;

            if(count($carts) == 0){
                Cart::create($data);
            }
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id', $user_id)->get();
				$sumcartprice = Cart::where('user_id',$user_id)->sum('price');
				$sumcarttax = Cart::where('user_id',$user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;
            } else {
                $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumcartprice = Cart::where('temp_user_id',$temp_user_id)->sum('price');
				$sumcarttax = Cart::where('temp_user_id',$temp_user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;
            }
            return array(
                'status' => 1,
                'cart_count' => count($carts),
				'sum_cart_count' => $sumcartamount,
                'modal_view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
        }
    }

	public function buyNow(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->id);
        $carts = array();
        $data = array();

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $data['user_id'] = $user_id;
            $carts = Cart::where('user_id', $user_id)->get();
			$sumcartprice = Cart::where('user_id',$user_id)->sum('price');
			$sumcarttax = Cart::where('user_id',$user_id)->sum('tax');
			$sumcartamount = $sumcartprice+$sumcarttax;
        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
			$sumcartprice = Cart::where('temp_user_id',$temp_user_id)->sum('price');
			$sumcarttax = Cart::where('temp_user_id',$temp_user_id)->sum('tax');
			$sumcartamount = $sumcartprice+$sumcarttax;
        }

        $data['product_id'] = $product->id;
        $data['owner_id'] = $product->user_id;

        $str = '';
        $tax = 0;
        if($product->auction_product == 0){
            if($product->digital != 1 && $request->quantity < $product->min_qty) {
                // return array(
                    // 'status' => 0,
                    // 'cart_count' => count($carts),
                    // 'sum_cart_count' => $sumcartamount,
                    // 'modal_view' => view('frontend.partials.minQtyNotSatisfied', [ 'min_qty' => $product->min_qty ])->render(),
                    // 'nav_cart_view' => view('frontend.partials.cart')->render(),
                // );
				return redirect('cart_from_controller1');
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
                // return array(
                    // 'status' => 0,
                    // 'cart_count' => count($carts),
					// 'sum_cart_count' => $sumcartamount,
                    // 'modal_view' => view('frontend.partials.outOfStockCart')->render(),
                    // 'nav_cart_view' => view('frontend.partials.cart')->render(),
                // );
				return redirect('cart_from_controller2');
            }

            //discount calculation
            $discount_applicable = false;

            if ($product->discount_start_date == null) {
                $discount_applicable = true;
            }elseif (strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
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
			$data['total_price'] = $tax+$price;
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
                        // return array(
                            // 'status' => 0,
                            // 'cart_count' => count($carts),
							// 'sum_cart_count' => $sumcartamount,
                            // 'modal_view' => view('frontend.partials.auctionProductAlredayAddedCart')->render(),
                            // 'nav_cart_view' => view('frontend.partials.cart')->render(),
                        // );
						return redirect('cart_from_controller3');
                    }

                    if($cartItem['product_id'] == $request->id) {
                        $product_stock = $product->stocks->where('variant', $str)->first();
                        $quantity = $product_stock->qty;
                        if($quantity < $cartItem['quantity'] + $request['quantity']){
                            // return array(
                                // 'status' => 0,
                                // 'cart_count' => count($carts),
								// 'sum_cart_count' => $sumcartamount,
                                // 'modal_view' => view('frontend.partials.outOfStockCart')->render(),
                                // 'nav_cart_view' => view('frontend.partials.cart')->render(),
                            // );
							return redirect('cart_from_controller4');
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
                    Cart::create($data);
                }
            }
            else{
                Cart::create($data);
            }

            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id', $user_id)->get();
				$sumcartprice = Cart::where('user_id',$user_id)->sum('price');
				$sumcarttax = Cart::where('user_id',$user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;

            } else {
                $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumcartprice = Cart::where('temp_user_id',$temp_user_id)->sum('price');
				$sumcarttax = Cart::where('temp_user_id',$temp_user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;
            }
            return array(
                'status' => 'Added To Cart!',
                'cart_count' => count($carts),
				'sum_cart_count' => $sumcartamount,
                'modal_view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render(),
                'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
            }else{
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
			$data['total_price'] = $tax+$price;
            $data['shipping_cost'] = 0;
            $data['product_referral_code'] = null;
            $data['cash_on_delivery'] = $product->cash_on_delivery;
            $data['digital'] = $product->digital;

            if(count($carts) == 0){
                Cart::create($data);
            }
            if(auth()->user() != null) {
                $user_id = Auth::user()->id;
                $carts = Cart::where('user_id', $user_id)->get();
				$sumcartprice = Cart::where('user_id',$user_id)->sum('price');
				$sumcarttax = Cart::where('user_id',$user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;
            } else {
                $temp_user_id = $request->session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
				$sumcartprice = Cart::where('temp_user_id',$temp_user_id)->sum('price');
				$sumcarttax = Cart::where('temp_user_id',$temp_user_id)->sum('tax');
				$sumcartamount = $sumcartprice+$sumcarttax;
            }
            return array(
                'status' => 1,
                'cart_count' => count($carts),
				'sum_cart_count' => $sumcartamount,
                // 'modal_view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render(),
                // 'nav_cart_view' => view('frontend.partials.cart')->render(),
            );
			// return redirect('cart');
        }
    }

    //removes from Cart
    public function removeFromCart(Request $request)
    {
        Cart::destroy($request->id);
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($carts),
            'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
            'nav_cart_view' => view('frontend.partials.cart')->render(),
        );
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::findOrFail($request->id);

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
            $carts = Cart::where('user_id', $user_id)->get();
			$sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
			$sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
        }

        return array(
            'sum_cart_count' => $sumcartamount,
            'cart_count' => count($carts),
            'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
            'nav_cart_view' => view('frontend.partials.cart')->render(),
        );
    }

	public function proUpdateQuantit(Request $request)
    {
        $cartItem = Cart::findOrFail($request->id);
		// dd($cartItem);die;
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
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($carts),
            'cart_view' => view('frontend.partials.cart_update_ajax', compact('carts'))->render(),
            'nav_cart_view' => view('frontend.partials.cart')->render(),
        );
    }

    // Bought Together Changed By Avi Singh
    public function addBoughtTogether(Request $request){
        // if(Auth::user() != null) {
        //     $user_id = Auth::user()->id;
        //     $temp_user_id = null;
        // }else{
        //     $user_id = null;
        //     $temp_user_id = $request->session()->get('temp_user_id');

        //     if($temp_user_id == null || $temp_user_id == ""){
        //         $temp_user_id = bin2hex(random_bytes(10));
        //         $request->session()->put('temp_user_id', $temp_user_id);
        //     }
        // }
        $productids =  $request->input('product_id', []);
        $price =  $request->input('product_price', []);
        $quantity =  1;
        $user_id = "";
        $temp_user_id = "";
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            // $data['user_id'] = $user_id;
            $carts = Cart::where('user_id', $user_id)->get();
            $sameProductinCart = Cart::where('user_id', $user_id)->where('product_id',$request->product_id)->exists();
        } else {
            if($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            // $data['temp_user_id'] = $temp_user_id;
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
            $sameProductinCart = Cart::where('temp_user_id', $temp_user_id)->where('product_id',$request->product_id)->exists();
        }

        // if($sameProductinCart>=1){
        //     $results = [];
        //     // foreach ($request->productids as $index => $unit) {
        //         foreach ($request->input('product_id', []) as $key => $product_id){
        //         $results[] = [
        //             "product_id" => $productids[$key],
        //             "price" => $price[$key],
        //             "quantity" => $quantity,
        //             "temp_user_id" => $temp_user_id,
        //             "user_id" => $user_id,
        //             "total_price" => $quantity*$price[$key],
        //             "variation" => '',
        //             ];
        //             $cartupdate = Cart::where('product_id', $productids[$key])
        //             ->update([
        //                     'quantity' => $quantity+$sameProductinCartQuantity->quantity,
        //                     'total_price' => $quantity+$sameProductinCartQuantity->quantity*$price[$key],
        //                 ]);
        //     }

        // }else{
            $results = [];
            $sameProductinCartQuantity = 0;
            foreach ($request->input('product_id', []) as $key => $product_id){
                if(auth()->user() != null) {
                    $check_exist_product = Cart::select('id', 'quantity')->where('user_id', $user_id)->where('product_id',$productids[$key])->first();
                } else {
                    $check_exist_product = Cart::where('temp_user_id', $temp_user_id)->where('product_id',$productids[$key])->first();
                }

                if($check_exist_product){
                    $cartupdate = Cart::where('id', $check_exist_product->id)
                    ->update([
                            'variation' => '',
                            'price' => $price[$key],
                            'quantity' => $quantity+$check_exist_product->quantity,
                            'total_price' => ($quantity+$check_exist_product->quantity)*$price[$key],
                        ]);

                }else{
                    $results[] = [
                        "product_id" =>  $productids[$key],
                        "price" => $price[$key],
                        "quantity" => (int)$quantity,
                        "temp_user_id" => $temp_user_id,
                        "user_id" => $user_id,
                        "total_price" => $quantity*$price[$key],
                        "variation" => '',
                    ];
                }
            }
            Cart::insert($results);
        // }

        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
            $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
        } else {
            // $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
            $sumcartamount = Cart::where('temp_user_id',$temp_user_id)->sum('total_price');
        }
        return array(
            'status' => 'Added To Cart!',
            'cart_count' => count($carts),
            'sum_cart_count' => $sumcartamount,
            'nav_cart_view' => view('frontend.partials.cart')->render(),
            'bought_together' => view('frontend.partials.bought_together')->render(),
        );

    }

    public function storeDeliveryCharge(Request $request)
    {
        // dd($request->all());
        // die;
        // $cartids =  $request->input('cart_id', []);
        // $est_delivery_charge =  $request->input('est_delivery_charge', []);
        // $results = [];

        //     foreach ($request->input('cart_id', []) as $key => $cartid){
        //         $cartupdate = Cart::where('id', $request->cart_id[$key])
        //             ->update([
        //                     'shipping_cost' => $est_delivery_charge[$key],
        //                 ]);


        //     }
            return redirect()->route('checkout.shipping_info');

    }

    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function checkSaveDeliveryCharge(Request $request)
    {

        $address_details = Address::findorFail($request->aid);

        // dd($address_details->pin);
        // die;
        if(auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
            $sumcartamount = Cart::where('user_id',$user_id)->sum('total_price');
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();

        }
        $cc = 0;
        foreach ($carts as $item)
        {
            $seller_details = User::where('id', $item->product->user_id)->first();

            $item_fields = [
                'pickup_postcode' => $seller_details->postal_code,
                'delivery_postcode' => $address_details->pin,
                'cod'=> $item->product->cash_on_delivery,
                'weight' => 3,
            ];

        //    print_r($item_fields);
        //    echo '</br>';

            $data_string = json_encode($item_fields);

            $thisToken   =   getToken();
            $url = $this->url . 'courier/serviceability';
            $headers = array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer ' . $thisToken . ''
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $jsonObj = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);
            $shipping_cost = [];
            if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null') {
            $dataArr = json_decode($jsonObj, true);


            $shipping_cost = $dataArr['data']['available_courier_companies'][0]['cod_charges'];

            // print_r($shipping_cost);
            // print_r('<br>');

            }

            // return false;

            // store shipping cost

            // foreach ($request->input('cart_id', []) as $key => $cartid){
                $cartupdate = Cart::where('id', $item->id)
                    ->update([
                            'shipping_cost' => $shipping_cost,
                        ]);


            // }
            $cc++;
        }


        $addressCount = Address::where('user_id', Auth::user()->id)->count();
        $total_shipping_cost = Cart::where('user_id', Auth::user()->id)->sum('shipping_cost');
        return array(
            'cart_count' => count($carts),
            'shipping_cart_view' => view('frontend.partials.shipping_info_ajax', compact('carts','addressCount'))->render(),
            'total_shipping_cost' => $total_shipping_cost,
        );

    }
}
