@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content-header', 'Edit Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gradient-warning text-white">
                    <h6 class="m-0 font-weight-bold">Edit Data Anggota</h6>
                </div>
                <div class="card-body">
                    <form action="/{{auth()->user()->role}}/profile/{{$anggota->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 text-center mb-3">
                                @if($anggota->foto)
                                <h6 class="text-primary mt-3">Foto</h6>
                                <img src="{{ asset('storage/' . $anggota->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kode_anggota">Kode Anggota</label>
                                    <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" value="{{ $anggota->kode_anggota }}" readonly required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_anggota">Nama Anggota</label>
                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $anggota->tgl_lahir }}" max="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $anggota->tempat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $anggota->no_telp }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $anggota->username }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Isi jika ingin mengganti password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                    @if($anggota->foto)
                                    <small>Foto saat ini: <a href="{{ asset('storage/' . $anggota->foto) }}" target="_blank">Lihat Foto</a></small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2">{{ $anggota->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
