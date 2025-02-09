<?php

namespace App\Http\Controllers;

use App\Models\AssingmentModel;
use Illuminate\Http\Request;

class Assingment extends Controller
{
    public function add(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'course_name' => 'nullable|string',
            'batch_no' => 'nullable|string',
            'module_name' => 'nullable|string',
            'course_id' => 'nullable', // Ensure `course_id` exists in the `addcourse` table
            'assing_name' => 'nullable|string',
            'deadline' => 'nullable|string',
            'imLink' => 'nullable|string',
            'details' => 'nullable|string',
            'ex_1' => 'nullable|string',
            'ex_2' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        // Create and save the assingment
        $assingment = AssingmentModel::create($validated);

        // Return success response
        return response()->json([
            'message' => 'Assingment added successfully',
            'assingment' => $assingment
        ], 201);
    }

    public function assingData($id)
    {
        $assingments = AssingmentModel::where('course_id', $id)->get();
        return response()->json([
            'assingments' => $assingments
        ]);
    }

    public function deleteAssingment($id)
    {
        $assingment = AssingmentModel::find($id);
        $assingment->delete();
        return response()->json([
            'message' => 'Assingment deleted successfully'
        ]);
    }


}
