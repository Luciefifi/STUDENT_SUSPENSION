<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'fname', 'lname' , 'email' , 'telephone' ,'regNumber','gender','department_id',
    ];
}
