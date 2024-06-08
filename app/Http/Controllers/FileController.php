<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
{
    // Check if the request contains a file
    if (!$request->hasFile('file')) {
        return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
    }

    // Get the file from the request
    $file = $request->file('file');
    // Define a filename
    $filename = time() . '.' . $file->getClientOriginalExtension();
    // Store the file
    try {
        $path = $file->storeAs('uploads', $filename);
    } catch (\Exception $e) {
        Log::error('File could not be stored: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'File could not be stored'], 500);
    }

    // Store the file information in the database (assuming you have a File model)
    try {
        File::create([
            'filename' => $filename,
            'path' => $path
        ]);
    } catch (\Exception $e) {
        Log::error('File info could not be stored in the database: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'File info could not be stored in the database'], 500);
    }

    return response()->json(['status' => 'success', 'file' => $path], 200);
}
}