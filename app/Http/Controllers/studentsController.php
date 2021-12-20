<?php

namespace App\Http\Controllers;
use App\Models\students;
use Illuminate\Http\Request;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
         $students = Students::all();
         return view('/lists/students',compact('students'));
    }
}
