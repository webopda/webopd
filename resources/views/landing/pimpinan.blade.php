@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="text-center py-6">
                <h2 class="text-2xl font-bold">Rumah Sakit Sadikin Kota Pariaman</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6 pb-10">
                @forelse($pimpinan as $item)
                    <div class="bg-white shadow-md rounded-xl overflow-hidden text-center border">
                        <div class="w-full h-60 bg-gray-100 flex items-center justify-center">
                            @if($item->img)
                                <img src="{{ asset('img_pegawai/'.$item->img) }}" 
                                     alt="{{ $item->nama }}" 
                                     class="object-cover h-full w-full">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $item->nama }}</h3>
                            <p class="text-gray-600">{{ $item->detail_jabatan }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-10">
                        Data Belum Tersedia
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
