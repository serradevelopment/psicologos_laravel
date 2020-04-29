<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$total_schedules_all_users = DB::select('SELECT u.name,u.id, COUNT(*) AS "consultas_realizadas" FROM schedules_has_users
		JOIN users AS u ON(u.id = schedules_has_users.users_id)
		 WHERE STATUS IS NOT null GROUP BY users_id ORDER BY consultas_realizadas DESC', [1]);
		$my_total_schedules = array_filter($total_schedules_all_users,function($obj){
			return $obj->id ==  auth()->user()->id;
		});
		return view('admin.home',[
			'schedules'		=>	Schedule::all(),
			'total_schedules_all_users'	=>	$total_schedules_all_users,
			'my_total_schedules'	=>	$my_total_schedules[array_key_first($my_total_schedules)]
		]);
	}
}
