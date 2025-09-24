@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden p-6">
            <div class="text-center mb-8">
                <img src="{{ asset('img_poli/'.$poli->img) }}" 
                     alt="{{ $poli->nama_poli }}" 
                     class="w-24 h-24 mx-auto mb-4 object-contain">
                <h2 class="text-2xl font-bold">{{ $poli->nama_poli }}</h2>
                <p class="text-gray-600 mt-4">{!! $poli->keterangan !!}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                @foreach($dokter as $d)
                    <div class="p-4 bg-gray-50 rounded-lg shadow">
                        <img src="{{ asset('img_dokter/'.$d->img) }}" 
                             alt="{{ $d->nama }}" 
                             class="w-24 h-24 mx-auto mb-3 rounded-full object-cover">
                        <h3 class="text-lg font-semibold text-blue-700 cursor-pointer"
                            onclick="showJadwal('{{ $d->nama }}', '{{ asset('img_jadwal/'.$d->img_jadwal) }}')">
                            {{ $d->nama }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div id="jadwalModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-[600px] max-w-3xl p-6">
        <h3 class="text-2xl font-bold mb-4 text-center" id="modalDokterNama"></h3>
        <div id="jadwalContent" class="text-center">
            <img id="jadwalImage" src="" alt="Jadwal Dokter" 
                 class="mx-auto rounded shadow max-h-[80vh] w-full object-contain">
        </div>
        <div class="mt-4 text-right">
            <button onclick="closeModal()" class="px-4 py-2 bg-red-500 text-white rounded">Tutup</button>
        </div>
    </div>
</div>

<script>
function showJadwal(nama, imgUrl) {
    document.getElementById('modalDokterNama').innerText = nama;
    document.getElementById('jadwalImage').src = imgUrl;
    document.getElementById('jadwalModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('jadwalModal').classList.add('hidden');
}
</script>

@include('navbar.footer')
