<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Http\Requests\StoreInstructionRequest;
use App\Http\Requests\UpdateInstructionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreInstructionRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'speed' => 'required|string',
            'height' => 'required|string',
            'plan_id' => 'required',
            'drone_id' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $drone = Instruction::create($validator->validated());
        return response()->json(['Message' => 'Instruction successfully created!', 'Drone' => $drone], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Instruction $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instruction $instruction)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instruction $id)
    {
        $instruction = Instruction::find($id);
        $instruction->update([
            'speed' => request('speed'),
            'height' => request('height'),
            'plan_id' => request('plan_id'),
            'drone_id' => request('drone_id'),
        ]);
        return response()->json(['Message' => 'Drone successfully updated', 'Drone' => $instruction], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        //
    }
}
