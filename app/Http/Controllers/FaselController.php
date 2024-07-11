<?php

namespace App\Http\Controllers;

use App\ClassCourse;
use App\fasel;
use App\Student;
use App\Trainers;
use Illuminate\Http\Request;

class FaselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $Student = Student::all();
        $ClassCourses = ClassCourse::all();
        $fasels = fasel::all();
        return view('fasel.fasel', compact('fasels','Student','ClassCourses'));
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
    public function store(Request $request, fasel $fasel)
    {
        fasel::create([
            'student_id' => $request->student_id,
            'classcourses_id' => $request->classcourses_id,
            'price' => $request->price,

        ]);
        session()->flash('Add', ' تم تسجيل الطالب');
        return redirect('/fasel');
    }

    /**
     * Display the specified resource.
     *
     * param  \App\fasel  $fasel
     * return \Illuminate\Http\Response
     */
    public function show(fasel $fasel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * param  \App\fasel  $fasel
     * return \Illuminate\Http\Response
     */
    public function edit(fasel $fasel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  \App\fasel  $fasel
     * return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Student = Student::where('id', $request->student_id)->first()->id;
        $ClassCourses = ClassCourse::where('id', $request->classcourses_id)->first()->id;


       $fasel = fasel::findOrFail($request->id);

       $fasel->update([
       'student_id' => $request->student_id,
        'classcourses_id' => $request->classcourses_id,
        'price' => $request->price,
       
       ]);

       session()->flash('Edit', 'تم تعديل بنجاح');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  \App\fasel  $fasel
     * return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = $request->id;
        fasel::find($id)->delete();
        session()->flash('delete','تم حذف بنجاح');
        return redirect('/fasel');
    }
}
