
<!-- Modal -->
<div class="modal fade" id="hapus{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Slider {{$item->judul}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/slider/hapus') .'/'. $item->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('delete')
  <div class="form-group">
     Apakah Yakin ingin Menghapus Data Judul {{ $item->judul }} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button></form>

      </div>
    </div>
  </div>
</div>