<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function editPassword(){
        return response()->view('cms.auth.edit-passwoed');
    }

    public function updatePassword(Request $request){
        if(Auth::guard('admin')){
            $guard = auth('admin')->check();
        }elseif(Auth::guard('author')){
            $guard = auth('author')->check();
        }

        $validator = validator($request->all(),[
            'current_password'=>'required',
            'new_password'=>'required|string|min:6|max:25|confirmed',
            'new_password_confirmation'=>'required|string|min:6|max:25'
        ], [
            'new_password.confirmed'=>"Passwords do not match , Please verify the password",
            'current_password.required'=> "The current password field is required.",
        ]);


        //new password can not be the old password!
        if (Hash::check($request->current_password, auth()->user()->password) == Hash::check($request->new_password, auth()->user()->password)) {
            return response()->json(['icon'=>'error','title'=>'new password can not be the old password!'],400);
        }


        //Match The Old Password
        if(!Hash::check($request->current_password, auth()->user()->password)){
            return response()->json(['icon'=>'error','title'=>"Old Password Doesn't match!"],400);
        }


        if(! $validator->fails()){


            if(Auth::guard('admin')->id()){
                $admin = auth('admin')->user();
                $admin->password = Hash::make($request->get('new_password'));
                $isSaved =$admin->save();
            }elseif(Auth::guard('author')->id()){
                $author = auth('author')->user();
                $author->password = Hash::make($request->get('new_password'));
                $isSaved =$author->save();
            }


            if($isSaved){
                return response()->json(['icon'=>'success','title'=>'Updated is successfully'],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'Updated is failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first()],400);
        }
    }
}
