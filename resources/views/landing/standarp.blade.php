@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">Standar Pelayanan</h2>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($standarp as $item)
                        @php
                            $filePath = asset('standar_pelayanan/'.$item->standar_pelayanan);
                            $extension = strtolower(pathinfo($item->standar_pelayanan, PATHINFO_EXTENSION));
                            $isImage = in_array($extension, ['jpeg','jpg','png','gif','svg']);
                        @endphp

                        <div class="bg-gray-50 rounded-lg shadow-md p-4 flex flex-col items-center">
                            @if($isImage)
                                <img src="{{ $filePath }}" 
                                    alt="Indikator Mutu" 
                                    class="rounded-lg object-contain max-h-64 w-full cursor-pointer"
                                    onclick="openModal('{{ $filePath }}')">
                            @elseif($extension === 'pdf')
                                <iframe src="{{ $filePath }}" 
                                        class="w-full h-64 rounded-lg" 
                                        frameborder="0"></iframe>
                                <a href="{{ $filePath }}" target="_blank" 
                                   class="mt-2 text-blue-600 underline text-sm">
                                    Buka File
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk gambar -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="relative">
        <button onclick="closeModal()" 
                class="absolute top-2 right-2 bg-white rounded-full p-2 shadow hover:bg-gray-200">
            ✕
        </button>
        <img id="modalImage" src="" alt="Preview" class="max-h-screen max-w-screen rounded-lg shadow-lg">
    </div>
</div>

<script>
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target.id === 'imageModal') {
            closeModal();
        }
    });
</script>

@include('navbar.footer')
