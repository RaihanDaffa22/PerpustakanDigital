<div class="modal fade" tabindex="-1" id="form-tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Tambah Data Transaksi</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('transaksi.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Anggota</label>
                                <select name="id_anggota" class="form-control" id="" required>
                                    <option value="">Pilih Anggota...</option>
                                    @foreach($anggota as $ag)
                                    <option value="{{$ag->id}}">{{$ag->nama_anggota}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Buku</label>
                                <select name="id_pustaka" class="form-control" id="" required>
                                    <option value="">Pilih Buku...</option>
                                    @foreach($buku as $bk)
                                    <option value="{{$bk->id}}">{{$bk->judul_pustaka}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Pinjam</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_pinjam" value="<?php echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_kembali" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" required>
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
