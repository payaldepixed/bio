<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPageSocial;
use App\Models\UserPageDesign;
use App\Models\UserPageBlock;
use Validator;
use Commonhelper;
use Auth;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('page.index', compact('user'));
    }

    public function view()
    {
        $user = Auth::user();
        return view('page.view', compact('user'));
    }

    public function social()
    {
        $socials = ['facebook','twitter','instagram','email','linkedin','youtube'];
        return view('page.social', compact('socials'));
    }

    public function general(Request $request)
    {
        $rules = [
            'name'  => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        $data = $request->only('name','bio');
        $id = Auth::user()->id;
        if($request->has('profile_picture'))
        {
            if(!in_array(strtolower($request->profile_picture->getClientOriginalExtension()),['jpg','jpeg','png','webp'])) {
                return redirect()->back()->withErrors('Sorry, Only jpg/jpeg/png/webp files allowed.');
            }
            if($request->id)Commonhelper::deleteFile(User::where('id',$id)->value('profile_picture'));
            $data['profile_picture'] = Commonhelper::resizeImage("avatars/",$request->profile_picture,'avatar');
        }
        //insert user data
        User::where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Data added successfully!');;
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
                        'social_type' => $type,
                        'social_link' => $link
                    );
                    UserPageSocial::firstOrCreate(['user_id' => $user_id,'social_type' => $type],$data);
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

    public function blockStore(Request $request)
    {
        $rules = [
            'type'  => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        $data = $request->only('title','url','type','description','layout','animation');
        if($request->id){
            UserPageBlock::where('id',$request->id)->update($data);
        }else{
            $data['user_id'] = Auth::user()->id;
            UserPageBlock::create($data);
        }
        return redirect()->back()->with('success', 'Block added successfully!');;
    }

    public function copyBlock(Request $request)
    {
        $block = UserPageBlock::where('id',$request->id)->first();
        $newBlock = $block->replicate();
        $newBlock->save();
        return 1;
    }

    public function actionBlock(Request $request)
    {
        $block = UserPageBlock::where('id',$request->id)->first();
        $block->is_active = $block->is_active == 1 ? 0 : 1;
        $block->save();
        return 1;
    }

    public function deleteBlock(Request $request)
    {
        UserPageBlock::where('id',$request->id)->delete();
        return 1;
    }

}
