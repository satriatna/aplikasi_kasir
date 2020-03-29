<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
class TransaksiPenjualanController extends Controller
{
    public function transaksi_penjualan()
    {
        if(Auth::user()->level == "pelanggan")
        {
            $transaksi = DB::table('tb_transaksi')
            ->join('users', function($join){
                $join->on('tb_transaksi.user_transaksi_id','=','users.id');
            })
            ->where('user_transaksi_id',Auth::user()->id)
            ->get();
            return view('kasir/transaksi_penjualan',compact('transaksi'));
        }
        else
        {
            $transaksi = DB::table('tb_transaksi')
            ->join('users', function($join){
                $join->on('tb_transaksi.user_transaksi_id','=','users.id');
            })
            // ->join('tb_order_detail', function($join){
            //     $join->on('tb_transaksi.order_detail_id','=','tb_order_detail.id_order_detail');
            // })
            // ->join('tb_order', function($join){
            //     $join->on('tb_order_detail.order_id','=','tb_order.id_order');
            // })
            // ->join('tb_masakan', function($join){
            //     $join->on('tb_order.masakan_id','=','tb_masakan.id_masakan');
            // })
            // ->join('users', function($join){
            //     $join->on('tb_order.user_order_id','=','users.id');
            // })
            ->get();
            return view('kasir/transaksi_penjualan',compact('transaksi'));
        }
    }

    public function transaksi_lihat($id)
    {
        $transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)
        ->join('tb_order_detail', function($join){
            $join->on('tb_transaksi.order_detail_id','=','tb_order_detail.id_order_detail');
        })
        ->join('tb_order', function($join){
            $join->on('tb_order_detail.order_id','=','tb_order.id_order');
        })
        ->join('tb_masakan', function($join){
            $join->on('tb_order.masakan_id','=','tb_masakan.id_masakan');
        })
        ->join('users', function($join){
            $join->on('tb_order.user_order_id','=','users.id');
        })
        ->get();
        return view('kasir/lihat',compact('transaksi'));
    }
    public function transaksi_hapus($id)
    {
        $transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)->delete();
        return redirect()->back()->with('alert','Berhasil menghapus data');
    }

    public function filter_penjualan(Request $request)
    {
        if(Auth::user()->level == 'pelanggan')
        {
            $transaksi = DB::table('tb_transaksi')->where('user_transaksi_id',Auth::user()->id)
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
        }
        else
        {
            $transaksi = DB::table('tb_transaksi')
            ->join('users', function($join){
                $join->on('tb_transaksi.user_transaksi_id','=','users.id');
            })
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
        }
        return view('/kasir/transaksi_penjualan',compact('transaksi'));
    }

    public function transaksi_print($id)
    {
        $nama_resto = DB::table('tb_resto')->first();

        $nama_kasir = DB::table('tb_transaksi')->where('id_transaksi',$id)
        ->join('tb_order_detail', function($join){
            $join->on('tb_transaksi.order_detail_id','=','tb_order_detail.id_order_detail');
        })
        ->join('tb_order', function($join){
            $join->on('tb_order_detail.order_id','=','tb_order.id_order');
        })
        ->join('tb_masakan', function($join){
            $join->on('tb_order.masakan_id','=','tb_masakan.id_masakan');
        })
        ->join('users', function($join){
            $join->on('tb_order.user_order_id','=','users.id');
        })->first();
        
        $tgl_transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)->first();
        $transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)
        ->join('tb_order_detail', function($join){
            $join->on('tb_transaksi.order_detail_id','=','tb_order_detail.id_order_detail');
        })
        ->join('tb_order', function($join){
            $join->on('tb_order_detail.order_id','=','tb_order.id_order');
        })
        ->join('tb_masakan', function($join){
            $join->on('tb_order.masakan_id','=','tb_masakan.id_masakan');
        })
        ->join('users', function($join){
            $join->on('tb_order.user_order_id','=','users.id');
        })
        ->get();
        
        $pdf = PDF::loadview('laporan/print_struk',compact('transaksi','nama_kasir','nama_resto','tgl_transaksi'));
        
        return $pdf->stream();
    }
    
    // $transaksi = DB::table('tb_transaksi')->where('id_transaksi',$id)->first();
    // $order_detail = DB::table('tb_order_detail')->where('order_detail_id',$transaksi->order_detail_id)->get();
    // foreach($order_detail as $o)
    // {
    //     $kotak [] = $o->order_id;
    // }
    // $order = DB::table('tb_order')->whereIn('id_order',$kotak)->get();
    // DB::table('tb_transaksi')->where('id_transaksi',$id)->delete();
    // DB::table('tb_order_detail')->where('order_id',$transaksi->order_detail_id)->delete();
    // DB::table('tb_order')->whereIn('id_order',$transaksi->order_id)->delete();
    // return redirect()->back()->with('alert','Berhasil menghapus data');
}
