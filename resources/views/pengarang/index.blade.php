@extends('layouts.app')

@section('title', 'Pengarang')

@section('content-header', 'Pengarang')

@section('content')
<div class="col-md-12 bg-dark text-light py-4" style="min-height: 100vh;">
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger d-inline">Data Pengarang</h6>
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
                                <th>Kode</th>
                                <th>Nama Pengarang</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengarang as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode_pengarang}}</td>
                                <td>{{$item->gelar_depan}} {{$item->nama_pengarang}} {{$item->gelar_belakang}}</td>
                                <td>{{$item->email}}</td>
                                <td><a href="https://{{$item->website}}" target="_blank">{{$item->website}}</a></td>
                                <td>{{$item->keterangan}}</td>
                                <td>
                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#view{{$item->id}}"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#edit{{$item->id}}"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete{{$item->id}}"><i class="fas fa-trash"></i></button>
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
@include('pengarang.form')
@include('pengarang.edit')
@include('pengarang.delete')
@include('pengarang.view')
@endsection
