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
    		'class_name'	=> $request->class_name
    	]);

        // Studentclass::find($studentclassid)->update([
        //     'class_name' =>$class_name
        // ]);

    	return back()->with('success_message', 'Student Class added successfully');
    }

    function updateclass($class_id){
    	$class_name =  Studentclass::find($class_id)->class_name;
    	return view('admin.class.update', compact('class_name', 'class_id'));
    }

    function updateclasspost(Request $request){
    	// print_r($request->class_name);
    	// print_r($request->class_id);
    	Studentclass::find($request->class_id)->update([
    		'class_name' => $request->class_name
    	]);
    	return redirect('add/class')->with('update_status', 'Class updated successfully');
    }

    function deleteclass($class_id){
    	Studentclass::find($class_id)->delete();
    	return back()->with('delete_status', 'Class delete successfully');
    }

   
}
