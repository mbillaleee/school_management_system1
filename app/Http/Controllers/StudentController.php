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
        $student_mobile =  Student::find($student_id)->mobile;
        $student_email =  Student::find($student_id)->email;
        $student_present_address =  Student::find($student_id)->present_address;
        $student_permanent_address =  Student::find($student_id)->permanent_address;
        $student_current_class =  Student::find($student_id)->current_class;

        $studentclasses = Studentclass::all();
    	return view('admin.student.update', compact('student_name', 'student_id', 'student_image', 'student_mobile', 'student_email', 'student_present_address', 'student_permanent_address', 'student_current_class', 'studentclasses'));
    }

    function updatestudentpost(Request $request){
        //old photo delete start

        // $delete_photo_location = base_path('public/uploads/students/'.Student::find($request->student_id)->image);
        // unlink($delete_photo_location);
        
        //old photo delete end
        // new photo upload start
        //photo upload
        $uploaded_photo = $request->file('new_image');
        $new_name = $request->student_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/students/'.$new_name);
        Image::make($uploaded_photo)->resize(100, 100)->save($new_upload_location);
        // new photo upload start

        //new photo update at db start
        Student::find($request->student_id)->update([
            'image' => $new_name
        ]);
        //new photo update at db end
      
      Student::find($request->student_id)->update([
            'student_name'  => $request->student_name,
            'student_mobile'  => $request->student_mobile,
            'student_email'  => $request->student_email,
            'student_present_address'  => $request->student_present_address,
            'student_permanent_address'  => $request->student_permanent_address,
            'student_current_class'  => $request->student_current_class
        ]);
        
        // $student_name =  Student::find($student_id)->name;
     //    $student_image =  Student::find($student_id)->image;
        // return view('admin.student.update', compact('student_name', 'student_image'));

      return redirect('add/student');

    }

    function deletestudent($student_id){
        // dd($student_id);

        $student_del = Student::find($student_id);
        unlink(base_path('public/uploads/students/'.$student_del->image));
        $student_del->delete();
        
        return back()->with('delete_status', 'Student Information delete successfully');
    }
}



