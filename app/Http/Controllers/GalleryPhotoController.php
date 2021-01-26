<?php

namespace App\Http\Controllers;

use App\GalleryPhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryPhotoController extends Controller
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
            "gallery_id" => "required",
            "images"=>"required",
        ]);
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
                $galleryPhoto->gallery_id=$request->gallery_id;
                $galleryPhoto->save();
            }
//            return 'success';
            return redirect()->back()->with("toast","Photo Upload Successful");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryPhoto $galleryPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryPhoto $galleryPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryPhoto $galleryPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryPhoto $galleryPhoto)
    {
        $galleryPhoto->delete();
        return redirect()->back()->with("toast","Photo Delete Successful");
    }
}
