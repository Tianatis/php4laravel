<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    public function admin()
    {
        return $this->hasMany('App\Models\Admin');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function menu()
    {
        return $this->belongsToMany('App\Models\Menu', 'menu_role', 'role_id', 'menu_id');

    }
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

}
