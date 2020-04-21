<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CreatedUser;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_COMMON = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'crp', 'whatsapp', 'specialty', 'locked', 'crp_image_extension', 'e_psi_image_extension'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute()
    {
        if ($this->avatar_extension) {
            $image = sprintf('/files/users/%s.%s', $this->id, $this->avatar_extension);

            return '<img src="' . $image . '" class="avatar-img avatar-sm float-left mr-2 elevation-5 rounded-circle">';
        } else {
            $buffer = explode(' ', $this->name);
            $initials = '';

            if (!empty($buffer[1])) {
                $initials = strtoupper($buffer[0][0] . $buffer[1][0]);
            } else {
                $initials = strtoupper($buffer[0][0]);
            }

            return '<div class="user-no-photo-avatar avatar-img rounded-circle avatar-sm float-left mr-2 elevation-2">' . $initials . '</div>';
        }
    }

    public function getCrpImage()
    {
        if ($this->crp_image_extension) {
            $image = sprintf('/files/users/crp/%s.%s', $this->id, $this->crp_image_extension);

            return '<img src="' . $image . '" class="avatar-img float-left mr-2 elevation-5 crp-image">';
        } else {
            return 'Não cadastrado';
        }
    }
    public function getEpsiImage()
    {
        if ($this->e_psi_image_extension) {
            $image = sprintf('/files/users/epsi/%s.%s', $this->id, $this->e_psi_image_extension);

            return '<img src="' . $image . '" class="avatar-img float-left mr-2 elevation-5 epsi-image">';
        } else {
            return 'Não cadastrado';
        }
    }

    public static function roles()
    {
        return [
            self::ROLE_ADMIN => 'Administrador',
            self::ROLE_COMMON => 'Psicólogo',
        ];
    }

    public function getRoleStringAttribute()
    {
        return self::roles()[$this->role];
    }

    public function schedules()
    {
        return $this->belongsToMany('App\Schedule', 'schedules_has_users', 'users_id', 'schedules_id');
    }
}
