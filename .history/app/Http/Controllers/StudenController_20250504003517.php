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
        // store all data
        $submitAssingment = new SubmitAssingment();
        $submitAssingment->s_name = $data['s_name'];
        $submitAssingment->s_id = $data['s_id'];
        $submitAssingment->c_name = $data['c_name'];
        $submitAssingment->batch_no = $data['batch_no'];
        $submitAssingment->s_phone = $data['s_phone'];
        $submitAssingment->a_name = $data['a_name'];
        $submitAssingment->a_link = $data['a_link'];
        $submitAssingment->m_name = $data['m_name'];
        // $submitAssingment->sub_date = $data['sub_date'] ? '';
        // $submitAssingment->ex_1 = $data['ex_1'];
        // $submitAssingment->ex_2 = $data['ex_2'];
        $submitAssingment->save();
        return response()->json([
            'message' => 'Assingment submitted successfully',
            'data' => $submitAssingment
        ]);
    }
    // get assingment data by student id
    public function getAssingmentData($id)
    {
        $data = SubmitAssingment::where('s_id', $id)->get();
        return response()->json($data);
    }
    // update student status
    public function updateStatus($id)
    {
        $student = Studen::find($id);
        if ($student) {
            $student->status = 1; // Assuming 1 means active
            $student->save();
            return response()->json([
                'message' => 'Student status updated successfully',
                'student' => $student
            ]);
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    }
    // update student pending status
    public function updatePendingStatus($id)
    {
        $student = Studen::find($id);
        if ($student) {
            $student->status = 0; // Assuming 1 means active
            $student->save();
            return response()->json([
                'message' => 'Student status updated successfully',
                'student' => $student
            ]);
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    }
    // get student by ex_1
    public function getStudentEx1($id)
    {
        $student = SubmitAssingment::where('s_id', $id)->get();
        return response()->json([
            'data' => $student
        ]);
    }
    // update marks and feedback by id
    public function updateMarks(Request $request, $id)
    {
        $data = $request->all();
        $student = SubmitAssingment::find($id);
        if ($student) {
            $student->ex_1 = $data['marks'];
            $student->ex_2 = $data['feedback'];
            $student->save();
            return response()->json([
                'message' => 'Marks and feedback updated successfully',
                'data' => $student
            ]);
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    }
    // student present and absent by date and same date dont't added same student id data
    public function presentAbsent(Request $request)
    {
        $data = $request->all();
        $student = Studen::where('s_id', $data['s_id'])
            ->where('date', $data['date'])
            ->first();
        if ($student) {
            return response()->json([
                'message' => 'Student already added'
            ]);
        } else {
            $student = new Studen();
            $student->s_id = $data['s_id'];
            $student->date = $data['date'];
            $student->status = $data['status'];
            $student->save();
            return response()->json([
                'message' => 'Student present and absent added successfully',
                'data' => $student
            ]);
        }
    }

}
