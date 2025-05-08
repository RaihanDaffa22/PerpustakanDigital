@extends('layouts.app')

@section('title', 'Pustaka')

@section('content-header', 'Pustaka')

@section('content')
<div class="col-md-12 bg-dark text-light py-4" style="min-height: 100vh;">
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger d-inline">Data Pustaka</h6>
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
                                <th>Isbn</th>
                                <th>Judul</th>
                                <th>Tahun Terbit</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pustaka as $item)
                            <tr>
                                <td class="align-middle">{{$loop->iteration}}</td>
                                <td class="align-middle">{{$item->isbn}}</td>
                                <td class="align-middle">{{$item->judul_pustaka}}</td>
                                <td class="align-middle">{{$item->tahun_terbit}}</td>
                                <td class="align-middle"><img src="{{ asset('storage/' . $item->gambar) }}" alt="" style="max-height: 100px"></td>
                                <td class="align-middle"><span class="badge {{ $item->fp == 1 ? 'badge-success' : 'badge-danger' }}">{{ $item->fp == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</span></td>
                                <td class="align-middle">
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
@include('pustaka.form')
@include('pustaka.edit')
@include('pustaka.delete')
@include('pustaka.view')
@endsection
