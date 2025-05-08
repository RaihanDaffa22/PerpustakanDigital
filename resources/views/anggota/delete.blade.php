@foreach($anggota as $item)
<div class="modal fade" tabindex="-1" id="delete{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger text-white">
                <h5 class="modal-title">Hapus Data Anggota <strong>{{ $item->nama_anggota }}</strong></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('anggota.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <p class="text-center">Apakah Anda yakin ingin menghapus anggota <strong>{{ $item->nama_anggota }}</strong>? Data yang dihapus tidak dapat dikembalikan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
