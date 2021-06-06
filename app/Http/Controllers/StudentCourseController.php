<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentCourse = [];

        foreach (auth()->user()->courses as $course) {
            $studentCourse[] = $course->id;
        }

        return view('student.add-course',['courses' => Course::all(),'studentCourse' => $studentCourse]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        foreach ($request->courses as $course) {

            $request->merge(['course_id'=>$course,
            'user_id' => auth()->user()->id]);
            StudentCourse::create($request->all());
        }

        return back()->with('message','Course added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function show(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentCourse  $studentCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentCourse $studentCourse)
    {
        $courses = auth()->user()->courses->where('lecturer_id',request()->id);
        foreach ($courses as $course) {
            // dd($course);
       
            $studentCourse->where(['user_id'=>auth()->id(),
            'course_id' =>$course->id ])->delete();
        }

        return back()->with('message','deleted');
    }
}
