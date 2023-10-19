<?php

namespace App\Models;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suplier extends Model
{

    protected $table = 'suplier';
   
    public function pembelian(): HasMany {
        return $this->hasMany(Pesanan::class, 'id_suplier');
    }
    
    use HasFactory;
   
    protected $fillable = [
        'nama', 
        'alamat', 
        'kode_pos',
        'kota',
    ];
}
