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

        // if(!empty($request->batch_no)){
        //     $courses = Addcourse::where('batch_no', $request->batch_no)->get();
        //     if(count($courses) > 0){
        //         return response()->json([
        //             'message' => 'Batch number already exists'
        //         ]);
        //     }
        // }

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
        $checkStatus = Studen::where('status', 1)->first();
        if ($checkStatus) {
            $data = Addcourse::where('course_name', $courseName)
                ->where('batch_no', $batchNo)
                ->where('status', 1)
                ->get(); // Use get() to retrieve multiple records

            return response()->json($data); // Return data as JSON
        }
    }
}
