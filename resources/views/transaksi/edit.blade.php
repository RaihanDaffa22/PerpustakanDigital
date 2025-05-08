@foreach($transaksi as $item)
<div class="modal fade" tabindex="-1" id="edit{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Edit Data Transaksi</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('transaksi.update', $item->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Anggota</label>
                                <select name="id_anggota" class="form-control" id="" required readonly>
                                    <option value="{{$item->id_anggota}}" selected>{{$item->anggota->nama_anggota}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Buku</label>
                                <select name="id_pustaka" class="form-control" id="" required readonly>
                                    <option value="{{$item->id_pustaka}}" selected>{{$item->pustaka->judul_pustaka}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Pinjam</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_pinjam" 
                                @if($item->tgl_pinjam == '')
                                min="<?php echo date('Y-m-d') ?>"
                                value="<?php echo date('Y-m-d') ?>"
                                @else
                                min="{{$item->tgl_pinjam}}"
                                value="{{$item->tgl_pinjam}}"
                                @endif
                                  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_kembali"
                                @if($item->tgl_pinjam == '')
                                min="<?php echo date('Y-m-d') ?>"
                                value="<?php echo date('Y-m-d') ?>"
                                @else
                                min="{{$item->tgl_pinjam}}"
                                value="{{$item->tgl_kembali}}"
                                @endif
                                 required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="fp" class="form-control" id="" required>
                                    <option value="">Pilih Status</option>
                                    <option value="0" {{$item->fp == 0 ? 'selected' : ''}}>Dipinjam</option>
                                    <option value="1" {{$item->fp == 1 ? 'selected' : ''}}>Selesai</option>
                                    <option value="2" {{$item->fp == 2 ? 'selected' : ''}}>Hilang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_pengembalian"
                                @if($item->tgl_pinjam == '' || $item->tgl_pengembalian == '')
                                value="<?php echo date('Y-m-d') ?>"
                                min="<?php echo date('Y-m-d') ?>"
                                @else
                                value="{{$item->tgl_pengembalian}}" 
                                min="{{$item->tgl_pinjam}}" 
                                required
                                @endif
                                >
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
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach 
