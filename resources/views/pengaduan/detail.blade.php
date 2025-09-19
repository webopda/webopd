<div class="modal fade" id="detail-modal{{$isi_pengaduan->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      
      <!-- Header -->
      <div class="modal-header bg-info text-white rounded-top">
        <h5 class="modal-title fw-bold">
          📌 Detail Pengaduan
        </h5>
        <button type="button" class="btn-close btn-close-white" data-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body bg-light">
        <!-- Nama -->
        <div class="mb-3">
          <label class="fw-semibold text-secondary">👤 Nama</label>
          <div class="p-2 bg-white border rounded shadow-sm">
            {{ $isi_pengaduan->nama }}
          </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="fw-semibold text-secondary">📧 Email</label>
          <div class="p-2 bg-white border rounded shadow-sm">
            {{ $isi_pengaduan->email }}
          </div>
        </div>

        <!-- Isi Pengaduan -->
        <div class="mb-3">
          <label class="fw-semibold text-secondary">📝 Isi Pengaduan</label>
          <div class="p-3 bg-white border rounded shadow-sm" style="min-height: 120px;">
            {!! $isi_pengaduan->pesan !!}
          </div>
        </div>

        <!-- Balasan -->
        <div class="mb-3">
          <label class="fw-semibold text-secondary">💬 Balasan Admin</label>
          <div class="p-3 bg-white border rounded shadow-sm" style="min-height: 120px;">
            @if($isi_pengaduan->balasan)
              {!! $isi_pengaduan->balasan !!}
            @else
              <span class="text-danger fw-bold">Belum ada balasan</span>
            @endif
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
