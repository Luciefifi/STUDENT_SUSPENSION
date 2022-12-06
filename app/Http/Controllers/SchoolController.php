<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{

    public function __construct()
    {
      $this->middleware(['role:Admin|HOD|student']) ; 
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


    public function index()
    {
        return School::all();
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
            'school_name' => 'required|string|unique:schools,school_name',
            'college_id' => 'required'
        ]);

        // if ($fields->fails()) {
        //     return back()->withErrors($fields);
        // }

        
        if($request->user()->can('create-school'))
        {

        

        $school = School::create([
            'school_name' => $fields['school_name'],
            'college_id' => $fields['college_id'],


        ]);

        if($is_api_request){
            return [
                'message' => 'school created!',
                'school' => $school,                
            ];
        }
        else
            {
                return back()->with(['message','college created!']);
            }
        
    }
    else{
        return[
            'message'=>'you do not have this permission'
        ];
    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */


     public function school_show()
     {
         $schools = School::all();
         return view('schools', compact('schools'));
     }
    public function show($id)
    {
        $school=School::find($id);
        return $school;
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
        $school=School::find($id);
        if($school){
            $updates=$request->all();
            $school->update($updates);
            return $school;
        }
        else{
            return 'school not found';
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
        $school=School::find($id);
        if ($school)
        {
            School::destroy($id);
            return 'school deleted successfully';
        }
        else{
            return 'school not found';
        }
    }


    public function remove($id, Request $request)
    {
        if ($request->user()->can('delete-school')) {
            $school = School::find($id);
            if ($school) {
                School::destroy($id);
                return back()->with(['message', 'school deleted!']);
            }
        }
    }
}
