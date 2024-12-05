<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Requests\StorePlantRequest;
use App\Http\Requests\UpdatePlantRequest;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plant::all();
        return response()->json(['message' => 'Plant fetch successfully', 'data' => $plants], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantRequest $request)
    {
        // Validate the request data
        $request->validated();

        // Check if the plant already exists
        if (Plant::where(Plant::COLUMN_SCIENTIFIC_NAME, $request['scientific_name'])->exists()) {
            return response()->json(['message' => 'Plant already exists'], 409);
        }


        // Process and store the images
        $imagePaths = $this->imagePath($request);

        // Create a new plant record
        $plant = Plant::create([
            Plant::COLUMN_NAME => $request['name'] ?? null,
            Plant::COLUMN_LOCAL_NAME => $request['local_name'] ?? null,
            Plant::COLUMN_SCIENTIFIC_NAME => $request['scientific_name'] ?? null,
            Plant::COLUMN_DESCRIPTION => $request['description'] ?? null,
            Plant::COLUMN_STATUS => $request['status'] ?? 'inactive',
            Plant::COLUMN_IMAGE => $imagePaths,
            Plant::COLUMN_ADMIN => $request['uploader_id'] ?? null,

        ]);

        return response()->json([
            'message' => 'Plant created successfully',
            'data' => $plant
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return response()->json(['message' => 'Plant fetch successfully', 'data' => $plant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantRequest $request, Plant $plant)
    {
        $request->validated();

        $imagePaths = null;
        if ($request->hasFile('images')) {
            $this->deleteImage($plant);
            $imagePaths = $this->imagePath($request);
        }

        $plant->update([
            Plant::COLUMN_NAME => $request['name'] ?? $plant->name,
            Plant::COLUMN_LOCAL_NAME => $request['local_name' ?? $plant->local_name],
            Plant::COLUMN_SCIENTIFIC_NAME => $request['scientific_name'] ?? $plant->scientific_name,
            Plant::COLUMN_DESCRIPTION => $request['description'] ?? $plant->description,
            Plant::COLUMN_IMAGE => $imagePaths ?? $plant->image_path,
            Plant::COLUMN_ADMIN => $request['admin_id'] ?? $plant->admin_id,
            Plant::COLUMN_STATUS => $request['status'] ?? $plant->status,
        ]);

        return response()->json(['message' => 'Plant updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();
        return response()->json(['message' => 'Plant deleted successfully']);
    }


    //========================

    private function imagePath($request)
    {
        if ($request->images == null) {
            return null;
        }

        $uploadedFiles = [];
        $i = 0;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $i++;
                // Extract file extension
                $fileExt = $file->getClientOriginalExtension();
                // Generate the new file name
                $fileName = time() . "_{$request->name}$i." . $fileExt;
                // Store the file
                $path = $file->storeAs('plant_image', $fileName, 'public');
                $uploadedFiles[] = $path;
            }
        }

        return json_encode($uploadedFiles);
    }


    private function deleteImage($plant)
    {
        if ($plant->images == null) {
            return null;
        }

        foreach (json_decode($plant->images) as $image) {
            Storage::disk('public')->delete($image);
        }
    }
}
