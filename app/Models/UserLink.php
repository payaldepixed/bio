<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    protected $table = 'user_links';

    protected $fillable = [
        'user_id','name','is_active'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
