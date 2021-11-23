<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use App\Models\Kategori;
use App\Http\Controllers\Controller;

class SuratController extends Controller
{
    public function index()
    {
        // mengambil data dari table surat
        // $surat = DB::table('surat')->get();

        $surat = Surat::join('kategori as k', 'k.id', '=', 'surat.id_kategori')
            ->selectRaw("surat.*, k.id as user_id,kategori")
            ->get();

        // dd($surat);
        return view('surat', compact('surat'));
    }
    //membuat fungsi untuk beralir ke halaman form tambah pengajuan
    public function tambah()
    {
        $kategori = DB::table('kategori')->get();
        // dd($kategori);
        return view('tambah', compact('kategori'));
    }

    //fungsi untuk membuat proses inputan data
    public function store(Request $request)
    {
        //validasi untuk mengisi kolom
        $this->validate($request, [
            'nomer_surat' => 'required',
            'id_kategori' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:10000',
        ], [
            'nomer_surat.required' => 'Masukkan nomer surat !',
            'id_kategori.required' => 'Masukkan kategori!',
            'judul.required' => 'Masukkan judul!',
            'file.mimes' => 'Format file harus PDF!',
            'file.required' => 'File tidak boleh kosong!',
            'file.max' => 'File  terlalu bersar, maksimal 10MB!',

        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'doc';
        $file->move($tujuan_upload, $nama_file);


        Surat::create([
            'nomer_surat' => $request->nomer_surat,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'file' => $nama_file,
        ]);

        return redirect('surat')->with('add1', 'Data Arsip Surat Berhasil Ditambah!!!');
    }

    public function hapus($id)
    {
        $surat = Surat::find($id);
        $surat->delete();
        return redirect('surat')->with('delsur', 'Data Arsip Surat Berhasil Terhapus!!!');
    }

    public function lihat($id)
    {
        $surat = Surat::join('kategori as k', 'k.id', '=', 'surat.id_kategori')
            ->selectRaw("surat.*, k.id as user_id,kategori")->where('surat.id', $id)
            ->get();

        //    dd($surat);
        return view('lihat', compact('surat'));
    }

    public function edit($id)
    {
        $surat = DB::table('surat')->where('id', $id)->get();

        return view('editsurat', compact('surat'));
    }

    public function update(Request $request, Surat $surat)
    {

        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:10000',
        ], [
            'file.mimes' => 'Format file harus PDF!',
            'file.required' => 'File tidak boleh kosong!',
            'file.max' => 'File  terlalu bersar, maksimal 10MB!',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'doc';
        $file->move($tujuan_upload, $nama_file);
        DB::table('surat')->where('id', $request->id)->update([
            'nomer_surat' => $request->nomer_surat,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'file' => $nama_file,
        ]);

        return redirect('surat')
            ->with('upd2', 'Data File Berhasil Diubah!!!');
    }
}
