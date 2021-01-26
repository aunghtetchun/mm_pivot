<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Product;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            "name" => "required",
            "price"=> "required",
            "product_category_id"=>"required",
            "description"=>"required",
            "photo"=>"required",
        ]);
        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->product_category_id=$request->product_category_id;
        $product->description=$request->description;
        if ($request->hasFile('photo')){
                $newName = uniqid()."_product.".$request->file('photo')->getClientOriginalExtension();
                $image_resize = Image::make($request->file('photo'));
                $image_resize->fit( 300, 300);
//                return $image_resize->response('png');
                $image_resize->save(public_path('storage/thumbnail/' .$newName));
                $product->photo=$newName;
            }
        $product->save();
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
                $productPhoto->product_id=$product->id;
                $productPhoto->save();
            }
//            return 'success';
        }
        return redirect()->route("product.create")->with("toast","Product Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => "required",
            "price"=> "required",
            "product_category_id"=>"required",
            "description"=>"required",
            "photo"=>"required"
        ]);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->product_category_id=$request->product_category_id;
        $product->description=$request->description;
        if ($request->hasFile('photo')){
            $newName = uniqid()."_product.".$request->file('photo')->getClientOriginalExtension();
            $image_resize = Image::make($request->file('photo'));
            $image_resize->fit( 300, 300);
//                return $image_resize->response('png');
            $image_resize->save(public_path('storage/thumbnail/' .$newName));
            $product->photo=$newName;
        }
        $product->update();
        return redirect()->route("product.index")->with("toast","Product Update Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        ProductPhoto::where('product_id',$product->id)->delete();
        $product->delete();
        return redirect()->route("product.index")->with("toast","Product Delete Successful");
    }
}
