<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class NewsController extends Controller
{
    public function news(Request $request)
    {
        $sort_search = null;
        $blogs = Blog::where('type',2)->orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $blogs = $blogs->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $blogs = $blogs->paginate(15);
        return view('backend.blog_system.news.index', compact('blogs','sort_search'));
    }
    public function destroynews($id)
    {
        Blog::find($id)->delete();
        return redirect('admin/blog/news');
    }
}