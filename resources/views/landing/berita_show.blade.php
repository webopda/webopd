@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">{{ $berita->judul }}</h2>
            </div>
            <div class="p-6">
                <div class="mb-6">
                    <img src="{{ asset('img_berita/'.$berita->img) }}" 
                         alt="{{ $berita->judul }}" 
                         class="rounded-lg shadow-md w-full max-h-96 object-cover">
                </div>
                <div class="text-gray-700 leading-relaxed mb-6">
                   {!! $berita->keterangan !!}
                </div>
                <p class="text-sm text-gray-500 italic">
                    Posted on {{ \Carbon\Carbon::parse($berita->tgl_publish)->format('Y-m-d H:i:s') }}
                    by {{ $berita->author_name }}
                </p>
                <div class="mt-6">
                    <a href="{{ route('landing.berita') }}" 
                       class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                        ← Back to Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
