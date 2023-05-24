<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $province = Province::all();
        return response()->json(['Message' => 'Here is all the provinces', 'Province' => $province], 200);
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
            'province' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $province = Province::create($validator->validated());
        return response()->json(['Message' => 'Province successfully created', 'Province' => $province], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $province = Province::find($id);
        return response()->json(['Message' => 'Here is the province', 'Province' => $province], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $province = Province::find($id);
        $province->update([
            'province' => request('province')
        ]);
        return response()->json(['Message' => 'Province successfully updated', 'Province' => $province], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $id)
    {
        $province = Province::find($id);
        $province->delete();
        return response()->json(['Message' => 'Province successfully deleted!'], 200);
    }
}
