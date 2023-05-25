<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Http\Requests\StoreFarmerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateFarmerRequest;
use Illuminate\Support\Facades\Validator;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmer = Farmer::all();
        return response()->json(['Farmer' => $farmer], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $farmer = Farmer::create($validator->validated());
        return response()->json(['message' => 'Successfully created!', 'data' => $farmer], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $farmer = Farmer::find($id);
        return response()->json(['Famer'=>$farmer], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $farmer = Farmer::find($id);
        $farmer->update([
            'name' => request('name'),
            'phone' => request('phone'),
        ]);
        return response()->json(['Message' => 'Successfully updated!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $farmer = Farmer::find($id);
        $farmer->delete();
        return response()->json(['Message' => 'Successfully deleted!'], 200);
    }
}
