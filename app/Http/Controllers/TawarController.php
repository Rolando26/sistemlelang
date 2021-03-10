<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Lelang;
use App\History;
use Illuminate\Support\Facades\Auth;

class TawarController extends Controller
{
    public function index()
    {
        $lelang = Lelang::where('status','dibuka')->get();
        return view('tawar.index',compact('lelang')); 
    }

    public function tawar($id)
    {
        $lelang = Lelang::find($id);

        return view('tawar.harga',compact('lelang'));
    }

    public function store(Request $request)
    {
        $lelang = Lelang::find($request->id);
        if($lelang->harga_akhir < $request->harga_akhir)
        {
            $lelang->harga_akhir = $request->harga_akhir;
            $lelang->user_id = Auth::user()->id;
            $lelang->save();

            $history = new History();
            $history->lelang_id = $lelang->id;
            $history->barang_id = $lelang->barang->id;
            $history->user_id = $lelang->user_id;
            $history->penawaran_harga = $lelang->harga_akhir;
            $history->save();

            return redirect('tawar')->with('success','Penawaran Harga Sudah Berhasil Diubah');
        }

        else{
            return redirect('tawar-barang/'.$lelang->id);
        }
    }
}
