@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">Jadwal Dokter</h2>
            </div>

            <div class="p-6">
                <div class="flex justify-center">
                    @if($jadwal)
                        <div class="text-center">
                            <!-- gambar utama -->
                            <img src="{{ asset('jadwal_dokter/'.$jadwal) }}" 
                                alt="Jadwal Dokter" 
                                class="mx-auto rounded shadow-lg max-h-[80vh] object-contain cursor-pointer"
                                onclick="openModal()">
                        </div>
                    @else
                        <p class="text-center text-gray-500">Belum ada jadwal dokter tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="imageModal" 
     class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50"
     onclick="closeModal(event)">
    <div class="relative max-w-4xl mx-auto" onclick="event.stopPropagation()">
        <!-- Tombol Close -->
        <span class="absolute top-2 right-2 text-white text-3xl cursor-pointer" onclick="closeModal(event)">
            &times;
        </span>

        <!-- Gambar di modal -->
        <img src="{{ asset('jadwal_dokter/'.$jadwal) }}" 
             alt="Jadwal Dokter" 
             class="rounded shadow-lg max-h-[90vh] mx-auto">
    </div>
</div>

<script>
function openModal() {
    const modal = document.getElementById("imageModal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");
}

function closeModal(event) {
    const modal = document.getElementById("imageModal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
</script>

@include('navbar.footer')
