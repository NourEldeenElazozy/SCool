<?php

namespace App\Http\Controllers;

use App\ClassCourse;
use App\Courses;
use App\Trainers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        $trainers = Trainers::all();
        $ClassCourses = ClassCourse::all();

        return view('ClassCourses.ClassCourses', compact('courses', 'trainers','ClassCourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ClassCourse::create([
            'name' => $request->name,
            'trainer_id' => $request->trainer_id,
            'course_id' => $request->course_id,
            'price' => $request->price,
            'created_by' => (Auth::user()->name),
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/ClassCourses');
    }

    /**
     * Display the specified resource.
     *
     * param  \App\ClassCourse  $classCourse
     * return \Illuminate\Http\Response
     */
    public function show(ClassCourse $classCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * param  \App\ClassCourse  $classCourse
     * return \Illuminate\Http\Response
     */
    public function edit(ClassCourse $classCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  \App\ClassCourse  $classCourse
     * return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassCourse $classCourse)
    {
        
        $trainerid = trainers::where('id', $request->trainer_id)->first()->id;
        $coourseid = courses::where('id', $request->course_id)->first()->id;


       $ClassCourses = ClassCourse::findOrFail($request->pro_id);

       $ClassCourses->update([
       'Product_name' => $request->Product_name,
       'description' => $request->description,
       'section_id' => $id,
       ]);

       session()->flash('Edit', 'تم تعديل المنتج بنجاح');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  \App\ClassCourse  $classCourse
     * return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->id;
        ClassCourse::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/ClassCourses');
    }
}
