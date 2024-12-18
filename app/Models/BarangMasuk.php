<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $fillable = [
        'data_barang_id',
        'harga_masuk',
        'jumlah_masuk',
        'tanggal_masuk',
        'total_masuk'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'data_barang_id', 'id');
    }
}
