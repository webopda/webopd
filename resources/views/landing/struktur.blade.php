@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">Struktur Organisasi</h2>
            </div>
            <div class="p-6 space-y-6 text-center">
                @foreach($data_struktur as $item)
                    <div>
                        <img src="{{ asset('organisasi/gambar/'.$item->gambar) }}" 
                             alt="Struktur Organisasi" 
                             class="mx-auto mb-4 rounded-lg shadow-md max-w-full">

                        @if(!empty($item->deskripsi))
                            <p class="text-gray-700 leading-relaxed text-justify">
                                {!! ($item->deskripsi) !!}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
