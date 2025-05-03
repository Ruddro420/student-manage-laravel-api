<?php

namespace App\Http\Controllers;

use App\Models\Studen;
use Illuminate\Http\Request;
use App\Models\Addcourse;

class AddcourseController extends Controller
{

    // Get all courses
    public function addCourseData()
    {
        $courses = Addcourse::all();
        return response()->json([
            'courses' => $courses
        ]);
    }
    //
    public function addCourse(Request $request)
    {
        // Validate input
        $request->validate([
            'course_name' => 'required|string|max:255',
            'batch_no' => 'required|string|max:255',
            'batch_status' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Check if the same course_name and batch_no already exist
        $existingCourse = Addcourse::where('course_name', $request->course_name)
            ->where('batch_no', $request->batch_no)
            ->first();

        if ($existingCourse) {
            return response()->json([
                'message' => 'This course with the same batch number already exists!'
            ], 422);
        }

        // Create a new course entry
        $course = new Addcourse();
        $course->course_name = $request->course_name;
        $course->batch_no = $request->batch_no;
        $course->batch_status = $request->batch_status;
        $course->status = $request->status;

        $course->save();

        return response()->json([
            'message' => 'Course added successfully'
        ]);
    }




    public function deleteCourse($id)
    {
        $course = Addcourse::find($id);
        $course->delete();
        return response()->json([
            'message' => 'Course deleted successfully'
        ]);
    }

    public function showCourse($id)
    {
        $course = Addcourse::find($id);
        return response()->json([
            'course' => $course
        ]);
    }
    // student course check
    public function studentShowCourse($courseName, $batchNo)
    {
        $data = Addcourse::where('course_name', $courseName)
            ->where('batch_no', $batchNo)
            ->first();
        return response()->json($data);
    }
}
