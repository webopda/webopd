@include('navbar.navbar')
<div class="min-h-screen bg-gray-100 py-10 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">{{ $submenu->submenu }}</h2>
            </div>
            <div class="p-6 space-y-6">
                @foreach($kontenList as $konten)
                    <div class="p-5 border rounded-xl hover:shadow-md transition bg-gray-50">
                        @if($konten->img)
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('img_konten/'.$konten->img) }}" 
                                     alt="{{ $konten->judul }}" 
                                     class="rounded-lg shadow-md max-h-60 object-cover">
                            </div>
                        @endif
                        <h3 class="text-xl justify-center font-bold text-blue-700 mb-2">
                            {{ $konten->judul }}
                        </h3>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            {!! $konten->konten !!}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('navbar.footer')
