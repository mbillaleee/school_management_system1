<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentClassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Route::get('/home', [StudentController::class, 'index'])->name('student');
// Route::get('/student', [StudentController::class, 'showData']);
// Route::post('/studentPost', [supplierController::class, 'studentPost'])->name('supplierPost');

// Route::get('/supplier', [supplierController::class, 'supplier'])->name('supplier');
// Route::post('/supplierPost', [supplierController::class, 'supplierPost'])->name('supplierPost');
// Route::get('/supplier/{id}', [supplierController::class, 'supplier'])->name('supplierEdit');
// Route::post('/supplierPost/{id}', [supplierController::class, 'supplierPost'])->name('supplierPostUpdate');


Route::get('/class', [StudentClassController::class, 'showData']);




Route::get('/add/student', [StudentController::class, 'addstudent']);
Route::post('/add/student/post', [StudentController::class, 'addstudentpost']);
Route::get('/update/student/{student_id}', [StudentController::class, 'updatestudent']);





Route::get('/add/class', [StudentClassController::class, 'addclass']);
Route::post('/add/class/post', [StudentController::class, 'addclasspost']);
// Route::get('/update/student/{student_id}', [StudentController::class, 'updatestudent']);