<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
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

    public function register(Request $request)
    {
        $email_input = $request['follow.email'];

        // inputがnullのとき
        if(is_null($email_input)){
            return back()
                ->withInput()
                ->with(['error' => 'メールアドレスを入力してください。']);
        }

        // メールアドレスからユーザー検索
        $followee = User::where('email', $email_input)->first();
        
        // 指定したユーザーが存在しないとき
        if(is_null($followee)){
            return back()
                ->withInput()
                ->with(['error' => '指定したメールアドレスに該当するユーザーはいません。']);
        }

        // 指定したユーザーが自分であるとき
        if($followee->id === Auth::id()){
            return back()
                ->withInput()
                ->with(['error' => '自分以外のユーザーのメールアドレスを入力してください。']);
        }

        // 指定したユーザーを既にフォローしているとき
        $is_followed = Auth::user()->followings()->find($followee->id);
        if(!is_null($is_followed)){
            return back()
                ->withInput()
                ->with(['error' => '指定したメールアドレスのユーザーは既にフレンドです。']);
        }

        // 相互フォロー登録
        $followings = [
            ['follower_user_id' => Auth::id(), 'followee_user_id' => $followee->id],
            ['follower_user_id' => $followee->id, 'followee_user_id' => Auth::id()]
        ];
        Follow::insert($followings);

        return back()->with(['success' => '指定したユーザーをフレンドに登録しました。']);
    }
}
