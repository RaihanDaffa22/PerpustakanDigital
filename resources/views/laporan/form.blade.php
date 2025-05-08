<div class="modal fade" tabindex="-1" id="form-print" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Print Laporan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('laporan.printBulan')}}" method="post" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tahun</label>
                                <select name="tahun" class="form-control" required>
                                    @foreach($tahun as $th)
                                    <option value="{{$th}}">{{$th}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Bulan</label>
                                <select name="bulan" class="form-control" id="">
                                <option value="1" {{$bulan == '1' ? 'selected' : ''}}>Januari</option>
                                <option value="2" {{$bulan == '2' ? 'selected' : ''}}>Februari</option>
                                <option value="3" {{$bulan == '3' ? 'selected' : ''}}>Maret</option>
                                <option value="4" {{$bulan == '4' ? 'selected' : ''}}>April</option>
                                <option value="5" {{$bulan == '5' ? 'selected' : ''}}>Mei</option>
                                <option value="6" {{$bulan == '6' ? 'selected' : ''}}>Juni</option>
                                <option value="7" {{$bulan == '7' ? 'selected' : ''}}>Juli</option>
                                <option value="8" {{$bulan == '8' ? 'selected' : ''}}>Agustus</option>
                                <option value="9" {{$bulan == '9' ? 'selected' : ''}}>September</option>
                                <option value="10" {{$bulan == '10' ? 'selected' : ''}}>Oktober</option>
                                <option value="11" {{$bulan == '11' ? 'selected' : ''}}>November</option>
                                <option value="12" {{$bulan == '12' ? 'selected' : ''}}>Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>
