<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLink;
use App\Models\UserPageSocial;
use App\Models\UserPageDesign;
use App\Models\UserPageBlock;
use App\Models\UserPageBlockMedia;
use App\Models\Theme;
use Validator;
use Commonhelper;
use Auth;
use Storage;
use Config;

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
        $link = UserLink::find($request->id);
        $link->is_active = $link->is_active == 1 ? 0 : 1;
        $link->save();
        return redirect()->back()->with('success','Link edited successfully!');
    }

    public function page($id)
    {
        $user = User::find(Auth::user()->id);
        $design = UserPageDesign::where('link_id',$id)->first();
        $link_id = $id;
        $linkname = UserLink::where('id',$id)->value('name');
        $themes = Theme::all();
        return view('page.page', compact('user','design','link_id','linkname','themes'));
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
        $link = UserLink::where('name',$name)->where('is_active',1)->first();
        if($link){
            $user = User::find($link->user_id);
            $link_id = $link->id;
            $design = UserPageDesign::where('link_id',$link_id)->first();
            Commonhelper::addRecentActivity($link_id);
            return view('page.view', compact('user','design','link_id'));
        }else{
            return redirect('admin/dashboard');
            // if(@Auth::user()->id){
            //     return redirect('admin/dashboard');
            // }else{
            //     return redirect('notactive');
            // }
        }
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
                    if($id = UserPageSocial::where(['user_id' => $user_id,'social_type' => $type,'link_id' => $request->link_id])->value('id')){
                        UserPageSocial::where('id',$id)->update($data);
                    }else{
                        $data['order_by'] = UserPageSocial::where('user_id',$user_id)->orderBy('order_by','desc')->value('order_by') + 1;
                        UserPageSocial::create($data);
                    }
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
        if(isset($request->linkname) && $request->linkname != ''){
            $rules = ['linkname'=>'unique:user_links,name,'.$request->link_id];
            $validator = Validator::make($request->all(),$rules);
            if (@$validator->fails()) {
                return redirect()->back()->withErrors($validator->errors()->first());
            }else{
                $link = UserLink::find($request->link_id);
                $link->name = $request->linkname;
                $link->save();
            }
        }
        $userdata = $request->only('name','bio');
        $user_id = Auth::user()->id;
        if($request->hasFile('profile_picture'))
        {
            if(!in_array(strtolower($request->profile_picture->getClientOriginalExtension()),['jpg','jpeg','png','webp','gif'])) {
                return redirect()->back()->withErrors('Sorry, Only jpg/jpeg/png/webp/gif files allowed.');
            }
            if(strtolower($request->profile_picture->getClientOriginalExtension()) == 'gif'){
                Commonhelper::deleteFile(User::where('id',$user_id)->value('profile_picture'));
                $userdata['profile_picture'] = Commonhelper::uploadFile("avatars/",$request->profile_picture);
            }
            // else{
            //     $userdata['profile_picture'] = Commonhelper::resizeImage("avatars/",$request->profile_picture,'avatar');
            // }
        }
        //insert user data
        User::where('id',$user_id)->update($userdata);
        //insert design data
        $design = UserPageDesign::where('link_id',$request->link_id)->first();
        $data = $request->only('primary_text_color','profile_picture_shadow','primary_background_type',
        'profile_picture_border','profile_picture_border_color','card_shadow','card_spacing','text_font','secondary_background',
        'button_color','tactile_card','button_text_color','button_corner','button_border','button_border_color','link_id','theme');
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
            if($request->back_url){
                $data['primary_background'] = $request->back_url;
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
        $link_id = UserPageBlock::where('id',$id)->value('link_id');
        return Commonhelper::addRecentActivity($link_id,$id);
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

    public function sortingSocial(Request $request)
    {
        $links = explode(',',$request->positions);
        foreach($links as $i=>$link){
            $sort = $i + 1;
            UserPageSocial::where('social_type',$link)->update(['order_by'=>$sort]);
        }
        return 1;
    }

    public function cropImage(Request $request)
    {
        $base64_image = $request->input('image'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $user = User::find(Auth::user()->id);
        $filename = rand(100000, 999999).time(). ".png";
        @Storage::disk(Config::get('constants.DISK'))->put("avatars/".$filename, base64_decode($file_data));
        $user->profile_picture = "avatars/".$filename;
        $user->save();
        return 1;
    }

    public function getActivity(Request $request)
    {
        if($request->type == 'totallink'){
            return Commonhelper::totalLinks($request->time);
        }else if($request->type == 'block' || $request->type == 'link'){
            return Commonhelper::getRecentActivity($request->type,$request->time);
        }else{
            $pages = Commonhelper::getLinkVisitors($request->time);
            $html = '';
            if(@$pages){
                foreach($pages as $link){
                    $url = route('mypage',['name'=>@$link->name]);
                    $html .= '<tr><td>'.$link->name.'
                            <a target="_blank" href="'.$url.'" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                            </a>
                        </td>
                        <td class="text-muted">'.$link->visitors.'</td>
                    </tr>';
                }
            }
            return $html;
        }
    }

    public function getMarkers(Request $request)
    {
        return Commonhelper::getMarkers($request->time);
    }

}
