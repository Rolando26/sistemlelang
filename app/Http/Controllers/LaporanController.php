<?php

namespace App\Http\Controllers;

use App\Lelang;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $lelang = Lelang::all();
        $no = 1;
        return view('laporan.index',compact('lelang','no'));
    }

    public function print()
    {
        $lelang = Lelang::all();
        $no = 1;
        return view('laporan.print',compact('lelang','no'));
    }
}
