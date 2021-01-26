<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::latest()->get();
        return view('team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
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
            "position"=> "required",
//            "facebook"=> "required",
//            "twitter"=> "required",
//            "google"=> "required",
//            "linkedin"=>"required",
            "photo"=>"required"
        ]);
        $team=new Team();
        $team->name=$request->name;
        $team->position=$request->position;

        if (isset($request->facebook)){
            $team->facebook=$request->facebook;
        }
        if (isset($request->twitter)){
            $team->twitter=$request->twitter;
        }
        if (isset($request->google)){
            $team->google=$request->google;
        }
        if (isset($request->linkedin)){
            $team->linkedin=$request->linkedin;
        }
        $dir="public/team";
        if ($request->hasFile('photo')){
            $newName = uniqid()."_team.".$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs($dir,$newName);

            $image_resize = Image::make(public_path()."/storage/team/".$newName);
            $image_resize->fit(300, 300);
//                return $image_resize->response('png');
            $image_resize->save(public_path('storage/thumbnail/' .$newName));
            $team->photo=$newName;
        }
        $team->save();
        return redirect()->route("team.create")->with("toast","Team Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            "name" => "required",
            "position"=> "required",
//            "facebook"=> "required",
//            "twitter"=> "required",
//            "google"=> "required",
//            "linkedin"=>"required",
            "photo"=>"required"
        ]);
        $team->name=$request->name;
        $team->position=$request->position;

        if (isset($request->facebook)){
            $team->facebook=$request->facebook;
        }
        if (isset($request->twitter)){
            $team->twitter=$request->twitter;
        }
        if (isset($request->google)){
            $team->google=$request->google;
        }
        if (isset($request->linkedin)){
            $team->linkedin=$request->linkedin;
        }
        $dir="public/team";
        if ($request->hasFile('photo')){
            $newName = uniqid()."_team.".$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs($dir,$newName);

            $image_resize = Image::make(public_path()."/storage/team/".$newName);
            $image_resize->fit(300, 300);
//                return $image_resize->response('png');
            $image_resize->save(public_path('storage/thumbnail/' .$newName));
            $team->photo=$newName;
        }
        $team->update();
        return redirect()->route("team.index")->with("toast","Team Updated Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route("team.index")->with("toast","Team Delete Successful");
    }
}
