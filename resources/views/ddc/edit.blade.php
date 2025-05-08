@foreach($ddc as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title text-white">Edit Data {{$item->ddc}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ddc.update', $item->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kode</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$item->kode_ddc}}" name="kode_ddc" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">DDC</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$item->ddc}}" name="ddc" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Rak</label>
                                <select class="form-control" name="id_rak" id="">
                                    <option value="">Pilih Rak...</option>
                                    @foreach($rak as $rk)
                                    <option value="{{$rk->id}}" {{$item->id_rak == $rk->id ? 'selected' : ''}}>{{$rk->rak}}</option>
                                    @endforeach
                                </select>
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