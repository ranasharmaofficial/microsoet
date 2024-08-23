<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryTranslation;
use App\Utility\CategoryUtility;
use Illuminate\Support\Str;
use Cache;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $categories = Category::orderBy('id', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');
        }
        $categories = $categories->paginate(15);
        return view('backend.product.categories.index', compact('categories', 'sort_search'));
    }

    public function getCategoryName(Request $request){
        $typeid = $request->post('type');
        $categoryde = Category::where('type', $typeid)->orderBy('order_level', 'desc')->get();
        return $categoryde;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->get();
        $product_categories = Category::where('type','=','1')->where('parent_id', 0)->get();
        $service_categories = Category::where('type','=','2')->where('parent_id', 0)->get();
        return view('backend.product.categories.create', compact('categories','product_categories','service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->order_level = 0;
        if($request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->type = $request->type;
        $category->digital = $request->digital;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->short_description = $request->short_description;
        $category->page_wise_banner = $request->page_wise_banner;
        $category->home_image = $request->home_image;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        if($request->type == 2){
            if($request->is_form_field == 1){
                $category->is_form_field = 1;
                $category->form_fields = implode(",",$request->form_fields);
            }else{
                $category->is_form_field = 0;
                $category->form_fields = NULL;
            }
        }

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }

        if ($request->parent_id1 != "0") {
            $category->parent_id = $request->parent_id1;

            $parent = Category::find($request->parent_id1);
            $category->level = $parent->level + 1 ;
        }

        if ($request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if ($request->commision_rate != null) {
            $category->commision_rate = $request->commision_rate;
        }

        $category->save();

        $category->attributes()->sync($request->filtering_attributes);

        $category_translation = CategoryTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'category_id' => $category->id]);
        $category_translation->name = $request->name;
        $category_translation->save();

        flash(translate('Category has been inserted successfully'))->success();
        return redirect()->back();
        // return redirect()->back->route('categories.index');
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
    public function edit(Request $request, $id)
    {
        $lang = $request->lang;
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->whereNotIn('id', CategoryUtility::children_ids($category->id, true))->where('id', '!=' , $category->id)
            ->orderBy('name','asc')
            ->get();

        return view('backend.product.categories.edit', compact('category', 'categories', 'lang'));
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
        $category = Category::findOrFail($id);
        if($request->lang == env("DEFAULT_LANGUAGE")){
            $category->name = $request->name;
        }
        if($request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->type = $request->type;
        $category->digital = $request->digital;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->short_description = $request->short_description;
        $category->page_wise_banner = $request->page_wise_banner;
        $category->home_image = $request->home_image;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        if($request->type == 2){
            if($request->is_form_field == 1){
                $category->is_form_field = 1;
                $category->form_fields = implode(",",$request->form_fields);
            }else{
                $category->is_form_field = 0;
                $category->form_fields = NULL;
            }
        }
        
        $previous_level = $category->level;
        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }else{
            $category->parent_id = 0;
            $category->level = 0;
        }

        if($category->level > $previous_level){
            CategoryUtility::move_level_down($category->id);
        }
        elseif ($category->level < $previous_level) {
            CategoryUtility::move_level_up($category->id);
        }

        if ($request->slug != null) {
            $category->slug = strtolower($request->slug);
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }


        if ($request->commision_rate != null) {
            $category->commision_rate = $request->commision_rate;
        }

        $category->save();

        $category->attributes()->sync($request->filtering_attributes);

        $category_translation = CategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);
        $category_translation->name = $request->name;
        $category_translation->save();

        Cache::forget('featured_categories');
        flash(translate('Category has been updated successfully'))->success();
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
        $category = Category::findOrFail($id);
        $category->attributes()->detach();

        // Category Translations Delete
        foreach ($category->category_translations as $key => $category_translation) {
            $category_translation->delete();
        }

        foreach (Product::where('category_id', $category->id)->get() as $product) {
            $product->category_id = null;
            $product->save();
        }

        CategoryUtility::delete_category($id);
        Cache::forget('featured_categories');

        flash(translate('Category has been deleted successfully'))->success();
        return redirect()->route('categories.index');
    }

    public function updateFeatured(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->featured = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }

    public function addCategory(){
        $parentcategorylist =Category::where('type', 1)->where('parent_id', 0)->orderBy('order_level', 'ASC')->get();
        return view('backend.product.categories.addcategories',compact('parentcategorylist'));
    }
    public static function getSubCategoriesName(Request $request){
        $subcategory_names = Category::where('parent_id', $request->post('parent_id'))->get();
        return $subcategory_names;
    }
    public static function getFirstCatOrderLevel(Request $request){
        $first_order_level = Category::select('id', 'order_level')->where('id', $request->post('parent_id'))->first();
        $second_order_level_list = Category::select('id', 'order_level')->where('parent_id', $request->post('parent_id'))->orderBy('order_level', 'DESC')->get();
        $latest_second_order_level = Category::select('order_level')->where('parent_id', $request->post('parent_id'))->orderBy('order_level', 'DESC')->first();
        
        // for($latest_second_order_level->order_level; $latest_second_order_level->order_level > 0; $latest_second_order_level->order_level--){
            
            
        //     foreach($second_order_level_list as $second_order_level){
        //         if($latest_second_order_level->order_level == $second_order_level->order_level){
        //             disabled
        //         }else{
        //            checkbox
        //         }
        //     }
        // }

       
        
        $data = [
            'first_order_level' => $first_order_level,
            'second_order_level_list' => $second_order_level_list,
            'latest_second_order_level' => $latest_second_order_level->order_level,
            'next_available_second_order' => $latest_second_order_level->order_level+1,
        ];
        return $data;
    }
    
     public static function getSecondCatOrderLevel(Request $request){
        $order_level = Category::where('id', $request->post('subcategory_id'))->first();
        return $order_level;
    }
    public function categorylist(Request $request){
        DB::enableQueryLog();
        $sort_search =null;
        $categories = Category::orderBy('order_level', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');
        }
        // dd($request->parent_id);
        if($request->parent_id_one==0)
        {
            // if($request->has('parent_id')){
                $categories = $categories->where('parent_id', '=', $request->parent_id);
            // }
        }
        else{
            $categories = $categories->where('parent_id', '=', $request->parent_id_one);
        }
        // if($request->has('parent_id')>0){
        //     $categories = $categories->where('parent_id', '=', $request->parent_id_one);
        // }
        
        $categories = $categories->paginate(15);
        // $quries = DB::getQueryLog();
        // dd(DB::getQueryLog()); // Show results of log
        $parentcategorylist =Category::where('type', 1)->where('parent_id', 0)->orderBy('order_level', 'ASC')->get();
        return view('backend.product.categories.categorylist', compact('categories', 'sort_search','parentcategorylist'));
        
    }
    public function viewSubcategory()
    {
        return view('backend.product.categories.subcategorylist', compact('subcategories'));
    }
	
}