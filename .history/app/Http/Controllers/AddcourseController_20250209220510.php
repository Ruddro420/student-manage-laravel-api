<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcourse;

class AddcourseController extends Controller
{

    // Get all courses
    public function addCourseData(){
        $courses = Addcourse::all();
        return response()->json([
            'courses' => $courses
        ]);
    }
    //
    public function addCourse(Request $request){

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

    

    public function deleteCourse($id){
        $course = Addcourse::find($id);
        $course->delete();
        return response()->json([
            'message' => 'Course deleted successfully'
        ]);
    }

    public function showCourse($id){
        dd('ok');
        $course = Addcourse::find($id);
        dd($course);
        return response()->json([
            'course' => $course
        ]);
    }
}
