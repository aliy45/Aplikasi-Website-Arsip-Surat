@extends('layout.backend')
@section('title','surat')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h2> <b> Arsip Surat >> Unggah</b></h2>
            <h6>Unggah surat yang telah terbit pada form ini untuk diarsipkan <br>
                Catatan: <br>
                <b>*Gunakan file berformat PDF
            </h6>
        </div>
    </div>
</div>


<form action="/surat/store" method="POST" enctype="multipart/form-data" id="formaddsurat">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomer_surat" class="form-control" placeholder="Masukkan Nomor Surat...">
                </div>
                @if($errors->has('nomer_surat'))
                <div class="text-danger">
                    {{ $errors->first('nomer_surat')}}
                </div>
                @endif
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="id_kategori">
                        @foreach ($kategori as $item)
                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('id_kategori'))
                <div class="text-danger">
                    {{ $errors->first('id_kategori')}}
                </div>
                @endif
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul">
                </div>
                @if($errors->has('judul'))
                <div class="text-danger">
                    {{ $errors->first('judul')}}
                </div>
                @endif
                <div class="form-group">
                    <label>File Surat (PDF)</label>
                    <input type="file" accept="application/pdf" class="form-control" name="file">
                </div>
                @if($errors->has('file'))
                <div class="text-danger">
                    {{ $errors->first('file')}}
                </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <a href="/surat" class="btn btn-primary"><i class="
                    fas fa-angle-double-left"></i> &nbsp; Kembali</a>
            <button class="btn btn-success" id="btnSubmit" type="submit"><i class="fas fa-check"></i> &nbsp;Simpan</button>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
{{-- js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#btnSubmit').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah data anda sudah benar?',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonColor: '#B1E693',
            cancelButtonColor: '#FE8F8F',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formaddsurat').submit();
            }
        });
    })
</script>
@endsection