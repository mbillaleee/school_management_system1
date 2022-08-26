<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Student;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function addsubject(){
    	$subjects = Subject::all();
    	return view('admin.subject.index', compact('subjects'));
    }
}
