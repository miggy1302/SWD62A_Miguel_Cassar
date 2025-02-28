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
            'name' => 'required',
            'address' => 'required'
        ]);

        college::create($request->all());

        return redirect()->route('colleges.index')->with('message', 'college has been added successfully');
    }
    
}
