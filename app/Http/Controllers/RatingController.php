<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\User;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rating = Rating::with('user')->get();
        return response()->json(['message' => 'Rating fetch successfully', 'data' => $rating]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request)
    {
        $request->validated();
        $rating = Rating::create($request->all());
        return response()->json(['message' => 'Rating created successfully', 'data' => $rating]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        return response()->json(['message' => 'Rating fetch successfully', 'data' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $request->validated();
        $rating->update($request->all());
        return response()->json(['message' => 'Rating updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();
        return response()->json(['message' => 'Rating deleted successfully']);
    }


    static function getRating($ratings)
    {

        $data = $ratings->map(function ($rating) {

            return [
                'id' => $rating->id,
                'rate' => $rating->rate,
                'users' => UserController::getUserByID($rating->user_id),
            ];
        });
        return  $data;
    }

    static function getAverageRating($ratings)
    {
        $data = $ratings->map(function ($rating) {
            return $rating->rate;
        });
        return  $data->avg();
    }
}
