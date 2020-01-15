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
    Route::post('/karyawan', 'KaryawanController@store');
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
    Route::get('/contracts', 'PostController@index');
    Route::post('/contracts', 'PostController@store');
    Route::get('/contracts/{contract}', 'PostController@show');
    Route::post('/contracts/{contract}', 'ContractController@store');
    Route::get('/perizinan', 'PostPerizinanController@index');
    Route::post('/perizinan', 'PostPerizinanController@store');
    Route::get('/perizinan/{perizinan}', 'PostPerizinanController@show')->name('perizinan');
    Route::post('/perizinan/{perizinan}', 'PerizinanController@store');
});

// Download Contract
Route::patch('/contracts', 'PostController@loggingDownload');
Route::patch('/contracts/{contract}', 'PostController@loggingDownload');
Route::put('/contracts/{contract}', 'ContractController@loggingDownload');

Route::get('contracts/{uuid}/download', 'PostController@download');
Route::get('contracts/{post_id}/{uuid}/download', 'ContractController@download');

// Download Perizinan
Route::patch('/perizinan', 'PostPerizinanController@loggingDownload');
Route::patch('/perizinan/{perizinan}', 'PostPerizinanController@loggingDownload');
Route::put('/perizinan/{perizinan}', 'PerizinanController@loggingDownload');

Route::get('perizinan/{uuid}/download', 'PostPerizinanController@download');
Route::get('perizinan/{post_id}/{uuid}/download', 'PerizinanController@download');

// Route::get('/contracts/{uuid}/download', 'PostController@log_for_download');
// Route::get('/contracts/{post_id}/{uuid}/download', 'ContractController@download');
