<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_name', 'school_id'];
        public function college()
        {
            return $this->belongsTo(College::class);
}
public function department()
{

return $this->hasMany(Department::class);
}
}