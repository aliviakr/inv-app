<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $fillable = [
        'data_barang_id',
        'jumlah_keluar',
        'tanggal_keluar',
        'total_keluar'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'data_barang_id', 'id');
    }
}
