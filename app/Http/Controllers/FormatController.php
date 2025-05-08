<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $format = Format::all();

        $kode = $this->generateKode();

        return view('format.index', compact('format', 'kode'));
    }

    private function generateKode()
    {
        $cek = Format::count();

        if($cek == 0){
            $nomor = "001";
            $kode = "F-" . $nomor;
        }else{
            $data_terakhir = Format::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_format, -3) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $kode = "F-" . $nomor_urut_padded;
        }

        return $kode;
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
            $rak = new Format;

            $rak->kode_format = $this->generateKode();
            $rak->format = $request->format;
            $rak->keterangan = $request->keterangan;
            $rak->save();

            return back()->with('sukses', 'Berhasil Tambah Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Tambah Data : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rak $rak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rak = Format::findOrFail($id);

        $rak->format = $request->format;
        $rak->keterangan = $request->keterangan;
        $rak->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $rak = Format::findOrFail($id)->delete();

            return back()->with('sukses', 'Berhasil Hapus Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e);
        }
    }
}
