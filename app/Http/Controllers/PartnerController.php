<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners=Partner::latest()->get();
        return view('partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner.create');
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
            "name" => "required",
            "photo"=>"required"
        ]);
        $partner=new Partner();
        $partner->name=$request->name;

        if (isset($request->link)){
            $partner->link=$request->link;
        }
        $dir="public/partner";
        if ($request->hasFile('photo')){
            $newName = uniqid()."_partner.".$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs($dir,$newName);

            $image_resize = Image::make(public_path()."/storage/partner/".$newName);
            $image_resize->fit(300, 300);
//                return $image_resize->response('png');
            $image_resize->save(public_path('storage/thumbnail/' .$newName));
            $partner->photo=$newName;
        }
        $partner->save();
        return redirect()->route("partner.create")->with("toast","Partner Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('partner.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('partner.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            "name" => "required",
            "photo"=>"required"
        ]);
        $partner->name=$request->name;

        if (isset($request->link)){
            $partner->link=$request->link;
        }
        $dir="public/partner";
        if ($request->hasFile('photo')){
            $newName = uniqid()."_partner.".$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs($dir,$newName);

            $image_resize = Image::make(public_path()."/storage/partner/".$newName);
            $image_resize->fit(300, 300);
//                return $image_resize->response('png');
            $image_resize->save(public_path('storage/thumbnail/' .$newName));
            $partner->photo=$newName;
        }
        $partner->update();
        return redirect()->route("partner.index")->with("toast","Partner Update Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route("partner.index")->with("toast","Partner Delete Successful");
    }
}
