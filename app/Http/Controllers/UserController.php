<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new student.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store_student(Request $request)
    {
        $fields = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'regNumber' => 'required|string',
            'telephone' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|string',
            'password' => 'required',
            'program_id' => 'required',
        ]);
        $student = new Student();
        $student->create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
            'password' => $fields['password'],
            'image' => null
        ]);
        $student->assignRole('student');
        $token = $student->createToken('appToken')->plainTextToken;

        return [
            'message' => 'student created!',
            'user' => $student,
            'token' => $token
        ];
    }

    /**
     * Store a newly created resource in storage.
     * not students
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'user_type' => 'required|string',
            'password' => 'required',
            'image' => 'image|nullable',
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
            'password' =>  Hash::make($fields['password']),  
            'image' => null
        ]);
        $user->assignRole($fields['user_type']);
        $token = $user->createToken('appToken')->plainTextToken;

        return [
            'message' => 'user created!',
            'user' => $user,
            'token' => $token
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
        $user = User::find($id);
        return $user;
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
        $user = User::find($id);
        if ($user) {
            $updates = $request->all();
            $user->update($updates);
            return $user;
        } else {
            return 'user not found';
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
        $user = User::find($id);
        if ($user) {
            User::destroy($id);
            return 'user deleted successfully';
        } else {
            return 'user not found';
        }
    }
    public function login(request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $is_api_request = $request->route()->getPrefix() === 'api';
       
        $user = User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return [
                'message' => 'invalid credentials'
            ];
        }
        
        if( $is_api_request)
        {
        $token = $user->createToken('myapptoken')->plainTextToken;
        return [
            'message' => 'user logged in',
            'token' => $token
        ];
    }

    else{
        $request->session()->regenerate();
            Auth::login($user);
            return redirect('/admin');
    }
    }
}
