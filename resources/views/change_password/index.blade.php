@extends('layouts.layout')
@section('content')
<style type="text/css">
    .canvas{
        background: #fff;border: 1px solid #000
    }
</style>

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Ganti Password</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Ganti Password</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Ganti Password
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                @if( Session::get('success') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
                @endif
                @if( Session::get('error') !="")
                    <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
                @endif
                <form action="{{route('change_password.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="current_password">Password Lama</label>
                        <div class="input-group" id="show_hide_current_password">
                        <input class="form-control" type="password" name="current_password" required>
                        </div>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="new_password">Password Baru</label>
                        <div class="input-group" id="show_hide_new_password">
                        <input class="form-control" type="password" name="new_password" required>
                        </div>
                    </div>
                    
                    
                    <div class="form-group mb-4">
                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                        <div class="input-group" id="show_hide_new_password_confirmation">
                        <input class="form-control" type="password" name="new_password_confirmation" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                        Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
