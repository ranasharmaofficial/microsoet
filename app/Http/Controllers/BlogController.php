<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $blogs = Blog::where('type',1)->orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $blogs = $blogs->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $blogs = $blogs->paginate(15);

        return view('backend.blog_system.blog.index', compact('blogs','sort_search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view('backend.blog_system.blog.create', compact('blog_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $blog = new Blog;
        
        $blog->type = $request->type;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->banner = $request->banner;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        
        $blog->meta_title = $request->meta_title;
        $blog->meta_img = $request->meta_img;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        
        $blog->save();

        flash(translate('Blog post has been created successfully'))->success();
        if($request->type=='1')
        {
            return redirect()->route('blog.index');
        }
        else{
            return redirect()->route('blog.news');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        // dd($blog);
        $blog_categories = BlogCategory::all();
        
        return view('backend.blog_system.blog.edit', compact('blog','blog_categories'));
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
        $request->validate([
            'title' => 'required|max:255',
        ]);
        // dd($request->all());
        $blog = Blog::find($id);
        // dd($blog);
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->banner = $request->banner;
        $blog->type = $request->type;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        
        $blog->meta_title = $request->meta_title;
        $blog->meta_img = $request->meta_img;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        
        $blog->save();

        flash(translate('Blog post has been updated successfully'))->success();
        return redirect()->route('blog.index');
    }
    
    public function change_status(Request $request) {
        $blog = Blog::find($request->id);
        $blog->status = $request->status;
        
        $blog->save();
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        
        return redirect('admin/blogs');
    }
    public function blog_details($slug) {
        $blog = Blog::where('slug', $slug)->first();
        return view("frontend.blog.details", compact('blog'));
    }
}