@extends('layouts/layout')
@section('content')
<div class="header bg-primary pb-8 pt-5 pt-md-8">

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                Tambah Akun
            </div>
                <div class="card-body">
                    <form action="akun_user_tambah_post" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>                                
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" autocomplete="new-password">
                        </div>
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="pelanggan">Pelanggan</option>
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