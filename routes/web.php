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
    return view('home');
});

Route::post('/postregister/create', 'RegisterController@create');

//login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('logout', 'AuthController@logout');

//karyawan-admin
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    // Route::get('/dashboard', 'DashboardController@index');
    Route::get('/karyawan', 'KaryawanController@index');
    Route::post('/karyawan/create', 'KaryawanController@create');
    Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
    Route::post('/karyawan/{id}/update', 'KaryawanController@update');
    Route::get('/karyawan/{id}/delete', 'KaryawanController@delete');
});
//std_user
Route::group(['middleware' => ['auth', 'checkRole:admin,std_user']], function(){
    // Route::get('/dashboard', 'StandarUser@index');
    // Route::get('/dashboard', 'DashboardController@index');
});
//access_user
Route::group(['middleware' => ['auth', 'checkRole:admin,std_user,access_user']], function(){
    // Route::get('/dashboard', 'AccessUser@index');
    Route::get('/dashboard', 'DashboardController@index');
});