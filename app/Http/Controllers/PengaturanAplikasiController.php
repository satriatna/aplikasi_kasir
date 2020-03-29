<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PengaturanAplikasiController extends Controller
{
    public function pengaturan_aplikasi()
    {
        $resto = DB::table('tb_resto')->first();
        return view('pengaturan_aplikasi/pengaturan_aplikasi',compact('resto'));
    }
    public function pengaturan_aplikasi_update(Request $request)
    {
        DB::table('tb_resto')->where('id_resto',$request->id_resto)->update([
            'nama_resto' => $request->nama_resto,
            'email_resto' => $request->email_resto,
            'url' => $request->url,
            'alamat_resto' => $request->alamat_resto,
        ]);
        return redirect()->back()->with('alert','Berhasil mengubah Identitas');
    }
}
