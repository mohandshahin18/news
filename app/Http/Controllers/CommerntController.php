<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Comment;
use App\Notifications\NewCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;

class CommerntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $author_id =$request->get('author_id');
        $article_id=$request->get('id');

        $validator = validator($request->all(),[
            'comment'=>'required'
        ],[

        ]);

        if( ! $validator->fails()){
            $comments = new Comment();
            $comments->comment= $request->get('comment');
            $comments->visitor_id= $request->get('visitor_id');
            // $comments->image= $request->get('image');
            $comments->article_id= $request->get('article_id');


            $isSaved = $comments->save();

            $auhtors = Author::all();
            // $auhtors->notify(new NewCommentNotification($request->comment ,  $request->article_id ));



            if($isSaved){
                Notification::send($auhtors , new NewCommentNotification($request->comment ,  $request->article_id , $request->visitor_id));

                return response()->json(['icon' => 'success','title'=>'Send is Successfully'],200);


            } else{
                return response()->json(['icon' => 'error','title'=>'Send is Failed'],400);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = Comment::destroy($id);
        // return response()->json(['icon' => 'success','title'=>'Deleted is Successfully'],200);

        // return redirect()->intended(route('news.detailes'));
        // return ['redirect' =>route('news.index')];



    }
}
