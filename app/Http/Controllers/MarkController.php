<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Studentclass;
use App\Models\Student;
use App\Models\Subject;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function addmark(){
    	$marks = Mark::all();
    	// $students = Student::orderBy('name')->get();
    	$students = Student::where('name')->get();
    	$subjects = Subject::all();
        $studentclasses = Studentclass::all();
        $studentnames = Student::all();
        $studentsubjects = Subject::all();
    	return view('admin.mark.index', compact('marks', 'students', 'subjects', 'studentclasses', 'studentnames', 'studentsubjects'));
    }

    function addclasspost(Request $request){
        // $request->validate([
        //     'students' => 'required',
        //     'studentclasses' => 'required',
        //     'subjects' => 'required',
        //     'marks' => 'required'
        // ]
        

        // Studentclass::insertGetId([
        //     'students'    => $request->students
        // ]);

        // Studentclass::find($studentclassid)->update([
        //     'class_name' =>$class_name
        // ]);

        return back()->with('success_message', 'Student Class added successfully');
    }
}
 