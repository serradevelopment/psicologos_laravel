<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchedulesUsersController extends Controller
{
    public function destroy($id)
    {
    	$delete = DB::select("DELETE FROM  schedules_has_users  WHERE schedules_has_users.id = ?",[$id]);
        return redirect()->route('home')->with('flash.success', 'Agendamento apagado com sucesso');
    }

    public function allInDateSelected(Request $request)
    {
    	$data = $request->all();

    	$users = DB::select('SELECT sh.date, u.name,u.whatsapp,u.crp,u.avatar_extension,s.hour_start,s.hour_end FROM schedules_has_users sh 
    	join users u on(u.id = sh.users_id)
    	join schedules s on(s.id = sh.schedules_id)
    	where sh.schedules_id = ?',[$data['schedule']['id']]);

    	return response($users);
    }
}
