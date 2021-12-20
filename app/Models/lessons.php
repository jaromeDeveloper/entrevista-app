<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    function __construct(){}

    public function assignByIdLessons($data){
        $pid = $data['pid'];
        $arrLessons = $data['lessons'];
        for($z=0; $z<count( $arrLessons ); $z++ ){
            $mensaje = \DB::select("CALL sp_save_relationship_lessons_qry('".$pid."','".$arrLessons[$z]."' )"); // Save lessons asigned to student
        }

        $arrLessons = [];

        return $mensaje;

    }

    public function listByIdLessons($data){
        $pid = $data['pid'];
        $lessons = \DB::select("CALL sp_list_except_assign_qry('".$pid."')"); // List lessons not asigned
        $lessonsSelected = \DB::select("CALL sp_list_assigned('".$pid."')"); // List lessons not asigned
        
        return array( 
                     'lessons' => $lessons,
                     'lessons_selected' => $lessonsSelected
        );
    }

    #/*
    #* Get the lessons for the relation student_lessons.
    #*/
   public function students()
   {
       return $this->hasMany('App\students_lessons', 'lesson_id');
   }
}
