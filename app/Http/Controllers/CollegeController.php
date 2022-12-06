<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
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

    public function college_show()
    {

        $colleges = College::all();

        return view('college', compact('colleges'));
    }

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
        $is_api_request = $request->route()->getPrefix() === 'api';

        if ($request->user()->can('create-college')) {

            $fields = $request->validate([
                'name' => 'required|string|unique:colleges,name',
            ]);

            // if ($fields->fails()) {
            //     return back()->withErrors($fields);
            // }

            $college = College::create([
                'name' => $fields['name'],
            ]);

            if ($is_api_request) {
                return [
                    'message' => 'college created!',
                    'college' => $college,
                ];
            } else {
                return back()->with(['message', 'college created!']);
            }
        } else {
            return [
                'message' => 'you are not permitted to create a college'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $college = College::find($id);
        return
            [
                $college,
                "college not found"
            ];
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
        $college = College::find($id);
        if ($college) {
            $updates = $request->all();
            $college->update($updates);
            return $college;
        } else {
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
        $college = College::find($id);
        if ($college) {
            College::destroy($id);
            return 'college deleted successfully';
        } else {
            return 'college not found';
        }
    }


    public function remove($id, Request $request)
    {
        if ($request->user()->can('delete-college')) {
            $college = College::find($id);
            if ($college) {
                College::destroy($id);
                return back()->with(['message', 'college deleted!']);
            }
        }
    }
}
