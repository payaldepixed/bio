<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Validator;

class DashboardController extends Controller
{
    public function index(){
        return view('home');
    }

    public function settings() {
		return view('settings');
	}

    public function updateProfile(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'email'  => 'required|email|unique:users,email,'.$user->id,
            'username' => 'required|unique:users,username,'.$user->id
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all());
        }
        $user->fill($request->only('username','email'));
        // if($request->has('avatar'))
        // {
        //     if($user->avatar){
        //         Commonhelper::deleteFile($user->avatar);
        //     }
        //     $user->avatar = Commonhelper::resizeImage("avatars/",$request->avatar,'avatar');
        //     if(!$user->avatar){return redirect()->back()->with('error',trans("Sorry, Only image files are allowed."));}
        // }
        $user->save();
        return redirect('settings')->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'  => 'required',
            'password' => 'required|min:6'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all());
        }
        try{
            $user = Auth::getUser();
            if (\Hash::check($request->get('current_password'), $user->password)) {
                $user->password = \Hash::make($request->get('password'));
                $user->save();
				return redirect('settings')->with('success', 'Password change successfully!');
            } else {
                return back()->withErrors('Current password is incorrect.');
            }
        }catch(\Exception $e){
            return back()->withErrors('Something went wrong.please try again!');
        }
    }

}
