<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPageBlock extends Model
{
    protected $table = 'user_page_blocks';

    protected $fillable = [
        'user_id','type','url','title','description','layout','animation',
        'is_active','grid_size','label','views','order_by','link_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function medias(){
        return $this->hasMany('App\Models\UserPageBlockMedia','block_id');
    }
}
