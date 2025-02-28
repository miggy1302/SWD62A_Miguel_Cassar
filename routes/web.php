<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('colleges.index');
});

//-----------COLLEGES ROUTES---------------

// route that will return a list of Colleges
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');

// route that will allow a user to create a College
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');

// Route that will store the data of a new College
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');

// route that will show the edit form
Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');

//route that will process the updated values of the College
Route::put('/colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update');

//-----------STUDENTS ROUTES---------------

// route that will return a list of students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// route that will allow a user to create a students
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Route that will store the data of a new students
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// route that will show the edit form
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

//route that will process the updated values of the students
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

// Route that will delete a specific students
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');