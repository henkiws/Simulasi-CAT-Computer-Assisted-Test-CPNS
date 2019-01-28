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
Route::get('forget', 'AuthController@forget');
Route::post('forget', 'AuthController@forget_password');
Route::post('register/store', 'AuthController@store');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::group(['middleware' => ['role:user']], function () {
Route::middleware('system.auth')->group(function(){
    Route::get('profile','QuestionController@profile');
    Route::get('ujian','QuestionController@index');
    Route::get('skor','QuestionController@skor');
    Route::post('finish','QuestionController@finish');
    Route::post('ajax','QuestionController@ajax');
    Route::post('answer','QuestionController@answer');
    Route::post('store','QuestionController@store');
});
});

//superadmin
Route::group(['middleware' => ['role:superadmin']], function () {
Route::namespace('admin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard','DashboardController@index');

        Route::get('question','MasterQuestionController@index');
        Route::get('question/datatables','MasterQuestionController@datatables');
        Route::get('question/ajax/{id}','MasterQuestionController@ajax');
        Route::get('question/create','MasterQuestionController@create');
        Route::post('question/store','MasterQuestionController@store');
        Route::delete('question/{id}','MasterQuestionController@destroy');

        Route::get('user','UserController@index');
        Route::get('user/datatables','UserController@datatables');

        Route::get('ljk','LjkController@index');
        Route::get('ljk/datatables','LjkController@datatables');
        Route::get('ljk/detail/{id}','LjkController@detail');
        Route::get('ljk/detail/{id}/datatables','LjkController@detail_datatables');

        Route::get('role','PermissionController@index_role');
        Route::get('permission','PermissionController@index_permission');
        Route::post('role','PermissionController@store_role');
        Route::post('permission','PermissionController@store_permission');
        Route::get('permission/datatables','PermissionController@datatables');
        Route::get('role/{id}','PermissionController@show_role');
        Route::post('role/assign','PermissionController@role_assign');
        Route::get('user/{user_id}/role/{role}','PermissionController@user_assign_role');
        Route::delete('permission/{id}','PermissionController@user_assign_role_remove');
        Route::post('permission/show-all','PermissionController@show_permission');
        
    });
});
});