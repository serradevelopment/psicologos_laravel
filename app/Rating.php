<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['importance','relevance','experience','indicate','locked','user_id'];
    protected $with     = ['user'];
    public static function relevances(){
        return [
            0   =>  'O acolhimento imediato',
            1   =>  'A gratuidade do serviço',
            2   =>  'A qualidade',
        ];
    }

    public static function experiences(){
        return [
            0   =>  'Negativa',
            1   =>  'Positiva',
        ];
    }

    public static function indicates(){
        return [
            0   =>  'Não',
            1   =>  'Sim',
        ];
    }
    
    // Obtém o psicólogo relacionado a avaliação
    public function user(){
        return $this->belongsTo('App\User');
    }
}
