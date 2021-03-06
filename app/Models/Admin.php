<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'role_id', 'user_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isSuperAdmin()
    {
        return  $this->role_id == 1 ?  true : false;
    }

    public function isAdministrator()
    {
        return  ($this->role_id == 1 || $this->role_id == 2) ?  true : false;
    }

    public function isEditor()
    {
        return  $this->role_id == 3 ?  true : false;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function respond()
    {
        return $this->hasMany('App\Models\Respond');
    }
}
