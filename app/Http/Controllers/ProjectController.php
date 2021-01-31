<?php

namespace App\Http\Controllers;

use App\Building;
use App\Project;
use App\ProjectPhoto;
use App\Room;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::latest()->get();
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
            "images"=>"required",
            "photo"=>"required"
        ]);
        $project=new Project();
        $project->name=$request->name;
        $preview=Image::make($request->file('photo'));
//            return $preview->response('png');
        $newName = uniqid()."_project.".$request->file('photo')->getClientOriginalExtension();
        $preview->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        } );
        $preview->save(public_path('storage/preview/' .$newName));
        $project->photo=$newName;
        $project->save();
        if ($request->hasFile('images')){

            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_project.".$image->getClientOriginalExtension();
//                $image->storeAs($dir,$newName);

                $image_resize = Image::make($image);
                $image_resize->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                } );
//                return $image_resize->response('png');
                $image_resize->save(public_path('storage/project/' .$newName));
                $projectPhoto=new ProjectPhoto();
                $projectPhoto->patch=$newName;
                $projectPhoto->project_id=$project->id;
                $projectPhoto->save();
            }
//            return 'success';
        }
        return redirect()->route("building.create")->with( ['p_id' => $project->id] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            "name" => "required",
        ]);
        $project->name=$request->name;
        if ($request->file('photo')){
            $preview=Image::make($request->file('photo'));
//            return $preview->response('png');
            $newName = uniqid()."_project.".$request->file('photo')->getClientOriginalExtension();
            $preview->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            } );
        }
        $project->update();
        return redirect()->route("project.index")->with("toast","Project Updated Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
//        ProjectPhoto::where('project_id',$project->id)->delete();
//        $building=Building::where('project_id',$project->id)->get();
//        Room::
//        $project->delete();
//        return redirect()->route("project.index")->with("toast","Project Delete Successful");
    }
}
