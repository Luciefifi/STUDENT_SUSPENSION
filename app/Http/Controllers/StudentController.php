<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\Program;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|HOD|student']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function student_create()
    {
        $colleges = College::all();
        $schools = School::all();
        $departments = Department::all();
        $programs = Program::all();


        return view('createProgram', compact('colleges', 'schools', 'departments' ,'programs'));
    }
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $is_api_request = $request->route()->getPrefix() === 'api';
        $fields = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required',
            'regNumber' => 'required',
            'gender' => 'required|string',
            'program_id' => 'required'

        ]);
        if($request->user()->can('create-program'))
{


        $student = Student::create([
            'firstName' => $fields['firstName'],
            'lastName' => $fields['lastName'],
            'email' => $fields['email'],
            'telephone' => $fields['telephone'],
            'regNumber' => $fields['regNumber'],
            'gender' => $fields['gender'],
            'program_id'=>$fields['program_id'],


        ]);
        if ($is_api_request) {

        return [
            'message' => 'student created!',
            'student' => $student,
            
        ];
    }
    else{
        return back()->with(['message', 'student created!']);
    }
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function student_show()
    {
        $students = Student::all();
        // dd($departments);
        return view('students', compact('students'));
    }

    public function show($id)
    {
        $student=Student::find($id);
        return $student;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student=Student::find($id);
        if($student){
            $updates=$request->all();
            $student->update($updates);
            return $student;
        }
        else{
            return 'student not found';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        if ($student)
        {
            Student::destroy($id);
            return 'student deleted successfully';
        }
        else{
            return 'student not found';
        }
        
    }

    public function remove($id, Request $request)
    {
        if ($request->user()->can('delete-student')) {
            $student = Student::find($id);
            if ($student) {
                Student::destroy($id);
                return back()->with(['message', 'student deleted!']);
            }
        }
    }
}
