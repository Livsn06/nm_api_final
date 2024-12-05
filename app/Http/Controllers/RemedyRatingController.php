<?php

namespace App\Http\Controllers;

use App\Models\RemedyRating;
use App\Http\Requests\StoreRemedyRatingRequest;
use App\Http\Requests\UpdateRemedyRatingRequest;

class RemedyRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remedyRatings = RemedyRating::all();
        return response()->json(['message' => 'RemedyRating fetch successfully', 'data' => $remedyRatings]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemedyRatingRequest $request)
    {
        $request->validated();
        $remedyRating = RemedyRating::create($request->all());
        return response()->json(['message' => 'RemedyRating created successfully', 'data' => $remedyRating]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RemedyRating $remedyRating)
    {
        return response()->json(['message' => 'RemedyRating fetch successfully', 'data' => $remedyRating]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRemedyRatingRequest $request, RemedyRating $remedyRating)
    {
        $request->validated();
        $remedyRating->update($request->all());
        return response()->json(['message' => 'RemedyRating updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RemedyRating $remedyRating)
    {
        $remedyRating->delete();
        return response()->json(['message' => 'RemedyRating deleted successfully']);
    }
}
