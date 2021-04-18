<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasFactory;
    
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }
}
