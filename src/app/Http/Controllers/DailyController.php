<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyController extends Controller
{
    public function index()
    {
        $dailies = Auth::user()->dailies()->get();
        return view('dailies.index')->with(['dailies' => $dailies]);
    }

    public function show(Daily $daily)
    {
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

    public function delete(Daily $daily)
    {
        $daily->delete();
        return redirect()->route('daily.index');
    }
}
