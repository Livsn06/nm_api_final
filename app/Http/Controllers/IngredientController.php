<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return response()->json(['message' => 'Ingredient fetch successfully', 'data' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
        $request->validated();
        $ingredient = Ingredient::create($request->all());
        return response()->json(['message' => 'Ingredient created successfully', 'data' => $ingredient]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        return response()->json(['message' => 'Ingredient fetch successfully', 'data' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $request->validated();
        $ingredient->update($request->all());
        return response()->json(['message' => 'Ingredient updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response()->json(['message' => 'Ingredient deleted successfully']);
    }
}