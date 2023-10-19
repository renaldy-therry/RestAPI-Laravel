<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Suplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    
    use HasFactory;

    protected $table = 'pembelian';
   
    protected $fillable = [
        'id_barang', 
        'id_suplier', 
        'jumlah',
        'tgl_pembelian'
    ];

    public function barang(): BelongsTo {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    public function suplier(): BelongsTo {
        return $this->belongsTo(Suplier::class, 'id_suplier', 'id');
    }


}
