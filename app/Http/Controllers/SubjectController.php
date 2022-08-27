<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Studentclass; 

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function addsubject(){
    	$subjects = Subject::all();
    	$studentclasses =Studentclass::all();
    	return view('admin.subject.index', compact('subjects', 'studentclasses'));
    }


    function addsubjectpost(Request $request){
    	$request->validate([
    		'subject_name' => 'required'
    	],[
    		'subject_name.required'	=> 'Please enter Subject',
    	]);
    	

    	$studentsubjectid = Subject::insertGetId([
    		'subject_name'	=> $request->subject_name
    	]);
    	

       

    	return back()->with('success_message', 'Student Class added successfully');
    }

    function updatesubject($subject_id){
    	$subject_name =  Subject::find($subject_id)->subject_name;
    	return view('admin.subject.update', compact('subject_name', 'subject_id'));
    }

    function updatesubjectpost(Request $request){
    	// print_r($request->class_name);
    	// print_r($request->class_id);
    	Subject::find($request->subject_id)->update([
    		'subject_name' => $request->subject_name
    	]);
    	return redirect('add/subject')->with('update_status', 'Subject updated successfully');
    }

    function deletesubject($subject_id){
    	Subject::find($subject_id)->delete();
    	return back()->with('delete_status', 'Subject delete successfully');
    }
}
