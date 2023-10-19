<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PembeliResource extends JsonResource
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
            'id_pembeli' => $this->id,
            'nama' => $this->nama,
            'jenis_kelamin' =>  $this->jenis_kelamin,
            'alamat' =>  $this->alamat,
            'kode_pos' =>  $this->kode_pos,
            'kota' =>  $this->kota,
            'tgl_lahir' =>  Carbon::parse($this->tgl_lahir)->format('d-m-Y'),
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s")
        ];
    }
}
