<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lelang;
use App\History;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $history = History::where('user_id',Auth::user()->id)->get();
        return view('index',compact('history'));
    }
}
