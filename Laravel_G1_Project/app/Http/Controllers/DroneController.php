<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use App\Models\Location;
use App\Http\Requests\StoreDroneRequest;
use App\Http\Requests\UpdateDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['Message' => 'Here is all the drones', 'Drone' => $drone], 200);

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'drone_id' => 'required|string',
            'type_of_drone' => 'required|string',
            'battery' => 'required',
            'payload_capacity' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $drone = Drone::create($request->all());
        return response()->json(['Message' => 'drone successfully created!', 'Drone' => $drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['Message' => 'Here is the drone', 'Drone' => $drone], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drone $drone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $drone = drone::where('drone_id', $id)->first();
        $drone->update([
            'drone_id' => request('drone_id'),
            'type_of_drone' => request('type_of_drone'),
            'battery' => request('battery'),
            'payload_capacity' => request('payload_capacity'),
            'date_time' => request('date_time'),
            'location_id' => request('location_id'),
        ]);
        return response()->json(['Message' => 'Drone successfully updated', 'Drone' => $drone], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $drone = Drone::find($id);
        $drone->delete();
        return response()->json(['Message' => 'Drone successfully deleted!'], 200);
    }

    public function getLocationByDroneId($id)
    {
        $drone = Drone::where('drone_id', $id)->first();
        $location_id = $drone->location_id;
        $location = Location::find($location_id);
        $location = new LocationResource($location);
        return response()->json(['Message' => 'Here is the drone', 'Drone' => $location], 200);
    }
    public function droneInfo($id)
    {
        $droneInfo = Drone::where('drone_id', $id)->first();
        return response()->json(['Message' => 'Here is the drone', 'Drone' => $droneInfo], 200);
    }

}
