@extends('layouts/layout')
@section('content')

<title>
  Tambah Kategori | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                Tambah Kategori
            </div>
                <div class="card-body">
                    <form action="kategori_tambah_post" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary ">Tambah</button>
                    </form>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection