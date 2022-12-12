<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use Illuminate\Http\Request;

class SuspensionController extends Controller
{
    public function progress_show()
    {
        return view('progress');
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'regNumber' => 'required|string',
            'level' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'reasons' => 'required|string',
            'supporting_doc' => 'file|nullable'
        ]);

        $suspension = Suspension::create([
            'fname' => $fields['firstname'],
            'lname' => $fields['lastname'],
            'regNumber' => $fields['regNumber'],
            'level' => $fields['level'],
            'from' => $fields['from'],
            'to' => $fields['to'],
            'reasons' => $fields['reasons'],
            'supporting_doc' => null
        ]);

        return back()->with(['message', 'request made!']);
    }
}
