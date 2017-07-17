<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuToRole extends Model
{
    protected $guarded = ['role_id', 'menu_id'];
    protected $table = 'menu_to_roles';


    public function menu()
    {
        return $this->belongsToMany('App\Models\Menu', 'menu', 'menu_id');

    }
}