<?php

namespace App\Observers;

use App\Models\Pembelian;
use App\Models\Barang;
class PembelianObserver
{
    /**
     * Handle the Pembelian "created" event.
     */
    public function created(Pembelian $pembelian): void
    {
        $barang = Barang::find($pembelian->id_barang);
        $barang->jumlah += $pembelian->jumlah;
        $barang->save();
    }

    /**
     * Handle the Pembelian "updated" event.
     */
    public function updated(Pembelian $pembelian): void
    {
        //
    }

    /**
     * Handle the Pembelian "deleted" event.
     */
    public function deleted(Pembelian $pembelian): void
    {
        //
    }

    /**
     * Handle the Pembelian "restored" event.
     */
    public function restored(Pembelian $pembelian): void
    {
        //
    }

    /**
     * Handle the Pembelian "force deleted" event.
     */
    public function forceDeleted(Pembelian $pembelian): void
    {
        //
    }
}
