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
     'kategori_id',
     'stok',
     'harga_masuk',
     'harga_keluar'
    ];
    
    public function kategori()
        {
            return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
        }
}

