<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KategoriController extends Controller
{
    public function kategori()
    {
        $kategori = DB::table('tb_kategori')->get();
        return view('kategori/kategori',compact('kategori'));
    }
    public function kategori_tambah()
    {
        $kategori = DB::table('tb_kategori')->get();
        return view('kategori/tambah',compact('kategori'));
    }
    public function kategori_tambah_post(Request $request)
    {
        DB::table('tb_kategori')->insert([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('/kategori')->with('alert','Berhasil menambah data');
    }
    public function kategori_edit($id)
    {
        $kategori = DB::table('tb_kategori')->where('id_kategori',$id)->get();
        return view('kategori/edit', compact('kategori'));
    }
    public function kategori_update(Request $request)
    {
        DB::table('tb_kategori')->where('id_kategori',$request->id_kategori)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('/kategori')->with('alert','Berhasil mengubah data');
    }
    public function kategori_hapus($id)
    {
        DB::table('tb_kategori')->where('id_kategori',$id)->delete();
        return redirect()->back()->with('alert','Berhasil menghapus data');
    }

    public function kategori_lihat($id)
    {
        $kategori = DB::table('tb_kategori')->where('id_kategori',$id)->get();
        return view('kategori/detail',compact('kategori'));
    }
}
