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

Route::get('/', function (){
   return view('layout.index');
});

//CLIENT
Route::get('/survey', function () {
    return view('client.survey');
});

Route::get('/survey', 'SurveyController@loadPage');
Route::put('/survey/{id}/done', 'SurveyController@done');

Route::get('/editProfile', 'ProfileController@editProfile');
Route::post('/editProfile', 'ProfileController@updateProfile');

Route::get("/list", "ListStudentController@getListPaginate");

Route::get("/profile", "ProfileController@loadProfilePage");

Route::get('student/{studentID}', 'DetailPageController@showStudentDetail');

Route::get('dashboard', 'DashBoardController@index');


//ADMIN
//Route::get('/admin/students', 'ListStudentController@getListPaginate');
Route::get('/users', 'UserController@index');
Route::put('/user/{userID}/authorize', 'UserController@reAuthorize');

Route::delete('student/{studentID}/delete', 'ListStudentController@removeStudent');
Route::delete('user/{userID}/delete', 'UserController@removeUser');
Route::get('history', 'HistoryController@index');

Auth::routes();

Route::get('/home', 'DashBoardController@index')->name('home');

Route::get('logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});
