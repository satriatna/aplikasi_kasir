@extends('layouts/layout')
@section('content')

<title>
  Detail Masakan | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                Ubah Data
            </div>
                <div class="card-body">
                    <form action="/masakan_update" method="POST">
                        @foreach($masakan as $r)
                        @csrf
                            <input type="hidden" name="id_masakan" id="id_masakan" class="form-control" value="{{$r->id_masakan}}" >
                        <div class="form-group">
                            <label for="nama_masakan">Nama Masakan</label>
                            <input type="text" name="nama_masakan" id="nama_masakan" class="form-control" value="{{$r->nama_masakan}}" >
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" value="{{$r->harga}}" >
                        </div>
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            @foreach($masakan as $m)
                              @foreach($kategori as $k)
                                @if($m->kategori_id == $k->id_kategori)
                                  <option value="{{$k->id_kategori}}" selected>{{$k->nama_kategori}}</option>
                                @else
                                <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                @endif
                              @endforeach
                            @endforeach
                        </select>
<br>
                        <label for="status_masakan">Status Masakan</label>
                        <select name="status_masakan" id="status_masakan" class="form-control">
                        @if($r->status_masakan == 'tersedia')
                            <option value="tersedia" selected>Tersedia</option>
                            @else
                            <option value="tersedia">Tersedia</option>
                            @endif
                            
                            @if($r->status_masakan == 'kosong')
                            <option value="kosong" selected>Kosong</option>
                            @else
                            <option value="kosong">Kosong</option>
                            @endif
                        </select>
                        @endforeach
<br>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection