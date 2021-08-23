<?php

namespace App;
use Config;
use Mail;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\UserPageSocial;
use App\Models\UserPageBlock;
use Auth;

class Commonhelper
{
    public static function sendmail($toemail, $data, $template, $subject) {
        $appname = Config::get('constants.APP_NAME');
        Mail::send('emails.'.$template, $data, function($message) use ($toemail,$appname,$subject) {
            $message->to($toemail, $appname)
            ->subject($subject);
        });
    }

    public static function uploadFile($target_dir,$file) {
        $extension = $file->getClientOriginalExtension();
        $filename = rand(100000, 999999).time(). ".".$extension;
        @Storage::disk(Config::get('constants.DISK'))->put($target_dir.$filename, file_get_contents($file));
        return $target_dir.$filename;
    }

    public static function deleteFile($path) {
        Storage::disk(Config::get('constants.DISK'))->delete($path);
    }

    public static function resizeImage($target_dir,$file,$type)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = rand(100000, 999999).time(). ".".$extension;

        switch ($type) {
        case "avatar":
            $width = 500;
            $height = 500;
            break;
        case "media":
            $width = 500;
            $height = 500;
            break;
        case "background":
            $width = 1000;
            $height = 1000;
            break;
        default:
            $height=null;
            $width=null;
        }

        $img = Image::make($file->getRealPath());
        $img->resize($height, $width, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk(Config::get('constants.DISK'))->put($target_dir.$filename, $img->stream());
        return $target_dir.$filename;
    }

    public static function getSocial($type,$link_id) {
        return UserPageSocial::where('social_type',$type)->where('link_id',$link_id)->value('social_link');
    }

    public static function getSocials() {
        return ['email','newsletter','phone','website','apple_music','apple_podcast'
        ,'bandcamp','behance','clubhouse','discord','dribble','facebook','google_podcast','instagram'
        ,'kofi','last_fm','linkedin','medium','meetup','only_fans','patreon','pinterest','reddit'
        ,'signal','slack','snapchat','soundcloud','spotify','telegram','tidal','tiktok','tumblr'
        ,'twitch','twitter','unsplash','vimeo','wechat','whatsapp','youtube'];
    }

    public static function setBlockView($id) {
        $block = UserPageBlock::find($id);
        $block->views = $block->views + 1;
        $block->save();
        return 1;
    }

}
