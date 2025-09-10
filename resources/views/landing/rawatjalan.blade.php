@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden p-8">

            <div class="bg-blue-600 text-white text-center py-4 rounded-lg mb-8">
                <h2 class="text-2xl font-semibold">Layanan Rawat Jalan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                @foreach($rawat_jalan as $item)
                    <a href="{{ route('rawatjalan.poli', $item->id) }}" 
                    class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition block">
                        <img src="{{ asset('img_poli/'.$item->img) }}" 
                            alt="{{ $item->nama_poli }}" 
                            class="w-20 h-20 mx-auto mb-4 object-contain">

                        <h3 class="text-lg font-bold mb-2">{{ $item->nama_poli }}</h3>

                        <p class="text-gray-600 text-sm leading-relaxed text-justify">
                            {!! $item->keterangan !!}
                        </p>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</div>

@include('navbar.footer')
