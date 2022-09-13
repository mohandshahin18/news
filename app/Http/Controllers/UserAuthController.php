<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Author;
use App\Models\category;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserAuthController extends Controller
{

    //Show login screen

    public function showLogin($guard){
        return response()->view('cms.auth.login' , compact('guard'));
    }


    // login
    public function login(Request $request){

        $validator = validator($request->all(),[
            'email'=> 'required|email|string', //|exists:admins,email
            'password'=>'required|string|min:3', //|in:admins,password
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
            return response()->json(['icon'=>'error' , 'title'=> $validator->getMessageBag()->first()],400);
        }
    }



    //logout
    public function logout(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'author';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login.view' , $guard);
    }



    public function editAdminProfile(Request $request){
        $admins = Admin::findOrfail(Auth::guard('admin')->id());
        $countries = Country::all();
        return response()->view('cms.auth.edit-profile-admin' , compact('admins','countries'));
    }

    public function editAuhtorProfile(Request $request){
        $authors = Author::findOrfail(Auth::guard('author')->id());
        $countries = Country::all();
        return response()->view('cms.auth.edit-profile-author' , compact('authors','countries'));
    }

    public function indexAuthor(Request $request){
        $authors = Author::findOrfail(Auth::guard('author')->id())->withCount('articles')->with('user')->orderBy('id', 'desc')->Paginate(7);
        $countries = Country::all();
        $roles = Role::all();
        return response()->view('cms.auth.indexAuthor' , compact('authors','countries','roles'));

    }

    public function createArticle(){
        $authors = Author::findOrfail(Auth::guard('author')->id());
        $this->authorize('create', Article::class);
        $categories = category::all();
        return response()->view('cms.auth.createArticle' , compact('authors','categories'));
    }





}
