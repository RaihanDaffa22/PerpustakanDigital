@extends('layouts.app')

@section('title', 'Transaksi')

@section('content-header', 'Transaksi')

@section('content')
<div class="col-md-12 bg-dark text-light py-4" style="min-height: 100vh;">
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger d-inline">Data Transaksi</h6>
            <button class="btn btn-sm btn-warning float-right d-inline" data-toggle="modal" data-target="#form-tambah">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-hover dataTable" id="dataTable" width="100%" cellspacing="0"
                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Buku</th>
                                <th>Anggota</th>
                                <th>Pinjam</th>
                                <th>Kembali</th>
                                <th>Denda</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->pustaka->judul_pustaka}}</td>
                                <td>
                                    <img class="img-profile rounded-circle" src="{{asset('storage/' . $item->anggota->foto)}}" style="height: 30px; max-width: 30px" alt="Foto Profil Anggota">
                                    {{$item->anggota->nama_anggota}}
                                </td>
                                <td>{{$item->tgl_pinjam}}</td>
                                <td>{{$item->tgl_kembali}}</td>
                                <td>Rp.{{number_format($item->denda)}}</td>
                                <td>
                                    <span class="badge {{ $item->fp == 0 ? 'badge-warning' : '' }} {{ $item->fp == 1 ? 'badge-success' : '' }} {{$item->fp == 2 ? 'badge-danger' : ''}} {{ $item->fp == 3 ? 'badge-info' : '' }}">
                                    {{ $item->fp == 0 ? 'Dipinjam' : '' }}
                                    {{ $item->fp == 1 ? 'Selesai' : '' }}
                                    {{ $item->fp == 2 ? 'Hilang' : '' }}
                                    {{ $item->fp == 3 ? 'Request' : '' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#edit{{$item->id}}"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('transaksi.form')
@include('transaksi.edit')
@endsection
