<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    // public function path($imageName)
    // {
    //     // Get the full path to the image file
    //     $fullPath = storage_path('app/public/' . $imageName);
    //     // Get the file content and encode it in base64
    //     $imageData = base64_encode(file_get_contents($fullPath));
    //     $mimeType = mime_content_type($fullPath); // Use $fullPath instead of $path

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Image fetched successfully.',
    //         'data' => [
    //             'file_name' => $imageName,
    //             'mime_type' => $mimeType,
    //             'image_data' => $imageData,
    //         ]
    //     ]);
    // }
    public function path(Request $request)
    {

        try {
            // Construct the full path to the image file
            $fullPath = storage_path('app/public/' . $request->path);

            // Check if the file exists
            if (!file_exists($fullPath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File not found.',
                ], 404);
            }

            // Get the file content and encode it in base64
            $imageData = base64_encode(file_get_contents($fullPath));

            // Get the MIME type of the file
            $mimeType = mime_content_type($fullPath);

            return response()->json([
                'success' => true,
                'message' => 'Image fetched successfully.',
                'data' => [
                    'file_name' => $request->path,
                    'mime_type' => $mimeType,
                    'image_data' => $imageData,
                ],
            ]);
        } catch (\Exception $e) {
            // Catch any exceptions and return an error response
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching the image.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    static public function imageFullPath($images)
    {
        $images = json_decode($images);
        $images = collect($images)->map(function ($image) {
            return asset('storage/' . $image);
        });

        return $images->all();
    }


    static public function imagePathToMemory($images)
    {

        $images = json_decode($images);
        $images = collect($images);
        $images = $images->map(function ($image) {

            // Construct the full path to the image file
            $fullPath = storage_path('app/public/' . $image);

            // Check if the file exists
            if (!file_exists($fullPath)) {
                return null;
            }

            // Get the file content and encode it in base64
            $imageData = base64_encode(file_get_contents($fullPath));

            // Get the MIME type of the file
            $mimeType = mime_content_type($fullPath);

            return [
                'file_name' => $image,
                'mime_type' => $mimeType,
                'image_data' => $imageData,
            ];
        });

        return $images;
    }
    // public function path($imageName)
    // {

    //     //instead of this
    //     //can i find the file name path from storage folder without specifying the path

    //     $path = storage_path('app/public/plant_cover/' . $imageName);

    //     // Check if the file exists
    //     if (!file_exists($path)) {
    //         return response()->json(['error' => 'Image not found'], 404);
    //     }

    //     // Get the file content and encode it in base64
    //     $imageData = base64_encode(file_get_contents($path));
    //     $mimeType = mime_content_type($path); // e.g., "image/jpeg"

    //     // Return JSON response with base64 data and filename
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Image fetched successfully.',
    //         'data' => [
    //             'file_name' => $imageName,
    //             'mime_type' => $mimeType,
    //             'image_data' => $imageData,
    //         ]
    //     ]);
    // }

    // public function pathPlantImage($imageName)
    // {
    //     $path = storage_path('app/public/plant_image/' . $imageName);

    //     // Check if the file exists
    //     if (!file_exists($path)) {
    //         return response()->json(['error' => 'Image not found'], 404);
    //     }

    //     // Get the file content and encode it in base64
    //     $imageData = base64_encode(file_get_contents($path));
    //     $mimeType = mime_content_type($path); // e.g., "image/jpeg"

    //     // Return JSON response with base64 data and filename
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Image fetched successfully.',
    //         'data' => [
    //             'file_name' => $imageName,
    //             'mime_type' => $mimeType,
    //             'image_data' => $imageData,
    //         ]
    //     ]);
    // }
}
