<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use App\Lelang;
class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelang = Lelang::paginate(10);
        return view('lelang.index',compact('lelang'));
    }

    public function gantistatus($id)
    {
        $lelang = Lelang::findOrFail($id);
        if($lelang->status === 'dibuka')
        {
            $lelang->status = 'ditutup';
        }

        else
        {
            $lelang->status = 'dibuka';
        }

        $lelang->save();
        return redirect('/lelang');
    }

    public function detail($id)
    { 
      $lelang = Lelang::findOrFail($id);
      $history = History::where('lelang_id', $id)->orderBy('penawaran_harga','desc')->get();
      return view ('lelang.detail',compact('lelang','history'));


    }

    public function destroy($id)
    {
        $lelang = Lelang::find($id);
        foreach($lelang->history as $history):
            $history->delete();
          
        endforeach;
        $lelang->delete();
        return redirect()->route('lelang.index')->with('success','Data Berhasil Dihapus');
    }
}
