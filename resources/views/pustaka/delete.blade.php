@foreach($pustaka as $item)
<div class="modal fade" tabindex="-1" id="delete{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h5 class="modal-title text-white">Hapus Data {{$item->judul_pustaka}}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('pustaka.destroy', $item->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <p class="text-center">Hapus Data <span class="text-danger">{{$item->judul_pustaka}}</span>?. <br> Data yang sudah dihapus tidak dapat dikembalikan.</p>
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