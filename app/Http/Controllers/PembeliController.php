<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use App\Http\Resources\PembeliResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PembeliController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Pembeli = Pembeli::paginate(5);
        return PembeliResource::collection($Pembeli);
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
            'nama' => 'required|string|unique:pembeli|max:255', 
            'jenis_kelamin' => 'required|string', 
            'alamat' => 'required|string|max:255', 
            'kode_pos' => 'required|integer',
            'kota' => 'required|string', 
            'tgl_lahir' => 'required|date'
        ]);
        $pembeli = Pembeli::create($request->all());
        return new PembeliResource($pembeli);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pembeli = Pembeli::findOrFail($id);
            return response()->json(['data' => $pembeli]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=> 'id not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembeli $pembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        try {
            $pembeli = Pembeli::findOrFail($id);
            $validated = $request->validate([
                'nama' => 'required|string|unique:pembeli|max:255', 
                'jenis_kelamin' => 'required|string', 
                'alamat' => 'required|string|max:255', 
                'kode_pos' => 'required|integer',
                'kota' => 'required|string', 
                'tgl_lahir' => 'required|date'
            ]);
            $pembeli->update($request->all());
            return new PembeliResource($pembeli);
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
            $pembeli = Pembeli::findorfail($id);
            $pembeli->delete();
            return response()->json(['data pembeli berhasil dihapus']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=>'id not found']);
        }
    }
}
