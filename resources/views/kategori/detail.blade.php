@extends('layouts/layout')
@section('content')
<title>
  Detail Kategori | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                Detail Data
            </div>
                <div class="card-body">
                  @foreach($kategori as $r)
                  @csrf
                  <div class="form-group">
                      <label for="nama_kategori">Nama Kategori</label>
                      <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{$r->nama_kategori}}" >
                  </div>
                  @endforeach
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection