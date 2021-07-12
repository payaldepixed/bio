<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPageDesign extends Model
{
    protected $table = 'user_page_designs';

    protected $fillable = [
        'user_id','theme','primary_text_color','primary_background','secondary_background','secondary_background_color',
        'profile_picture_shadow','profile_picture_border','profile_picture_border_color','card_shadow','card_spacing','button_color',
        'button_text_color','button_corner','button_border','button_border_color','title_font','text_font','enable_vcard',
        'enable_share_button','click_qr_code','hide_link_binding'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
