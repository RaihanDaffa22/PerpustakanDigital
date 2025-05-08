<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $bulan = $now->month;

        $transaksi = Transaksi::orderBy('created_at', 'desc')
        ->whereNotIn('fp', ['0', '3'])
        ->get();

        $tahun = Transaksi::select(DB::raw('YEAR(created_at) as tahun'))
        ->where('fp', '!=', '3')
        ->distinct()
        ->orderBy('tahun', 'asc')
        ->pluck('tahun');

        return view('laporan.index', compact('transaksi', 'tahun', 'bulan'));
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

    public function print($id)
    {
        $laporan = Transaksi::find($id);

        $pdf = PDF::loadView('laporan.print', compact('laporan'));

        // Stream atau download file PDF
        return $pdf->stream('laporan.print');
    }

    public function printBulan(Request $request)
    {
        $laporan = Transaksi::whereYear('created_at', $request->tahun)
        ->whereMonth('created_at', $request->bulan)
        ->where('fp', '!=', '0')
        ->where('fp', '!=', '3')
        ->get();

        $pdf = PDF::loadView('laporan.printBulan', compact('laporan'));

        // Stream atau download file PDF
        return $pdf->stream('laporan.printBulan');
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
