<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'program_id' , 'firstName', 'lastName' , 'email' ,'regNumber' , 'telephone' , 'gender','password'];

    public function program(){
        return $this->belongsTo(program::class);
}
}
