<?php
// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Author\StudentController;

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

Route::get('/contact',function(){
	return view('contact');
})->middleware('age');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']],
	function(){
		Route::get('dashboard','DashboardController@index')->name('dashboard');
		//Route::get('students',[StudentController::class, 'index'])->name('students.index');
	});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth','author']],
	function(){
		Route::get('dashboard','DashboardController@index')->name('dashboard');
	});

// Route::group(['as'=>'student.', 'prefix'=>'student', 'namespace'=>'Student', 'middleware'=>['auth','student']],
// 	function(){
// 		Route::get('dashboard','DashboardController@index')->name('dashboard');
// 	});


// Route::get('/signup', 'StudentController@create');
// Route::post('/signup', 'StudentController@store');


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/sections/{class_id}',[StudentController::class, 'getSections'])->name('sections.get');


// routes/web.php

//Route::get('/dashboard', [StudentController::class,'dashboard'])->name('author.dashboard');
