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
            $students = Student::orderBy('name')->get();     
        }else{
            $students = Student::where('college_id', request('college_id'))->orderBy('name')->get();
        }
        return view('students.index', compact('students', 'colleges'));
    }

    //create new Student
    public function create(){
    
        $student = new student();
        $colleges = College::orderby('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.create', compact('colleges', 'student'));
    }

    //store the form data
    public function store(Request $request){
        // Log request data to check if dob is included
        \Log::info($request->all());
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:8|unique:students,phone',
            'dob' => 'required|date|before:today',
            'college_id'=> 'required|exists:colleges,id',
        ],[
            'dob.before' => 'The date of birth must be in the past.',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('message', 'Student has been added successfully');
    }

    //Display the edit form
    public function edit($id){
        $student = Student::find($id);
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        return view('students.edit', compact('colleges', 'student'));
    }
    
    // Update the user details from the edit form
    public function update($id, Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id, // Ignore the current student's email
            'phone' => 'required|digits:8|unique:students,phone,' . $id, //// Ignore the current student's phone
            'dob' => 'required|date|before:today',
            'college_id'=> 'required|exists:colleges,id',
        ]);

        $student = Student::find($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('message', 'Student has been updated successfully!');
    }

    // Destroy the student with the id
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully');
    }
}
