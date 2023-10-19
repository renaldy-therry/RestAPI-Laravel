<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuplierResource extends JsonResource
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
            'id_suplier' => $this->id,
            'nama' => $this->nama,
            'alamat' =>  $this->alamat,
            'kode_pos' =>  $this->kode_pos,
            'kota' =>  $this->kota,
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s")
        ];
    }
}
