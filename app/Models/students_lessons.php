<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students_lessons extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function lesson()
    {
        return $this->belongsTo('App\Lesson','lesson_id');
    }
}
