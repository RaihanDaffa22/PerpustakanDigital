@foreach($transaksi as $item)
<div class="modal fade" tabindex="-1" id="view{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info text-white">
                <h5 class="modal-title">Detail Data Transaksi <strong>{{ $item->pustaka->judul_pustaka }}</strong></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $item->anggota->foto) }}" alt="Gambar Buku" class="img-fluid rounded shadow-sm border border-info" style="max-height: 100px;">
                    <img src="{{ asset('storage/' . $item->pustaka->gambar) }}" alt="Gambar Buku" class="img-fluid rounded shadow-sm border border-info" style="max-height: 100px;">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="bg-light text-info p-2 rounded">Informasi Dasar</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nama Anggota:</strong> <span class="text-muted">{{ $item->anggota->nama_anggota }}</span></li>
                            <li class="list-group-item"><strong>Judul Buku:</strong> <span class="text-muted">{{ $item->pustaka->judul_pustaka }}</span></li>
                            <li class="list-group-item"><strong>Tanggal Pinjam:</strong> <span class="text-muted">{{ $item->tgl_pinjam }}</span></li>
                            <li class="list-group-item"><strong>Tanggal Kembali:</strong> <span class="text-muted">{{ $item->tgl_kembali }}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="bg-light text-info p-2 rounded">Status dan Detail</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Status:</strong> <span class="badge {{$item->fp == '1' ? 'badge-success' : 'badge-danger'}}">{{ $item->fp == 1 ? 'Selesai' : 'Hilang' }}</span></li>
                            <li class="list-group-item"><strong>Tanggal Pengembalian:</strong> <span class="text-muted">{{ $item->tgl_pengembalian ?? '-' }}</span></li>
                            <li class="list-group-item"><strong>Denda:</strong> <span class="text-muted">Rp.{{ $item->denda }}</span></li>
                            <li class="list-group-item"><strong>Keterangan:</strong> <span class="text-muted">{{ $item->keterangan }}</span></li>
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
