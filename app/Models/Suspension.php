<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspension extends Model
{
    use HasFactory;
    protected $fillable=[ 'fname' ,'lname','regNumber','level','from' ,'to', 'reasons' ,'supporting_doc'

    ];
}
