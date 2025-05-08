<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\Ddc;
use App\Models\Format;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pustaka = Pustaka::all();
        $ddc = Ddc::all();
        $format = Format::all();
        $penerbit = Penerbit::all();
        $pengarang = Pengarang::all();
        $kode = $this->generateKode();

        return view('pustaka.index', compact('pustaka', 'ddc', 'format', 'penerbit', 'pengarang', 'kode'));
    }

    private function generateKode()
    {
        $cek = Pustaka::count();

        if ($cek == 0) {
            $nomor = "00001";
            $kode = "PST-" . Carbon::now()->year . $nomor; // A untuk pengarang (Author)
        } else {
            $data_terakhir = Pustaka::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_pustaka, -5) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
            $kode = "PST-" . Carbon::now()->year . $nomor_urut_padded;
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
            $pustaka = new Pustaka;

            $pustaka->kode_pustaka = $request->kode_pustaka;
            $pustaka->id_ddc = $request->id_ddc;
            $pustaka->id_format = $request->id_format;
            $pustaka->id_penerbit = $request->id_penerbit;
            $pustaka->id_pengarang = $request->id_pengarang;
            $pustaka->isbn = $request->isbn;
            $pustaka->judul_pustaka = $request->judul_pustaka;
            $pustaka->tahun_terbit = $request->tahun_terbit;
            $pustaka->keyword = $request->keyword;
            $pustaka->keterangan_fisik = $request->keterangan_fisik;
            $pustaka->keterangan_tambahan = $request->keterangan_tambahan;
            $pustaka->abstraksi = $request->abstraksi;
            $pustaka->harga_buku = $request->harga_buku;
            $pustaka->kondisi_buku = $request->kondisi_buku;
            $pustaka->fp = $request->fp;
            $pustaka->denda_terlambat = $request->denda_terlambat;
            $pustaka->denda_hilang = $request->denda_hilang;

            // Proses file gambar (jika ada)
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');

                // Simpan gambar ke folder public/storage/gambar_pustaka
                $path = $file->store('gambar_pustaka', 'public'); // Folder "gambar_pustaka" di disk "public"

                // Simpan path gambar ke database
                $pustaka->gambar = $path;
            }

            $pustaka->save();

            return back()->with('sukses', 'Berhasil Tambah Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Tambah Data: ' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pustaka $pustaka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pustaka $pustaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $pustaka = Pustaka::findOrFail($id);

            $pustaka->kode_pustaka = $request->kode_pustaka;
            $pustaka->id_ddc = $request->id_ddc;
            $pustaka->id_format = $request->id_format;
            $pustaka->id_penerbit = $request->id_penerbit;
            $pustaka->id_pengarang = $request->id_pengarang;
            $pustaka->isbn = $request->isbn;
            $pustaka->judul_pustaka = $request->judul_pustaka;
            $pustaka->tahun_terbit = $request->tahun_terbit;
            $pustaka->keyword = $request->keyword;
            $pustaka->keterangan_fisik = $request->keterangan_fisik;
            $pustaka->keterangan_tambahan = $request->keterangan_tambahan;
            $pustaka->abstraksi = $request->abstraksi;
            $pustaka->harga_buku = $request->harga_buku;
            $pustaka->kondisi_buku = $request->kondisi_buku;
            $pustaka->fp = $request->fp;
            $pustaka->denda_terlambat = $request->denda_terlambat;
            $pustaka->denda_hilang = $request->denda_hilang;

            // Proses file gambar (jika ada)
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');

                // Hapus gambar lama jika ada
                if ($pustaka->gambar && \Storage::disk('public')->exists($pustaka->gambar)) {
                    \Storage::disk('public')->delete($pustaka->gambar);
                }

                // Simpan gambar baru ke folder public/storage/gambar_pustaka
                $path = $file->store('gambar_pustaka', 'public'); // Folder "gambar_pustaka" di disk "public"

                // Simpan path gambar baru ke database
                $pustaka->gambar = $path;
            }

            $pustaka->save();

            return back()->with('sukses', 'Berhasil Update Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Update Data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $pustaka = Pustaka::find($id);

            // Hapus gambar lama jika ada
            if ($pustaka->gambar && \Storage::disk('public')->exists($pustaka->gambar)) {
                \Storage::disk('public')->delete($pustaka->gambar);
            }

            $pustaka->delete();

            return back()->with('sukses', 'Berhasil Hapus Data');
        }catch(\Exception $e){
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e);
        }
    }
}
