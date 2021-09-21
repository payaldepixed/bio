<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentActivity extends Model
{
    protected $table = 'recent_activities';

    protected $fillable = [
        'user_id','link_id','block_id'
    ];

}
