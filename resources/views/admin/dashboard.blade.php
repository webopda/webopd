@extends('layout.template')

@section('content')
<style>
  .clock-circle {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: #0d6efd; 
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}
</style>
<div class="row mt-4">
    <div class="col-md-3 stretch-card transparent">
        <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4 fw-bold fs-5" style="font-size: 20px">Total Pengunjung</p>
                <p class="fs-30 mb-2">{{ $totalPengunjung }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 stretch-card transparent">
        <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4 fw-bold fs-5" style="font-size: 20px">Pengunjung Hari ini</p>
                <p class="fs-30 mb-2">{{ $today }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 stretch-card transparent">
        <div class="card card-light-blue">
            <div class="card-body">
                <p class="mb-4 fw-bold fs-5" style="font-size: 20px">Pengunjung Minggu Ini</p>
                <p class="fs-30 mb-2">{{ $thisWeek }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 stretch-card transparent">
        <div class="card card-light-danger">
            <div class="card-body">
                <p class="mb-4 fw-bold fs-5" style="font-size: 20px">Pengunjung Bulan Ini</p>
                <p class="fs-30 mb-2">{{ $thisMonth }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-10" style="margin-top: 30px">
    <!-- KIRI: JAM -->
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card h-100 d-flex align-items-center justify-content-center">
          <div class="clock-circle text-center">
              <h2 id="liveClock" class="fw-bold fs-3 mb-1"></h2>
              <p id="liveDate" class="fs-6 mb-0"></p>
          </div>
      </div>
  </div>

    <!-- KANAN: CHART PENGUNJUNG PER HARI -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card h-100 shadow-lg rounded-xl p-4">
            <h3 class="text-gray-700 fw-semibold mb-3">Pengunjung Per Hari</h3>
            <canvas id="chartHari"></canvas>
        </div>
    </div>
</div>

<!-- BARIS BARU: CHART MINGGU & BULAN -->
<div class="row mt-4">
    <div class="col-md-6 stretch-card">
        <div class="card shadow-lg rounded-xl p-4">
            <h3 class="text-gray-700 font-semibold mb-3">Pengunjung Per Minggu</h3>
            <canvas id="chartMinggu"></canvas>
        </div>
    </div>
    <div class="col-md-6 stretch-card">
        <div class="card shadow-lg rounded-xl p-4">
            <h3 class="text-gray-700 font-semibold mb-3">Pengunjung Per Bulan</h3>
            <canvas id="chartBulan"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const perHari = @json($perHari);
    const perMinggu = @json($perMinggu);
    const perBulan = @json($perBulan);

    new Chart(document.getElementById('chartHari'), {
        type: 'line',
        data: {
            labels: perHari.map(d => d.tgl),
            datasets: [{
                label: 'Pengunjung',
                data: perHari.map(d => d.total),
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59,130,246,0.2)',
                tension: 0.4,
                fill: true
            }]
        }
    });

    new Chart(document.getElementById('chartMinggu'), {
        type: 'bar',
        data: {
            labels: perMinggu.map(d => d.minggu),
            datasets: [{
                label: 'Pengunjung',
                data: perMinggu.map(d => d.total),
                backgroundColor: '#10B981'
            }]
        }
    });

    new Chart(document.getElementById('chartBulan'), {
        type: 'bar',
        data: {
            labels: perBulan.map(d => d.bulan),
            datasets: [{
                label: 'Pengunjung',
                data: perBulan.map(d => d.total),
                backgroundColor: '#EF4444'
            }]
        }
    });


    // time
     function updateClock() {
    let now = new Date();

    // Format jam:menit:detik
    let hours = String(now.getHours()).padStart(2, '0');
    let minutes = String(now.getMinutes()).padStart(2, '0');
    let seconds = String(now.getSeconds()).padStart(2, '0');

    // Format tanggal
    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    let tanggal = now.toLocaleDateString('id-ID', options);

    document.getElementById('liveClock').textContent = `${hours}:${minutes}:${seconds}`;
    document.getElementById('liveDate').textContent = tanggal;
  }

  // Panggil pertama kali & update tiap 1 detik
  updateClock();
  setInterval(updateClock, 1000);
</script>
@endpush
