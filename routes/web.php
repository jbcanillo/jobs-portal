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

Route::get('/login', function () {
    if(Auth::user()){
        return redirect('/logout');
    }else{
        return view('landing_page/login');
    }
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});


Route::get('/preferences', function () {
    return view('/preferences');
});

Route::resource('/sign_up','SignUpController');

Route::post('/home','LoginController@home');
Route::get('/logout','LoginController@logout');

Route::resource('/users','UsersController');
Route::get('/users/delete/{id}',['uses' =>'UsersController@destroy']);
Route::get('/users/show/{id}',['uses' =>'UsersController@show']);

Route::resource('/applicants','ApplicantsController');
Route::get('/applicants/delete/{id}',['uses' =>'ApplicantsController@destroy']);
Route::get('/applicants/show/{id}',['uses' =>'ApplicantsController@show']);

Route::resource('/employers','EmployersController');
Route::get('/employers/delete/{id}',['uses' =>'EmployersController@destroy']);
Route::get('/employers/show/{id}',['uses' =>'EmployersController@show']);

Route::resource('/requests','RequestsController');
Route::get('/requests/delete/{id}',['uses' =>'RequestsController@destroy']);
Route::get('/requests/show/{id}',['uses' =>'RequestsController@show']);

Route::resource('/job_matching','JobMatchingController');
Route::get('/job_matching/void/{id}',['uses' =>'JobMatchingController@destroy']);
Route::get('/job_matching/show/{id}',['uses' =>'JobMatchingController@show']);

Route::resource('/reviews','ReviewsController');
Route::get('/reviews/void/{id}',['uses' =>'ReviewsController@destroy']);
Route::get('/reviews/show/{id}',['uses' =>'ReviewsController@show']);
