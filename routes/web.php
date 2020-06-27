<?php

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
Route::resource('students', 'StudentController');


Route::get('/outFollowUp', 'StudentController@outFollowUp')->name('outFollowUp');

Route::get('/outOfFollowup/{id}', 'StudentController@outOfFollowup')->name('outOfFollowup');



Route::post('/addCommentToStu/{id}', 'CommentController@addCommentToStu')->name('addCommentToStu');

Route::resource('comments', 'CommentController');
Route::get('/destroy/{id}', 'CommentController@destroy')->name('destroy');
