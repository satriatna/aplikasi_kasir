@extends('layouts.layout')
@section('content')
<title>
  Data Masakan | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
       
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
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
          <div class="card shadow">
            <div class="card-header">
                <a href="/masakan_tambah" class="btn btn-primary btn-sm float-right">Tambah</a>
            </div>
            <div class="card-body">
            <div style="overflow-x:auto;">
            <table class="table table-striped table-bordered" id="example"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th> Nama Masakan </th>
                    <th> Kategori </th>
                    <th> Harga </th>
                    <th> Status Masakan </th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($masakan as $u)
                <tr>
                  <td></td>
                  <td>{{$u->nama_masakan}} </td>
                  <td>{{$u->nama_kategori}} </td>
                  <td>@currency($u->harga) </td>
                  <td>{{$u->status_masakan}} </td>
                  <td>
                    <a href="masakan_lihat/{{$u->id_masakan}}" data-toggle="tooltip" data-placement="top" title="Lihat"><ion-icon name="eye-outline"></ion-icon></a>
                    <a href="masakan_hapus/{{$u->id_masakan}}" onclick="return confirm('Anda yakin ?')" data-toggle="tooltip" data-placement="top" title="Hapus"><ion-icon name="trash-outline" class="text-danger"></ion-icon></a>
                    <a href="masakan_edit/{{$u->id_masakan}}" data-toggle="tooltip" data-placement="top" title="Edit"><ion-icon name="pencil-outline"></ion-icon></a>
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