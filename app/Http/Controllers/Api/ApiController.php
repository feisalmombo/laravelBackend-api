<?php

namespace App\Http\Controllers\Api;

use App\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //List Students
    public function listStudents()
    {
        $students = Student::all();

        if($students->count() > 0){

            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);

        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }

    }

    //Create Student
    public function CreateStudent(Request $request)
    {
        $validattor = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'age' => 'required',
            'phone_no' => 'required|digits:10',
            'gender' => 'required',
        ]);

        if($validattor->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validattor->messages()
            ], 422);

        }else {

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'phone_no' => $request->phone_no,
                'gender' => $request->gender,
            ]);

            if($student) {

                return response()->json([
                    'status' => 200,
                    'message' => "Student Created Successfully"
                ], 200);

            }else {

                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }

    // Single student API
    public function getSingleStudent($id)
    {
        $student = Student::find($id);

        if($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);

        }else {

            return response()->json([
                'status' => 404,
                'message' => "No Such Student Found!"
            ], 404);

        }
    }

    // Edit Student
    public function editStudent($id)
    {
        $student = Student::find($id);

        if($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);

        }else {

            return response()->json([
                'status' => 404,
                'message' => "No Such Student Found!"
            ], 404);

        }
    }

    // Update Student
    public function updateStudent(Request $request, int $id)
    {
        $validattor = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'age' => 'required',
            'phone_no' => 'required|digits:10',
            'gender' => 'required',
        ]);

        if($validattor->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validattor->messages()
            ], 422);

        }else {

            $student = Student::find($id);

            if($student) {

                $student->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'age' => $request->age,
                    'phone_no' => $request->phone_no,
                    'gender' => $request->gender,
                    ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Student Updated Successfully"
                ], 200);

            }else {

                return response()->json([
                    'status' => 404,
                    'message' => "No Such Student Found!"
                ], 404);
            }
        }
    }

    // Delte Student
    public function deleteStudent($id)
    {

    }
}
