<?php

namespace App\Http\Controllers;

use App\Models\ResourceModel;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function add(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'course_name' => 'nullable|string',
            'batch_no' => 'nullable|string',
            'module_name' => 'nullable|string',
            'course_id' => 'nullable',
            'record_type' => 'nullable|string',
            'record_name' => 'nullable|string',
            'vLink' => 'nullable',
            'date' => 'nullable',
            'details' => 'nullable|string',
            'ex_1' => 'nullable|string',
            'ex_2' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        // Create and save the assingment
        $recordings = ResourceModel::create($validated);

        // Return success response
        return response()->json([
            'message' => 'Added successfully',
            'recordings' => $recordings
        ], 201);
    }
}
