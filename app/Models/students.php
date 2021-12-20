<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    /**
     * Get the students for the relation student lessons.
     */
    public function lessons()
    {
        return $this->hasMany('App\students_lessons', 'students_id');
    }
}
