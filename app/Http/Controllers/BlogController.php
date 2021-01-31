<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\BlogPhoto;
use App\Category;
use App\Custom;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::latest()->get();
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            "title" => "required",
            "blog_category_id"=>"required",
            "description"=>"required",
            "images"=>"required"
        ]);
        $blog=new Blog();
        $blog->title=$request->title;
        $blog->blog_category_id=$request->blog_category_id;
        $blog->description=$request->description;
        $blog->excert=Custom::toShort($blog->description,105) ;
        $blog->slug=Custom::create_slug($blog->title,15) ;
//        return Custom::toShort($blog->description,105);
        $blog->save();
        if ($request->hasFile('images')){
            $dir="public/blog";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_blog.".$image->getClientOriginalExtension();
                $image->storeAs($dir,$newName);

                $image_resize = Image::make(public_path()."/storage/blog/".$newName);
                $image_resize->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                } );
//                return $image_resize->response('png');
                $image_resize->save(public_path('storage/thumbnail/' .$newName));

                $blogPhoto=new BlogPhoto();
                $blogPhoto->patch=$newName;
                $blogPhoto->blog_id=$blog->id;
                $blogPhoto->save();
            }
//            return 'success';

        }
        return redirect()->route("blog.create")->with("toast","Blog Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        $request->validate([
            "title" => "required",
            "blog_category_id"=>"required",
            "description"=>"required",
        ]);
        $blog->title=$request->title;
        $blog->blog_category_id=$request->blog_category_id;
        $blog->description=$request->description;
        $blog->excert=Custom::toShort($blog->description,105) ;
        $blog->slug=Custom::create_slug($blog->title,15) ;
//        return $blog;
        $blog->update();

        return redirect()->route("blog.index")->with("toast","Blog Update Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        BlogPhoto::where('blog_id',$blog->id)->delete();
        $blog->delete();
        return redirect()->route("blog.index")->with("toast","Blog Delete Successful");
    }
}
