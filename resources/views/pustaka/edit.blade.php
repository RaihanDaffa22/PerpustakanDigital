@foreach($pustaka as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning text-white">
                <h5 class="modal-title">Edit Data Pustaka <strong>{{$item->judul_pustaka}}</strong></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Buku" class="img-fluid rounded shadow-sm border border-primary" style="max-height: 300px;">
                </div>
                <form action="{{ route('pustaka.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-warning">Informasi Dasar</h6>
                            <div class="form-group">
                                <label for="kode_pustaka">Kode Pustaka</label>
                                <input type="text" class="form-control" id="kode_pustaka" name="kode_pustaka" value="{{ $item->kode_pustaka }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="judul_pustaka">Judul</label>
                                <input type="text" class="form-control" id="judul_pustaka" name="judul_pustaka" value="{{ $item->judul_pustaka }}">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $item->isbn }}" required>
                            </div>
                            <div class="form-group">
                                <label for="id_ddc">DDC</label>
                                <select name="id_ddc" class="form-control">
                                    <option value="">Pilih DDC...</option>
                                    @foreach($ddc as $dc)
                                    <option value="{{ $dc->id }}" {{ $item->id_ddc == $dc->id ? 'selected' : '' }}>{{ $dc->ddc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_format">Format</label>
                                <select name="id_format" class="form-control">
                                    <option value="">Pilih Format...</option>
                                    @foreach($format as $ft)
                                    <option value="{{ $ft->id }}" {{ $item->id_format == $ft->id ? 'selected' : '' }}>{{ $ft->format }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-warning">Informasi Tambahan</h6>
                            <div class="form-group">
                                <label for="id_pengarang">Pengarang</label>
                                <select name="id_pengarang" class="form-control">
                                    <option value="">Pilih Pengarang...</option>
                                    @foreach($pengarang as $pr)
                                    <option value="{{ $pr->id }}" {{ $item->id_pengarang == $pr->id ? 'selected' : '' }}>{{ $pr->gelar_depan }} {{ $pr->nama_pengarang }} {{ $pr->gelar_belakang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_penerbit">Penerbit</label>
                                <select name="id_penerbit" class="form-control">
                                    <option value="">Pilih Penerbit...</option>
                                    @foreach($penerbit as $pn)
                                    <option value="{{ $pn->id }}" {{ $item->id_penerbit == $pn->id ? 'selected' : '' }}>{{ $pn->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="0" value="{{ $item->tahun_terbit }}">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword" value="{{ $item->keyword }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-warning">Deskripsi Buku</h6>
                            <div class="form-group">
                                <label for="kondisi_buku">Kondisi Buku</label>
                                <select name="kondisi_buku" class="form-control" id="kondisi_buku">
                                    <option value="">Pilih Kondisi...</option>
                                    <option value="Baru" {{$item->kondisi_buku == 'Baru' ? 'selected' : ''}}>Baru</option>
                                    <option value="Bekas" {{$item->kondisi_buku == 'Bekas' ? 'selected' : ''}}>Bekas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_fisik">Keterangan Fisik</label>
                                <input type="text" class="form-control" id="keterangan_fisik" name="keterangan_fisik" value="{{ $item->keterangan_fisik }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_tambahan">Keterangan Tambahan</label>
                                <input type="text" class="form-control" id="keterangan_tambahan" name="keterangan_tambahan" value="{{ $item->keterangan_tambahan }}">
                            </div>
                            <div class="form-group">
                                <label for="abstraksi">Abstraksi</label>
                                <textarea class="form-control" id="abstraksi" name="abstraksi" rows="3">{{ $item->abstraksi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-warning">Informasi Harga</h6>
                            <div class="form-group">
                                <label for="harga_buku">Harga</label>
                                <input type="number" class="form-control" id="harga_buku" name="harga_buku" min="0" value="{{ $item->harga_buku }}">
                            </div>
                            <div class="form-group">
                                <label for="denda_terlambat">Denda Terlambat</label>
                                <input type="number" class="form-control" id="denda_terlambat" name="denda_terlambat" min="0" value="{{ $item->denda_terlambat }}">
                            </div>
                            <div class="form-group">
                                <label for="denda_hilang">Denda Hilang</label>
                                <input type="number" class="form-control" id="denda_hilang" name="denda_hilang" min="0" value="{{ $item->denda_hilang }}">
                            </div>
                            <div class="form-group">
                                <label for="fp">Status</label>
                                <select name="fp" class="form-control">
                                    <option value="0" {{ $item->fp == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                                    <option value="1" {{ $item->fp == '1' ? 'selected' : '' }}>Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                @if($item->gambar)
                                <small>Gambar saat ini: <a href="{{ asset('storage/' . $item->gambar) }}" target="_blank">Lihat di tab baru</a></small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach