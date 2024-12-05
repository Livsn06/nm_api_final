<?php

namespace App\Http\Controllers;

use App\Models\RemedyPlant;
use App\Http\Requests\StoreRemedyPlantRequest;
use App\Http\Requests\UpdateRemedyPlantRequest;

class RemedyPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remedyPlants = RemedyPlant::with('remedy', 'plant')->get();
        return response()->json(['message' => 'RemedyPlant fetch successfully', 'data' => $remedyPlants]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemedyPlantRequest $request)
    {
        $request->validated();
        $remedyPlant = RemedyPlant::create($request->all());
        return response()->json(['message' => 'RemedyPlant created successfully', 'data' => $remedyPlant]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RemedyPlant $remedyPlant)
    {
        return response()->json(['message' => 'RemedyPlant fetch successfully', 'data' => $remedyPlant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRemedyPlantRequest $request, RemedyPlant $remedyPlant)
    {
        $request->validated();
        $remedyPlant->update($request->all());
        return response()->json(['message' => 'RemedyPlant updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemedyPlant $remedyPlant)
    {
        $remedyPlant->delete();
        return response()->json(['message' => 'RemedyPlant deleted successfully']);
    }
}
