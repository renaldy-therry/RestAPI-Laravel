<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesananResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id_pesanan' => $this->id,
            'id_pelanggan' => $this->id_pelanggan,
            'id_barang' => $this->id_barang,
            'jumlah' =>  $this->jumlah,
            'tgl_pesan' =>  Carbon::parse($this->tgl_pesan)->format('d-m-Y'),
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
            'pelanggan' => $this->pembeli,
            'barang' => $this->barang
        ];
    }
}
