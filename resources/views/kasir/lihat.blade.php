@extends('layouts/layout')
@section('content')
<style>
.card.ubah{
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
}
table{
    margin-top:400px !important;
    margin-bottom:20px !important;
}
.card-header{
    margin-left: 20px !important;
    z-index:3;
    margin-top: -35px !important;
    position: absolute !important;
    width: 320px;
}
.header{
    height: 660px !important;
}
</style>
<title>
  Pesan Makanan | Aplikasi Kasir Restoran
</title>

<body>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

    <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
            <div class="row">
            @if( Session::get('alert') !="")
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="alert bg-success alert-dismissible fade show" role="alert">
                    <strong class="text-white">{{Session::get('alert')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;<x/span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th> Nama Masakan </th>
                    <th> Jumlah </th>
                    <th> Harga </th>
                    <th> Sub Total </th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($transaksi as $m)
                <tr>
                  <td>{{$m->nama_masakan}} </td>
                  <td>{{$m->jumlah}} </td>
                  <td>{{$m->harga}} </td>
                  <td> {{$m->jumlah * $m->harga }} </td>
                  </tr>
                @endforeach
                <tr>
                    <th colspan="5"></th>
                </tr>
                <tr>
                    <th colspan="3">Total Harga</th>
                    <td>{{$m->total_bayar}}</td>
                </tr>
                <tr>
                    <th colspan="3">Jumlah Bayar</th>
                    <td>{{$m->jumlah_pembayaran}} </td>
                </tr>
                <tr>
                    <th colspan="3">Kembalian</th>
                    <td>{{$m->kembalian}} </td>
                </tr>
                </tbody>
            </table>
            </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
  @push('scripts')
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>
    

  function hitung()
  {
    var total = $('#total').val();
    var jumlah_pembayaran = $('#jumlah_pembayaran').val();
    var kembalian = $('#kembalian').val();
    var bayar = $('#bayar').val();
    var a = jumlah_pembayaran - total;
    $('#kembalian').val(a);
    if(a < 0)
    {
      $("#bayar").prop("disabled", true);
    }
    else
    {
      $("#bayar").prop("disabled", false);
    }
  }

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
    </script>
    @endpush
  @endsection