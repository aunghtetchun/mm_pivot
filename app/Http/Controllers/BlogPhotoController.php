<?php

namespace App\Http\Controllers;

use App\BlogPhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "blog_id" => "required",
            "images"=>"required",
        ]);
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
                $blogPhoto->blog_id=$request->blog_id;
                $blogPhoto->save();
            }
//            return 'success';
            return redirect()->back()->with("toast","Photo Upload Successful");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPhoto  $blogPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPhoto $blogPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPhoto  $blogPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPhoto $blogPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPhoto  $blogPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPhoto $blogPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPhoto  $blogPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPhoto $blogPhoto)
    {
        $blogPhoto->delete();
        return redirect()->back()->with("toast","Photo Delete Successful");
    }
}
