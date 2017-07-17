<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'is_author', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
    {
        return $this->hasOne('App\Models\Admin');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdmin()
    {
        return  isset($this->admin) ?  true : false;

        // this looks for an role column in your users table
    }

    public function isAuthor()
    {
        return  $this->role_id == 4;

        // this looks for an role column in your users table
    }

    public function article()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function scopeLastUser($query)
    {
        return $query->where('created_at', '>', DB::Raw('NOW() - ( 7 *24 *3600 )'));
    }

    public function message()
    {
        return $this->hasMany('App\Models\Message');
    }
}
