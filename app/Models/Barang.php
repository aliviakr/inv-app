<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';
    protected $fillable = [
     'nama_barang',
     'kategori',
     'stok',
     'harga_masuk',
     'harga_keluar'
    ];
}
