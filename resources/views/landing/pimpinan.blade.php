@include('navbar.navbar')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.js"></script>

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="text-center py-6">
                <h2 class="text-2xl font-bold">Rumah Sakit Sadikin Kota Pariaman</h2>
            </div>
            @php
                $direktur = $pimpinan->first(function ($p) {
                    return str_contains(strtolower($p->detail_jabatan), 'direktur');
                });

                $kasi = $pimpinan->filter(function ($p) {
                    return !str_contains(strtolower($p->detail_jabatan), 'direktur');
                });
            @endphp

            @if($direktur)
                <div class="flex justify-center mb-8">
                    <div id="images" class="bg-white shadow-md rounded-xl overflow-hidden text-center border w-72">
                        <div class="w-full h-60 bg-gray-100 flex items-center justify-center">
                            @if($direktur->img)
                                <img src="{{ asset('img_pegawai/'.$direktur->img) }}" 
                                     alt="{{ $direktur->nama }}" 
                                     class="object-cover h-full w-full cursor-pointer">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $direktur->nama }}</h3>
                            <p class="text-gray-600">{{ $direktur->detail_jabatan }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div id="images" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6 pb-10">
                @forelse($kasi as $item)
                    <div class="bg-white shadow-md rounded-xl overflow-hidden text-center border">
                        <div class="w-full h-60 bg-gray-100 flex items-center justify-center">
                            @if($item->img)
                                <img src="{{ asset('img_pegawai/'.$item->img) }}" 
                                     alt="{{ $item->nama }}" 
                                     class="object-cover h-full w-full cursor-pointer">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $item->nama }}</h3>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const gallery = document.getElementById('images');
        new Viewer(gallery, {
            movable: true,  
            zoomable: true,  
            rotatable: true, 
            scalable: true   
        });
    });
</script>

@include('navbar.footer')
