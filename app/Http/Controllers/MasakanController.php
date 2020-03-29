<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MasakanController extends Controller
{
    public function masakan()
    {
        $masakan = DB::table('tb_masakan')->where('status_masakan','tersedia')
        ->join('tb_kategori', function($join){
            $join->on('tb_masakan.kategori_id','=','tb_kategori.id_kategori');
        })->get();
        return view('masakan/masakan',compact('masakan'));
    }
    public function masakan_tambah()
    {
        $kategori = DB::table('tb_kategori')->get();
        return view('masakan/tambah',compact('kategori'));
    }
    public function masakan_tambah_post(Request $request)
    {
        DB::table('tb_masakan')->insert([
            'nama_masakan' => $request->nama_masakan,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan,
        ]);
        return redirect('/masakan')->with('alert','Berhasil menambah data');
    }
    public function masakan_edit($id)
    {
        $kategori = DB::table('tb_kategori')->get();
        $masakan = DB::table('tb_masakan')->where('id_masakan',$id)->get();
        return view('masakan/edit', compact('masakan','kategori'));
    }
    public function masakan_update(Request $request)
    {
        DB::table('tb_masakan')->where('id_masakan',$request->id_masakan)->update([
            'nama_masakan' => $request->nama_masakan,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan,
        ]);
        return redirect('/masakan')->with('alert','Berhasil mengubah data');
    }
    public function masakan_hapus($id)
    {
        DB::table('tb_masakan')->where('id_masakan',$id)->delete();
        return redirect()->back()->with('alert','Berhasil menghapus data');
    }

    public function masakan_lihat($id)
    {
        $masakan = DB::table('tb_masakan')->where('id_masakan',$id)->get();
        $kategori = DB::table('tb_kategori')->get();
        return view('masakan/detail',compact('masakan','kategori'));
    }
}
