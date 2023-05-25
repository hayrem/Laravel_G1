<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = Plan::all();
        return response()->json(['Message' => 'Here is all the plans', 'Plan' => $plan], 200);

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
            'plan_name' => 'required|string',
            'date_time' => 'required',
            'farmer_id' => 'required',
            'map_id' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $plan = Plan::create($validator->validated());
        return response()->json(['Message' => 'Plan successfully created!', 'Plan' => $plan], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $id)
    {
        $plan = Plan::find($id);
        return response()->json(['Message' => 'Here is the plan', 'Plan' => $plan], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $plan = Plan::find($id);
        $plan->update([
            'plan_name' => request('plan_name'),
            'date_time' => request('date_time'),
            'farmer_id' => request('farmer_id'),
            'map_id' => request('map_id'),
        ]);
        return response()->json(['Message' => 'Plan successfully updated', 'Plan' => $plan], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return response()->json(['Message' => 'Plan successfully deleted!'], 200);
    }
}
