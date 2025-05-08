<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rak = Rak::all();

        $kode = $this->generateKode();

        return view('rak.index', compact('rak', 'kode'));
    }

    private function generateKode()
    {
        $cek = Rak::count();

        if($cek == 0){
            $nomor = "001";
            $kode = "R-" . $nomor;
        }else{
            $data_terakhir = Rak::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_rak, -3) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $kode = "R-" . $nomor_urut_padded;
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
            $rak = new Rak;

            $rak->kode_rak = $this->generateKode();
            $rak->rak = $request->rak;
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
        $rak = Rak::findOrFail($id);

        $rak->rak = $request->rak;
        $rak->keterangan = $request->keterangan;
        $rak->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rak = Rak::findOrFail($id)->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
