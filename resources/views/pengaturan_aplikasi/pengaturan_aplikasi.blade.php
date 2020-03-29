@extends('layouts/layout')
@section('content')
<title>
Pengaturan Aplikasi | Aplikasi Kasir Restoran
</title>
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
        @if( Session::get('alert') !="")
                <div class="alert bg-success alert-dismissable fade show" role="alert">
                    <strong class="text-white"> {{Session::get('alert')}} </strong>
                    
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;<x/span>
                    </button>
                </div>
            @endif
            <div class="card">
            <div class="card-header">
                Form Ubah Data Identitas
            </div>
                <div class="card-body">
                    <form action="pengaturan_aplikasi_update" method="POST">
                        @csrf
                        <input type="hidden" name="id_resto" id="id_resto" value="{{$resto->id_resto}}" >

                        <div class="form-group">
                            <label for="nama_resto">Nama Identitas</label>
                            <input type="text" name="nama_resto" id="nama_resto" class="form-control" value="{{$resto->nama_resto}}" >
                        </div>
                        <div class="form-group">
                            <label for="email_resto">Email</label>
                            <input type="text" name="email_resto" id="email_resto" class="form-control" value="{{$resto->email_resto}}">
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" id="url" class="form-control" value="{{$resto->url}}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_resto">Alamat</label>
                            <input type="alamat_resto" name="alamat_resto" id="alamat_resto" class="form-control" value="{{$resto->alamat_resto}}">
                        </div>

                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection