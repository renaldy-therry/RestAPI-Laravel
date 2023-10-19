<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PembelianResource extends JsonResource
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
            'id_pembelian' => $this->id,
            'id_barang' => $this->id_barang,
            'id_suplier' => $this->id_suplier,
            'jumlah' =>  $this->jumlah,
            'tgl_pembelian' =>  Carbon::parse($this->tgl_pembelian)->format('d-m-Y'),
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
            'barang' => $this->barang,
            'suplier' => $this->suplier,
        ];
    }
}
