<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('std.Student', compact('students'));
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
        $input = $request->all();

        // Validate the input
        $validatedData = $request->validate([
            'firestname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'academicnumber' => 'required|numeric|unique:students',
            'age' => 'required',
            'email' => 'required||unique:students',
            'password' => 'required',
        ],[

            'firstname.required' =>'يرجي ادخال الاسم الاول',
            'lastname.required' =>'يرجي ادخال اللقب',
            'academicnumber.unique' =>'الرقم الدراسي مسجل مسبقا',
            'age.required' =>'يرجي ادخال تاريخ الميلاد',
            'email.required'=> 'يرجي ادخال الايميل',
            'password.required'=> 'يرجي ادخال الرمز السري',


        ]);
        
       
            Student::create([
                'firestname' => $validatedData['firestname'],
                'lastname' => $validatedData['lastname'],
                'academicnumber' => $validatedData['academicnumber'],
                'age' => $validatedData['age'],
                'email' => $validatedData['email'],
                'password' => hash('sha256', $validatedData['password']),
            ]);
            // Set a flash message with 'success' key
            $request->session()->flash('success', 'تم إضافة  بنجاح');
            return redirect('/student');
        
    }

    /**
     * Display the specified resource.
     *
     * param  \App\Student  $student
     * return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * param  \App\Student  $student
     * return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  \App\Student  $student
     * return \Illuminate\Http\Response
     */
    public function Update(Request $request)
    {
    
        $id = $request->id;

        $this->validate($request, [
            
            'firestname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'academicnumber' => 'required|numeric|unique:students,Academicnumber,'.$id,
            'age' => 'required|date',
            'email' => 'required|email|unique:students,email,'.$id,
            'password' => 'required|string|min:8|'
        ],[

            'firestName.required' =>'يرجي ادخال الاسم الاول',
            'lastname.required' =>'يرجي ادخال اللقب',
            'academicnumber.unique' =>'الرقم الدراسي مسجل مسبقا',
            'age.required' =>'يرجي ادخال تاريخ الميلاد',
            'email.required'=> 'يرجي ادخال الايميل',
            'password.required'=> 'يرجي ادخال الرمز السري',



        ]);

        $sections = student::find($id);
        $sections->update([
            'firestName' => $request->firestName,
            'lastname' => $request->lastname,
            'academicnumber' => $request->academicnumber,
            'age' => $request->age,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session()->flash('edit','تم تعديل  بنجاج');
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  \App\Student  $student
     * return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      
        $id = $request->id;

        student::find($id)->delete();
        session()->flash('delete','تم حذف  بنجاح');
        return redirect('student');
    }
}
