<?php

namespace App\Http\Controllers;

use App\Models\AssingmentModel;
use App\Models\PaymentModel;
use App\Models\PresentModel;
use App\Models\RecordingModel;
use App\Models\ResourceModel;
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

        $student = PresentModel::where('s_id', $data['s_id'])
            ->where('date', $data['date'])
            ->first();

        if ($student) {
            // Update existing status instead of skipping
            $student->status = $data['status'];
            $student->save();

            return response()->json([
                'message' => 'Student attendance updated successfully',
                'data' => $student
            ]);
        } else {
            // Create new record if not found
            $student = new PresentModel();
            $student->s_id = $data['s_id'];
            $student->date = $data['date'];
            $student->status = $data['status'];
            $student->save();

            return response()->json([
                'message' => 'Student attendance added successfully',
                'data' => $student
            ]);
        }
    }
    // total submit assingment by student id
    public function totalAssingment($id)
    {
        $data = SubmitAssingment::where('s_id', $id)->count();
        return response()->json([
            'total' => $data
        ]);
    }
    // total assingment by course name and batch no
    public function totalAssingmentByCourse($courseName, $batchNo)
    {
        $data = AssingmentModel::where('course_name', $courseName)
            ->where('batch_no', $batchNo)
            ->count();
        return response()->json([
            'total' => $data
        ]);
    }
    // total present and absent by student id
    public function totalPresentAbsent($id)
    {
        $data = PresentModel::where('s_id', $id)->count();
        return response()->json([
            'total' => $data
        ]);
    }
    // add payment
    public function addPayment(Request $request)
    {
        $data = $request->all();
        // store all data
        $payment = new PaymentModel();
        $payment->s_id = $data['s_id'];
        $payment->name = $data['name'];
        $payment->date = $data['date'];
        $payment->payment = $data['payment'];
        $payment->save();
        return response()->json([
            'message' => 'Payment added successfully',
            'data' => $payment
        ]);
    }
    // get total payment by student id sum by payment
    public function getPayment($id)
    {
        $data = PaymentModel::where('s_id', $id)->sum('payment');
        return response()->json([
            'total' => $data
        ]);
    }
    // get submitted assingment by student id
    public function getAssingment($id)
    {
        $data = SubmitAssingment::where('s_id', $id)->get();
        return response()->json($data);
    }
    // payement history by student id
    public function getPaymentHistory($id)
    {
        $data = PaymentModel::where('s_id', $id)->get();
        return response()->json($data);
    }
    // assingment delete by id
    public function deleteAssingment($id)
    {
        $data = AssingmentModel::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Assingment deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Assingment not found'
            ], 404);
        }
    }
    // delete recording by id
    public function deleteRecording($id)
    {
        $data = RecordingModel::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Recording deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Recording not found'
            ], 404);
        }
    }
    // delete resource by id
    public function deleteResource($id)
    {
        $data = ResourceModel::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Resource deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }
    }
    // delete student by id
    public function deleteStudent($id)
    {
        $data = Studen::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Student deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    }
    // get total sum of assingment number by course name and batch no sorting ascending order
    public function totalAssignmentNumber($courseName, $batchNo)
    {
        $students = SubmitAssingment::select('student_id', 'student_name', DB::raw('SUM(ex_1) as total_ex_1'))
            ->where('c_name', $courseName)
            ->where('batch_no', $batchNo)
            ->groupBy('student_id', 'student_name')
            ->orderByDesc('total_ex_1')
            ->get();

        // Optionally get the overall total
        $overallTotal = $students->sum('total_ex_1');

        return response()->json([
            'overall_total' => $overallTotal,
            'students' => $students
        ]);
    }
}
