<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Studentclass;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function addmark(){
    	$marks = DB::table('marks')->join('students', 'students.id', '=', 'marks.student_id')->join('subjects', 'subjects.id', '=', 'marks.subject_id')->join('studentclasses', 'studentclasses.id', '=', 'marks.class_id')->select('marks.*','students.name as student_name', 'subjects.subject_name', 'studentclasses.class_name')->get();

    

    	// dd($students_list_view);
        $studentclasses = Studentclass::all();
        $studentnames = Student::all();
        $studentsubjects = Subject::all();
    	return view('admin.mark.index', compact('marks', 'studentnames', 'studentsubjects', 'studentclasses',));
    }

    

    function addmarkpost(Request $request){
        // dd($request);
        $request->validate([
            'student_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'mark' => 'required'
        ]);

        // Mark::insertGetId([
        //     'student_id'  => $request->student_id,
        //     'class_id'    => $request->class_id,
        //     'subject_id' => $request->subject_id,
        //     'mark' => $request->mark,
        // ]);
        $mark = new Mark();
        $mark['student_id'] = $request->student_id;
        $mark['class_id'] = $request->class_id;
        $mark['subject_id'] = $request->subject_id;
        $mark['mark'] = $request->mark;

        $mark->save();
        
        // Mark::insertGetId([
        //     'students'    => $request->students
        // ]);

        // Studentclass::find($studentclassid)->update([
        //     'class_name' =>$class_name
        // ]);

        function updatemark($mark_id){
            $subject_name =  Subject::find($mark_id)->subject_name;
        return view('admin.subject.update', compact('subject_name', 'mark_id'));
        }

        return back()->with('success_message', 'Student Class added successfully');
    }
}
 
