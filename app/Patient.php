<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','whatsapp','email','obs','is_minor','minor_term_extension','is_health','is_security'];
}
