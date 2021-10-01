<?php

namespace App\Http\Controllers;
use Commonhelper;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Theme;
use App\Models\User;
use Storage;
use Config;

class ThemeController extends Controller
{
    public function index(){
        $themes = Theme::where('user_id',Auth::user()->id)->paginate(5);
        return view('theme.listing', compact('themes'));
    }

    public function getAjaxData(Request $request)
    {
        $themeData = Theme::where('user_id',Auth::user()->id);
        // if(isset($request->filter)){
        //     $themeData->where('is_active',$request->get('filter'));
        // }
        if($request->get('search') && $request->get('search') != ''){
            $search = $request->get('search');
            $search = str_replace('%20', ' ', $search);
            $themeData->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('created_at', 'like', "%{$search}%");
            });
        }
        if(@$request->get('sort_by') && @$request->get('sort_type')){
            $themeData->orderBy($request->sort_by, $request->sort_type);
        }else{
            $themeData->orderBy('id','desc');
        }
        $themes = $themeData->paginate(5);
        return view('theme.data-list', compact('themes'))->render();
    }

    public function delete(Request $request)
    {
        Theme::where('id',$request->id)->delete();
        return redirect()->back()->with('success','Theme removed successfully!');
    }

    public function add()
    {
        $user = User::find(Auth::user()->id);
        return view('theme.form', compact('user'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find(Auth::user()->id);
        $theme = Theme::where('id',$id)->first();
        return view('theme.form', compact('user','theme','id'));
    }

    public function store(Request $request)
    {
        $rules = [];
        if($request->id){
            $rules['title'] = 'required|unique:themes,title,'.$request->id;
        }
        else{
            $rules['title'] = 'required|unique:themes,title';
        }
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        $data = $request->only('primary_text_color','profile_picture_shadow',
        'profile_picture_border','profile_picture_border_color','card_shadow','card_spacing','text_font','secondary_background',
        'button_color','tactile_card','button_text_color','button_corner','button_border','button_border_color','title');
        $data['primary_background_type'] = @$request->primary_background_type ? $request->primary_background_type : 'color';
        if($request->primary_background_type == 'image' || $request->primary_background_type == 'video'){
            if($request->has('primary_background_image'))
            {
                $file = $request->primary_background_image;
                $data['primary_background'] = Commonhelper::resizeImage("backgrounds/",$file,'background');
            }
            if($request->has('primary_background_video'))
            {
                $file = $request->primary_background_video;
                $data['primary_background'] = Commonhelper::uploadFile("backgrounds/",$file);
            }
        }else{
            if($request->primary_background_type == 'color'){$data['primary_background'] = $request->primary_background;}
            else if($request->primary_background_type == 'preset'){$data['primary_background'] = $request->primary_background_preset;}
            else{$data['primary_background'] = $request->primary_background_one;}
        }
        if(@$request->id){
            $theme = Theme::find($request->id);
            $theme->fill($data);
            $theme->save();
        }else{
            $data['user_id'] = Auth::user()->id;
            Theme::create($data);
        }
        return redirect('admin/theme');
    }

    public function details(Request $request)
    {
        $theme = Theme::where('id',$request->id)->first();
        if($theme->primary_background_type == 'image'){
            $theme->imgurl = $theme->primary_background ? Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background) : '';
        }
        if($theme->primary_background_type == 'video'){
            $theme->videourl = $theme->primary_background ? Storage::disk(Config::get('constants.DISK'))->url($theme->primary_background) : '';
        }
        return $theme;
    }


}
