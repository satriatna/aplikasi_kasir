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
                Detail Data
            </div>
                <div class="card-body">
                    <form action="/akun_user_tambah_post" method="POST">
                        @foreach($users as $r)
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{$r->nama}}" >
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{$r->username}}" >
                        </div>
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" readonly>
                            @if($r->level == 'admin')
                            <option value="admin" selected>Admin</option>
                            @else
                            <option value="admin">Admin</option>
                            @endif
                            
                            @if($r->level == 'waiter')
                            <option value="waiter" selected>Waiter</option>
                            @else
                            <option value="waiter">Waiter</option>
                            @endif
                            
                            @if($r->level == 'owner')
                            <option value="owner" selected>Owner</option>
                            @else
                            <option value="owner">Owner</option>
                            @endif
                            
                            @if($r->level == 'kasir')
                            <option value="kasir" selected>Kasir</option>
                            @else
                            <option value="kasir">Kasir</option>
                            @endif
                            
                            @if($r->level == 'pelanggan')
                            <option value="pelanggan" selected>Pelanggan</option>
                            @else
                            <option value="pelanggan">Pelanggan</option>
                            @endif
                        </select>
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