<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\Studentclass; 

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function showData(){
    // 	$students = Student::all();
    // 	return view('student.show_data', compact('students'));
    // }

    function addstudent(){
    	$students = Student::all();
        $studentclasses = Studentclass::all();
    	return view('admin.student.index', compact('students', 'studentclasses'));
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
    	

    	$student_id = Student::insertGetId([
    		'name'	=> $request->name,
    		'mobile'	=> $request->mobile,
    		'email'	=> $request->email,
    		'image'	=> $request->image,
    		'present_address'	=> $request->present_address,
    		'permanent_address'	=> $request->permanent_address,
    		'current_class'	=> $request->current_class
    	]);

    	//photo upload
    	$uploaded_photo = $request->file('image');
    	$new_name = $student_id.".".$uploaded_photo->getClientOriginalExtension();
    	$new_upload_location = base_path('public/uploads/students/'.$new_name);
    	Image::make($uploaded_photo)->resize(100, 100)->save($new_upload_location);

        Student::find($student_id)->update([
            'image' =>$new_name
        ]);

    	return back()->with('success_message', 'Student information added successfully');
    }
    function updatestudent($student_id){
    	$student_name =  Student::find($student_id)->name;
        $student_image =  Student::find($student_id)->image;
    	return view('admin.student.update', compact('student_name', 'student_image'));
    }

    function updatestudentpost(Request $request){
        //old photo delete start
        echo $delete_photo_location = base_path('public/uploads/students/'.Student::find($request->student_id)->image);
        //old photo delete end
        
        // $student_name =  Student::find($student_id)->name;
     //    $student_image =  Student::find($student_id)->image;
        // return view('admin.student.update', compact('student_name', 'student_image'));
    }

    function deletestudent($student_id){
        Studentclass::find($student_id)->delete();
        return back()->with('delete_status', 'Student Information delete successfully');
    }
}
