<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable=[
        'program_name'];
        public function department(){
            return $this->belongsTo(Department::class);
}
public function student()
{

return $this->hasMany(student::class);
}
}
