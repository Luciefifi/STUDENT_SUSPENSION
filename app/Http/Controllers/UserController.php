<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function user_show()
    {

        $users = User::all();

        return view('users', compact('users'));
    }


    public function user_create()
    {
        $roles = Role::all();
        return view('createUser', compact('roles'));
    }
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
        $is_api_request = $request->route()->getPrefix() === 'api';

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'user_type' => 'required|string',
            'image' => 'image|nullable',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
            'password' =>  Hash::make('12345678'),
            'image' => null
        ]);
        $user->assignRole($fields['user_type']);
        $token = $user->createToken('appToken')->plainTextToken;
        if ($is_api_request) {
            return [
                'message' => 'user created!',
                'user' => $user,
                'token' => $token
            ];
        } else {
            return back()->with(['message', 'user  created!']);
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
            $student = Student::where('email', $fields['email'])->first();
            if (!$student || !Hash::check($fields['password'], $student->password))

                return [
                    'message' => 'invalid credentials'
                ];
        }

        if ($is_api_request) {
            $token = $user->createToken('myapptoken')->plainTextToken;
            return [
                'message' => 'user logged in',
                'token' => $token
            ];
        } else {
            $request->session()->regenerate();
            Auth::login($user);
            return redirect('/admin');
        }
    }

    public function remove($id, Request $request)
    {
        if ($request->user()->can('delete-user')) {
            $user = User::find($id);
            if ($user) {
                User::destroy($id);
                return back()->with(['message', 'user deleted!']);
            }
        }
    }
    public function removed($id, Request $request)
    {

        if ($request->user()->can('delete-users')) {

            $user = User::find($id);
            if ($user) {
                User::destroy($id);
                return back()->with(['message', 'user deleted!']);
            }
        }
    }

    public function update_show($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('userUpdate', compact('user', 'roles'));
    }

    public function updated(Request $request)
    {
        $id = $request->id;
        $fields = $request->validate([

            'name' => 'required|string',
            'email' => 'required|string',
            'user_type' => 'required|string',
            'image' => 'image|nullable',

        ]);
        $user = User::find($id);
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->user_type = $fields['user_type'];

        $user->removeRole($user->roles->first());
        $user->assignRole($fields['user_type']);


        $user->update();
        return redirect('Users')->with(['message', 'user updated']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function signup_show()
    {
        $programs=Program::all();
        return view('signup',compact('programs'));
    }

    public function signup(Request $request)
    {
        $fields = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'regNumber' => 'required',
            'phone' => 'required',
            'program_id' => 'required',
            'email' => 'required|string|unique:students,email',
            'gender'=>'required',
            'password'=>'required'
        ]);

        $student = Student::create([
            'firstName' => $fields['fname'],
            'lastName' => $fields['lname'],
            'regNumber' => $fields['regNumber'],
            'telephone' => $fields['phone'],
            'program_id' => $fields['program_id'],
            'email' => $fields['email'],
            'gender'=>$fields['gender'],
            'password'=>Hash::make($fields['password'])
        ]);

        $request->session()->regenerate();
        Auth::login($student);
        return redirect('/admin');
    }
}
