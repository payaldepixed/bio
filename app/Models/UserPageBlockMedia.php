<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Config;

class UserPageBlockMedia extends Model
{
    protected $table = 'user_page_block_medias';
    public $timestamps = false;
    protected $fillable = [
        'block_id','media_file'
    ];
    public function getMediaFileAttribute($value) {
		return $value ? Storage::disk(Config::get('constants.DISK'))->url($value) : '';
	}
}
