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

        $categories = category::with('articles')->limit(3)->get();
        $sliders = Slider::all();
        $articles = Article::orderBy('created_at', 'desc')->take(3)->get();

        return response()->view('news.index', compact('sliders','categories','articles'));

    }



    public function contact(){
        return response()->view('news.contact');
    }




    public function allNews($id){
        $categories = category::with('articles')->findOrFail($id);
        $articles = Article::orderBy('created_at', 'desc')->simplePaginate(7);

        return response()->view('news.all-news' ,compact('categories','id','articles'));
    }




    public function indexDetailes($id)
    {
        $categories = category::all();
        $articles = Article::with('comments')->findOrFail($id);
        $comments = Comment::all();

        return response()->view('news.newsdetailes',compact('articles' , 'id','categories','comments'));


    }



}
