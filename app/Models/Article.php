<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Article extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopePublic($query)
    {
        return $query->where('private', 0);
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', 0);
    }

    public function scopePrivate($query)
    {
        return $query->where('private', 1);
    }

    public function scopeLastAdded($query)
    {
        return $query->where('created_at', '>', DB::Raw('NOW() - ( 7 *24 *3600 )'));
    }

    public function scopeLastUpdated($query)
    {
        return $query->where('updated_at', '>', DB::Raw('NOW() - ( 7 *24 *3600 )'))
            ->where('updated_at', '>', DB::raw('`created_at`'));
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
 }
