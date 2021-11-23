@extends('layout.backend')
@section('title','about')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> <b> Arsip Surat >> Lihat </b></h4>
        </div>

        <form>
            @foreach ($surat as $s)
            <div class="form-group row">
                <label for="nomer_surat" class="col-sm-2 col-form-label">Nomor</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nomer_surat" value=": &nbsp;{{$s->nomer_surat}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="nomer_surat" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nomer_surat" value=": &nbsp; {{$s->kategori}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="judul" value=": &nbsp; {{$s->judul}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Waktu Unggah</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="judul" value=": &nbsp; {{$s->created_at}}">
                </div>
            </div>

            @endforeach
        </form>

        <iframe src="{{asset('doc')}}/{{$s->file}}" width="100%" height="800"></iframe>

        <div class="form-group">
            <a href="{{ URL::previous() }}" class="btn btn-success"><i class="
        fas fa-angle-double-left"></i> Kembali</a>
            <a href="{{asset('doc')}}/{{$s->file}}" class="btn btn-warning"><i class="
            far fa-save"></i> Unduh</a>
            <a href="/surat/edit/{{ $s->id }}" class="btn btn-info"><i class="
              fas fa-clipboard-list"></i> Edit/Ganti File</a>

        </div>

    </div>
</div>
@endsection