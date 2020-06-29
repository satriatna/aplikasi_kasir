<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class TransaksiOrderController extends Controller
{
    public function kasir()
    {
        $masakan = DB::table('tb_masakan')->where('status_masakan','tersedia')
        ->join('tb_kategori', function($join){
            $join->on('tb_masakan.kategori_id','=','tb_kategori.id_kategori');
        })
        ->get();
        $order = DB::table('tb_order')->where('status_order','sedang_dipesan')->where('user_order_id',Auth::user()->id)
        ->join('tb_masakan', function($join){
            $join->on('tb_order.masakan_id','=','tb_masakan.id_masakan');
        })
        ->join('users', function($join){
            $join->on('tb_order.user_order_id','=','users.id');
        })
        ->get();

        return view('kasir/kasir',compact('masakan','order'));
    }

    public function pesan_order(Request $request)
    {

        $ambil = DB::table('tb_masakan')->where('id_masakan',$request->masakan_id)->first();
        $now = date('Y-m-d');
        $hasil = $ambil->harga * 1;
        DB::table('tb_order')->insert([
            'masakan_id'=>$request->masakan_id,
            'user_order_id'=>Auth::user()->id,
            'tanggal_order'=>$now,
            'status_order' => 'sedang_dipesan',
            'jumlah' => '1',
            'sub_total'=>$hasil
        ]);
        return redirect()->back()->with('alert','Berhasil menambah order');
        
    }

    public function order_update(Request $request)
    {
        $ambil1 = DB::table('tb_order')->where('id_order',$request->id_order)->first();
        $ambil2 = DB::table('tb_masakan')->where('id_masakan',$ambil1->masakan_id)->first();
        $hasil = $ambil2->harga * $request->jumlah;
        DB::table('tb_order')->where('id_order',$request->id_order)->update([
            'jumlah'=>$request->jumlah,
            'sub_total'=>$hasil
        ]);
        return redirect()->back()->with('alert','Berhasil mengubah jumlah pesan');
    }
    
    public function order_hapus($id)
    {
        DB::table('tb_order')->where('id_order',$id)->delete();
        return redirect()->back()->with('alert','Berhasil menghapus order');
    }

    public function order_bayar(Request $request)
    {
        

        $ambil = DB::table('tb_order')->where('user_order_id',Auth::user()->id)->where('status_order','sedang_dipesan')->get();
        $order = DB::table('tb_order')->where('id_order', \DB::raw("(select max(`id_order`) from tb_order)"))->where('user_order_id',Auth::user()->id)->first();
            
        foreach($ambil as $a)
        {
            DB::table('tb_order_detail')->insert([
                'id_order_detail' => $order->id_order,
                'order_id' => $a->id_order
            ]);
        }
        $now = date('Y-m-d');
        $transaksi = DB::table('tb_transaksi')->get();
        $hitung = count($transaksi);
        if($hitung < 1)
        {
            $no = $hitung + 1;
            $kode = "KTP - ".$no;
        }
        
        else if($hitung >= 1)
        {
            $no = $hitung + 1;
            $kode = "KTP - ".$no;
        }
            DB::table('tb_transaksi')->insert([
                'id_transaksi'=>$kode,
                'order_detail_id'=>$order->id_order,
                'tanggal_transaksi' => $now,
                'total_bayar' => $request->total_bayar,
                'jumlah_pembayaran' => $request->jumlah_pembayaran,
                'kembalian' => $request->kembalian,
                'user_transaksi_id' => Auth::user()->id,
            ]);
     
        $ambil = DB::table('tb_order')->where('user_order_id',Auth::user()->id)->where('status_order','sedang_dipesan')->update([
            'status_order'=>'sudah_bayar'
        ]);
        return redirect()->back()->with('alert','Transaksi berhasil');

    }
}
