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
Route::get('/', "UserController@landing");
Route::post('/search-result', "ProfessionalController@searchResult");
Route::post('/userlogin', "UserController@login");
Route::post('/usersignup', "UserController@signup");

Route::get('/book-professional/{id}', "ProfessionalController@bookProfessionalPage");
Route::get('/professional-dashboard', "UserController@professionalDashboard");
Route::get('/customer-dashboard', "Customer@profile");
Route::get('/customer-favourites', "Customer@favourites");
Route::get('/professional-profile', "ProfessionalController@profile");
Route::get('/professional-favourites', "ProfessionalController@favourites");
Route::get('/professional-bookings', "ProfessionalController@bookings");
Route::get('/professional-chats', "ProfessionalController@chats");
Route::post('/email-signup', "UserController@emailSignup");
Route::post('/book-professional', "ProfessionalController@bookProfessional");
Route::get('/client-bookings', "Customer@bookings");
Route::get('/booking-accept/{id}', "BookingController@accept");
Route::get('/booking-reject/{id}', "BookingController@reject");
Route::get('/booking-complete/{id}', "BookingController@complete");

Route::post('/save-contactus', "UserController@saveContactus");
Route::post('/save-professional-registration', "UserController@saveProfessionalRegistration");
Route::post('/update-professional-registration', "UserController@updateProfessionalRegistration");
Route::post('/update-customer-registration', "UserController@updateCustomerRegistration");
Route::get('/user-logout', "UserController@logout");
Route::get('/user-file/{id}', "UserController@userFile");
Route::get('/delete-file/{id}', "UserController@deleteFile");
Route::get('/user-login', function () {
    return view('landing.user-login');
});
Route::get('/user-signup', function () {
    return view('landing.user-signup');
});
Route::get('/aboutus', function () {
    return view('landing.aboutus');
});
Route::get('/contactus', function () {
    return view('landing.contactus');
});
Route::get('/professional-registration', function () {
    return view('landing.professional-registration');
});
Auth::routes();
Route::get('/admin', "AdminController@loginPage")->middleware('checkAuth');
Route::post('/admin/login', "AdminController@login")->name('admin.login');
//Route::get('admin-dashboard', "AdminController@adminDashboard");
Route::post('admin-logout', "AdminController@logout")->name('admin.logout');
Route::get('logout-user', function (){
    \Illuminate\Support\Facades\Session::flush();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/admin');
})->name('logout-user');
Route::post('login', "AdminController@login")->name('login');
Route::get('/home', "HomeController@showDashboard")->middleware('dashboard');
Route::get('/clients', "HomeController@clients")->middleware('dashboard');
Route::get('/professionals', "HomeController@professionals")->middleware('dashboard');
Route::get('/all-bookings', "HomeController@bookings")->middleware('dashboard');
