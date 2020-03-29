<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PenggunaController extends Controller
{
    public function akun_user()
    {
        $users = DB::table('users')->get();
        return view('pengguna/pengguna',compact('users'));
    }
    public function akun_user_tambah()
    {
        return view('pengguna/tambah');
    }
    public function akun_user_tambah_post(Request $request)
    {
        $this->validate($request, [
            'nama'=> ['required', 'string'],
            'username'=> ['required', 'string', 'unique:users'],
            'password'=> ['required','string', 'min:8', 'confirmed'],
        ]);
        DB::table('users')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);
        return redirect('/akun_user')->with('alert','Berhasil menambah User');
    }
    public function akun_user_edit($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        return view('pengguna/edit', compact('users'));
    }
    public function akun_user_update(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'level' => $request->level,
        ]);
        return redirect('/akun_user')->with('alert','Berhasil mengubah data');
    }
    public function akun_user_hapus($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('alert','Berhasil menghapus akun');
    }

    public function akun_user_lihat($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        return view('pengguna/detail',compact('users'));
    }
}
