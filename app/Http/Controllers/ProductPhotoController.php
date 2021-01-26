<?php

namespace App\Http\Controllers;

use App\ProductPhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductPhotoController extends Controller
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
            "product_id" => "required",
            "images"=>"required",
        ]);
        if ($request->hasFile('images')){
            $dir="public/product";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_product.".$image->getClientOriginalExtension();
                $image->storeAs($dir,$newName);

                $image_resize = Image::make(public_path()."/storage/product/".$newName);
                $image_resize->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                } );
//                return $image_resize->response('png');
                $image_resize->save(public_path('storage/thumbnail/' .$newName));

                $productPhoto=new ProductPhoto();
                $productPhoto->patch=$newName;
                $productPhoto->product_id=$request->product_id;
                $productPhoto->save();
            }
//            return 'success';
            return redirect()->back()->with("toast","Photo Upload Successful");

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductPhoto  $productPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPhoto $productPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPhoto  $productPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPhoto $productPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPhoto  $productPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPhoto $productPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPhoto  $productPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPhoto $productPhoto)
    {
        $productPhoto->delete();
        return redirect()->back()->with("toast","Photo Delete Successful");
    }
}
