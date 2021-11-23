@extends('layout.backend')
@section('title','about')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> <b>  Arsip Surat >> Ganti File </b></h4>
        </div>


        @foreach($surat as $u)
        <form class="col-md-12" action="/surat/update" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} 
    
        <div class="hidden">
          <label for="id" class="form-label"><b></b></label>
          <input  type="hidden" class="form-control" name="id" value="{{ $u->id }}" >
        </div> 
        
          <div class="row">
            <div class="form-group col-sm-12">
              <label for="nomer_surat" class="form-label"><b>No Surat</b></label>
              <input  type="text" class="form-control" name="nomer_surat" value="{{ $u->nomer_surat }}" >
    
              <label for="file" class="form-label"><b>File Surat (PDF)</b></label>
              <input type="file" accept="application/pdf" class="form-control" name="file" value="{{ $u->file }}" >
    
              <label for="judul" class="form-label"><b>Judul</b></label>
              <input  type="text" class="form-control" name="judul" value="{{ $u->judul }}" >
    
              <label for="id_kategori" class="form-label"><b> ID Kategori</b></label>
              <input readonly type="text" class="form-control" name="id_kategori" value="{{ $u->id_kategori }}" >
              
            </div>
          
          
        </div>
        <button type="submit" class="btn btn-info"><i class="fa fa-edit" onclick="return confirm('Apakah data anda sudah benar?')"></i> &nbsp; UPDATE</button> &nbsp;
        <a href="{{ URL::previous() }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; KEMBALI</a>
          
        </form>
        @endforeach
    
@endsection