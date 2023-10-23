<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Resources\PesananResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PesananController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pesanan = Pesanan::paginate(5);
        return PesananResource::collection($Pesanan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|integer',
            'id_barang' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'tgl_pesan' => 'required|date'
        ]);

        $barang = Barang::find($request->input('id_barang'));

        if (!$barang) {
            return response()->json(['error' => 'ID Barang Tidak Ditemukan'], 404);
        }

        if ($request->input('jumlah') > $barang->jumlah) {
            return response()->json(['error' => 'The ordered quantity exceeds available stock.'], 422);
        }

        $pesanan = Pesanan::create($validated);
        return new PesananResource($pesanan);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);
            return response()->json(['data' => $pesanan]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=> 'id not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        try {
            $pesanan = Pesanan::findOrFail($id);
            $validated = $request->validate([
                'id_pelanggan' => 'required|integer',
                'id_barang' => 'required|integer',
                'jumlah' => 'required|integer|min:1',
                'tgl_pesan' => 'required|date'
            ]);

            $barang = Barang::find($request->input('id_barang'));

            if (!$barang) {
                return response()->json(['error' => 'Invalid barang ID'], 404);
            }

            if ($request->input('jumlah') > $barang->jumlah) {
                return response()->json(['error' => 'The ordered quantity exceeds available stock.'], 422);
            }

            $pesanan->update($validated);
            return new PesananResource($pesanan);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=>'id not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pesanan = Pesanan::findorfail($id);
            $pesanan->delete();
            return response()->json(['data pesanan berhasil dihapus']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=>'id not found']);
        }
    }
}
