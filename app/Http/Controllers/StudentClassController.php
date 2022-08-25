<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentclass;

class StudentClassController extends Controller
{
    public function showData(){
    	$studentsclasses = Studentclass::all();
    	return view('class.show_data', compact('studentsclasses'));
    }
}
