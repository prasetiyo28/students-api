<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return response([
            'success' => true,
            'message' => 'Get All Student',
            'data' => $students
        ], 200);
    }

    public function show($id)
    {
        $students = Student::whereId($id)->first();

        if ($students) {
            return response()->json([
                'success' => true,
                'message' => 'Student Profile Found!',
                'data'    => $students
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student Profile Not Found!',
                'data'    => ''
            ], 404);
        }
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'student_number'   => 'required|unique:students',
            'email'     => 'required|unique:students',
            'name'   => 'required',
            'gender'   => 'required',
            'address'   => 'required',

        ],
            [
                'student_number.required' => 'Please Fill Student Number',
                'student_number.unique' => 'Student Number Exist',
                'email.required' => 'Please Fill Email',
                'email.unique' => 'Email is Exist !',
                'name.required' => 'Please Fill name!',
                'gender.required' => 'Please Fill gender!',
                'address.required' => 'Please Fill address!'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Please Fill With Valid Data',
                'data'    => $validator->errors()
            ],400);

        } else {

            $student = Student::create([
                'student_number' => $request->input('student_number'),
                'email'     => $request->input('email'),
                'name'   => $request->input('name'),
                'address'   => $request->input('address'),
                'gender'   => $request->input('gender')
            ]);


            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Create Student Success',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Create Student Failed!',
                ], 400);
            }
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        //validate data
        $validator = Validator::make($request->all(), [
            'student_number'   => 'required|unique:students,student_number,'.$id,
            'email'     => 'required|unique:students,email,'.$id,
            'name'   => 'required',
            'gender'   => 'required',
            'address'   => 'required',

        ],
            [
                'student_number.required' => 'Please Fill Student Number',
                'student_number.unique' => 'Student Number Exist',
                'email.required' => 'Please Fill Email',
                'email.unique' => 'Email is Exist !',
                'name.required' => 'Please Fill name!',
                'gender.required' => 'Please Fill gender!',
                'address.required' => 'Please Fill address!'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Please Fill With Valid Data',
                'data'    => $validator->errors()
            ],400);

        } else {

            $student = Student::whereId($request->input('id'))->update([
                'student_number' => $request->input('student_number'),
                'email'     => $request->input('email'),
                'name'   => $request->input('name'),
                'address'   => $request->input('address'),
                'gender'   => $request->input('gender')
            ]);


            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Update Student Success',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Update Student Failed!',
                ], 500);
            }

        }

    }

    public function destroy($id)
    {
        $post = Student::findOrFail($id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Student Delete Sucess!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student Delete Failed',
            ], 500);
        }

    }

}
