@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-10 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">Layanan Penunjang</h2>
            </div>
            <div class="p-6 space-y-6">
                @foreach($data_penunjang as $item)
                    <div class="p-5 border rounded-xl hover:shadow-md transition bg-gray-50">
                        @if($item->img)
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('img_penunjang/'.$item->img) }}" 
                                     alt="Gambar {{ $item->penunjang }}" 
                                     class="rounded-lg shadow-md max-h-60 object-cover">
                            </div>
                        @endif
                        <h3 class="text-xl font-bold text-blue-700 mb-2">
                            {{ $item->penunjang }}
                        </h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            {!! $item->keterangan !!}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
