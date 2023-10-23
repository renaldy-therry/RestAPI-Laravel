<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::paginate(5);
        // return response()->json(['data' => $barangs]);
        return BarangResource::collection($barangs);
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
            'nama' => 'required|string|unique:barang|max:20', 
            'varian' => 'required|string', 
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'jumlah'=>'required|integer'
        ]);
        $barang = Barang::create($request->all());
        return new BarangResource($barang);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            return response()->json(['data' => $barang]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=> 'id not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        try {
            $barang = Barang::findOrFail($id);
            $validated = $request->validate([
                'nama' => 'required|string|unique:barang|max:20', 
                'varian' => 'required|string', 
                'harga_beli' => 'required|integer',
                'harga_jual' => 'required|integer',
                'jumlah'=>'required|integer'
            ]);
            $barang->update($request->all());
            return new BarangResource($barang);
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
            $barang = Barang::findorfail($id);
            $barang->delete();
            return response()->json(['data barang berhasil dihapus']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=>'id not found']);
        }
    }
}
