<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Course', 'CoursesController');
Route::resource('trainer', 'TrainersController');
Route::resource('/student', 'StudentController');
Route::resource('/ClassCourses', 'ClassCourseController');
Route::resource('/fasel', 'FaselController');


Route::get('/{page}', 'AdminController@index');

