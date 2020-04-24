<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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
	$qtd_users = count(App\User::all());
	$hours_disponibility = DB::table('schedules_has_users')->where('status',"!=","null")->count();
	$qtd_patients =  DB::table('schedules_has_users')->where('status','FINISHED')->count();
	// DESCOMENTAR PARA GERAR UM SITEMAP ATUALIZADO
	// Sitemap::create('https://euteapoio.com')->add(Url::create('/')
    //     ->setLastModificationDate(Carbon::yesterday())
    //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
	// 	->setPriority(1.0))
	// ->add(Url::create('/avalie')
	// ->setLastModificationDate(Carbon::yesterday())
	// ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
	// ->setPriority(0.5))
	// ->writeToFile('sitemap.xml');

	return view('home')->with(['qtd_users'=>$qtd_users, 'hours_disponibility'=>$hours_disponibility, 'qtd_patients'=>$qtd_patients]);
})->name('home');

Route::get('/busca', function () {
	return view('psicologos');
});

Route::get('/calendario', function () {
	return view('calendario');
});

Route::get('/termos', function () {
	return view('terms');
});
Route::get('/politica_de_privacidade', function () {
	return view('policy');
});

Route::prefix('avalie')->group(function () {
	Route::get('/', 'RatingsController@index');
	Route::post('/', 'RatingsController@store');
});

Auth::routes();


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::namespace('Admin')->prefix('painel')->group(function () {

	Route::prefix('ratings')->group(function () {
		Route::get('/', 'RatingsController@index')->name('ratings.index');
		Route::group(['middleware' => 'can:isAdmin'], function () {
			Route::get('/ratings/unblock/{rating}', 'RatingsController@unblock')->name('ratings.unblock');
			Route::get('/ratings/block/{rating}', 'RatingsController@block')->name('ratings.block');
			Route::delete('/ratings/{rating}', 'RatingsController@destroy')->name('ratings.destroy');
		});
	});


	Route::post('/cadastrar', 'UsersController@register')->name('users.cadastrar');
	Route::get('/cadastrar', 'UsersController@registerForm')->name('users.cadastrar.create');
	Route::prefix('/psicologo')->group(function () {
		\BeautifulSea\LaravelRamodnil\LaravelRamodnilServiceProvider::routes();

		Route::get('/', 'HomeController@index')->name('home');
		Route::get('/users/{user}', 'UsersController@show')->name('users.show');

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
