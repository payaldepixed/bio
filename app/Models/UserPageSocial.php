<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPageSocial extends Model
{
    protected $table = 'user_page_social_links';

    protected $fillable = [
        'user_id','social_type','social_link'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
