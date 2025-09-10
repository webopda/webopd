@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">FORM PENGADUAN</h2>
            </div>
            <div class="p-6">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nik" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Tanggal Kunjungan <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_kunjungan" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Pesan <span class="text-red-500">*</span></label>
                        <textarea name="pesan" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 hover:bg-teal-700 text-white px-6 py-2 rounded">
                            KIRIM PESAN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
