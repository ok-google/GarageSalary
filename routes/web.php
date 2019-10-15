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

// Route::get('/', function () {
//     return view('welcome');
// });

// HOME
Route::get('/', 'HomeController@index');

// LOGIN
Route::get('/Login', 'LoginController@index');
Route::put('/Login', 'LoginController@auth');
Route::get('/Logout', 'LoginController@logout');

// REGISTER
Route::get('/Register', 'RegisterController@index');
Route::put('/Register', 'RegisterController@insert');

//Setting Bulan
Route::get('/Bulan/', 'SettingBulanController@Index');
Route::get('/Bulan/Get', 'SettingBulanController@Get');
Route::get('/Bulan/Generate/{bulan}/{tahun}', 'SettingBulanController@Generate');


//MASTER USER
Route::get('/ChangePassword', 'MUserController@ChangePassword');
Route::put('/ChangePassword', 'MUserController@doChangePassword');
