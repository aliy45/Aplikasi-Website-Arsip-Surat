<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;


    //nama tabel yang akan digunakan yaitu tabel proker
    protected $table = 'surat';

    //kolom tabel yang boleh diisi
    protected $fillable = ['id', 'nomer_surat', 'id_kategori', 'judul', 'file'];
}
