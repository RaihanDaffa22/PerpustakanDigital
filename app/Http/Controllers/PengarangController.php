<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengarang = Pengarang::all();
        $kode = $this->generateKode();

        return view('pengarang.index', compact('pengarang', 'kode'));
    }

    /**
     * Generate a unique kode_pengarang.
     */
    private function generateKode()
    {
        $cek = Pengarang::count();

        if ($cek == 0) {
            $nomor = "00001";
            $kode = "A-" . $nomor; // A untuk pengarang (Author)
        } else {
            $data_terakhir = Pengarang::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_pengarang, -5) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
            $kode = "A-" . $nomor_urut_padded;
        }

        return $kode;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'gelar_depan' => 'nullable|string|max:10',
                'nama_pengarang' => 'required|string|max:50|unique:pengarangs,nama_pengarang',
                'gelar_belakang' => 'nullable|string|max:10',
                'no_telp' => 'nullable|string|max:15',
                'email' => 'nullable|email|max:30',
                'website' => 'nullable|string|max:50',
                'biografi' => 'nullable|string',
                'keterangan' => 'nullable|string|max:50',
            ]);

            // Simpan data
            $pengarang = new Pengarang;
            $pengarang->kode_pengarang = $this->generateKode();
            $pengarang->gelar_depan = $request->gelar_depan;
            $pengarang->nama_pengarang = $request->nama_pengarang;
            $pengarang->gelar_belakang = $request->gelar_belakang;
            $pengarang->no_telp = $request->no_telp;
            $pengarang->email = $request->email;
            $pengarang->website = $request->website;
            $pengarang->biografi = $request->biografi;
            $pengarang->keterangan = $request->keterangan;
            $pengarang->save();

            return back()->with('sukses', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Tambah Data: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengarang $pengarang)
    {
        return view('pengarang.edit', compact('pengarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'gelar_depan' => 'nullable|string|max:10',
                'nama_pengarang' => 'required|string|max:50|unique:pengarangs,nama_pengarang,' . $id,
                'gelar_belakang' => 'nullable|string|max:10',
                'no_telp' => 'nullable|string|max:15',
                'email' => 'nullable|email|max:30',
                'website' => 'nullable|string|max:50',
                'biografi' => 'nullable|string',
                'keterangan' => 'nullable|string|max:50',
            ]);

            // Perbarui data
            $pengarang = Pengarang::findOrFail($id);
            $pengarang->gelar_depan = $request->gelar_depan;
            $pengarang->nama_pengarang = $request->nama_pengarang;
            $pengarang->gelar_belakang = $request->gelar_belakang;
            $pengarang->no_telp = $request->no_telp;
            $pengarang->email = $request->email;
            $pengarang->website = $request->website;
            $pengarang->biografi = $request->biografi;
            $pengarang->keterangan = $request->keterangan;
            $pengarang->save();

            return back()->with('sukses', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Edit Data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pengarang = Pengarang::findOrFail($id);
            $pengarang->delete();

            return back()->with('sukses', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e->getMessage());
        }
    }
}