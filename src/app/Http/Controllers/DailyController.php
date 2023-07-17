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
}
