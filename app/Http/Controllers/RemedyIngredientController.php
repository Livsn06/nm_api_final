<?php

namespace App\Http\Controllers;

use App\Models\RemedyIngredient;
use App\Http\Requests\StoreRemedyIngredientRequest;
use App\Http\Requests\UpdateRemedyIngredientRequest;

class RemedyIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remedyIngredients = RemedyIngredient::all();
        return response()->json(['message' => 'RemedyIngredient fetch successfully', 'data' => $remedyIngredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemedyIngredientRequest $request)
    {
        $request->validated();
        $remedyIngredient = RemedyIngredient::create($request->all());
        return response()->json(['message' => 'RemedyIngredient created successfully', 'data' => $remedyIngredient]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RemedyIngredient $remedyIngredient)
    {
        return response()->json(['message' => 'RemedyIngredient fetch successfully', 'data' => $remedyIngredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRemedyIngredientRequest $request, RemedyIngredient $remedyIngredient)
    {
        $request->validated();
        $remedyIngredient->update($request->all());
        return response()->json(['message' => 'RemedyIngredient updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemedyIngredient $remedyIngredient)
    {
        $remedyIngredient->delete();
        return response()->json(['message' => 'RemedyIngredient deleted successfully']);
    }
}
