<div class="modal fade" tabindex="-1" id="edit-perpustakaan" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title text-white">Edit Data Perpustakaan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perpustakaan.update', $perpustakaan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_perpustakaan">Nama Perpustakaan</label>
                                <input type="text" class="form-control" id="nama_perpustakaan" name="nama_perpustakaan"
                                    value="{{ $perpustakaan->nama_perpustakaan }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pustakawan">Nama Pustakawan</label>
                                <input type="text" class="form-control" id="nama_pustakawan" name="nama_pustakawan"
                                    value="{{ $perpustakaan->nama_pustakawan }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $perpustakaan->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp">Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ $perpustakaan->no_telp }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    value="{{ $perpustakaan->website }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                    required>{{ $perpustakaan->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"
                                    rows="3">{{ $perpustakaan->keterangan }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
