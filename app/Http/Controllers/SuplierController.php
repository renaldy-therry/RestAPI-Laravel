<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use App\Http\Resources\SuplierResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Suplier = Suplier::paginate(5);
        return SuplierResource::collection($Suplier);
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
            'nama' => 'required|string|unique:suplier|max:255', 
            'alamat' => 'required|string|max:255', 
            'kode_pos' => 'required|integer',
            'kota' => 'required|string', 
        ]);
        $suplier = Suplier::create($request->all());
        return new SuplierResource($suplier);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $suplier = Suplier::findOrFail($id);
            return response()->json(['data' => $suplier]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=> 'id not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplier $suplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        try {
            $suplier = Suplier::findOrFail($id);
            $validated = $request->validate([
                'nama' => 'required|string|unique:suplier|max:255', 
                'alamat' => 'required|string|max:255', 
                'kode_pos' => 'required|integer',
                'kota' => 'required|string', 
            ]);
            $suplier->update($request->all());
            return new SuplierResource($suplier);
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
            $suplier = Suplier::findorfail($id);
            $suplier->delete();
            return response()->json(['data suplier berhasil dihapus']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error'=>'id not found']);
        }
    }
}
