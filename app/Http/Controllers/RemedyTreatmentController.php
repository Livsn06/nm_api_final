<?php

namespace App\Http\Controllers;

use App\Models\RemedyTreatment;
use App\Http\Requests\StoreRemedyTreatmentRequest;
use App\Http\Requests\UpdateRemedyTreatmentRequest;

class RemedyTreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remedyTreatments = RemedyTreatment::all();
        return response()->json(['message' => 'RemedyTreatment fetch successfully', 'data' => $remedyTreatments], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemedyTreatmentRequest $request)
    {
        $request->validated();
        $remedyTreatment = RemedyTreatment::create($request->all());
        return response()->json(['message' => 'RemedyTreatment created successfully', 'data' => $remedyTreatment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RemedyTreatment $remedyTreatment)
    {
        return response()->json(['message' => 'RemedyTreatment fetch successfully', 'data' => $remedyTreatment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRemedyTreatmentRequest $request, RemedyTreatment $remedyTreatment)
    {
        $request->validated();
        $remedyTreatment->update($request->all());
        return response()->json(['message' => 'RemedyTreatment updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemedyTreatment $remedyTreatment)
    {
        $remedyTreatment->delete();
        return response()->json(['message' => 'RemedyTreatment deleted successfully']);
    }
}
