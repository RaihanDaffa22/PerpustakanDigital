<?php

namespace App\Http\Controllers;

use App\Models\Ddc;
use App\Models\Rak;
use Illuminate\Http\Request;

class DdcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ddc = Ddc::all();
        $rak = Rak::all();

        return view('ddc.index', compact('ddc', 'rak'));
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
        try{
            $ddc = new Ddc;

            $ddc->id_rak = $request->id_rak;
            $ddc->kode_ddc = $request->kode_ddc;
            $ddc->ddc = $request->ddc;
            $ddc->keterangan = $request->keterangan;
            $ddc->save();
            
            return back()->with('sukses', 'Berhasil Tambah Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Tambah Data: ' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ddc $ddc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ddc $ddc)
    {
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $ddc = Ddc::findOrFail($id);
    
            $ddc->id_rak = $request->id_rak;
            $ddc->kode_ddc = $request->kode_ddc;
            $ddc->ddc = $request->ddc;
            $ddc->keterangan = $request->keterangan;
            $ddc->update();
    
            return back()->with('sukses', 'Berhasil Edit Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Edit Data: ' . $e);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $ddc = Ddc::findOrFail($id)->delete();

            return back()->with('sukses', 'Berhasil Hapus Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e);
        }
    }
}
