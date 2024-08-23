<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sitemap;

class SiteMapController extends Controller{

    public function index(Request $request){
        $sort_search = null;
        $sitemaps = Sitemap::orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $sitemaps = $sitemaps->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $sitemaps = $sitemaps->paginate(15);

        return view('backend.sitemaps.index', compact('sitemaps','sort_search'));
    }

    public function create(){
        return view('backend.sitemaps.create');
    }

    public function store(Request $request){
        $sitemap = new Sitemap();
        $sitemap->title = $request->title;
        $sitemap->save();

        flash(translate('Sitemap has been created successfully'))->success();
        if($sitemap)
        {
            return redirect()->route('sitemaps.index');
        }
    }

    public function show($id){

    }

    public function edit($id){
        $sitemap = Sitemap::find($id);
        return view('backend.sitemaps.update', compact('sitemap'));
    }
    
    public function update(Request $request, $id){
        $sitemap = Sitemap::find($id);
        $sitemap->title = $request->title;
        $sitemap->save();

        flash(translate('Sitemap has been created successfully'))->success();
        if($sitemap)
        {
            return redirect()->route('sitemaps.index');
        }
    }

    public function destroy($id){
        Sitemap::find($id)->delete();
        return redirect()->route('sitemaps.index');
    }

    public function sitemap() {
        $sitemaps = Sitemap::all();
        // dd($sitemaps);
        // return view('sitemap_by_controller');
        return response()->view('sitemap_by_controller', [
            'sitemaps' => $sitemaps
        ])->header('Content-Type', 'text/xml');
    }

    public function categoryWiseSitemap(){
        $first_product_categories = \App\Models\Category::select('id', 'parent_id', 'name', 'slug')
            ->where('type', 1)->where('level', 0)->get();
        $second_product_categories = \App\Models\Category::select('id', 'parent_id', 'name', 'slug')
            ->where('type', 1)->where('level', 1)->get();
        $third_product_categories = \App\Models\Category::select('id', 'parent_id', 'name', 'slug')
            ->where('type', 1)->where('level', 2)->get();

        $first_service_categories = \App\Models\Category::select('id', 'parent_id', 'name', 'slug')
            ->where('type', 2)->where('level', 0)->get();
        $second_service_categories = \App\Models\Category::select('id', 'parent_id', 'name', 'slug')
            ->where('type', 2)->where('level', 1)->get();
        $third_service_categories = \App\Models\Category::select('id', 'parent_id', 'name', 'slug')
            ->where('type', 2)->where('level', 2)->get();

        
        $data = [
            'first_product_categories' => $first_product_categories,
            'second_product_categories' => $second_product_categories,
            'third_product_categories' => $third_product_categories,
            
            'first_service_categories' => $first_service_categories,
            'second_service_categories' => $second_service_categories,
            'third_service_categories' => $third_service_categories,
        ];
        return view('frontend.sitemap.sitemap_link', $data);

    }

}