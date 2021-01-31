<?php

namespace App\Http\Controllers;

use App\Building;
use App\ProjectPhoto;
use App\Room;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings=Building::latest()->get();
        return view('building.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.create');
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
            "project_id" => "required",
            "floor"=>"required",
            "b_column"=>"required",
//            "bardar"=>"required",
            "images"=>"required",
            "photo"=>"required"
        ]);
        $building=new Building();
        $building->project_id=$request->project_id;
        $building->floor=$request->floor;
        $building->b_column=$request->b_column;
        if (isset($request->information)){
            $building->information=$request->information;
        }
        if (isset($request->condition)){
            $building->condition=$request->condition;
        }
        if ($request->bardar=='on'){
            $building->bardar='1';
        }
        $preview=Image::make($request->file('photo'));
//            return $preview->response('png');
        $newName = uniqid()."_building.".$request->file('photo')->getClientOriginalExtension();
        $preview->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        } );
        $preview->save(public_path('storage/preview/' .$newName));
        $building->photo=$newName;
        $building->save();

        if ($request->hasFile('images')){

            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_building.".$image->getClientOriginalExtension();
//                $image->storeAs($dir,$newName);

                $image_resize = Image::make($image);
                $image_resize->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                } );
//                return $image_resize->response('png');
                $image_resize->save(public_path('storage/building/' .$newName));
                $buildingPhoto=new ProjectPhoto();
                $buildingPhoto->patch=$newName;
                $buildingPhoto->building_id=$building->id;
                $buildingPhoto->save();
            }
//            return 'success';
        }
        if ($building->bardar==1){
            $room=new Room();
            $room->building_id=$building->id;
            $room->room_number='Bardar';
            $room->save();
        }
        $total=$building->floor*$building->b_column;

        for ($i=1; $i<=$total; $i++){
            $room=new Room();
            $room->building_id=$building->id;
            $room->room_number='R'.$i;
            $room->save();
        }
        return redirect()->route("building.show",$building->id)->with("toast","Building Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        return view('building.show',compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('building.edit',compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $request->validate([
            "project_id" => "required",
            "floor"=>"required",
            "b_column"=>"required",
//            "photo"=>"required",
        ]);
        $building->project_id=$request->project_id;
        $building->floor=$request->floor;
        $building->b_column=$request->b_column;
        if ($request->file('photo')){
            $preview=Image::make($request->file('photo'));
//            return $preview->response('png');
            $newName = uniqid()."_building.".$request->file('photo')->getClientOriginalExtension();
            $preview->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            } );
            $preview->save(public_path('storage/preview/' .$newName));
            $building->photo=$newName;
        }
        if (isset($request->information)){
            $building->information=$request->information;
        }
        if (isset($request->condition)){
            $building->condition=$request->condition;
        }

        if($building->bardar=='1'){
//            return 'hello';
            if(!isset($request->bardar)){
//                return 'great';
                Room::where('building_id',$building->id)->where('room_number','=','Bardar')->delete();
//                return 'success';
                $building->bardar='0';
            }
//            return 'hmm';
        }elseif ($request->bardar=='on'){
            $building->bardar='1';
            $room=new Room();
            $room->building_id=$building->id;
            $room->room_number='Bardar';
            $room->save();
        }

        $building->update();
        $total=$building->floor*$building->b_column;

        $old=Room::where('building_id',$building->id)->count();
        for ($i=$old; $i<$total; $i++){
            $room=new Room();
            $room->building_id=$building->id;
            $room->room_number='R'.$i;
            $room->save();
        }
        return redirect()->route("building.show",$building->id)->with("toast","Building Update Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        ProjectPhoto::where('building_id',$building->id)->delete();
        Room::where('building_id',$building->id)->delete();
        $building->delete();
        return redirect()->route("building.index")->with("toast","Building Delete Successful");
    }
}
