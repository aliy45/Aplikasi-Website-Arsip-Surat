@extends('layout.backend')
@section('title','about')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">About</h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('AdminLTE') }}/dist/img/aji.jpeg" style="width: 250px; height:300px;">
                </div>
                <div class="col-md-8">
                    <br>
                    <br>
                    <h2>Aplikasi ini dibuat oleh:</h2>
                    <h5>Nama : Rahmad Aliy Cagar Wahyu Aji</h5>
                    <h5>NIM : 1931713011</h5>
                    <h5>Tanggal : 23 November 2021</h5>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection