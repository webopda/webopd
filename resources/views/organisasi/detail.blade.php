<div class="modal fade" id="exampleModalLong{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Organisasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="{{ asset('organisasi/gambar/' . $item->gambar) }}" 
                        alt="Struktur Organisasi" 
                        class="img-thumbnail rounded-3" 
                        style="max-width: 120px; cursor: pointer;">

                        {!! $item->deskripsi !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>