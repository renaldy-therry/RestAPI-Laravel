<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
  
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_pelanggan', 
        'id_barang', 
        'jumlah',
        'tgl_pesan'
    ];

    public function pembeli(): BelongsTo {
        return $this->belongsTo(Pembeli::class, 'id_pelanggan','id');
    }

    public function barang(): BelongsTo {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

  
    
}
