<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;


     //nama tabel yang akan digunakan yaitu tabel proker
     protected $table = 'kategori';
     
     //kolom tabel yang boleh diisi
     protected $fillable = ['id','kategori'];
}
