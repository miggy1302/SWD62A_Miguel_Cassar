<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    //display all colleges
    public function index(){
        
        $colleges = College::all();   

        return view('colleges.index', compact('colleges'));
    }

    //create new college
    public function create(){
    
        $college = new college();
        return view('colleges.create', compact('college'));
    }

    //store the form data
    public function store(Request $request){
        $request -> validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required'
        ],
        [
            'name.unique' => 'This college name already exists. Please choose a different name.',
        ]);

        college::create($request->all());

        return redirect()->route('colleges.index')->with('message', 'college has been added successfully');
    }

    //Display the edit form
    public function edit($id){
        $college = College::find($id);
        return view('colleges.edit', compact('college'));
    }
    
    // Update the user details from the edit form
    public function update($id, Request $request){
        $request -> validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required'
        ]);

        $college = College::find($id);
        $college->update($request->all());

        return redirect()->route('colleges.index')->with('message', 'College has been updated successfully!');
    }
    
}
