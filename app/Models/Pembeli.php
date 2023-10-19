<?php

namespace App\Models;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembeli extends Model
{

    protected $table = 'pembeli';
 
    public function pesanan(): HasMany {
        return $this->hasMany(Pesanan::class, 'id_pelanggan');
    }
    use HasFactory;

    protected $fillable = [
        'nama', 
        'jenis_kelamin', 
        'alamat', 
        'kode_pos',
        'kota',
        'tgl_lahir'
    ];
}
