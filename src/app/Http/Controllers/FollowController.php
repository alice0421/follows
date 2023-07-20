<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function index()
    {
        // $followers = Auth::user()->followers()->get(); // フォロワー
        $followings = Auth::user()->followings()->get(); // 自分がフォローしている人
        return view('follows.index')->with(['followings' => $followings]);
    }
}
