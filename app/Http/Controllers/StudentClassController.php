<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentclass; 

class StudentClassController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    function addclass(){
    	$studentclasses = Studentclass::all();
    	return view('admin.class.index', compact('studentclasses'));
    }


    function addclasspost(Request $request){
    	$request->validate([
    		'class_name' => 'required'
    	],[
    		'class_name.required'	=> 'Please enter class',
    	]);
    	

    	$studentclassid = Studentclass::insertGetId([
    		'class_name'	=> $request->class_name,
    	]);

        Studentclass::find($studentclassid)->update([
            'class_name' =>$class_name
        ]);

    	return back()->with('success_message', 'Student information added successfully');
    }

   
}
