@extends('layout.template')

@section('content')
{{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <!-- Total Pengunjung -->
    <div class="flex items-center bg-white shadow rounded-lg p-4 border-b-4 border-blue-500">
        <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 11c0-1.657-1.343-3-3-3S6 9.343 6 11s1.343 3 3 3 3-1.343 3-3zm0 0c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3zm-6 8a6 6 0 1112 0H6z"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-xs text-gray-500">Total Pengunjung</p>
            <p class="text-lg font-bold text-gray-800">{{ $totalPengunjung }}</p>
        </div>
    </div>

    <!-- Hari Ini -->
    <div class="flex items-center bg-white shadow rounded-lg p-4 border-b-4 border-green-500">
        <div class="p-2 rounded-full bg-green-100 text-green-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-xs text-gray-500">Hari Ini</p>
            <p class="text-lg font-bold text-gray-800">{{ $today }}</p>
        </div>
    </div>

    <!-- Minggu Ini -->
    <div class="flex items-center bg-white shadow rounded-lg p-4 border-b-4 border-yellow-500">
        <div class="p-2 rounded-full bg-yellow-100 text-yellow-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 10h18M3 6h18M3 14h18M3 18h18"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-xs text-gray-500">Minggu Ini</p>
            <p class="text-lg font-bold text-gray-800">{{ $thisWeek }}</p>
        </div>
    </div>

    <!-- Bulan Ini -->
    <div class="flex items-center bg-white shadow rounded-lg p-4 border-b-4 border-red-500">
        <div class="p-2 rounded-full bg-red-100 text-red-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-xs text-gray-500">Bulan Ini</p>
            <p class="text-lg font-bold text-gray-800">{{ $thisMonth }}</p>
        </div>
    </div>
</div> --}}



{{-- card --}}
<div class="row mt-10" style="margin-top: 30px">
           <div class="col-md-6 grid-margin stretch-card">
  <div class="card tale-bg">
    <div class="card-people mt-auto relative">


      <!-- Digital Clock -->
      <div class="absolute inset-0 flex flex-col items-center justify-center text-black px-5">
        <h2 id="liveClock" class="text-5xl font-bold"></h2>
        <p id="liveDate" class="text-lg mt-2"></p>
      </div>
      <div class="w-[10px] h-[10px]">
    <lottie-player 
  src="{{ asset('time.json') }}" 
  background="transparent" 
  speed="1" 
  class="w-12 h-12"  
  loop 
  autoplay>
</lottie-player>
</div>
    </div>
  </div>
</div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Pengunjung</p>
                      <p class="fs-30 mb-2">{{ $totalPengunjung }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Pengunjung Hari ini</p>
                      <p class="fs-30 mb-2">{{ $today }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Pengunjung Minggu Ini</p>
                      <p class="fs-30 mb-2">{{ $thisWeek }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Pengunjung Perbulan</p>
                      <p class="fs-30 mb-2">{{ $thisMonth }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

{{-- 
endcard --}}
<div class="p-6 space-y-6">

    {{-- === CARD INFO === --}}
   

    {{-- === CHARTS === --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <div class="bg-white shadow-lg rounded-xl p-5">
            <h3 class="text-gray-700 font-semibold mb-3">Pengunjung Per Hari</h3>
            <canvas id="chartHari"></canvas>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-5">
            <h3 class="text-gray-700 font-semibold mb-3">Pengunjung Per Minggu</h3>
            <canvas id="chartMinggu"></canvas>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-5">
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
