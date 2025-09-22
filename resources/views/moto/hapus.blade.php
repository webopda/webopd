<div class="modal modal-blur fade modal-hapus" wire:ignore.self id="hapus-modal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus moto </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Apakah Anda Yakin Ingin Menghapus Data {{$item->moto}} ?

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">
                    Cancel
                </a>
<form action="{{ url('admin/moto/hapus' .'/'. $item->id) }}" method="post">
            @method('delete')        
                <button type="submit" wire:click="hapus({{$item->id}})" class="btn btn-danger ms-auto">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-cancel"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                        <path d="M13.5 6.5l4 4" />
                        <path d="M19 19m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M17 21l4 -4" />
                    </svg>
                    Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
