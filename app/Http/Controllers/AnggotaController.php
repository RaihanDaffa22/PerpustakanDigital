<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use App\Models\JenisAnggota;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'anggota'){
            $anggota = Anggota::findOrFail(Auth::user()->id_anggota);
            $jenis_anggota = JenisAnggota::all();

            return view('profile.edit', compact('anggota', 'jenis_anggota'));
        }

        $anggota = Anggota::all();
        $jenis_anggota = JenisAnggota::all();
        $kode = $this->generateKode();

        return view('anggota.index', compact('anggota', 'jenis_anggota', 'kode'));
    }

    private function generateKode()
    {
        $cek = Anggota::count();

        if ($cek == 0) {
            $nomor = "00001";
            $kode = "AGT-" . Carbon::now()->year . $nomor;
        } else {
            $data_terakhir = Anggota::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_anggota, -5) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
            $kode = "AGT-" . Carbon::now()->year . $nomor_urut_padded;
        }

        return $kode;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $anggota = new Anggota;

            $anggota->kode_anggota = $request->kode_anggota;
            $anggota->id_jenis_anggota = $request->id_jenis_anggota;
            $anggota->nama_anggota = $request->nama_anggota;
            $anggota->tempat = $request->tempat;
            $anggota->tgl_lahir = $request->tgl_lahir;
            $anggota->alamat = $request->alamat;
            $anggota->no_telp = $request->no_telp;
            $anggota->email = $request->email;
            $anggota->tgl_daftar = $request->tgl_daftar;
            $anggota->tgl_aktif = Carbon::now();
            $anggota->fa = $request->fa;
            $anggota->keterangan = $request->keterangan;
            $anggota->username = $request->username;
            $anggota->password =  Hash::make($request->password);

            // Proses file foto (jika ada)
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');

                // Simpan foto ke folder public/storage/foto_anggota
                $path = $file->store('foto_anggota', 'public');
                $anggota->foto = $path;
            }

            $anggota->save();

            $user = new User;
            $user->id_anggota = $anggota->id;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'anggota';
            $user->status = 'success';
            $user->save();

            return back()->with('sukses', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Tambah Data: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $anggota = Anggota::findOrFail($id);

            $user_anggota = User::where('email', $anggota->email)->first();//ambil user berdasarkan email anggota

            $user_anggota->name = $request->username;
            $user_anggota->email = $request->email;
            $user_anggota->update();//update user

            if(Auth::user()->role == 'anggota'){
                $anggota->nama_anggota = $request->nama_anggota;
                $anggota->tempat = $request->tempat;
                $anggota->tgl_lahir = $request->tgl_lahir;
                $anggota->alamat = $request->alamat;
                $anggota->no_telp = $request->no_telp;
                $anggota->email = $request->email;
                $anggota->username = $request->username;            
                
                //jika rubah password
                if($request->password != null){
                    $anggota->password =  Hash::make($request->password);
                    $user_anggota->password =  Hash::make($request->password);
                }
    
                // Proses file foto (jika ada)
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
    
                    // Hapus foto lama jika ada
                    if ($anggota->foto && \Storage::disk('public')->exists($anggota->foto)) {
                        \Storage::disk('public')->delete($anggota->foto);
                    }
    
                    // Simpan foto baru ke folder public/storage/foto_anggota
                    $path = $file->store('foto_anggota', 'public');
                    $anggota->foto = $path;
                }
    
                $anggota->update();
    
    
                return back()->with('sukses', 'Berhasil Update Data');
            }

            $anggota->id_jenis_anggota = $request->id_jenis_anggota;
            $anggota->nama_anggota = $request->nama_anggota;
            $anggota->tempat = $request->tempat;
            $anggota->tgl_lahir = $request->tgl_lahir;
            $anggota->alamat = $request->alamat;
            $anggota->no_telp = $request->no_telp;
            $anggota->email = $request->email;
            $anggota->tgl_daftar = $request->tgl_daftar;
            $anggota->tgl_aktif = Carbon::now();
            $anggota->fa = $request->fa;
            $anggota->keterangan = $request->keterangan;
            $anggota->username = $request->username;
            
            //jika rubah password
            if($request->password != null){
                $anggota->password =  Hash::make($request->password);
                $user_anggota->password =  Hash::make($request->password);
            }

            // Proses file foto (jika ada)
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');

                // Hapus foto lama jika ada
                if ($anggota->foto && \Storage::disk('public')->exists($anggota->foto)) {
                    \Storage::disk('public')->delete($anggota->foto);
                }

                // Simpan foto baru ke folder public/storage/foto_anggota
                $path = $file->store('foto_anggota', 'public');
                $anggota->foto = $path;
            }

            $anggota->update();


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
        try {
            $anggota = Anggota::find($id);
            $user_anggota = User::where('email', $anggota->email)->first()->delete();//hapus data user

            // Hapus foto lama jika ada
            if ($anggota->foto && \Storage::disk('public')->exists($anggota->foto)) {
                \Storage::disk('public')->delete($anggota->foto);
            }

            $anggota->delete();            

            return back()->with('sukses', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return back()->with('gagal', 'Gagal Hapus Data: ' . $e->getMessage());
        }
    }
}
