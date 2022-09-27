<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\category;
use App\Models\Comment;
use App\Models\Slider;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{






    public function indexSlider()
    {

        $categories = category::take(3)->get();
        // $categories = category::whereHas('articles', function($query){
        //     return $query->orderBy('created_at', 'desc')->limit(3);
        // })->get();

        $sliders = Slider::all();
        $articles = Article::orderBy('created_at', 'desc')->take(3)->get();


        return response()->view('news.index', compact('sliders','categories','articles'));

    }



    public function allNews(){
        $categories = category::get();
        $articles = Article::orderBy('created_at', 'desc')->Paginate(10);

        return response()->view('news.all-news' ,compact('categories','articles'));
    }



    public function contact(){
        $visitors = Visitor::all();

        return response()->view('news.contact', compact('visitors'));
    }







    public function indexDetailes($id)
    {
        $categories = category::all();
        $articles = Article::with('comments')->findOrFail($id);
        $comments = Comment::orderBy('id', 'desc')->Paginate(7);
        $Allarticles = Article::where('id', '!=', $id  )->inRandomOrder()->take(3)->get();
        $visitors = Visitor::all();


        return response()->view('news.newsdetailes',compact('articles' , 'id','categories','comments','Allarticles','visitors'));


    }


    public function profile(){
        $visitors = Visitor::all();

        return response()->view('news.profile', compact('visitors'));
    }


    public function editProfile($id)
    {
        $visitors = Visitor::findOrFail($id);
        return response()->view('news.edit-profile' , compact('visitors' ));
    }


    public function updateProfile(Request $request, $id)
    {
          $validator = validator($request->all(),[
            'firstname' =>'required|string|min:3|max:30',
            'lastname' =>'required|string|min:3|max:30',
            'mobile' =>'required|string|min:10|max:14',

        ],[

        ]);

        if( ! $validator->fails()){
            $visitors =Visitor::findOrFail($id);

            $visitors->email= $request->get('email');
            if(request()->hasFile('image')){
                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/visitor',$imageName);


                $visitors->image = $imageName;
            }
            $visitors->firstname= $request->get('firstname');
            $visitors->lastname= $request->get('lastname');
            $visitors->mobile= $request->get('mobile');
            $visitors->gender= $request->get('gender');
            $visitors->date_of_birth= $request->get('date_of_birth');

            $isUpdate = $visitors->save();
            return ['redirect' =>route('profile.visitor')];


            if($isUpdate){

                return response()->json(['icon' => 'success','title'=>'Updated is Successfully'],200);


            } else{
                return response()->json(['icon' => 'error','title'=>'Updated is Failed'],400);

            }


        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
        }
    }


}
