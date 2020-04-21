<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;
use Exception;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Illuminate\Support\Facades\Mail;


class SchedulesUsersController extends Controller
{
    public function destroy($id)
    {
        $delete = DB::select("DELETE FROM  schedules_has_users  WHERE schedules_has_users.id = ?", [$id]);
        return redirect()->route('home')->with('flash.success', 'Agendamento apagado com sucesso');
    }

    public function allInDateSelected(Request $request)
    {
        $data = $request->all();

        $users = DB::select('SELECT u.id,sh.date, u.name,u.whatsapp,u.crp,u.avatar_extension,s.hour_start,s.hour_end FROM schedules_has_users sh 
    	join users u on(u.id = sh.users_id)
    	join schedules s on(s.id = sh.schedules_id)
    	where sh.schedules_id = ? and sh.date = ? and sh.status IS NULL', [
            $data['schedule']['id'],
            $data['date']
        ]);

        return response($users);
    }

    public function savePatient(Request $request)
    {
        try{
            $data = $request->all();

            $user = \App\User::find($data['user']['id']);
            $schedule = \App\Schedule::find($data['schedule']['id']);
    
            $patient = new Patient;
            $patient->fill($data['patient']);
            $patient->save();

            Mail::to($user->email)->send(new \App\Mail\ConsultaAgendada($user,$patient,$schedule,$data['date']));
            $save = DB::insert('UPDATE schedules_has_users SET patients_id = ?, status = "SCHEDULED" WHERE schedules_id = ? and date = ? and users_id = ?', [
                $patient->id, $data['schedule']['id'], $data['date'],$data['user']['id']
            ]);
    
            return $save;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function getMySchedules()
    {
        $data = DB::table('schedules_has_users', 'sh')
            ->join('schedules', 'schedules.id', '=', 'sh.schedules_id')
            ->join('users', 'users.id', '=', 'sh.users_id')
            ->leftJoin('patients', 'patients.id', '=', 'sh.patients_id')
            ->select(
                'sh.id',
                'schedules.hour_start',
                'schedules.hour_end',
                'users.name',
                'sh.date',
                'patients.name as patient_name',
                'patients.whatsapp as patient_whatsapp',
                'patients.email as patient_email',
                'patients.obs as patient_obs',
                'sh.status as status'
            )
            ->where('sh.users_id', '=', auth()->user()->id)
            ->orderBy('sh.date','desc')->get();
        $data = ["data"=>$data];
        return response()->json($data);
    }

    public function getScheduleUser(Request $request)
    {
        $data = DB::table('schedules_has_users', 'sh')
        ->join('schedules', 'schedules.id', '=', 'sh.schedules_id')
        ->join('users', 'users.id', '=', 'sh.users_id')
        ->leftJoin('patients', 'patients.id', '=', 'sh.patients_id')
        ->select(
            'sh.id',
            'schedules.hour_start',
            'schedules.hour_end',
            'users.name',
            'sh.date',
            'patients.name as patient_name',
            'patients.whatsapp as patient_whatsapp',
            'patients.email as patient_email',
            'patients.obs as patient_obs',
            'sh.status as status'
        )
        ->where('sh.id', '=', $request->sh_id)
        ->orderBy('sh.date')
        ->first();

        return response()->json($data);
    }

    public function endSchedule(Request $request)
    {
        $data = $request->all();

        $update = DB::table('schedules_has_users', 'sh')
        ->where('id', $data['sh_id'])
        ->update(['status' => 'FINISHED']);

        return response()->json($update);
    }

    public function setAusent(Request $request)
    {
        $data = $request->all();

        $update = DB::table('schedules_has_users', 'sh')
        ->where('id', $data['sh_id'])
        ->update(['status' => 'AUSENT']);

        return response()->json($update);
    }
}
