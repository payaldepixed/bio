<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLink;
use App\Models\UserPageSocial;
use App\Models\UserPageDesign;
use App\Models\UserPageBlock;
use App\Models\UserPageBlockMedia;
use Validator;
use Commonhelper;
use Auth;

class PageController extends Controller
{

    public function index()
    {
        $links = UserLink::where('user_id',Auth::user()->id)->paginate(5);
        return view('link.listing', compact('links'));
    }

    public function getAjaxData(Request $request)
    {
        $linkData = UserLink::where('user_id',Auth::user()->id);
        if(isset($request->filter)){
            $linkData->where('is_active',$request->get('filter'));
        }
        if($request->get('search') && $request->get('search') != ''){
            $search = $request->get('search');
            $search = str_replace('%20', ' ', $search);
            $linkData->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('created_at', 'like', "%{$search}%");
            });
        }
        if(@$request->get('sort_by') && @$request->get('sort_type')){
            $linkData->orderBy($request->sort_by, $request->sort_type);
        }else{
            $linkData->orderBy('id','desc');
        }
        $links = $linkData->paginate(5);
        return view('link.data-list', compact('links'))->render();
    }

    public function addLink()
    {
        return view('link.form');
    }

    public function storeLink(Request $request)
    {
        $rules = [];
        if($request->id){
            $rules['name'] = 'required|unique:user_links,name,'.$request->id;
        }
        else{
            $rules['name'] = 'required|unique:user_links,name';
        }
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        //insert user data
        $data = $request->only('name');
        if($request->id){
            UserLink::where('id',$request->id)->update($data);
        }else{
            $data['user_id'] = Auth::user()->id;
            UserLink::create($data);
        }
        return redirect('admin/link')->with('success','Link added successfully!');
    }

    public function removeLink(Request $request)
    {
        UserLink::where('id',$request->id)->update(['is_active'=>0]);
        return redirect()->back()->with('success','Link removed successfully!');
    }

    public function page($id)
    {
        $user = User::find(Auth::user()->id);
        $design = UserPageDesign::where('link_id',$id)->first();
        $link_id = $id;
        $linkname = UserLink::where('id',$id)->value('name');
        return view('page.page', compact('user','design','link_id','linkname'));
    }

    public function getBlocks($id)
    {
        $blocks = UserPageBlock::where('link_id',$id)->orderBy('order_by','asc')->get();
        return view('page.block', compact('blocks'));
    }

    public function previewBlocks($id)
    {
        $blocks = UserPageBlock::with('medias')->where('link_id',$id)->orderBy('order_by','asc')->get();
        return view('page.previewblock', compact('blocks'));
    }

    public function view($name)
    {
        $link = UserLink::where('name',$name)->first();
        $user = User::find($link->user_id);
        $link_id = $link->id;
        $design = UserPageDesign::where('link_id',$link_id)->first();
        return view('page.view', compact('user','design','link_id'));
    }

    public function social()
    {
        $socials = ['facebook','twitter','instagram','email','linkedin','youtube'];
        return view('page.social', compact('socials'));
    }

    public function socialStore(Request $request)
    {
        if($request->types){
            $user_id = Auth::user()->id;
            UserPageSocial::where('user_id',$user_id)->delete();
            foreach($request->types as $type){
                $link = $request[$type];
                if($link != ''){
                    $data = array(
                        'user_id' => $user_id,
                        'link_id' => $request->link_id,
                        'social_type' => $type,
                        'social_link' => $link
                    );
                    UserPageSocial::firstOrCreate(['user_id' => $user_id,'social_type' => $type,'link_id' => $request->link_id],$data);
                }
            }
        }
        return 1;
    }

    public function deleteSocial(Request $request)
    {
        UserPageSocial::where('id',$request->id)->delete();
        return 1;
    }

    public function storeBlock(Request $request)
    {
        $rules = [
            'type'  => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        $data = $request->only('title','url','type','description','layout','animation','grid_size','label','link_id');
        if($request->id){
            UserPageBlock::where('id',$request->id)->update($data);
            $block_id = $request->id;
        }else{
            $data['user_id'] = Auth::user()->id;
            UserPageBlock::where('user_id',Auth::user()->id)->increment('order_by');
            $block = UserPageBlock::create($data);
            $block_id = $block->id;
        }
        if($request->has('medias'))
        {
            // foreach($request->file('medias') as $file)
            // {
                $file = $request->medias;
                $mediaData = ['block_id'=>$block_id];
                $mediaData['media_file'] = Commonhelper::resizeImage("medias/",$file,'media');
                UserPageBlockMedia::create($mediaData);
            //}
        }
        return 1;
    }

    public function copyBlock(Request $request)
    {
        $block = UserPageBlock::where('id',$request->id)->first();
        $newBlock = $block->replicate();
        $newBlock->save();
        $medias = UserPageBlockMedia::where('block_id',$request->id)->get();
        if($medias){
            foreach($medias as $media){
                $mediaData = ['block_id'=>$newBlock->id];
                $mediaData['media_file'] = $media->media_file;
                UserPageBlockMedia::create($mediaData);
            }
        }
        return 1;
    }

    public function deleteBlock(Request $request)
    {
        UserPageBlock::where('id',$request->id)->delete();
        $medias = UserPageBlockMedia::where('block_id',$request->id)->get();
        if($medias){
            foreach($medias as $media){
                Commonhelper::deleteFile($media->media_file);
                $media->delete();
            }
        }
        return 1;
    }

    public function actionBlock(Request $request)
    {
        $block = UserPageBlock::where('id',$request->id)->first();
        $block->is_active = $block->is_active == 1 ? 0 : 1;
        $block->save();
        return 1;
    }

    public function getBlock(Request $request)
    {
        return UserPageBlock::with('medias')->where('id',$request->id)->first();
    }

    public function deleteBlockMedia(Request $request)
    {
        $media = UserPageBlockMedia::where('id',$request->id)->first();
        if($media){
            Commonhelper::deleteFile($media->media_file);
            $media->delete();
        }
        return 1;
    }

    public function storeDesign(Request $request)
    {
        $userdata = $request->only('name','bio');
        $user_id = Auth::user()->id;
        if($request->hasFile('profile_picture'))
        {
            if(!in_array(strtolower($request->profile_picture->getClientOriginalExtension()),['jpg','jpeg','png','webp'])) {
                return redirect()->back()->withErrors('Sorry, Only jpg/jpeg/png/webp files allowed.');
            }
            Commonhelper::deleteFile(User::where('id',$user_id)->value('profile_picture'));
            $userdata['profile_picture'] = Commonhelper::resizeImage("avatars/",$request->profile_picture,'avatar');
        }
        //insert user data
        User::where('id',$user_id)->update($userdata);
        //insert design data
        $design = UserPageDesign::where('link_id',$request->link_id)->first();
        $data = $request->only('primary_text_color','profile_picture_shadow','primary_background_type',
        'profile_picture_border','profile_picture_border_color','card_shadow','card_spacing','text_font','secondary_background',
        'button_color','tactile_card','button_text_color','button_corner','button_border','button_border_color','link_id');
        $data['enable_vcard'] = @$request->enable_vcard ? 1 : 0;
        $data['enable_share_button'] = @$request->enable_share_button ? 1 : 0;
        $data['hide_link_binding'] = @$request->hide_link_binding ? 1 : 0;
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
        if($design){
            $design->fill($data);
            $design->save();
        }else{
            $data['user_id'] = Auth::user()->id;
            UserPageDesign::create($data);
        }
        return redirect()->back();
    }

    public function deleteMedia()
    {
        Commonhelper::deleteFile(Auth::user()->profile_picture);
        User::where('id',Auth::user()->id)->update(['profile_picture' => '']);
        return redirect()->back();
    }

    public function addBlockView($id)
    {
        return Commonhelper::setBlockView($id);
    }

    public function sortingBlock(Request $request)
    {
        $blocks = explode(',',$request->positions);
        foreach($blocks as $i=>$block){
            $sort = $i + 1;
            UserPageBlock::where('id',$block)->update(['order_by'=>$sort]);
        }
        return 1;
    }

}
