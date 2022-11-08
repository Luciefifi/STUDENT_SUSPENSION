<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return College::all();
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
        $fields = $request->validate([
            'name' => 'name|string',
            

        ]);

        $college= College::create([
            'name' => $fields['name'],
            


        ]);

        return [
            'message' => 'college created!',
            'college' => $college,
            
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $college=College::find($id);
        return 
        [
            $college,
            "college not found"];
        
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
        $college=College::find($id);
        if($college){
            $updates=$request->all();
            $college->update($updates);
            return $college;
        }
        else{
            return 'college not found';
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
        $college=College::find($id);
        if ($college)
        {
 College::destroy($id);
            return 'college deleted successfully';
        }
        else{
            return 'college not found';
        }
    }
}
