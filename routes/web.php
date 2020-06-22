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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'PagesController@dashboard')->name('dashboard');
        Route::resource('karyawan', 'KaryawanController');
        Route::group(['prefix' => 'dtx'], function () {
            Route::get('karyawan', 'DtController@karyawan');
            Route::get('jabatan', 'DtController@jabatan');
            Route::get('pendidikan', 'DtController@pendidikan');
            Route::get('status', 'DtController@status');
        });
        Route::group(['prefix' => 'jabatan'], function () {
            Route::get('/', 'JabatanController@main')->name('jabatan');
            Route::post('/', 'JabatanController@adding')->name('jabatan.tambah');
            Route::patch('{id}', 'JabatanController@updating');
            Route::delete('{id}', 'JabatanController@deleting');
        });
        Route::group(['prefix' => 'pendidikan'], function () {
            Route::get('/', 'PendidikanController@main')->name('pendidikan');
            Route::post('/', 'PendidikanController@adding')->name('pendidikan.tambah');
            Route::patch('{id}', 'PendidikanController@updating');
            Route::delete('{id}', 'PendidikanController@deleting');
        });
        Route::group(['prefix' => 'status'], function () {
            Route::get('/', 'StatusController@main')->name('status');
            Route::post('/', 'StatusController@adding')->name('status.tambah');
            Route::patch('{id}', 'StatusController@updating');
            Route::delete('{id}', 'StatusController@deleting');
        });
    });
});
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('test', 'PagesController@test');