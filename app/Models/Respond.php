<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function message()
    {
        return $this->belongsTo('App\Models\Message');
    }

    public function Admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
 }
