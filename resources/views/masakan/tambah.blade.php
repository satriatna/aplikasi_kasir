@extends('layouts/layout')
@section('content')

<title>
  Tambah Masakan | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                Tambah Masakan
            </div>
                <div class="card-body">
                    <form action="masakan_tambah_post" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_masakan">Nama Masakan</label>
                            <input type="text" name="nama_masakan" id="nama_masakan" class="form-control" value="{{ old('nama_masakan') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
                        </div>
                        <label for="status_masakan">Status Masakan</label>
                      <select name="status_masakan" id="status_masakan" class="form-control" required>
                      <option value="" selected disabled>Pilih Status</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="kosong">Kosong</option>
                      </select>
                        <label for="kategori_id">Kategori Masakan</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="" selected disabled>Pilih Kategori</option>
                        @foreach($kategori as $k)
                            <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                        @endforeach
                        </select>
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