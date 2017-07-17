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
    public function MenuToRole()
    {
        return $this->hasMany('App\Models\MenuToRole');
    }

}
