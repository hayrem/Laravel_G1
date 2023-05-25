<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Http\Requests\StoreMapRequest;
use App\Http\Requests\UpdateMapRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map = Map::all();
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
}
