<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use Carbon\Carbon;

class StudentController extends Controller
{
    // public function showData(){
    // 	$students = Student::all();
    // 	return view('student.show_data', compact('students'));
    // }

    function addstudent(){
    	$students = Student::all();
    	return view('admin.student.index', compact('students'));
    }

    function addstudentpost(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'mobile' => 'required',
    		'email' => 'required',
    		'image' => 'required|image',
    		'present_address' => 'required',
    		'permanent_address' => 'required',
    		'current_class' => 'required'
    	],[
    		'name.required'	=> 'Please enter student name',
    		'mobile.required'	=> 'Please enter mobile number',
    		'email.required'	=> 'Please enter email',
    		'image.required'	=> 'Please select image',
    		'present_address.required'	=> 'Please enter present address',
    		'permanent_address.required'	=> 'Please enter permanent address',
    		'current_class.required'	=> 'Please select class'
    	]);
    	

    	$stuent_id = Student::insert([
    		'name'	=> $request->name,
    		'mobile'	=> $request->mobile,
    		'email'	=> $request->email,
    		'image'	=> $request->image,
    		'present_address'	=> $request->present_address,
    		'permanent_address'	=> $request->permanent_address,
    		'current_class'	=> $request->permanent_address
    	]);

    	$uploaded_photo = $request->file('image');
    	
    	echo $new_name = $id.".".$uploaded_photo->extension();

    	return back()->with('success_message', 'Student information added successfully');
    }
    function updatestudent($student_id){
    	// echo $student_id
    	$student_name =  Student::find($student_id)->name;
    	return view('admin.student.update', compact('student_name'));
    }
}
