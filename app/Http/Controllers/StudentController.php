<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Student;

class StudentController extends Controller
{
    //display all Students
    public function index(){
        $colleges = College::orderby('name')->pluck('name', 'id')->prepend('All Colleges', '');

        if(request('college_id')== null){
            $students = Student::all();    
        }else{
            $students = Student::where('college_id', request('college_id'))->get();
        }
        return view('students.index', compact('students', 'colleges'));
    }

    //create new Student
    public function create(){
    
        $student = new student();
        $colleges = College::orderby('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.create', compact('Colleges', 'student'));
    }

    //store the form data
    public function store(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'college_id'=> 'required|exists:colleges,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('message', 'Student has been added successfully');
    }

    //Display the edit form
    public function edit($id){
        $student = Student::find($id);
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.edit', compact('Colleges', 'student'));
    }
    
    // Update the user details from the edit form
    public function update($id, Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'college_id'=> 'required|exists:colleges,id',
        ]);

        $student = Student::find($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('message', 'Student has been updated successfully!');
    }

    // Destroy the contact with the id
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully');
    }
}
