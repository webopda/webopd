@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">FORM PENGADUAN</h2>
            </div>
            <div class="p-6">

                @if(session()->has('login_google'))

                <form action="{{ url('landing/pengaduan/create') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">NIK <span class="text-red-500">*</span></label>
                        <input type="text" value="{{ old('nik') }}" name="nik" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Tanggal Kunjungan <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2" value=" {{ Session::get('login_google.email') }}" required readonly>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Pesan <span class="text-red-500">*</span></label>
                        <textarea name="pesan" rows="4" class="w-full border rounded px-3 py-2" required>{{old('pesan')}}</textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 hover:bg-teal-700 text-white px-6 py-2 rounded">
                            KIRIM PESAN
                        </button>
                    </div>
                </form>

                @else
          <div class="max-w-sm mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-2xl p-6 text-center">
        <h2 class="text-lg font-semibold mb-4">Silakan Login</h2>

        <a href="{{ url('auth/google') }}" 
           class="flex items-center hover:text-red-600 justify-center gap-3 px-4 py-3 bg-gray-500 hover:bg-gray-200 text-white rounded-lg shadow-md transition duration-300">
            <!-- Lottie Google -->
             <lottie-player 
          src="{{asset('google.json')}}" 
          background="transparent" 
          speed="1" 
          style="width: 200px; height: 200px;" 
          loop 
          autoplay>
        </lottie-player>
            <span class="font-medium hover:text-red-400">Login dengan Google</span>
        </a>
    </div>
</div>


     @endif       </div>
        </div>
    </div>
</div>

@include('navbar.footer')
