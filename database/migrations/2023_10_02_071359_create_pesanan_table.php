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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelanggan');
            $table->integer('id_barang');
            $table->integer('jumlah');
            $table->date('tgl_pesan');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pembeli');
            $table->foreign('id_barang')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
