@foreach($jenisAnggota as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title text-white">Edit Data {{$item->jenis_anggota}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('jenis-anggota.update', $item->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kode</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$item->kode_jenis_anggota}}" name="kode_jenis_anggota" readonly required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jenis Anggota</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="jenis_anggota" value="{{$item->jenis_anggota}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Max Pinjam</label>
                                <input type="number" min="0" class="form-control" name="max_pinjam" id=""value="{{$item->max_pinjam}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="">{{$item->keterangan}}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach