<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontBlogController extends Controller
{
    public function allBlogs(){
        $blogs = Blog::where('type',1)->where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        $recent_blogs = Blog::where('type',1)->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        return view('frontend.blog.blogs_listing', compact('blogs','recent_blogs'));
    }
    public function blogDetails($slug){
        $blog = Blog::where('slug',$slug)->first();
        $recent_blogs = Blog::where('type',1)->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        return view("frontend.blog.details", compact('blog','recent_blogs'));
    }
    public function newsMedia()
    {
        $newsmedia = Blog::where('type',2)->where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        $recent_blogs = Blog::where('type',2)->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        return view('frontend.blog.news_media', compact('newsmedia','recent_blogs')); 
    }
    public function newsMediaDetails($slug){
        $news = Blog::where('slug',$slug)->first();
        $recent_blogs = Blog::where('type',2)->where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        return view("frontend.blog.news_media_details", compact('news','recent_blogs'));
    }
}