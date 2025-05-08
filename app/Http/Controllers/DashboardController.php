<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pustaka;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $hari_ini = now()->year . '-' . now()->month . '-' . now()->day;

        if(Auth::user()->role == 'anggota'){//jika role anggota
            $riwayat = Transaksi::where('id_anggota', Auth::user()->id_anggota)
            ->where('fp', '!=', '3')
            ->orderBy('created_at', 'desc')
            ->get();

            $transaksi = Transaksi::where('id_anggota', Auth::user()->id_anggota)
            ->whereIn('fp', ['0', '3'])
            ->get();
            
            $dipinjam = Transaksi::where('id_anggota', Auth::user()->id_anggota)
            ->where('fp', '0')
            ->get();

            return view('dashboard.index', compact('riwayat', 'transaksi', 'dipinjam'));
        }

        $request = Transaksi::where('fp', '3')->get();
        $buku = Pustaka::where('fp', '1')->get();
        $buku_kembali = Transaksi::where('tgl_kembali', $hari_ini)->get();

        $buku_laris = Pustaka::orderBy('jml_pinjam', 'desc')->take(5)->get();
        $label_buku = [];
        $jumlah_buku = [];


        foreach($buku_laris as $data){
            $label_buku[] = $data->judul_pustaka;
            $jumlah_buku[] = $data->jml_pinjam;
        }
        $data_buku = collect($label_buku)->zip($jumlah_buku);

        return view('dashboard.index', compact('request', 'buku', 'buku_kembali', 'label_buku', 'jumlah_buku', 'data_buku'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
