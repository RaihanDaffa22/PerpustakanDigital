@foreach($pengarang as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning text-white">
                <h5 class="modal-title">Edit Data {{$item->gelar_depan}} {{$item->nama_pengarang}} {{$item->gelar_belakang}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengarang.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode_pengarang">Kode Pengarang</label>
                                <input type="text" class="form-control" id="kode_pengarang" name="kode_pengarang" value="{{ $item->kode_pengarang }}" readonly required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gelar_depan">Gelar Depan</label>
                                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="{{$item->gelar_depan}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pengarang">Nama Pengarang</label>
                                <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" value="{{$item->nama_pengarang}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gelar_belakang">Gelar Belakang</label>
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="{{$item->gelar_belakang}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{$item->no_telp}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{$item->website}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="biografi">Biografi</label>
                                <textarea class="form-control" id="biografi" name="biografi" rows="4">{{$item->biografi}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="2">{{$item->keterangan}}</textarea>
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
