<?php

namespace App\Http\Controllers;

use App\Models\Remedy;
use App\Http\Requests\StoreRemedyRequest;
use App\Http\Requests\UpdateRemedyRequest;

class RemedyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remedies = Remedy::with("treatments")->get();
        return response()->json(['message' => 'Remedy fetch successfully', 'data' => $remedies], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRemedyRequest $request)
    {
        $request->validated();

        $imagePaths = $this->imagePath($request);


        $remedy = Remedy::create([
            Remedy::COLUMN_NAME => $request['name'] ?? null,
            Remedy::COLUMN_TYPE => $request['type'] ?? null,
            Remedy::COLUMN_DESCRIPTION => $request['description'] ?? null,
            Remedy::COLUMN_STATUS => $request['status'] ?? null,
            Remedy::COLUMN_STEP => $request['step'] ?? null,
            Remedy::COLUMN_SIDE_EFFECT => $request['side_effect'] ?? null,
            Remedy::COLUMN_USAGE => $request['usage_remedy'] ?? null,
            Remedy::COLUMN_IMAGE => $imagePaths ?? null,
        ]);

        return response()->json(['message' => 'Remedy created successfully', 'data' => $remedy], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Remedy $remedy)
    {
        return response()->json(['message' => 'Remedy fetch successfully', 'data' => $remedy], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRemedyRequest $request, Remedy $remedy)
    {
        $request->validated();
        $remedy->update($request->all());
        return response()->json(['message' => 'Remedy updated successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Remedy $remedy)
    {
        $remedy->delete();
        return response()->json(['message' => 'Remedy deleted successfully'], 201);
    }

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
                $path = $file->storeAs('remedy_image', $fileName, 'public');
                $uploadedFiles[] = $path;
            }
        }

        return json_encode($uploadedFiles);
    }
}
