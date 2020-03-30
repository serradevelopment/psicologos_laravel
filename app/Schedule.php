<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
 	protected $fillable = ['hour_start','hour_end'];


 	public function users()
 	{
 		return $this->belongsToMany(App\User::class);
 	}
}
