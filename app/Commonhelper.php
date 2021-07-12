<?php

namespace App;
use Config;
use Mail;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\UserPageSocial;
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
        case "else":
            $width = 100;
            $height = 100;
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

    public static function getSocial($type) {
        return UserPageSocial::where('social_type',$type)->where('user_id',Auth::user()->id)->value('social_link');
    }

}
