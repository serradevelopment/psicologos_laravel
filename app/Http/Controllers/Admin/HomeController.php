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
		$mySchedules = DB::select("SELECT  sh.id,s.hour_start,s.hour_end,u.name, sh.date FROM  schedules_has_users sh 
			join schedules s on(s.id = sh.schedules_id)
			join users u on(u.id = sh.users_id)
			where sh.users_id = ?", [auth()->user()->id]);
		
		return view('admin.home',[
			'schedules'		=>	Schedule::all(),
			'mySchedules'	=> $mySchedules
		]);
	}
}
