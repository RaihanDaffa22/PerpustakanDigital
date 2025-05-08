<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('perpustakaan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perpustakaan $perpustakaan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $perpustakaan = Perpustakaan::findOrFail($id);

            $perpustakaan->nama_perpustakaan = $request->nama_perpustakaan;
            $perpustakaan->nama_pustakawan = $request->nama_pustakawan;
            $perpustakaan->alamat = $request->alamat;
            $perpustakaan->email = $request->email;
            $perpustakaan->website = $request->website;
            $perpustakaan->no_telp = $request->no_telp;
            $perpustakaan->keterangan = $request->keterangan;
            $perpustakaan->update();

            return back()->with('sukses', 'Berhasil Update Data Perpustakaan');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Update Data Perpustakaan: ' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perpustakaan $perpustakaan)
    {
        //
    }
}
