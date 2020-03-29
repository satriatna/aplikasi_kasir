@extends('layouts.layout')
@section('content')
<title>
@if(Auth::user()->level == 'pelanggan')
History Pemesanan | Aplikasi Kasir Restoran
@else
Transaksi Penjualan | Aplikasi Kasir Restoran
@endif
</title>
  <!-- Content Wrapper. Contains page content -->
  <!-- Header -->
  <style>
  .modal-body {
    max-height: calc(100vh - 210px);
    overflow-x: auto;
}
  </style>
  <div class="header bg-primary pb-8 pt-5 pt-md-8">
  
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
          <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="input-daterange datepicker row align-items-center">
                            <div class="col">
                            <form action="/filter_penjualan" method="GET">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        @if( request('dari') !='' )
                                        <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" required value="{{request('dari')}}">
                                        @else
                                        <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        @if( request('ke') !='' )
                                        <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" required value="{{request('ke')}}">
                                        @else
                                        <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                                        @endif
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Filter</button>
                            </form>
                    </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            
            <div class="card-body">
               
            <div style="overflow-x:auto;">

            <table class="table table-striped table-bordered" id="example"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th> Kode Transaksi </th>
                    <th> Nama Kasir </th>
                    <th> Tanggal </th>
                    <th> Total Harga </th>
                    <th> Jumlah Bayar </th>
                    <th>Kembalian</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($transaksi as $u)
                <tr>
                  <td></td>
                  <td>{{$u->id_transaksi}} </td>
                  <td>{{$u->nama}} </td>
                  <td>{{$u->tanggal_transaksi}} </td>
                  <td>{{$u->total_bayar}} </td>
                  <td>{{$u->jumlah_pembayaran}} </td>
                  <td>{{$u->kembalian}} </td>
                  <td>
                    <a href="transaksi_lihat/{{$u->id_transaksi}}" title="Lihat"><ion-icon name="eye-outline"></ion-icon></a>
                    <a href="transaksi_print/{{$u->id_transaksi}}" title="Print"><ion-icon name="print"></ion-icon></a>
                    @if(Auth::user()->level == 'pelanggan')
                    @else
                    <a href="transaksi_hapus/{{$u->id_transaksi}}" onclick="return confirm('Anda yakin ?')" title="Hapus"><ion-icon name="trash-outline" class="text-danger"></ion-icon></a>
                    @endif
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
  
  



  @push('scripts')
  
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>
   $(document).ready(function() {
  /**
   * for showing edit item popup
   */

  $(document).on('click', "#edit-item", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#edit-modal').modal(options)
  })

  // on modal show
  $('#edit-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var nis = row.children(".nis").text();
    var nama = row.children(".nama").text();
    var nama_rombel = row.children(".nama_rombel").text();
    var nama_rayon = row.children(".nama_rayon").text();
    var kode_reward = row.children(".kode_reward").text();
    var point = row.children(".point").text();
    var tgl_dapat_reward = row.children(".tgl_dapat_reward").text();
    var keterangan_reward = row.children(".keterangan_reward").text();
    
    // fill the data in the input fields
    $("#modal_input_id").val(id);
    $("#modal_input_nis").val(nis);
    $("#modal_input_nama").val(nama);
    $("#modal_input_nama_rombel").val(nama_rombel);
    $("#modal_input_nama_rayon").val(nama_rayon);
    $("#modal_input_kode_reward").val(kode_reward);
    $("#modal_input_point").val(point);
    $("#modal_input_tgl_dapat_reward").val(tgl_dapat_reward);
    $("#modal_input_keterangan_reward").val(keterangan_reward);

  })

  // on modal hide
  $('#edit-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})


$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

$('.datepicker').datepicker({
    locale:'id',
   format:'yyyy-m-d',
    autoclose:true
});
    </script>
    @endpush
  @endsection