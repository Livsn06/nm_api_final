<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likes = Like::with('user')->get();
        return response()->json(['message' => 'Like fetch successfully', 'data' => $likes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLikeRequest $request)
    {
        $request->validated();
        $like = Like::create($request->all());
        return response()->json(['message' => 'Like created successfully', 'data' => $like]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        return response()->json(['message' => 'Like fetch successfully', 'data' => $like]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        $request->validated();
        $like->update($request->all());
        return response()->json(['message' => 'Like updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        $like->delete();
        return response()->json(['message' => 'Like deleted successfully']);
    }



    static function getLikeByID($likes)
    {

        $data = $likes->map(function ($like) {
            return [
                'id' => $like->id,
                'like' => $like->like,
                'users' => UserController::getUserByID($like->user_id),
            ];
        });
        return $data;
    }
}
