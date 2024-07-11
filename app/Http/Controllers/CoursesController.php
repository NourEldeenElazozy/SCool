<?php

namespace App\Http\Controllers;

use App\ClassCourse;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
   
    public function index()
    {
        $ClassCourses = ClassCourse::all(); 
        $courses = Courses::all();
        return view('corse.Course', compact('courses'));
    }
        public function create()
    {
        //
    }

  
    
    public function store(Request $request)
    {
        $input = $request->all();
        $b_exists = Courses::where('coursename', '=', $input['coursename'])->exists();
        if ($b_exists) {
            // Set a flash message with 'error' key
            $request->session()->flash('error', 'خطا اسم المادة مسجل مسبقا');
            return redirect('/Course');
        } else {
            Courses::create([
                'coursename' => $request->coursename,
                'coursedescription' => $request->coursedescription,
                'courseprise' => $request->courseprise,
                'created_by' => (Auth::user()->name),
            ]);
            // Set a flash message with 'success' key
            $request->session()->flash('success', 'تم إضافة المادة بنجاح');
            return redirect('/Course');
        }
    }

    
    public function show(Courses $courses)
    {
        //
    }

    
    public function edit(Courses $courses)
    {
        //
    }

    
    public function update(Request $request, Courses $courses)
    {
        $id = $request->id;

        $this->validate($request, [

            'coursename' => 'required|max:255|unique:courses,coursename,'.$id,
            'coursedescription' => 'required',
            'courseprise' => 'required',
        ],[

            'coursename.required' =>'يرجي ادخال اسم القسم',
            'coursename.unique' =>'اسم القسم مسجل مسبقا',
            'coursedescription.required' =>'يرجي ادخال البيان',
            'courseprise.required'=> 'يرجي ادخال السعر',

        ]);

        $sections = Courses::find($id);
        $sections->update([
            'coursename' => $request->coursename,
            'coursedescription' => $request->coursedescription,
            'courseprise' => $request->courseprise,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/Course');
    }

    
    public function destroy(Courses $courses, Request $request)
    {
        $id = $request->id;
        Courses::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/Course');
    }
}
