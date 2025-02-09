<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Course;

class ModuleController extends Controller
{
    // 
    public function moduleData($id){
       
    
        $modules = Module::where('course_id', $id)->get();
        return response()->json([
            'modules' => $modules
        ]);
    }
    

    public function addModule(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'course_name' => 'nullable|string',
            'batch_no' => 'nullable|string',
            'module_name' => 'nullable|string',
            'study_plan' => 'nullable|string',
            'course_id' => 'nullable', // Ensure `course_id` exists in the `addcourse` table
        ]);

        // Create and save the module
        $module = Module::create($validated);

        // Return success response
        return response()->json([
            'message' => 'Module added successfully',
            'module' => $module
        ], 201);
    }

    public function deleteModule($id){
        $module = Module::find($id);
        $module->delete();
        return response()->json([
            'message' => 'Module deleted successfully'
        ]);
    }


}
