@foreach($anggota as $item)
<div class="modal fade" tabindex="-1" id="view{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Detail Data Anggota <strong>{{ $item->nama_anggota }}</strong></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        @if($item->foto)
                        <h6 class="text-primary mt-3">Foto</h6>
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary">Informasi Dasar</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Kode Anggota:</strong> {{ $item->kode_anggota }}</li>
                            <li class="list-group-item"><strong>Nama:</strong> {{ $item->nama_anggota }}</li>
                            <li class="list-group-item"><strong>Jenis Anggota:</strong> {{ $item->jenisAnggota->nama_jenis_anggota }}</li>
                            <li class="list-group-item"><strong>Ttl:</strong> {{ $item->tempat }}, {{ $item->tgl_lahir }}</li>
                            <li class="list-group-item"><strong>Tanggal Aktif:</strong> {{ $item->tgl_aktif }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary">Kontak</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Alamat:</strong> {{ $item->alamat }}</li>
                            <li class="list-group-item"><strong>Nomor Telepon:</strong> {{ $item->no_telp }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $item->email }}</li>
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
