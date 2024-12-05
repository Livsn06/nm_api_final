<?php

namespace App\Http\Controllers;

use App\Models\PlantLike;
use App\Http\Requests\StorePlantLikeRequest;
use App\Http\Requests\UpdatePlantLikeRequest;

class PlantLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantLike = PlantLike::all();
        return response()->json(['message' => 'PlantLike fetch successfully', 'data' => $plantLike]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantLikeRequest $request)
    {
        $request->validated();
        $plantLike = PlantLike::create($request->all());
        return response()->json(['message' => 'PlantLike created successfully', 'data' => $plantLike]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantLike $plantLike)
    {
        return response()->json(['message' => 'PlantLike fetch successfully', 'data' => $plantLike]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantLikeRequest $request, PlantLike $plantLike)
    {
        $request->validated();
        $plantLike->update($request->all());
        return response()->json(['message' => 'PlantLike updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantLike $plantLike)
    {
        $plantLike->delete();
        return response()->json(['message' => 'PlantLike deleted successfully']);
    }
}
