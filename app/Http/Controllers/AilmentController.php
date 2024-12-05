<?php

namespace App\Http\Controllers;

use App\Models\Ailment;
use App\Http\Requests\StoreAilmentRequest;
use App\Http\Requests\UpdateAilmentRequest;

class AilmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ailments = Ailment::all();
        return response()->json(['message' => 'Ailment fetch successfully', 'data' => $ailments], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAilmentRequest $request)
    {
        $request->validated();
        $ailment = Ailment::create($request->all());
        return response()->json(['message' => 'Ailment created successfully', 'data' => $ailment], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ailment $ailment)
    {
        return response()->json(['message' => 'Ailment fetch successfully', 'data' => $ailment], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAilmentRequest $request, Ailment $ailment)
    {
        $request->validated();
        $ailment->update($request->all());
        return response()->json(['message' => 'Ailment updated successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ailment $ailment)
    {
        $ailment->delete();
        return response()->json(['message' => 'Ailment deleted successfully'], 201);
    }
}
