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
          <div class="col-xl-4 col-lg-4">
              <div class="card">
              <div class="card-header text-center">
                    <h2>Rekap Data Transaksi</h2>
              </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="/cetak_pdf" method="GET">
                                <div class="container-fluid">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                                @if( request('dari') !='' )
                                                <input type="date" name="dari" class="form-control" placeholder="Start date" tooltip="Dari Tanggal" required value="{{request('dari')}}">
                                                @else
                                                <input type="date" name="dari" class="form-control" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            @if( request('ke') !='' )
                                            <input type="date" name="ke" class="form-control" placeholder="Start date" tooltip="ke Tanggal" required value="{{request('ke')}}">
                                            @else
                                            <input type="date" name="ke" class="form-control" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm btn-block" target="_blank">Rekap</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  



  @push('scripts')
  
    <script>

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