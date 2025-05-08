@foreach($pustaka as $item)
<div class="modal fade" tabindex="-1" id="view{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Detail Data Pustaka <strong>{{ $item->judul_pustaka }}</strong></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Buku" class="img-fluid rounded shadow-sm border border-primary" style="max-height: 300px;">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="bg-light text-primary p-2 rounded">Informasi Dasar</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Kode Pustaka:</strong> <span class="text-muted">{{ $item->kode_pustaka }}</span></li>
                            <li class="list-group-item"><strong>Judul Buku:</strong> <span class="text-muted">{{ $item->judul_pustaka }}</span></li>
                            <li class="list-group-item"><strong>ISBN:</strong> <span class="text-muted">{{ $item->isbn }}</span></li>
                            <li class="list-group-item"><strong>DDC:</strong> <span class="text-muted">{{ $item->ddc->ddc }}</span></li>
                            <li class="list-group-item"><strong>Format:</strong> <span class="text-muted">{{ $item->format->format }}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="bg-light text-primary p-2 rounded">Informasi Tambahan</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Pengarang:</strong> <span class="text-muted">{{ $item->pengarang->gelar_depan }} {{ $item->pengarang->nama_pengarang }} {{ $item->pengarang->gelar_belakang }}</span></li>
                            <li class="list-group-item"><strong>Penerbit:</strong> <span class="text-muted">{{ $item->penerbit->nama_penerbit }}</span></li>
                            <li class="list-group-item"><strong>Tahun Terbit:</strong> <span class="text-muted">{{ $item->tahun_terbit }}</span></li>
                            <li class="list-group-item"><strong>Kondisi Buku:</strong> <span class="text-muted">{{ $item->kondisi_buku }}</span></li>
                            <li class="list-group-item"><strong>Status:</strong> <span class="badge {{ $item->fp == 1 ? 'badge-success' : 'badge-danger' }}">{{ $item->fp == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="bg-light text-primary p-2 rounded">Deskripsi Buku</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Keterangan Fisik:</strong> <span class="text-muted">{{ $item->keterangan_fisik }}</span></li>
                            <li class="list-group-item"><strong>Keterangan Tambahan:</strong> <span class="text-muted">{{ $item->keterangan_tambahan }}</span></li>
                            <li class="list-group-item"><strong>Abstraksi:</strong> <span class="text-muted">{{ $item->abstraksi }}</span></li>
                            <li class="list-group-item"><strong>Jumlah Pinjam:</strong> <span class="text-muted">{{ $item->jml_pinjam }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="bg-light text-primary p-2 rounded">Informasi Harga</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Harga:</strong> <span class="text-muted">Rp {{ number_format($item->harga_buku, 0, ',', '.') }}</span></li>
                            <li class="list-group-item"><strong>Denda Terlambat:</strong> <span class="text-muted">Rp {{ number_format($item->denda_terlambat, 0, ',', '.') }}</span></li>
                            <li class="list-group-item"><strong>Denda Hilang:</strong> <span class="text-muted">Rp {{ number_format($item->denda_hilang, 0, ',', '.') }}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="bg-light text-primary p-2 rounded">Kata Kunci</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Keyword:</strong> <span class="text-muted">{{ $item->keyword }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
