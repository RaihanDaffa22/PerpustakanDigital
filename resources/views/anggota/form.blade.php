<div class="modal fade" tabindex="-1" id="form-tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Tambah Data Anggota</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('anggota.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode_anggota">Kode Anggota</label>
                                <input type="text" class="form-control" id="kode_anggota" name="kode_anggota"
                                    value="{{ $kode }}" readonly required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_anggota">Nama Anggota</label>
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_jenis_anggota">Jenis Anggota</label>
                                <select name="id_jenis_anggota" class="form-control" id="id_jenis_anggota" required>
                                    <option value="">Pilih Jenis Anggota...</option>
                                    @foreach($jenis_anggota as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    max="<?php echo date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat" name="tempat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_daftar">Tanggal Daftar</label>
                                <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar"
                                    value="<?php echo date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_daftar">Tanggal Aktif</label>
                                <input type="date" class="form-control" id="tgl_aktif" name="tgl_aktif"
                                    value="<?php echo date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fa">Status</label>
                                <select name="fa" class="form-control" id="fa">
                                    <option value="">Pilih Status...</option>
                                    <option value="Y">Aktif</option>
                                    <option value="T">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
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
