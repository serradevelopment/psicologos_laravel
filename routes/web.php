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
	return view('index');
});

Route::get('2', function () {
	return view('psicologos');
});

Auth::routes();

Route::namespace('Admin')->prefix('admin')->group(function(){
	Route::get('/','HomeController@index')->name('home');
	\BeautifulSea\LaravelRamodnil\LaravelRamodnilServiceProvider::routes();


	// schedules
	Route::post('/schedules/all','SchedulesController@allAvailable');

	Route::resource('/schedules','SchedulesController');
	// Route::post('/schedules/all','SchedulesController@all');
});


\BeautifulSea\LaravelRamodnil\LaravelRamodnilServiceProvider::routes();