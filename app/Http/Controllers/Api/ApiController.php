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

    }

    // Single student API
    public function getSingleStudent($id)
    {

    }

    // Update Student
    public function updateStudent(Request $reques , $id)
    {

    }

    // Delte Student
    public function deleteStudent($id)
    {

    }
}
