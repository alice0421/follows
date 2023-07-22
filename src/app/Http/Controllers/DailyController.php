<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyController extends Controller
{
    public function dashboard()
    {
        $my_dailies = Auth::user()->dailies()->orderby('updated_at', 'desc')->get();
        
        // フォローしているユーザーのidのみ取得し、Collectionから配列に変換
        $following_ids = Auth::user()->followings()->select('id')->get()->toArray();
        // $following_idsは、キーがidとpivotの連想配列だったため、idのvalueのみ配列化 (array_column) -> これでフォローしているユーザーのidが配列になった
        // whereInでフォローしているユーザーの日記を全件取得し、降順に並べ替え
        $following_dailies = Daily::whereIn('user_id', array_column($following_ids, 'id'))->orderby('updated_at', 'desc')->get();
        
        return view('dailies.dashboard')->with(['my_dailies' => $my_dailies, 'following_dailies' => $following_dailies]);
    }

    public function index(User $user)
    {
        $dailies = $user->dailies()->orderby('updated_at', 'desc')->get();
        return view('dailies.index')->with(['dailies' => $dailies]);
    }

    public function show(Daily $daily)
    {
        // 自分とフレンドのみ閲覧を許可
        $this->authorize('show', $daily);

        return view('dailies.show')->with(['daily' => $daily]);
    }

    public function create()
    {
        return view('dailies.create');
    }

    public function store(Request $request)
    {
        $daily_input = $request['daily'];
        $daily_input['user_id'] = Auth::id();
        $daily = Daily::create($daily_input);

        return redirect()->route('daily.show', ['daily' => $daily->id]);
    }

    public function edit(Daily $daily)
    {
        // 自分とフレンドのみ編集を許可
        $this->authorize('edit', $daily);

        return view('dailies.edit')->with(['daily' => $daily]);
    }

    public function update(Daily $daily, Request $request)
    {
        // 自分とフレンドのみ更新を許可
        $this->authorize('update', $daily);

        $daily_input = $request['daily'];
        $daily->fill($daily_input)->save();
        return redirect()->route('daily.show', ['daily' => $daily->id]);
    }

    public function delete(Daily $daily)
    {
        // 自分のみ削除を許可
        $this->authorize('delete', $daily);

        $daily->delete();
        return redirect()->route('daily.dashboard');
    }
}
