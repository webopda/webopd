@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">Berita</h2>
            </div>

            @foreach($berita as $item)
                <div class="p-6 border-b">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 mb-4 md:mb-0">
                            <img src="{{ asset('img_berita/'.$item->img) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="rounded-lg shadow-md w-full h-48 object-cover">
                        </div>
                        <div class="md:w-2/3 md:pl-6">
                            <h3 class="text-xl font-bold mb-2">{{ $item->judul }}</h3>
                            <p class="text-gray-700 mb-4">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}
                            </p>
                            <a href="{{ route('berita.show', $item->id) }}" 
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                Read More →
                            </a>
                            <p class="text-sm text-gray-500 mt-2">
                                Posted on {{ \Carbon\Carbon::parse($item->tgl_publish)->format('Y-m-d H:i:s') }} 
                                by {{ $item->author_name }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@include('navbar.footer')
