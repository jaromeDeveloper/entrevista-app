<?php

namespace App\Http\Controllers;
use App\Models\lessons;
use App\Models\students;
use Illuminate\Http\Request;

class StudentsLessonsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        return view('/lists/assign',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request)
    {
        $data = $request->all();
        $lesson = new Lessons();
        $response = $lesson->assignByIdLessons($data);

        return json_encode(array( 
            'message' => $response
        ));

    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $data = $request->all();
        $lesson = new Lessons();
        $response = $lesson->removeByIdLessons($data);

        return json_encode(array( 
            'message' => $response
        ));

    }

    public function listLessonByStudent(Request $request){
        $data = $request->all();
        $lesson = new Lessons();
        $resList = $lesson->listByIdLessons($data); // get response query list lesson
        return json_encode(array( 
            'lists' => $resList
        ));
    }
      
}
