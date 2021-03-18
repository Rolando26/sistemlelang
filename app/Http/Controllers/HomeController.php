<?php

namespace App\Http\Controllers;

use App\Barang;
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
        $barang = Barang::all();
        $user = User::all();
        return view('index',compact('history','barang','user'));
    }
}
