<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Validator;
use Commonhelper;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('user_type',2)->where('is_active',1)->paginate(5);
        return view('user.listing', compact('users'));
    }

    public function getAjaxData(Request $request)
    {
        $userData = DB::table('users')->where('user_type',2)->where('is_active',1);
        if($request->get('filter') && $request->get('filter') != ''){
            $userData->where('is_block',$request->get('filter'));
        }
        if($request->get('search') && $request->get('search') != ''){
            $search = $request->get('search');
            $search = str_replace('%20', ' ', $search);
            $userData->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('username', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('created_at', 'like', "%{$search}%");
            });
        }
        if(@$request->get('sort_by') && @$request->get('sort_type')){
            $userData->orderBy($request->sort_by, $request->sort_type);
        }else{
            $userData->orderBy('id','desc');
        }
        $users = $userData->paginate(5);
        return view('user.data-list', compact('users'))->render();
    }

    public function add()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required'
        ];
        if($request->id){
            $rules['email'] = 'required|email|unique:users,email,'.$request->id;
        }
        else{
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password']='required|confirmed';
            $rules['username']='required|unique:users,username';
        }
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        $data = $request->except(['password','password_confirmation','avatar','_token']);
        if($request->password)$data['password'] = \Hash::make($request->password);
        $id = @$request->id;
        if($request->has('avatar'))
        {
            if(!in_array(strtolower($request->avatar->getClientOriginalExtension()),['jpg','jpeg','png'])) {
                return redirect()->back()->withErrors('Sorry, Only jpg/jpeg/png files allowed.');
            }
            if($request->id)Commonhelper::deleteFile(DB::table('users')->where('id',$request->id)->value('avatar'));
            $data['avatar'] = Commonhelper::resizeImage("avatars/",$request->avatar,'avatar');
        }
        //insert user data
        if($request->id){
            User::where('id',$request->id)->update($data);
        }else{
            $user = User::create($data);
            $id = $user->id;
        }
        return redirect()->route('user.edit',['id'=>(string)$id]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return view('user.form', compact('id','user'));
    }

    public function delete(Request $request)
    {
        User::where('id',$request->id)->update(['is_active'=>0]);
        return redirect()->route('user');
    }

    public function block(Request $request)
    {
        $user = User::find($request->id);
        $status = ($user->is_block == 1) ? 0 : 1;
        $user->is_block = $status;
        $user->save();
        return redirect()->route('user');
    }

    public function deleteMedia(Request $request)
    {
        Commonhelper::deleteFile(User::where('id',$request->id)->value($request->type));
        User::where('id',$request->id)->update([$request->type => '']);
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'password'  => 'required|confirmed'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->first());
        }
        User::where('id',$request->id)->update(['password' => \Hash::make($request->password)]);
        return redirect()->back()->with('success','Password changed successfully!');
    }

}
