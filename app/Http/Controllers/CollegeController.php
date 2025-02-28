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
    
        $collage = new collage();
        return view('collages.create', compact('collage'));
    }

    //store the form data
    public function store(Request $request){
        $request -> validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        Collage::create($request->all());

        return redirect()->route('collages.index')->with('message', 'collage has been added successfully');
    }
    
}
