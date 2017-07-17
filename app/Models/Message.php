<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Message extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function respond()
    {
        return $this->hasMany('App\Models\Respond');
    }

    public function scopeLastAdded($query)
    {
        return $query->where('created_at', '>', DB::Raw('NOW() - ( 7 *24 *3600 )'));
    }
 }
