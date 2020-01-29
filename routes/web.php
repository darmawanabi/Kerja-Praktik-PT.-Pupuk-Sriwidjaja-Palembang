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
    Route::get('/karyawan', 'KaryawanController@index');
    Route::post('/karyawan', 'KaryawanController@store');
    Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
    Route::post('/karyawan/{id}/update', 'KaryawanController@update');
    Route::get('/karyawan/{id}/delete', 'KaryawanController@delete');
    Route::get('/master', 'TableMasterController@index');
    Route::post('/master', 'TableMasterController@store');
    Route::patch('/master', 'TableMasterController@update');
    Route::get('/master/{jenis}/{id}/delete', 'TableMasterController@delete');
});
//access_user & std_user
Route::group(['middleware' => ['auth', 'checkRole:admin,std_user,access_user']], function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/{menu}', 'PostController@index')->name('posts');
    Route::post('/{menu}', 'PostController@store');
    Route::get('/{menu}/{id}', 'PostController@show');
    Route::post('/contract/{contract}', 'ContractController@store');
    Route::post('/perizinan/{perizinan}', 'PerizinanController@store');
    Route::get('/perizinan', 'PostController@index');
    Route::post('/perizinan', 'PostController@store');
    Route::get('/perizinan/{perizinan}', 'PostController@show');
});

// Download Contract
Route::patch('/contract', 'PostController@loggingDownload');
Route::patch('/contract/{contract}', 'PostController@loggingDownload');
Route::put('/contract/{contract}', 'ContractController@loggingDownload');

Route::get('contract/{uuid}/download', 'PostController@download');
Route::get('contract/{post_id}/{uuid}/download', 'ContractController@download');

// Download Perizinan
Route::patch('/perizinan', 'PostController@loggingDownload');
Route::patch('/perizinan/{perizinan}', 'PostController@loggingDownload');
Route::put('/perizinan/{perizinan}', 'PerizinanController@loggingDownload');

Route::get('perizinan/{uuid}/download', 'PostController@download');
Route::get('perizinan/{post_id}/{uuid}/download', 'PerizinanController@download');
