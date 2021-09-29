<?php

namespace App;
use Config;
use Mail;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\UserPageSocial;
use App\Models\UserLink;
use App\Models\RecentActivity;
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

    // public static function setBlockView($id) {
    //     $block = UserPageBlock::find($id);
    //     $block->views = $block->views + 1;
    //     $block->save();
    //     return 1;
    // }


    public static function addRecentActivity($link_id,$block_id='') {
        $data = array('link_id'=>$link_id);
        if(@Auth::user()->id){$data['user_id'] = Auth::user()->id;}
        if(@$block_id){$data['block_id'] = $block_id;}
        $recent = RecentActivity::create($data);
        self::getLocation($recent->id);
        return 1;
    }

    public static function totalLinks($time) {
        $data = UserLink::orderBy('id');
        $data->whereRaw('Date(created_at) >= (DATE(NOW()) + INTERVAL -'.$time.' DAY)');
        if(@Auth::user()->user_type != 1){
            $data->where('user_id',Auth::user()->id);
        }
        return $data->count();
    }

    public static function getRecentActivity($type,$time) {
        $data = RecentActivity::orderBy('id');
        $data->whereRaw('Date(created_at) >= (DATE(NOW()) + INTERVAL -'.$time.' DAY)');
        if($type == 'link'){$data->whereNull('block_id');}
        if($type == 'block'){$data->whereNotNull('block_id');}
        if(@Auth::user()->user_type != 1){
            $link_ids = UserLink::where('user_id',Auth::user()->id)->pluck('id')->toArray();
            $data->whereIn('link_id',$link_ids);
        }
        return $data->count();
    }

    public static function getLocation($id) {
        $ip = \Request::ip();
		if ($ip) {
            $url = 'http://api.ipapi.com/'.$ip.'?access_key=e7d41ff277a3af257f3801b971be9c49&format=1';
            $ch = curl_init();
            $headers = [
                'Content-Type: application/json',
            ];
			// Set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Disabling SSL Certificate support temporarly
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Execute post
			$result = curl_exec($ch);
			if ($result === FALSE) {
                curl_close($ch);
				// die('Curl failed: ' . curl_error($ch));
			}else{
                // Close connection
                curl_close($ch);
                $result = json_decode($result);
                $data = ['country_code'=>@$result->country_code,
                'country_name'=>@$result->country_name,
                'region_code'=>@$result->region_code,
                'region_name'=>@$result->region_name,
                'city'=>@$result->city,
                'zip'=>@$result->zip,
                'latitude'=>@$result->latitude,
                'longitude'=>@$result->longitude];
                return RecentActivity::where('id',$id)->update($data);
                // echo "<pre>";
                // print_r(json_decode($result)); die();
            }
		}
    }

    public static function getMarkers($time) {
        $data = RecentActivity::select('link_id','created_at','country_code','country_name','latitude','longitude',\DB::raw('count(*) as visitors'));
        $data->whereRaw('Date(created_at) >= (DATE(NOW()) + INTERVAL -'.$time.' DAY)');
        if(@Auth::user()->user_type != 1){
            $link_ids = UserLink::where('user_id',Auth::user()->id)->pluck('id')->toArray();
            $data->whereIn('link_id',$link_ids);
        }
        return $data->groupBy('country_code')->get();
    }

    public static function getLinkVisitors($time) {
        $data = \DB::table('user_links as l')->select('name',\DB::raw('count(r.id) as visitors'))
        ->leftjoin('recent_activities as r', function($join) {
            $join->on('l.id', '=', 'r.link_id');
        });
        $data->whereRaw('Date(r.created_at) >= (DATE(NOW()) + INTERVAL -'.$time.' DAY)');
        if(@Auth::user()->user_type != 1){
            $data->where('l.user_id',Auth::user()->id);
        }
        return $data->orderBy('visitors','desc')->groupBy('l.id')->get();
    }

}
