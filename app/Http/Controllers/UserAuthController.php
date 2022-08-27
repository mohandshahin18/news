<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    //Show login screen

    public function showLogin($guard){
        return response()->view('cms.auth.login' , compact('guard'));
    }


    // login
    public function login(Request $request){
        $validator = validator($request->all(),[
            'email'=> 'required|email|string',
            'password'=>'required|string|min:3',
        ],[

        ]);

        $credintial = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),


        ];
        if(! $validator->fails()){

            if(Auth::guard($request->get('guard'))->attempt($credintial)){
                return response()->json(['icon'=>'success' , 'title' => 'Login Successfully'], 200);
            }else{
                return response()->json(['icon'=>'error' , 'title' => 'Login Failed'], 400);

            }
        }else{
            return response()->json(['icon'=>'erorr' , 'title'=> $validator->getMessageBag()->first()],400);
        }
    }



    //logout
    public function logout(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'author';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login.view' , $guard);
    }

}
