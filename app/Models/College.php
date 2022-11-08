<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $fillable=[
        'name', 'college_id' 
    ];
    public function school()
    {
   
    return $this->hasMany(school::class);
}

}