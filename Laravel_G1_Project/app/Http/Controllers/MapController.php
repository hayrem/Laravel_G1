<?php

namespace App\Http\Controllers;

use App\Models\{Map,Province,Farm};
// use App\Http\Requests\StoreMapRequest;
// use App\Http\Requests\UpdateMapRequest;
use Illuminate\Http\Request;
use App\Http\Resources\MapResource;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map = Map::all();
        $map = MapResource::collection($map);
        return response()->json(['Message' => 'Here is all the maps', 'map' => $map], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'drone_id' => 'required',
            'farm_id' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $map = Map::create($validator->validated());
        return response()->json(['Message' => 'map successfully created', 'Map' => $map], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $map = Map::find($id);
        return response()->json(['Message' => 'Here is the map', 'map' => $map], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $id)
    {
        $map = Map::find($id);
        $map->update([
            'image' => request('image'),
            'drone_id' => request('drone_id'),
            'farm_id' => request('farm_id'),
        ]);
        return response()->json(['Message' => 'Drone successfully updated', 'Drone' => $map], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $id)
    {
        $map = Map::find($id);
        $map->delete();
        return response()->json(['Message' => 'map successfully deleted!'], 200);

    }

    public function dowloadImage($provice, $id){
        $provinces = Province::where('province', $provice)->first();
        if($provinces != null){
            $province_id = $provinces->id;
            $farm = Farm::where('id', $id)->where('province_id', $province_id)->first();
            if($farm != null){
                $farm_id = $farm->id;
                $map = Map::where('farm_id',$farm_id)->get();
                return response()->json(['Message' => 'This is your request image farm', 'Image' => $map], 200);
            }
            else{
                return response()->json(['Message' => 'Your farm not correct.','data'=>false], 400);
            }
        }
        else{
            return response()->json(['Message' => 'Province not correct.','data'=>false], 400);
        }
    }
    public function deleteImage($provice,$id){
        $provinces = Province::where('province', $provice)->first();
        if($provinces != null){
            $province_id = $provinces->id;
            $farm = Farm::where('id', $id)->where('province_id', $province_id)->first();
            if($farm != null){
                $farm_id = $farm->id;
                $map = Map::where('farm_id',$farm_id)->delete();
                return response()->json(['Message' => 'Delete success'], 200);
            }
            else{
                return response()->json(['Message' => 'Your farm not correct.','data'=>false], 400);
            }
        }
        else{
            return response()->json(['Message' => 'Province not correct.','data'=>false], 400);
        }
    }
    public function addNewMap(Request $request, $pro,$id){
        $farm = Farm::find($id);
        if ($farm != null){
            $province_id = $farm->province_id;
            $provinces = Province::find($province_id);
            if($provinces->province == $pro){
                $validator = Validator::make($request->all(), [
                    'image' => 'required',
                    'drone_id' => 'required',
                ]);
                if($validator->fails()) {
                    return $validator->errors();
                }
                Map::insert([
                    'image' => request('image'),
                    'drone_id' => request('drone_id'),
                    'farm_id' => $farm->id,
                ]);
                return response()->json(['Message' => 'map successfully created'], 200);
            }
            else{
                return response()->json(['Message' => 'Province not match with plane Id.','data'=>false], 400);
            }
            $provinces = Province::where('province',$province);
        }else{
            return response()->json(['Message' => 'Cannot find farm','data'=>false], 400);

        }
    }
}
