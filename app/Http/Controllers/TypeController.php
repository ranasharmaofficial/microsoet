<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Type;


class TypeController extends Controller
{
    
    public function index(Request $request){
        $sort_search =null;
        $types = Type::select('types.id', 'types.name', 'types.icon', 'types.status', 'fc.name as first_cat_name', 'sc.name as second_cat_name', 'tc.name as third_cat_name')
            ->leftJoin('categories as fc', 'types.first_category_id', '=', 'fc.id')
            ->leftJoin('categories as sc', 'types.second_category_id', '=', 'sc.id')
            ->leftJoin('categories as tc', 'types.third_category_id', '=', 'tc.id')
            ->where('types.status', '!=', 2)
            ->orderBy('types.id', 'desc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $types = $types->where('types.name', 'like', '%'.$sort_search.'%');
        }
        $types = $types->paginate(15);
        return view('backend.product.types.index', compact('types', 'sort_search'));
    }

    public function create(){ 
        $categories = Category::where('type','=','2')->where('parent_id', 0)->get();
        return view('backend.product.types.create', compact('categories'));
    }

    public function store(Request $request){
        
        $type = new Type;
        $type->name = $request->name;
        $type->first_category_id = $request->first_category_id;
        $type->second_category_id = $request->second_category_id;
        $type->third_category_id = $request->third_category_id;
        $type->icon = $request->icon;
        $type->status = $request->status;
        $type->save();

        flash(translate('Type has been inserted successfully'))->success();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        $first_categories = Category::where('type','=','2')->where('parent_id', 0)->get();
        $second_categories = Category::select('id', 'name')->where('parent_id', $type->first_category_id)->get();
        $third_categories = Category::select('id', 'name')->where('parent_id', $type->second_category_id)->get();
        return view('backend.product.types.update', compact('type', 'first_categories', 'second_categories', 'third_categories'));
    }

    public function update(Request $request, $id)
    {
        $type= Type::findOrFail($id);
        $type->name = $request->name;
        $type->first_category_id = $request->first_category_id;
        $type->second_category_id = $request->second_category_id;
        $type->third_category_id = $request->third_category_id;
        $type->icon = $request->icon;
        $type->status = $request->status;
        $type->save();
        
        flash(translate('Type has been updated successfully'))->success();
        return back();
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->status = 2;
        $type->save();

        flash(translate('Type has been deleted successfully'))->success();
        return redirect()->route('types.index');
    }

    public function getCategoryWiseType(Request $request){
        $types = Type::select('id','name')->where('third_category_id',$request->categoryid)->where('status', 1)->get();
        return json_encode($types);
    }
}
