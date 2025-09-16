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
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontak as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->keterangan }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" 
                                            wire:click="edit({{ $k->id }})" 
                                            data-toggle="modal" data-target="#kontakModal">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm" 
                                            wire:click="confirmDelete({{ $k->id }})">
                                        Hapus
                                    </button>
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
