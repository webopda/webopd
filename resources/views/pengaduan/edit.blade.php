<div class="modal modal-blur fade tambah" wire:ignore.self id="edit-modal{{$isi_pengaduan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Balas Email {{$isi_pengaduan->nama}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<form action="{{ url('admin/kirim/email' .'/'. $isi_pengaduan->id) }}" method="post">
    @csrf
@method('post')
                <div class="mb-3">
                    <label for="moto" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="moto" name="nama_kategori" placeholder="Enter moto" value="{{$isi_pengaduan->email}}" required readonly>
                    @error('email')
                    <span style="color:red">{{$message}}</span>

                    @enderror
                </div>

                <div class="mb-3">
                    <label for="moto" class="form-label">Isi Pesan</label>
<textarea id="editor-{{ $isi_pengaduan->id }}" name="balasan_email">{{ old('balasan_email', $isi_pengaduan->balasan) }}</textarea>

                    @error('balasan_email')
                    <span style="color:red">{{$message}}</span>

                    @enderror
                </div>

               

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <button type="submit"  class="btn btn-primary ms-auto">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-cancel"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                        <path d="M13.5 6.5l4 4" />
                        <path d="M19 19m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M17 21l4 -4" />
                    </svg>
                    Kirim Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
