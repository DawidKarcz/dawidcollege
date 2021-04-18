<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    
    public function enrolments()
    {
        return $this->hasMany('App\Models\Enrolment');
    }
}
