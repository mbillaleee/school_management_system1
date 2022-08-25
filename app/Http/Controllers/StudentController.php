<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function showData(){
    	$students = Student::all();
    	return view('show_data', compact('students'));
    }
}
