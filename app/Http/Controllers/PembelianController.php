<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Resources\PembelianResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PembelianController extends Controller
{
    //
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pembelian = Pembelian::paginate(5);
        return PembelianResource::collection($Pembelian);
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
            'id_barang' => 'required|integer', 
            'id_suplier' => 'required|integer', 
            'jumlah' => 'required|integer', 
        ]);
        $pembelian = Pembelian::create($request->all());
        return new PembelianResource($pembelian);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pembelian = Pembelian::with('barang')->findOrFail($id);
            return response()->json(['data' => $pembelian]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=> 'id not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        try {
            $pembelian = Pembelian::findOrFail($id);
            $validated = $request->validate([
                'id_barang' => 'required|integer', 
                'id_suplier' => 'required|integer', 
                'jumlah' => 'required|integer', 
            ]);
            $pembelian->update($request->all());
            return new PembelianResource($pembelian);
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
            $pembelian = Pembelian::findorfail($id);
            $pembelian->delete();
            return response()->json(['data pembelian berhasil dihapus']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=>'id not found']);
        }
    }
}
