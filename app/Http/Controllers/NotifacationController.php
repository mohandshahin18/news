<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifacationController extends Controller
{

    public function index(){
        $authors = Auth::user();


        // foreach($auhtors->unreadeNotifications as $notification ){
        //     echo $notification->data['comment'] ;
        // }

    }
}
