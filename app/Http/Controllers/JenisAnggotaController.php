<?php

namespace App\Http\Controllers;

use App\Models\JenisAnggota;
use Illuminate\Http\Request;

class JenisAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisAnggota = JenisAnggota::all();
        $kode = $this->generateKode();

        return view('jenisAnggota.index', compact('jenisAnggota', 'kode'));
    }

    private function generateKode()
    {
        $cek = JenisAnggota::count();

        if($cek == 0){
            $nomor = "001";
            $kode = "JA-" . $nomor;
        }else{
            $data_terakhir = JenisAnggota::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_jenis_anggota, -3) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $kode = "JA-" . $nomor_urut_padded;
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
            $jenisAnggota = new JenisAnggota;

            $jenisAnggota->kode_jenis_anggota = $this->generateKode();
            $jenisAnggota->jenis_anggota = $request->jenis_anggota;
            $jenisAnggota->max_pinjam = $request->max_pinjam;
            $jenisAnggota->keterangan = $request->keterangan;
            $jenisAnggota->save();

            return back()->with('sukses', 'Berhasil Tambah Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Tambah Data: ' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisAnggota $jenisAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisAnggota $jenisAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $jenisAnggota = JenisAnggota::findOrFail($id);

            $jenisAnggota->jenis_anggota = $request->jenis_anggota;
            $jenisAnggota->max_pinjam = $request->max_pinjam;
            $jenisAnggota->keterangan = $request->keterangan;
            $jenisAnggota->update();

            return back()->with('sukses', 'Berhasil Edit Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Edit Data: ' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $jenisAnggota = JenisAnggota::findOrFail($id);

            $jenisAnggota->delete();

            return back()->with('sukses', 'Berhasil Hapus Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e);
        }
    }
}
