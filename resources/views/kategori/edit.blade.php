@extends('layouts/layout')
@section('content')

<title>
  Edit Kategori | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                Ubah Kategori
            </div>
                <div class="card-body">
                    <form action="/kategori_update" method="POST">
                        @foreach($kategori as $k)
                        @csrf
                        <input type="hidden" name="id_kategori" value="{{$k->id_kategori}}">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{$k->nama_kategori}}" >
                        </div>
                      
                        <button type="submit" class="btn btn-primary ">Ubah</button>
                        @endforeach
                    </form>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection