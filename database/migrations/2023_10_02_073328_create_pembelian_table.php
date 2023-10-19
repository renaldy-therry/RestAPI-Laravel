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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_suplier');
            $table->integer('jumlah');
            $table->date('tgl_pembelian');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_suplier')->references('id')->on('suplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
