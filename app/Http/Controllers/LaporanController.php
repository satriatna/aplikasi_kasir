<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
class LaporanController extends Controller
{
    public function laporan()
    {
        return view('laporan/laporan');
    }

    public function cetak_pdf(Request $request)
    {
        $nama = DB::table('tb_resto')->first();
        $dari = $request->dari;
        $ke = $request->ke;
        

         $data_pdf = DB::table('tb_transaksi')
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
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->paginate($request->limit ?  $request->limit : 10);
            $data_pdf->appends($request->only('dari','ke'));
        $pdf = PDF::loadview('laporan/data_pdf',compact('nama','data_pdf','dari','ke'));

        
        return $pdf->stream();
    }

    public function data_pdf()
    {
        $nama = DB::table('tb_resto')->first();
        $data_pdf = DB::table('tb_transaksi')
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
        return view('laporan/data_pdf', compact('nama','data_pdf'));
    }
}
