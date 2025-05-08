@extends('layouts.app')

@section('content-header', 'Buku Yang Tersedia')

@section('title', 'Reuqest Pinjam')

@section('content')
@foreach($buku as $item)
<div class="col-lg-4 mb-4">
    <div class="card shadow h-100">
        <div class="card-header bg-gradient-warning">
            <h5 class="modal-title text-light"><strong>{{ $item->judul_pustaka }}</strong></h5>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top mb-2" alt="Foto {{ $item->judul_pustaka }}" style="height: 250px; object-fit: cover;">
            <p class="card-text"><strong>Pengarang:</strong> {{ $item->pengarang->nama_pengarang }}</p>
            <p class="card-text"><strong>Penerbit:</strong> {{ $item->penerbit->nama_penerbit }}</p>
            <p class="card-text"><strong>Kategori:</strong> {{ $item->format->format }}</p>
            <p class="card-text"><strong>Tahun Terbit:</strong> {{ $item->tahun_terbit }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($item->harga_buku) }}</p>
            <p class="card-text"><strong>Abstraksi:</strong> {{ $item->abstraksi }}</p>
        </div>
        <div class="card-footer text-center">
            <form action="{{ route('request.store') }}" method="post">
                @csrf
                <input type="text" value="{{auth()->user()->id_anggota}}" name="id_anggota" hidden>
                <input type="text" value="{{$item->id}}" name="id_pustaka" hidden>
                <input type="text" value="3" name="fp" hidden>
                <button type="submit" class="btn btn-sm btn-primary">Request Pinjam</button>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection