<?php

namespace App\Http\Controllers;

use App\ProjectPhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectPhotoController extends Controller
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
//            "project_id" => "required",
            "images"=>"required",
        ]);
        if ($request->hasFile('images')) {

            if ($request->project_id){

                foreach ($request->file('images') as $image) {
                    $newName = uniqid() . "_project.". $image->getClientOriginalExtension();
                    $image_resize = Image::make($image);
                    $image_resize->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
//                return $image_resize->response('png');
                    $image_resize->save(public_path('storage/project/' . $newName));
                    $projectPhoto = new ProjectPhoto();
                    $projectPhoto->patch = $newName;


                    $projectPhoto->project_id = $request->project_id;

                    $projectPhoto->save();
                }
            }elseif ($request->building_id){

                foreach ($request->file('images') as $image) {
                    $newName = uniqid() . "_building.". $image->getClientOriginalExtension();
                    $image_resize = Image::make($image);
                    $image_resize->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
//                return $image_resize->response('png');
                    $image_resize->save(public_path('storage/building/' . $newName));
                    $projectPhoto = new ProjectPhoto();
                    $projectPhoto->patch = $newName;
                    $projectPhoto->building_id = $request->building_id;
                    $projectPhoto->save();
                }
            }
        }
            return redirect()->back()->with("toast","Photo Upload Successful");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectPhoto $projectPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectPhoto $projectPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectPhoto $projectPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectPhoto  $projectPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectPhoto $projectPhoto)
    {
        $projectPhoto->delete();
        return redirect()->back()->with("toast","Photo Delete Successful");
    }
}
