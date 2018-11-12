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
        if(Auth::user()->role=='Administrator'){
            return redirect('/dashboard');
        }elseif(Auth::user()->role=='Employer'){
            return redirect('employer/profile');
        }elseif(Auth::user()->role=='Applicant'){
            return redirect('applicant/profile');
        }
    }else{
        return view('landing_page/login');
    }
});

Route::get('/dashboard', 'DashboardController@index');

Route::resource('/sign_up','SignUpController');

Route::get('/forgot_password', function () {
    return view('/landing_page/forgot_password');
});

Route::get('/forgot_password', function () {
    return view('/landing_page/forgot_password');
});

Route::post('/reset_password','LoginController@saveNewPassword');
Route::get('/reset_password/{token}','LoginController@updatePassword');

Route::post('/change_password','LoginController@saveNewPassword');
Route::get('/change_password/{token}','LoginController@updatePassword');

Route::get('/account_activation/{activation_code}',['uses' => 'SignUpController@activateAccount']);

Route::post('/forgot_password','MailController@sendForgotPasswordEmail');
Route::post('/send_message','MailController@sendMessageEmail');
Route::get('/logout','LoginController@logout');

Route::post('/home','LoginController@home');
Route::get('/home','LoginController@home');
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
Route::get('/requests/process/{id}',['uses' =>'RequestsController@process']);
Route::get('/requests/getApplicantDetails/{id}',['uses' =>'RequestsController@getApplicantDetails']);

Route::resource('/employer/profile','EmployersProfileController');

Route::resource('/employer/requests','EmployersRequestController');
Route::get('/employer/requests/delete/{id}',['uses' =>'EmployersRequestController@destroy']);
Route::get('/employer/requests/show/{id}',['uses' =>'EmployersRequestController@show']);

Route::resource('/applicant/profile','ApplicantsProfileController');
Route::get('/applicant/requests/show/{id}',['uses' =>'ApplicantsProfileController@show']);


Route::get('/symlink', function () {
    $storage = App::make('files')->link(storage_path('app/public'), public_path('storage'));
    if($storage){
        echo "Public storage link file created.";
    }
});

Route::get('test_mod','DashboardController@getUsers');