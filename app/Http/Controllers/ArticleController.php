<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\category;
use App\Models\Country;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function indexArticle($id){
        $articles = Article::where('author_id',$id)->with('category')->orderBy('id', 'desc')->Paginate(12);
        $this->authorize('viewAny', Article::class);

        return response()->view('cms.article.index' , compact('articles','id'));

    }

    public function createAritcle($id){
        $categories = category::all();
        $this->authorize('create', Article::class);
        return response()->view('cms.article.create' , compact('categories' , 'id'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $articles =Article::orderBy('id', 'desc')->with('author')->Paginate(12);
        $this->authorize('viewAny', Article::class);
        return response()->view('cms.article.indexAll' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $authors = Author::all();
        $this->authorize('create', Article::class);
        return response()->view('cms.article.create' , compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            'title' =>'required|string|min:3|max:30',
        ],[

        ]);

        if( ! $validator->fails()){
            $articles = new Article();
            $articles->title= $request->get('title');
            $articles->short_description= $request->get('short_description');
            $articles->full_description= $request->get('full_description');
            $articles->category_id= $request->get('category_id');
            $articles->author_id= $request->get('author_id');

            $isSaved = $articles->save();

            if($isSaved){
                return response()->json(['icon' => 'success','title'=>'Created is Successfully'],200);
            } else{
                return response()->json(['icon' => 'error','title'=>'Created is Failed'],400);

            }


        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $categories = category::all();
        $articles = Article::findOrFail($id);
        $this->authorize('update', Article::class);

        return response()->view('cms.article.edit' , compact('categories' , 'articles' , 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
            // 'name' =>'required|string|min:3|max:30',
        ],[

        ]);

        if( ! $validator->fails()){
            $articles =  Article::findOrFail($id);
            $articles->title= $request->get('title');
            $articles->short_description= $request->get('short_description');
            $articles->full_description= $request->get('full_description');
            $articles->category_id= $request->get('category_id');
            $articles->author_id= $request->get('author_id');

            $isSaved = $articles->save();
            return ['redirect' =>route('indexArticle',$articles->author_id)];


            if($isSaved){
                return response()->json(['icon' => 'success','title'=>'Created is Successfully'],200);
            } else{
                return response()->json(['icon' => 'error','title'=>'Created is Failed'],400);

            }


        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::destroy($id);
        $this->authorize('delete', Article::class);

        return response()->json(['icon' => 'success','title'=>'Deleted is Successfully'],200);
    }
}
