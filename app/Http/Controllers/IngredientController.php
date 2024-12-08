<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;

use function PHPSTORM_META\map;

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



    static function getRemedyIngredients($ingredients)
    {
        // "remedy_ingredients": [
        //         {
        //             "id": 1,
        //             "remedy_id": 1,
        //             "ingredient_id": 3,
        //             "description": "add 2 teaspoon of sugar",
        //             "created_at": "2024-12-05T23:18:11.000000Z",
        //             "updated_at": "2024-12-05T23:18:11.000000Z"
        //         },
        //         {
        //             "id": 2,
        //             "remedy_id": 1,
        //             "ingredient_id": 4,
        //             "description": "add pepper based in your taste",
        //             "created_at": "2024-12-05T23:18:14.000000Z",
        //             "updated_at": "2024-12-05T23:18:14.000000Z"
        //         }
        //     ],

        $ingredient = $ingredients->map(function ($ingredient) {
            return IngredientController::getIngredientById($ingredient->ingredient_id);
        });
        return $ingredient;
    }


    static function getIngredientById($id)
    {
        $ingredient = Ingredient::find($id);
        $data = [
            Ingredient::COLUMN_ID => $ingredient->id,
            Ingredient::COLUMN_NAME => $ingredient->name
        ];
        return $data;
    }
}
