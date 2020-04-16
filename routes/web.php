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
	return view('home');
})->name('home');

Route::get('/busca', function () {
	return view('psicologos');
});

Route::get('/calendario', function () {
	return view('calendario');
});

Route::prefix('avalie')->group(function(){
	Route::get('/','RatingsController@index');
	Route::post('/', 'RatingsController@store');
});

Auth::routes();


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::namespace('Admin')->prefix('painel')->group(function () {

	Route::middleware('can:isAdmin')->prefix('ratings')->group(function(){
		Route::get('/','RatingsController@index')->name('ratings.index');
		Route::get('/ratings/unblock/{rating}', 'RatingsController@unblock')->name('ratings.unblock');
		Route::get('/ratings/block/{rating}', 'RatingsController@block')->name('ratings.block');
		Route::delete('/ratings/{rating}', 'RatingsController@destroy')->name('ratings.destroy');
	});
	

	Route::post('/cadastrar', 'UsersController@register')->name('users.cadastrar');
	Route::get('/cadastrar', 'UsersController@registerForm')->name('users.cadastrar.create');
	Route::prefix('psicologo')->group(function () {
		Route::get('/', 'HomeController@index')->name('home');
		\BeautifulSea\LaravelRamodnil\LaravelRamodnilServiceProvider::routes();
		// schedules
		Route::post('/schedules/allAvailable', 'SchedulesController@allAvailable');
		Route::post('/schedules/all', 'SchedulesController@all');
		Route::resource('/schedules', 'SchedulesController');
		Route::get('/mySchedules', 'SchedulesUsersController@getMySchedules');

		Route::delete('/schedules_users/{schedule}', 'SchedulesUsersController@destroy')->name('schedules_users.destroy');
		Route::post('/schedules_users/all_in_date_selected', 'SchedulesUsersController@allInDateSelected')->name('schedules_users.all_in_date_selected');
		Route::post('/schedules_users/savePatient', 'SchedulesUsersController@savePatient');
		Route::post('/schedules_users/getScheduleUser', 'SchedulesUsersController@getScheduleUser');
		Route::post('/schedules_users/endSchedule', 'SchedulesUsersController@endSchedule');
		Route::post('/schedules_users/setAusent', 'SchedulesUsersController@setAusent');

		// Route::post('/schedules/all','SchedulesController@all');
	});
});
