<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPageBlockMedia extends Model
{
    protected $table = 'user_page_block_medias';
    public $timestamps = false;
    protected $fillable = [
        'block_id','media_file'
    ];
}
