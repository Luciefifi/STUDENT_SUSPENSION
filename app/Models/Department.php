<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable=[
       'school_id', 'department_name'];

        public function program()
    {
   
    return $this->hasMany(program::class);
}
        public function school(){
            return $this->belongsTo(School::class);
}
}
