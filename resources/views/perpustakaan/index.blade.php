@extends('layouts.app')

@section('title', 'Profile Perpustakaan')

@section('content-header', 'Profile Perpustakaan')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-4 bg-gradient-warning text-white d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold">{{ $perpustakaan->nama_perpustakaan }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Pustakawan:</strong> {{ $perpustakaan->nama_pustakawan }}</p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $perpustakaan->email }}" target="_blank" class="text-primary">{{ $perpustakaan->email }}</a></p>
                        <p><strong>Telepon:</strong> {{ $perpustakaan->no_telp }}</p>
                        <p><strong>Alamat:</strong> {{ $perpustakaan->alamat }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Website:</strong> <a href="https://{{ $perpustakaan->website }}" target="_blank" class="text-primary">{{ $perpustakaan->website }}</a></p>
                        <p><strong>Keterangan:</strong></p>
                        <p class="text-muted">{{ $perpustakaan->keterangan }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center bg-light">
                @if(auth()->user()->role == 'admin')
                <button type="button" data-toggle="modal" data-target="#edit-perpustakaan" class="btn btn-sm btn-danger px-4">Edit Data</button>
                @endif
            </div>
        </div>
    </div>
</div>
@include('perpustakaan.edit')
@endsection
