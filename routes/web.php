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

Route::get('/', 'AuthController@index');
Route::get('register', 'AuthController@create');
Route::post('register/store', 'AuthController@store');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::middleware('system.auth')->group(function(){
    Route::get('ujian','QuestionController@index');
});

//superadmin
Route::namespace('admin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard','DashboardController@index');

        Route::get('question','MasterQuestionController@index');
        Route::get('question/create','MasterQuestionController@create');

        Route::get('user','UserController@index');

        Route::get('live','LiveScoreController@index');
    });
});
