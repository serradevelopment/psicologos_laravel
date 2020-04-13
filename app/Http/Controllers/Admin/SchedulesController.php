<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    public function allAvailable(Request $request)
    {
        $data = $request->all();

        $schedules = DB::select("SELECT  * FROM    schedules WHERE   NOT EXISTS (  SELECT  null  FROM    
            schedules_has_users  
            WHERE   schedules.id = schedules_has_users.schedules_id and schedules_has_users.users_id = ? and schedules_has_users.date = ?) ",[auth()->user()->id,$data['date']]);

        return response($schedules);
    }

    public function all(Request $request)
    {
        $data = $request->all();

        $schedules = DB::select("SELECT  * FROM    schedules WHERE EXISTS (  SELECT  null  FROM    
        schedules_has_users  
        WHERE   schedules.id = schedules_has_users.schedules_id and schedules_has_users.date = ? and schedules_has_users.status is NULL) ",[$data['date']]);

        return response($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();

            $user = auth()->user();

            $schedule = Schedule::where('hour_start',$data['schedule']['hour_start'])->where('hour_end',$data['schedule']['hour_end'])->first();

     

            $insert = DB::insert('insert into schedules_has_users (users_id, schedules_id, date) values (?, ?, ?)', 
                [$user->id, $schedule->id, $data['date'] ]);

            $response = ['success'=>$insert];

            return response($insert);

        }catch(Exception $e){

            return $e->getMessage();
        }  
    }

    public function verify($date, $schedule)
    {
        $limit = DB::select('select * from schedules_has_users where schedules_id = ? ', [$schedule->id]);

        if(count($limit) >= 1){
            return response(['success'=>false,'message'=>'Limite de agendamentos atingindo para esse horário.']);
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }


}
