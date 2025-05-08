@foreach($anggota as $item)
<div class="modal fade" tabindex="-1" id="edit{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning text-white">
                <h5 class="modal-title">Edit Data Anggota</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('anggota.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            @if($item->foto)
                            <h6 class="text-primary mt-3">Foto</h6>
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode_anggota">Kode Anggota</label>
                                <input type="text" class="form-control" id="kode_anggota" name="kode_anggota"
                                    value="{{ $item->kode_anggota }}" readonly required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_anggota">Nama Anggota</label>
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota"
                                    value="{{ $item->nama_anggota }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_jenis_anggota">Jenis Anggota</label>
                                <select name="id_jenis_anggota" class="form-control" id="id_jenis_anggota" required>
                                    <option value="">Pilih Jenis Anggota...</option>
                                    @foreach($jenis_anggota as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ $item->id_jenis_anggota == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->jenis_anggota }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    value="{{ $item->tgl_lahir }}" max="<?php echo date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat" name="tempat"
                                    value="{{ $item->tempat }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_daftar">Tanggal Daftar</label>
                                <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar"
                                    value="{{ $item->tgl_daftar }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_daftar">Tanggal Aktif</label>
                                <input type="date" class="form-control" id="tgl_aktif" name="tgl_aktif"
                                    value="{{$item->tgl_aktif}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ $item->no_telp }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $item->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $item->username }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Isi jika ingin mengganti password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                @if($item->foto)
                                <small>Foto saat ini: <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">Lihat Foto</a></small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fa">Status</label>
                                <select name="fa" class="form-control" id="fa">
                                    <option value="">Pilih Status...</option>
                                    <option value="Y" {{ $item->fa == 'Y' ? 'selected' : '' }}>Aktif</option>
                                    <option value="T" {{ $item->fa == 'T' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="{{ $item->keterangan }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat"
                                    rows="2">{{ $item->alamat }}</textarea>
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
