<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            'id_barang' => $this->id,
            'nama' => $this->nama,
            'varian' =>  $this->varian,
            'harga_beli' =>  $this->harga_beli,
            'harga_jual' =>  $this->harga_jual,
            'jumlah'=> $this->jumlah,
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
        ];
    }
}

