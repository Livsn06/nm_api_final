<?php

namespace App\Http\Controllers;

use App\Models\PlantAddition;
use App\Http\Requests\StorePlantAdditionRequest;
use App\Http\Requests\UpdatePlantAdditionRequest;

class PlantAdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantAddition = PlantAddition::all();
        return response()->json(['message' => 'PlantAddition fetch successfully', 'data' => $plantAddition]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantAdditionRequest $request)
    {
        $request->validated();
        $plantAddition = PlantAddition::create($request->all());
        return response()->json(['message' => 'PlantAddition created successfully', 'data' => $plantAddition]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantAddition $plantAddition)
    {
        return response()->json(['message' => 'PlantAddition fetch successfully', 'data' => $plantAddition]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantAdditionRequest $request, PlantAddition $plantAddition)
    {
        $request->validated();
        $plantAddition->update($request->all());
        return response()->json(['message' => 'PlantAddition updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantAddition $plantAddition)
    {
        $plantAddition->delete();
        return response()->json(['message' => 'PlantAddition deleted successfully']);
    }
}
