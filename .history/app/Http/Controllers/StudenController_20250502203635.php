<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studen;
use App\Models\SubmitAssingment;

class StudenController extends Controller
{
    //
    public function accountData()
    {
        $student = Studen::all();
        return response()->json([
            'student' => $student
        ]);
    }
    public function getStudentData($id)
    {
        $student = Studen::find($id);
        return response()->json([
            'student' => $student
        ]);
    }

    public function createAccount(Request $request)
    {
        // Validate the request data
        $data = $request->all();

        // Create and save the student
        $student = Studen::create($data);

        // Return success response
        return response()->json([
            'message' => 'Account created successfully',
            'student' => $student
        ], 201);
    }

    // public function updateAccount(Request $request, $id)
    // {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'phone' => 'required|string',
    //         'course_name' => 'required|string',
    //         'batch_no' => 'required|string',
    //         'admission_slip_no' => 'required|string',
    //         'password' => 'required|string',
    //         'ex_1' => 'nullable|string',
    //         'ex_2' => 'nullable|string',
    //     ]);

    //     // Find the student with the given id
    //     $student = Studen::findOrFail($id);

    //     // Update the student
    //     $student->update($validated);

    //     // Return success response
    //     return response()->json([
    //         'message' => 'Account updated successfully',
    //         'student' => $student
    //     ]);
    // }

    public function accountDelete($id)
    {
        // Find the student with the given id
        $student = Studen::findOrFail($id);

        // Delete the student
        $student->delete();

        // Return success response
        return response()->json([
            'message' => 'Account deleted successfully'
        ]);
    }

    public function loginAccount(Request $request)
    {
        $data = $request->all();
        $student = Studen::where('email', $data['email'])->where('password', $data['password'])->first();
        if ($student) {
            return response()->json([
                'message' => 'Login successful',
                'student' => $student
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid email or password'
            ]);
        }
    }
    // get student by batch no and course name
    public function studentByCourseBatch($courseName, $batchNo)
    {
        $data = Studen::where('course_name', $courseName)
            ->where('batch_no', $batchNo)
            ->get();
        return response()->json($data);
    }
    // submit assingment
    public function submitAssingment(Request $request)
    {
        $data = $request->all();
        $student = SubmitAssingment::where('s_id', $data['s_id'])->first();
        if ($student) {
            $student->update($data);
            return response()->json([
                'message' => 'Assingment submitted successfully',
                'student' => $student
            ]);
        } else {
            return response()->json([
                'message' => 'Student not found'
            ]);
        }
    }
}
