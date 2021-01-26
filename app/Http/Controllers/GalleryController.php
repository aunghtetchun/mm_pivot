<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryPhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallery::latest()->get();
        return view('gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
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
            "group"=> "required",
            "images"=>"required",
            "description"=>"required",
        ]);
        $gallery=new Gallery();
        $gallery->title=$request->title;
        $gallery->group=$request->group;
        $gallery->description=$request->description;
        $gallery->save();
        if ($request->hasFile('images')){
            $dir="public/gallery";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_gallery.".$image->getClientOriginalExtension();
                $image->storeAs($dir,$newName);

                $image_resize = Image::make(public_path()."/storage/gallery/".$newName);
                $image_resize->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                } );
//                return $image_resize->response('png');
                $image_resize->save(public_path('storage/thumbnail/' .$newName));
                $galleryPhoto=new GalleryPhoto();
                $galleryPhoto->patch=$newName;
                $galleryPhoto->gallery_id=$gallery->id;
                $galleryPhoto->save();
            }
//            return 'success';
        }
        return redirect()->route("gallery.create")->with("toast","Gallery Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('gallery.show',compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            "title" => "required",
            "group"=> "required",
            "description"=>"required",
        ]);
        $gallery->title=$request->title;
        $gallery->group=$request->group;
        $gallery->description=$request->description;
        $gallery->update();
        return redirect()->route("gallery.index")->with("toast","Gallery Updated Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        GalleryPhoto::where('gallery_id',$gallery->id)->delete();
        $gallery->delete();
        return redirect()->route("gallery.index")->with("toast","Gallery Delete Successful");
    }
}
