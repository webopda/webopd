<div>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Manajemen Kontak</h4>
                <button class="btn btn-primary" wire:click="closeModal" data-toggle="modal" data-target="#kontakModal">
                    + Tambah Kontak
                </button>
            </div>
            <div class="card-body">
 
                {{-- Input Search --}}
                <div class="mb-3">
                    <input type="text" wire:model="search" class="form-control" placeholder="Cari nama atau keterangan...">
                </div>

                {{-- Tabel Kontak --}}
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th style="max-width:180px; white-space: normal; word-wrap: break-word;">
                                Keterangan
                            </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontak as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->nama }}</td>
                                <td style="max-width:180px; white-space: normal; word-wrap: break-word;">
                                    {{ $k->keterangan }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" 
                                    style="cursor: pointer;"
                                    data-toggle="modal" 
                                    data-target="#kontakModal"
                                    wire:click="edit({{ $k->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                        </svg>
                                    </a>

                                    <a class="btn btn-danger btn-sm" 
                                    style="cursor: pointer;"
                                    wire:click="confirmDelete({{ $k->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Tambah/Edit --}}
        <div wire:ignore.self class="modal fade" id="kontakModal" tabindex="-1" role="dialog" aria-labelledby="kontakModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="kontakModalLabel">
                            {{ $kontakId ? 'Edit Kontak' : 'Tambah Kontak' }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" wire:model="nama" class="form-control">
                            @error('nama') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea wire:model="keterangan" class="form-control"></textarea>
                            @error('keterangan') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Batal</button>
                        <button type="button" class="btn btn-primary" wire:click="store">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Tutup modal setelah simpan
    window.addEventListener('closeModal', event => {
        $('#kontakModal').modal('hide');
    });

    // SweetAlert sukses
    window.addEventListener('swal:success', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: event.detail.message,
            timer: 2000,
            showConfirmButton: false
        });
    });

    // SweetAlert konfirmasi delete
    window.addEventListener('swal:confirm', event => {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: event.detail.message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('delete', event.detail.id);
            }
        });
    });
</script>
@endpush
