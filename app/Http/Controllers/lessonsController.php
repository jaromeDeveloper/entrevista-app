<?php

namespace App\Http\Controllers;
use App\Models\lessons;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $lessons = lessons::all();
         return view('/lists/lessons',compact('lessons'));
    }
}
