<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function like(Request $request)
    {
        $like_s=$request->like_s;
        $comment_id=$request->get('comment_id');
        $change_like = 0;

        $likes =Like::where('comment_id',$comment_id)->where('visitor_id',Auth::user()->id)->first();

        if(!$likes){
            $new_like = new like();
            $new_like->comment_id = $comment_id;
            $new_like->visitor_id = Auth::user()->id;
            $new_like->like = 1;

            $like=$new_like->save();

            $isLike = 1;
        }
        elseif($likes->like == 1){
            $Likes = Like::where('comment_id',$comment_id)->where('visitor_id',Auth::user()->id)->delete();
            $isLike = 0;

        }
        elseif($likes->like == 0){
            $Likes = Like::where('comment_id',$comment_id)->where('visitor_id',Auth::user()->id)->update(['like' => 1]);
            $isLike = 1;

            $change_like = 1;
        }

        $response = array(

            'isLike' => $isLike ,
            'change_like' => $change_like ,
        ) ;
        return response()->json( $response ,200);

    }





    public function dislike(Request $request)
    {
        $like_s=$request->like_s;
        $comment_id=$request->get('comment_id');
        $change_dislike = 0;


        $dislike =Like::where('comment_id',$comment_id)->where('visitor_id',Auth::user()->id)->first();

        if(!$dislike){
            $new_like = new like();
            $new_like->comment_id = $comment_id;
            $new_like->visitor_id = Auth::user()->id;
            $new_like->like = 0;

            $like=$new_like->save();

            $is_dislike = 1;
        }
        elseif($dislike->like == 0){
            $Likes = Like::where('comment_id',$comment_id)->where('visitor_id',Auth::user()->id)->delete();
            $is_dislike = 0;

        }
        elseif($dislike->like == 1){
            $Likes = Like::where('comment_id',$comment_id)->where('visitor_id',Auth::user()->id)->update(['like' => 0]);
            $is_dislike = 1;
            $change_dislike = 1;
        }

        $response = array(

            'is_dislike' => $is_dislike ,
            'change_dislike' => $change_dislike ,
        ) ;
        return response()->json( $response ,200);

    }




}
