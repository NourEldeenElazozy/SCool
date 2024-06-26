<?php

namespace App\Http\Controllers;

use App\Trainers;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
   
    public function index()
    {
        $Trainers = Trainers::all();
        return view('trainer.trainer', compact('Trainers'));
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $input = $request->all();

        // Validate the input
        $validatedData = $request->validate([
            'namefirst' => 'required|alpha',
            'lastname' => 'required|alpha',
            'fullname' => 'required|alpha',
            'phone' => 'required|numeric|unique:Trainers',
            'email' => 'required||unique:Trainers',
            'password' => 'required',
        ],[

            'firstname.required' =>'يرجي ادخال الاسم الاول',
            'lastname.required' =>'يرجي ادخال اللقب',
            'fullname.required' =>'يرجي ادخال اللقب',
            'phone.unique' =>'الرقم الدراسي مسجل مسبقا',
            'email.required'=> 'يرجي ادخال الايميل',
            'password.required'=> 'يرجي ادخال الرمز السري',


        ]);
        
       
        Trainers::create([
                'namefirst' => $validatedData['namefirst'],
                'lastname' => $validatedData['lastname'],
                'fullname' => $validatedData['fullname'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'password' => hash('sha256', $validatedData['password']),
            ]);
            // Set a flash message with 'success' key
            $request->session()->flash('success', 'تم إضافة  بنجاح');
            return redirect('/trainer');
    }

    
    public function show(Trainers $trainers)
    {
        //
    }

   
    public function edit(Trainers $trainers)
    {
        //
    }

    
    public function update(Request $request, Trainers $trainers)
    {
        $id = $request->id;

        $this->validate($request, [
            
            'namefirst' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:Trainers,phone,'.$id,
            'email' => 'required|email|unique:Trainers,email,'.$id,
            'password' => 'required|string|min:8|'
        ],[

            'namefirst.required' =>'يرجي ادخال الاسم الاول',
            'lastname.required' =>'يرجي ادخال اسم الاب',
            'fullname.required' =>'يرجي ادخال اللقب',
            'phone.unique' =>'رقم الهاتف  مسجل مسبقا',
            'email.required'=> 'يرجي ادخال الايميل',
            'password.required'=> 'يرجي ادخال الرمز السري',



        ]);

        $sections = Trainers::find($id);
        $sections->update([
            'namefirst' => $request->namefirst,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        session()->flash('edit','تم التعديل بنجاج');
        return redirect('/trainer');
    }
    

        public function destroy(Request $request,Trainers $trainers)
    {
        $id = $request->id;

        Trainers::find($id)->delete();
        session()->flash('delete','تم حذف  بنجاح');
        return redirect('trainer');
    }
}
