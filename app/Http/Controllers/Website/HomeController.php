<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\category;
use App\Models\Comment;
use App\Models\Slider;
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
        return response()->view('news.contact');
    }







    public function indexDetailes($id)
    {
        $categories = category::all();
        $articles = Article::with('comments')->findOrFail($id);
        $comments = Comment::all();
        $Allarticles = Article::where('id', '!=', $id  )->inRandomOrder()->take(3)->get();


        return response()->view('news.newsdetailes',compact('articles' , 'id','categories','comments','Allarticles'));


    }



}
