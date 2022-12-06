<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\School;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin|HOD|student']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
public function school_create()
{

    $colleges=College::all();
    
    return view('createSchool',compact('colleges'));
}

public function department_create()
{
    $schools=School::all();
    
    return view('createDepartment',compact('schools'));  
}
    public function index()
    {
        return Department::all();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //  $department = Department :: create([
    //     'departmentname' => $department['departmentname'],
    //     'department_id' => $department['department_id'],

    //  ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = $request->validate([
            'department_name' => 'required|string',
            'school_id' => 'required'
        ]);
        if ($request->user()->can('create-department')) {


            $department = Department::create([
                'department_name' => $department['department_name'],
                'school_id' => $department['school_id'],



            ]);

            return [
                'message' => 'department created!',
                'department' => $department,

            ];
        } else {
            return [
                'message' => 'you are not allowed to create department '
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function department_show()
    {
        $departments = Department::all();
        return view('departments', compact('departments'));
    }
    public function show($id)
    { {
            $department = Department::find($id);
            return $department;
        }
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
        $department = Department::find($id);
        if ($department) {
            $updates = $request->all();
            $department->update($updates);
            return $department;
        } else {
            return 'department not found';
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
        $department = Department::find($id);
        if ($department) {
            Department::destroy($id);
            return 'department deleted successfully';
        } else {
            return 'department not found';
        }
    }
}
