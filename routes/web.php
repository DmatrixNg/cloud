<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('student/register', function () {

    return view('auth.register_student');
})->name('student.register');
Route::get('lecturer/register', function () {

    return view('auth.register_lecturer');
})->name('lecturer.register');

// Route::get('lecturers', function () {
//     return view('lecturer');
// })->name('lecturers');

//lecturer
Route::middleware(['auth'])->group(function () {

    Route::get('/lecturers', [\App\Http\Controllers\LecturerController::class, 'index'])->name('lecturers');
    Route::get('/lecturer/remove/{id}', [\App\Http\Controllers\StudentCourseController::class, 'destroy'])->name('lecturer.remove');

    Route::get('/composer', [\App\Http\Controllers\ComposeController::class, 'index'])->name('lecturer.compose');
    Route::post('/composer/store', [\App\Http\Controllers\ComposeController::class, 'store'])->name('compose.store');
    Route::get('/composer/delete/{id}', [\App\Http\Controllers\ComposeController::class, 'destroy'])->name('compose.delete');
    Route::get('/composer/post/{id}', [\App\Http\Controllers\ComposeController::class, 'show'])->name('compose.show');



    //Student
    Route::get('students',[\App\Http\Controllers\StudentController::class, 'index' ])->name('students');
    Route::get('profile',[\App\Http\Controllers\LecturerController::class, 'create' ])->name('profile');
    Route::post('profile/update',[\App\Http\Controllers\LecturerController::class, 'update' ])->name('profile.update');
    Route::post('course/store',[\App\Http\Controllers\CourseController::class, 'store' ])->name('course.store');
    Route::post('course/delete',[\App\Http\Controllers\CourseController::class, 'destroy' ])->name('course.delete');
    Route::get('course/add',[\App\Http\Controllers\StudentCourseController::class, 'create' ])->name('course.add');
    Route::post('course/student/store',[\App\Http\Controllers\StudentCourseController::class, 'store' ])->name('course.student.store');



});
// Route::get('students', function () {
//     return view('students');
// })->name('students');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

