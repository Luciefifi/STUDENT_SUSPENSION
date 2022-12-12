<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\Program;
use App\Models\School;
use Illuminate\Http\Request;

class ProgramController extends Controller
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



    public function program_create()
    {
        $colleges = College::all();
        $schools = School::all();
        $departments = Department::all();

        return view('createProgram', compact('colleges', 'schools', 'departments'));
    }
    public function index()
    {
        return Program::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'program_name' => 'required|string',
            'department_id' => 'required'
        ]);
        if ($request->user()->can('create-department')) {

            $program = Program::create([
                'program_name' => $fields['program_name'],
                'department_id' => $fields['department_id']


            ]);
            if ($is_api_request) {
            return [
                'message' => 'program created!',
                'program' => $program,

            ];
        }
        else{
            return back()->with(['message', 'program created!']);
        }
        }
       

        
        
        
        
        else {
            return [
                'message' => 'you are not permitted to create department'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



     public function program_show()
    {
        $programs = Program::all();
        // dd($departments);
        return view('programs', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::find($id);
        return $program;
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
        $program = Program::find($id);
        if ($program) {
            $updates = $request->all();
            $program->update($updates);
            return $program;
        } else {
            return 'program not found';
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
        $program = Program::find($id);
        if ($program) {
            Program::destroy($id);
            return 'program deleted successfully';
        } else {
            return 'program not found';
        }
    }

    public function remove($id, Request $request)
    {
        if ($request->user()->can('delete-program')) {
            $program = Program::find($id);
            if ($program) {
               Program::destroy($id);
                return back()->with(['message', 'program deleted!']);
            }
        }
    }
}
