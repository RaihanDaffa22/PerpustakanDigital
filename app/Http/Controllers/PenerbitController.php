<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        $kode = $this->generateKode();

        return view('penerbit.index', compact('penerbit', 'kode'));
    }

    private function generateKode()
    {
        $cek = Penerbit::count();

        if($cek == 0){
            $nomor = "00001";
            $kode = "P-" . $nomor;
        }else{
            $data_terakhir = Penerbit::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_penerbit, -5) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
            $kode = "P-" . $nomor_urut_padded;
        }

        return $kode;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        try {

            // Simpan data secara manual
            $penerbit = new Penerbit;
            $penerbit->kode_penerbit = $this->generateKode();
            $penerbit->nama_penerbit = $request->nama_penerbit;
            $penerbit->alamat_penerbit = $request->alamat_penerbit;
            $penerbit->no_telp = $request->no_telp;
            $penerbit->email = $request->email;
            $penerbit->fax = $request->fax;
            $penerbit->website = $request->website;
            $penerbit->kontak = $request->kontak;
            $penerbit->save();

            return back()->with('sukses', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Tambah Data: ' . $e->getMessage());
        }
    }

    public function edit(Penerbit $penerbit)
    {
        
    }

    public function update(Request $request, $id)
    {
        try {

            // Perbarui data secara manual
            $penerbit = Penerbit::findOrFail($id);
            $penerbit->kode_penerbit = $request->kode_penerbit;
            $penerbit->nama_penerbit = $request->nama_penerbit;
            $penerbit->alamat_penerbit = $request->alamat_penerbit;
            $penerbit->no_telp = $request->no_telp;
            $penerbit->email = $request->email;
            $penerbit->fax = $request->fax;
            $penerbit->website = $request->website;
            $penerbit->kontak = $request->kontak;
            $penerbit->save();

            return back()->with('sukses', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Edit Data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $penerbit = Penerbit::findOrFail($id);
            $penerbit->delete();

            return back()->with('sukses', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e->getMessage());
        }
    }
}
