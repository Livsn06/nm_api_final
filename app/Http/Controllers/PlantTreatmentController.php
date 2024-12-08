<?php

namespace App\Http\Controllers;

use App\Models\PlantTreatment;
use App\Http\Requests\StorePlantTreatmentRequest;
use App\Http\Requests\UpdatePlantTreatmentRequest;

class PlantTreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantTreatments = PlantTreatment::all();

        return response()->json(['message' => 'PlantTreatment fetch successfully', 'data' => $plantTreatments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantTreatmentRequest $request)
    {
        $request->validated();
        $plantTreatment = PlantTreatment::create($request->all());
        return response()->json(['message' => 'PlantTreatment created successfully', 'data' => $plantTreatment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantTreatment $plantTreatment)
    {
        return response()->json(['message' => 'PlantTreatment fetch successfully', 'data' => $plantTreatment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantTreatmentRequest $request, PlantTreatment $plantTreatment)
    {
        $request->validated();
        $plantTreatment->update($request->all());
        return response()->json(['message' => 'PlantTreatment updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantTreatment $plantTreatment)
    {
        $plantTreatment->delete();
        return response()->json(['message' => 'PlantTreatment deleted successfully']);
    }
}
