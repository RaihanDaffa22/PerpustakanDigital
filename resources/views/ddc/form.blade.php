<div class="modal fade" tabindex="-1" id="form-tambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-dark">
                <h5 class="modal-title text-white">Tambah Data DDC</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ddc.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kode DDC</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="kode_ddc" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">DDC</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="ddc" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Rak</label>
                                <select class="form-control" name="id_rak" id="">
                                    <option value="">Pilih Rak...</option>
                                    @foreach($rak as $rk)
                                    <option value="{{$rk->id}}">{{$rk->rak}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id=""></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
