<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_wise_brand;
use App\Models\Category_wise_offer;
use App\Models\HomeCategorySection;
class WebsiteController extends Controller
{
	public function header(Request $request)
	{
		return view('backend.website_settings.header');
	}
	public function footer(Request $request)
	{	
		$lang = $request->lang;
		return view('backend.website_settings.footer', compact('lang'));
	}
	public function pages(Request $request)
	{
		return view('backend.website_settings.pages.index');
	}
	public function appearance(Request $request)
	{
		return view('backend.website_settings.appearance');
	}
	public function addCategoryWiseBrands()
	{
		return view('backend.website_settings.category_wise_brands.create');
	}
	public function uploadCatWiseBrands(Request $request)
	{
		$request->validate([
            'category_id'=>'required',
            'brand_id'=>'required|max:16',
            'title'=>'required',
            'url'=>'required',
        ]);
       
        $addcard = Category_wise_brand::create([
           "category_id" => "$request->category_id",
            "brand_id" => "$request->brand_id",
            "title" => "$request->title",
            "url" => "$request->url",
            "image" => "$request->thumbnail_img",
        ]);
        if ($addcard) {
			flash(translate('Category wise Brand has been inserted successfully!'))->success();
            return redirect()->back();
        }
		
    }
	public function edit_cat_wise(Request $request, $id)
     {
        $catwisebrandid = Category_wise_brand::findOrFail($id);
        return view('backend.website_settings.category_wise_brands.edit_cat',compact('catwisebrandid'));
        
     }
	public function editcatwisebrand(Request $request){
	
       $editdetails = Category_wise_brand::where('id', $request->cid)
                            ->update([
                                    'category_id' => $request->category_id,
                                    'brand_id' => $request->brand_id,
                                    'title' => $request->title,
                                    'image' => $request->image,
                                    'url' => $request->url,
                                ]);
        if ($editdetails) {
            flash(translate('Updated Successfully!'))->success();
            return redirect()->back();
        }
        
	}
	public function categoryWiseBrandList()
	{
		$catwisebrandlist = Category_wise_brand::get();
		return view('backend.website_settings.category_wise_brands.list', compact('catwisebrandlist'));
	}
	public function addCategoryWiseOffers()
	{
		return view('backend.website_settings.category_wise_offers.create');
	}
	public function categoryWiseOfferList()
	{
		$catwiseofferlist = Category_wise_offer::get();
		return view('backend.website_settings.category_wise_offers.list', compact('catwiseofferlist'));
	}
	public function editCatOffer(Request $request, $id)
     {
        $catwiseofferid = Category_wise_offer::findOrFail($id);
        return view('backend.website_settings.category_wise_offers.edit_cat_offer',compact('catwiseofferid'));
        
     }
	 public function uploadCatWiseOffer(Request $request){
		$request->validate([
            'category_id'=>'required',
            'banner'=>'required',
            'slug_url'=>'required',
        ]);
       
        $addoffer = Category_wise_offer::create([
           "category_id" => "$request->category_id",
            "banner" => "$request->banner",
            "slug_url" => "$request->slug_url",
            
        ]);
        if ($addoffer) {
			flash(translate('Offer Uploaded Successfully!'))->success();
            return redirect()->back();
        }
	 }
     public function edit_cat_offer(Request $request){
        $editdetails = Category_wise_offer::where('id', $request->cid)
                            ->update([
                                    'category_id' => $request->category_id,
                                    'banner' => $request->banner,
                                    'slug_url' => $request->slug_url,
                                ]);
        if ($editdetails) {
            flash(translate('Updated Successfully!'))->success();
            return redirect()->back();
        }
     }
     public function destroycatbrand($id)
    {
         Category_wise_brand::destroy($id);
        flash(translate('Deleted successfully'))->success();
        return redirect()->route('website.cat-wise-brand-list');

    }
    public function destroycatoffer($id)
    {
        category_wise_offer::destroy($id);
        flash(translate('Deleted successfully'))->success();
        return redirect()->route('website.cat-wise-offer-list');

    }
    public function homeCatSectionList(){
        $homecatSectionLists = HomeCategorySection::paginate(15);
		return view('backend.website_settings.home_category_section.list', compact('homecatSectionLists'));
    }
    public function addHomeCatSectionList(){
        return view('backend.website_settings.home_category_section.create');
    }
    public function uploadHomeCategorySection(Request $request){
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'category_attribute'=>'required',
            'slug_url'=>'required',
        ]);
       
        $addoffer = HomeCategorySection::create([
           "category_attribute" => "$request->category_attribute",
            "title" => "$request->title",
            "image" => "$request->image",
            "slug_url" => "$request->slug_url",
            
        ]);
        if ($addoffer) {
			flash(translate('Uploaded Successfully!'))->success();
            return redirect()->back();
        }
    }
    public function destroyHomeCatSection($id)
    {
        HomeCategorySection::destroy($id);
        flash(translate('Deleted successfully'))->success();
        return redirect()->route('website.home-category-section');

    }
    public function editHomeCatSection(Request $request, $id)
     {
        $homecatsec = HomeCategorySection::findOrFail($id);
        return view('backend.website_settings.home_category_section.edit',compact('homecatsec'));
        
     }
     public function updatehomeCatSection(Request $request){
        $editdetails = HomeCategorySection::where('id', $request->cid)
        ->update([
                'category_attribute' => $request->category_attribute,
                'image' => $request->image,
                'slug_url' => $request->slug_url,
                'title' => $request->title,
            ]);
            if ($editdetails) {
            flash(translate('Updated Successfully!'))->success();
            return redirect()->back();
            }
     }
    
}