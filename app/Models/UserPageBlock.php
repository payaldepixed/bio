<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPageBlock extends Model
{
    protected $table = 'user_page_block';

    protected $fillable = [
        'user_id','type','url','title','description','layout','animation'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
