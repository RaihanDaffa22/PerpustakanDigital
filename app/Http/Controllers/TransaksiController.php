<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Anggota;
use App\Models\JenisAnggota;
use App\Models\Pustaka;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $transaksi = Transaksi::orderBy('created_at', 'desc')->get();
        $anggota = Anggota::all();
        $buku = Pustaka::where('fp', '1')->get();
        
        if(Auth::user()->role == 'anggota'){
            return view('request.index', compact('buku'));
        }else{
            return view('transaksi.index', compact('transaksi', 'anggota', 'buku'));
        }
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
                $anggota = Anggota::findOrFail($request->id_anggota);//mendapatkan data anggota
                $jenis = JenisAnggota::findOrFail($anggota->id_jenis_anggota);//mendapaatkan jenis anggota
                $cek_transaksi = Transaksi::where('id_anggota', $request->id_anggota)
                ->whereNotIn('fp', ['1', '2'])
                ->get();//mendapatkan data anggota pada tabel transaksi

                if($cek_transaksi->count() > (int)$jenis->max_pinjam){                
                    return back()->with('gagal', $anggota->username . ' Sudah Memenuhi Maksimal Pinjam');
                }

                $transaksi = new Transaksi;
                $transaksi->id_pustaka = $request->id_pustaka;
                $transaksi->id_anggota = $request->id_anggota;
                $transaksi->tgl_pinjam = $request->tgl_pinjam;
                $transaksi->tgl_kembali = $request->tgl_kembali;
                if($request->fp == '3'){//jika status sama dengan request
                    $transaksi->fp = '3';
                }else{
                    $transaksi->fp = '0';
                }
                $transaksi->keterangan = $request->keterangan;
                $transaksi->save();
                
                if($request->fp != '3'){//jika status bukan request, update jumlah pinjam buku
                    $buku = Pustaka::findOrFail($request->id_pustaka);
                    $buku->jml_pinjam = $buku->jml_pinjam + 1;
                    $buku->update();
                }

                if(Auth::user()->role == 'anggota'){//jika anggota,kembali ke dashboard
                    return redirect('anggota/dashboard')->with('sukses', ' Berhasil Request');
                }

                return back()->with('sukses', 'Berhasil Simpan Transaksi');
            }catch(\Exception $e){
                return back()->with('gagal', 'Gagal Simpan Transaksi: ' . $e);
            }
        }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Pustaka::findOrFail($request->id_pustaka);
        
        $transaksi = Transaksi::findOrFail($id);

        $denda = 0;

        if($request->fp != '0'){
            if($request->fp == '2'){
                $denda += $buku->denda_hilang;
            }
            
            if($transaksi->fp == '3'){//jika status sama dengan request, update jumlah pinjam buku
                $buku->jml_pinjam = $buku->jml_pinjam + 1;
                $buku->update();
            }

            $tanggal_kembali = Carbon::parse($request->tgl_kembali);
            $tanggal_pengembalian = Carbon::parse($request->tgl_pengembalian);
            
            $cek_telat = $tanggal_kembali->diffinDays($tanggal_pengembalian);
            
            if(floor($cek_telat) > 0){
                $denda = $denda + floor($cek_telat) * $buku->denda_terlambat;                
            }

        }
        

        $transaksi->id_pustaka = $request->id_pustaka;
        $transaksi->id_anggota = $request->id_anggota;
        $transaksi->tgl_pinjam = $request->tgl_pinjam;
        $transaksi->tgl_kembali = $request->tgl_kembali;
        $transaksi->tgl_pengembalian = $request->tgl_pengembalian;
        $transaksi->denda = $denda;
        $transaksi->fp = $request->fp;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();
    
        return back()->with('sukses', 'Berhasil Edit Transaksi');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id)->delete();

        return back()->with('sukses', 'Berhasil Delete');
    }
}
