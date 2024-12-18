<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_barang_id');
            $table->unsignedBigInteger('barang_masuk_id');
            $table->unsignedBigInteger('barang_keluar_id');
            $table->string('keterangan');
            $table->integer('pemasukan');
            $table->integer('pengeluaran');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('data_barang_id')->references('id')->on('data_barang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('barang_masuk_id')->references('id')->on('barang_masuk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('barang_keluar_id')->references('id')->on('barang_keluar')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangan');
    }
};
