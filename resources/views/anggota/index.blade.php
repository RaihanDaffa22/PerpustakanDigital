@extends('layouts.app')

@section('title', 'Anggota')

@section('content-header', 'Anggota')

@section('content')
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger d-inline">Data Anggota</h6>
            <button class="btn btn-sm btn-warning float-right d-inline" data-toggle="modal" data-target="#form-tambah">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Kode Anggota</th>
                            <th>Nama</th>
                            <th>Jenis Anggota</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_anggota }}</td>
                            <td>{{ $item->nama_anggota }}</td>
                            <td>{{ $item->jenisAnggota->jenis_anggota ?? '' }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>
                                <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#view{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#edit{{ $item->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete{{ $item->id }}"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@include('anggota.form')
@include('anggota.edit')
@include('anggota.delete')
@include('anggota.view')
@endsection