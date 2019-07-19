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
    return view('index');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('appointment', 'AppointmentController');
Route::resource('contact', 'ContactController');
Route::resource('pacient', 'PacientController');
Route::resource('report', 'ReportController');
Route::resource('services', 'ServicesController');
Route::resource('treatment', 'TreatmentController');
Route::resource('user', 'UserController');
Route::resource('visit', 'VisitController');