@foreach($penerbit as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title text-white">Edit Data {{$item->nama_penerbit}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penerbit.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kode_penerbit">Kode Penerbit</label>
                                <input type="text" class="form-control" id="kode_penerbit" name="kode_penerbit"
                                    value="{{ $item->kode_penerbit }}" readonly required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_penerbit">Nama Penerbit</label>
                                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit"
                                value="{{ $item->nama_penerbit }}" required>
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
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ $item->no_telp }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input type="text" class="form-control" id="fax" name="fax"
                                value="{{ $item->fax }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                value="{{ $item->website }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control" name="kontak" value="{{$item->kontak}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat_penerbit">Alamat Penerbit</label>
                                <textarea class="form-control" id="alamat_penerbit"
                                    name="alamat_penerbit">{{ $item->alamat_penerbit }}</textarea>
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
