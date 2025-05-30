@foreach($pengarang as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="view{{ $item->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle"></i> Detail Pengarang - <span class="font-weight-bold align-middle">{{ $item->gelar_depan }} {{ $item->nama_pengarang }} {{ $item->gelar_belakang }}</span>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Informasi Umum -->
                <div class="border-bottom mb-3 pb-2">
                    <h6 class="text-info"><i class="fas fa-id-card"></i> Informasi Umum</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Kode Pengarang:</strong> {{ $item->kode_pengarang }}</p>
                            <p><strong>Nama Pengarang:</strong> {{ $item->nama_pengarang }}</p>
                            <p><strong>Gelar Depan:</strong> {{ $item->gelar_depan ?? 'Tidak ada gelar' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Gelar Belakang:</strong> {{ $item->gelar_belakang ?? 'Tidak ada gelar' }}</p>
                            <p><strong>Biografi:</strong> {{ $item->biografi ?? 'Tidak ada biografi' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Kontak -->
                <div class="border-bottom mb-3 pb-2">
                    <h6 class="text-warning"><i class="fas fa-phone"></i> Informasi Kontak</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Telepon:</strong> {{ $item->no_telp ?? 'Tidak ada informasi' }}</p>
                            <p><strong>Email:</strong> {{ $item->email ?? 'Tidak ada informasi' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Website:</strong> 
                                @if($item->website)
                                    <a href="https://{{ $item->website }}" target="_blank">{{ $item->website }}</a>
                                @else
                                    Tidak ada informasi
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="mb-3 pb-2">
                    <h6 class="text-success"><i class="fas fa-info"></i> Informasi Tambahan</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Keterangan:</strong> {{ $item->keterangan ?? 'Tidak ada keterangan tambahan' }}</p>
                        </div>
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