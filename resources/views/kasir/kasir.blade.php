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
</style>
<title>
  Pesan Makanan | Aplikasi Kasir Restoran
</title>
<body onload="bukapage()">
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
                <div class="col-lg-6">
                    <div class="card ubah">
                        <div class="card-body">
                        
                    <form action="pesan_order" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <select name="masakan_id" id="masakan_id" class="form-control">
                                        <option value="" selected disabled> Cari Menu </option>
                                        @foreach($masakan as $m)
                                        <option value="{{$m->id_masakan}}">{{$m->nama_masakan}} - {{$m->harga}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                <button class="btn btn-primary">Pesan</button>
                            </div>
                        <br>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
            @if($order->count() != '')    
        <div class="row">
        <div class="card col-lg-8">
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th> Nama Masakan </th>
                    <th> Jumlah </th>
                    <th> Harga </th>
                    <th> Sub Total </th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($order as $m)
                <tr>
                  <td></td>
                  <td>{{$m->nama_masakan}} </td>
                  <form action="/order_update" method="POST">
                  @csrf
                  <input type="hidden" value="{{$m->id_order}}" name="id_order">
                  <td> <input type="text" value="{{$m->jumlah}}" maxlength="4" size="4" name="jumlah"> </td>
                  <td>{{$m->harga}} </td>
                  <td> {{$m->jumlah * $m->harga }} </td>
                  <td>
                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Update"><ion-icon name="pencil-outline"></ion-icon></button>
                    <a href="order_hapus/{{$m->id_order}}" onclick="return confirm('Anda yakin ?')" data-toggle="tooltip" data-placement="top" title="Hapus"><ion-icon name="trash-outline" class="text-danger"></ion-icon></a>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
        <form action="/order_bayar" method="POST">
        @csrf
            <div class="card">
                <div class="card-header">
                    <h1>Rp. {{$order->sum('sub_total')}}</h1>
                    <input type="hidden" id="total" value="{{$order->sum('sub_total')}}" class="total" name="total_bayar">
                </div>
                <div class="card-body bg-secondary">
                <br><br>
                <div class="form-group">
                    <input type="number" required placeholder="Jumlah Pembayaran" class="form-control jumlah_pembayaran" name="jumlah_pembayaran" id="jumlah_pembayaran" onkeyup="hitung()">
                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                    <input type="number" required class="form-control kembalian" name="kembalian" id="kembalian">
                </div>
                <button class="btn btn-primary" id="bayar">Bayar</button>
            </div>
        </form>
            </div>
            </div>
        </div>
    </div>
            @endif
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