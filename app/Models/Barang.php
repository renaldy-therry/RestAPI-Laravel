<?php

namespace App\Models;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    // public $timestamps = false;
    
    protected $table = 'barang';

    public function pesanan(): HasMany {
        return $this->hasMany(Pesanan::class, 'id');
    }

    public function pembelian(): HasMany {
        return $this->hasMany(Pesanan::class, 'id');
    }

    protected $fillable = [
        'nama', 
        'varian', 
        'harga_beli', 
        'harga_jual',
        'jumlah',
    ];
  
}
