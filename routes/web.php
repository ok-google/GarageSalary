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

$router->group(['prefix' => 'pegawai'], function () use ($router) {
    $router->get('/', ['uses' => 'MPegawaiController@index']);
    $router->get('/fetch', ['uses' => 'MPegawaiController@fetch']);
    $router->get('/{id}',  ['uses' => 'MPegawaiController@find']);
    $router->post('/store',  ['uses' => 'MPegawaiController@store']);
    $router->post('/update',  ['uses' => 'MPegawaiController@update']);
    $router->post('/delete',  ['uses' => 'MPegawaiController@delete']);
});
//Route::get('/', 'MPegawaiController@index');
