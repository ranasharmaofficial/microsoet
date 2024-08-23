<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\ProductQuoteEnquiry;
use App\Models\Hire;
use App\Models\Form_data;
use App\Models\CommingSoonRequest;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $enquiry = Enquiry::orderBy('created_at', 'desc');
        if ($request->search != null){
            $enquiry = $enquiry->where('phone', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $enquiry = $enquiry->paginate(15);

        return view('backend.enquiry.category_enquiry.index', compact('enquiry','sort_search'));
    }

   
    public function destroy($id)
    {
        Enquiry::find($id)->delete();
        
        return redirect('admin/enquiry');
    }
    public function hireNowdelete($id)
    {
        Hire::find($id)->delete();
        return redirect('admin/enquiry/hire-now-request');
    }
	
	public function productEnquiry(Request $request)
    {
        $sort_search = null;
        $product_enquiry = ProductQuoteEnquiry::orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $product_enquiry = $product_enquiry->where('phone', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $product_enquiry = $product_enquiry->paginate(15);

        return view('backend.enquiry.product_enquiry.index', compact('product_enquiry','sort_search'));
    }
    public function productEnq()
    {
        $sort_search = null;
        $product_enquiry = ProductQuoteEnquiry::orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $product_enquiry = $product_enquiry->where('phone', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $product_enquiry = $product_enquiry->paginate(15);

        return view('backend.enquiry.product_enquiry.index', compact('product_enquiry','sort_search'));
    }
	public function show($id)
    {
        
    }
    
    public function hireNowRequest(Request $request)
    {
        $sort_search = null;
        $enquiry = Hire::orderBy('created_at', 'desc');
        if ($request->search != null){
            $enquiry = $enquiry->where('mobile', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        $enquiry = $enquiry->paginate(15);
        // dd($enquiry);
        return view('backend.enquiry.hirenow', compact('enquiry','sort_search'));
    }

    public function commonEnquiry(Request $request)
    {
        $sort_search =null;
        $enquiry = Form_data::orderBy('created_at', 'desc');
        if ($request->has('page')){
            $sort_search = $request->page;
            $enquiry = $enquiry->where('form_type', $sort_search);
        }
        $enquiry = $enquiry->paginate(15);
        return view('backend.enquiry.formenquiry', compact('enquiry','sort_search'));
    }
    public function commonEnqdelete($id)
    {
        Form_data::find($id)->delete();
        return redirect('admin/enquiry/common-enquiry');
    }

    // Comming Soon Enquiry 
    public function adminCommingSoonIndex(Request $request)
    {
        $sort_search = null;
        $enquiry = CommingSoonRequest::orderBy('created_at', 'desc');
        if ($request->search != null){
            $enquiry = $enquiry->where('contact', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $enquiry = $enquiry->paginate(15);

        return view('backend.enquiry.comming_soon', compact('enquiry','sort_search'));
    }
   

   
}