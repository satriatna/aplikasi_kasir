<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class PelangganController extends Controller
{
    public function dashboard_pelanggan(){
        $transaksi = DB::table('tb_transaksi')->where('user_transaksi_id',Auth::user()->id)->get();
        $pesanan = DB::table('tb_order')->where('user_order_id',Auth::user()->id)->where('status_order','sedang_dipesan')->get();
        
        $masakan = DB::table('tb_masakan')->where('status_masakan','tersedia')
        ->join('tb_kategori', function($join){
            $join->on('tb_masakan.kategori_id','=','tb_kategori.id_kategori');
        })->get();
        return view('pelanggan/dashboard_pelanggan',compact('transaksi','pesanan','masakan'));
    }
}
