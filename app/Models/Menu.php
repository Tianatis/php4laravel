<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];
    protected $table = 'menu';

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeUserType($query, $isAdmin)
    {
        if(!$isAdmin){
            return $query->where('admin_only', 0);
        }else{
            return $query;
        }
    }


    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function menutorole()
    {
        return $this->hasMany('App\Models\MenuToRole');
    }

}