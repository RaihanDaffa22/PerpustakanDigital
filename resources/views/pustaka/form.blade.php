<div class="modal fade" tabindex="-1" id="form-tambah" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gradient-dark text-white">
                <h5 class="modal-title">Tambah Data Pustaka</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pustaka.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-success">Informasi Dasar</h6>
                            <div class="form-group">
                                <label for="kode_pustaka">Kode Pustaka</label>
                                <input type="text" class="form-control" id="kode_pustaka" name="kode_pustaka" value="{{$kode}}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="judul_pustaka">Judul</label>
                                <input type="text" class="form-control" id="judul_pustaka" name="judul_pustaka" required>
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" required>
                            </div>
                            <div class="form-group">
                                <label for="id_ddc">DDC</label>
                                <select name="id_ddc" class="form-control" id="id_ddc" required>
                                    <option value="">Pilih DDC...</option>
                                    @foreach($ddc as $dc)
                                    <option value="{{$dc->id}}">{{$dc->ddc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_format">Format</label>
                                <select name="id_format" class="form-control" id="id_format" required>
                                    <option value="">Pilih Format...</option>
                                    @foreach($format as $ft)
                                    <option value="{{$ft->id}}">{{$ft->format}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">Informasi Tambahan</h6>                                
                            <div class="form-group">
                                <label for="id_pengarang">Pengarang</label>
                                <select name="id_pengarang" class="form-control" id="id_pengarang" required>
                                    <option value="">Pilih Pengarang...</option>
                                    @foreach($pengarang as $pr)
                                    <option value="{{$pr->id}}">{{$pr->gelar_depan}} {{$pr->nama_pengarang}} {{$pr->gelar_belakang}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_penerbit">Penerbit</label>
                                <select name="id_penerbit" class="form-control" id="id_penerbit" required>
                                    <option value="">Pilih Penerbit...</option>
                                    @foreach($penerbit as $pn)
                                    <option value="{{$pn->id}}">{{$pn->nama_penerbit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-success">Deskripsi Buku</h6>
                            <div class="form-group">
                                <label for="kondisi_buku">Kondisi Buku</label>
                                <select name="kondisi_buku" class="form-control" id="kondisi_buku" required>
                                    <option value="">Pilih Kondisi...</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Bekas">Bekas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_fisik">Keterangan Fisik</label>
                                <input type="text" class="form-control" id="keterangan_fisik" name="keterangan_fisik">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_tambahan">Keterangan Tambahan</label>
                                <input type="text" class="form-control" id="keterangan_tambahan" name="keterangan_tambahan">
                            </div>
                            <div class="form-group">
                                <label for="abstraksi">Abstraksi</label>
                                <textarea class="form-control" id="abstraksi" name="abstraksi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-success">Informasi Harga</h6>
                            <div class="form-group">
                                <label for="harga_buku">Harga</label>
                                <input type="number" class="form-control" id="harga_buku" name="harga_buku" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="denda_terlambat">Denda Terlambat</label>
                                <input type="number" class="form-control" id="denda_terlambat" name="denda_terlambat" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="denda_hilang">Denda Hilang</label>
                                <input type="number" class="form-control" id="denda_hilang" name="denda_hilang" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="fp">Status</label>
                                <select name="fp" class="form-control" id="fp" required>
                                    <option value="">Pilih Status...</option>
                                    <option value="0">Tidak Tersedia</option>
                                    <option value="1">Tersedia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>