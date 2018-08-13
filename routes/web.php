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
    return view('landing_page/index');
});

Route::resource('/users','UsersController');
Route::get('/users/delete/{id}',['uses' =>'UsersController@destroy']);
Route::get('/users/show/{id}',['uses' =>'UsersController@show']);

Route::resource('/applicants','ApplicantsController');
Route::get('/applicants/delete/{id}',['uses' =>'ApplicantsController@destroy']);
Route::get('/applicants/show/{id}',['uses' =>'ApplicantsController@show']);