@include('navbar.navbar')
<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6 ">
        
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <!-- Judul -->
               <div class="relative bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-4 rounded-tr-3xl rounded-br-3xl shadow-lg inline-block">
    <h2 class="text-2xl font-extrabold italic">
        {{ $berita->judul }}
    </h2>
</div>


                <div class="p-6 border-l-2  border-red-600">
                    <!-- Info penulis -->
                    <div class="text-sm text-gray-500 mb-4">
                        {{ \Carbon\Carbon::parse($berita->tgl_publish)->format('M d, Y') }}  
                        • By {{ $berita->author_name }} •dilihat {{ $berita->dilihat }}
                    </div>

                    <!-- Gambar utama -->
                    <div class="mb-6">
                        <img src="{{ asset('img_berita/'.$berita->img) }}" 
                             alt="{{ $berita->judul }}" 
                             class="rounded-lg shadow-md w-full max-h-[450px] object-cover">
                    </div>

                    <!-- Isi berita -->
                    <div class="text-gray-700 leading-relaxed prose max-w-none">
                        {!! $berita->keterangan !!}
                    </div>

                    <!-- Tombol kembali -->
                    <div class="mt-6">
                        <a href="{{ route('landing.berita') }}" 
                           class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                            ← Back to Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Social Media -->
           
@php
$popular = \App\Models\Berita::orderBy('dilihat', 'desc')
            ->take(5)
            ->get();
@endphp
            <!-- Popular News -->
            <div class="bg-white shadow rounded-lg p-4 border-b-4 border-red-700">
                <h4 class="font-semibold mb-3">Popular News</h4>
                <ul class="space-y-3 text-sm text-gray-700">
                    @foreach($popular as $pop)
                        <li class="flex space-x-3">
                            <img src="{{ asset('img_berita/'.$pop->img) }}" 
                                 class="w-16 h-12 object-cover rounded">
                            <div>
                                <a href="{{ route('berita.show', encrypt($pop->id)) }}" class="hover:text-blue-600 font-medium">
                                    {{ \Illuminate\Support\Str::limit($pop->judul, 50) }}
                                </a>
                                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($pop->tgl_publish)->format('M d, Y') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white shadow rounded-lg p-4 border-b-4 border-red-700">
                <h4 class="font-semibold mb-3">Berita Sosmed</h4>
                <ul class="space-y-3 text-sm text-gray-700">
                   <script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml      : true,
      version    : 'v23.0'
    });
  }; 
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
  
<div class="fb-page" 
     data-href="https://www.facebook.com/rsuddrsadikinkotapariaman" 
     data-tabs="timeline" 
     data-width="500" 
     data-height="600" 
     data-small-header="false" 
     data-adapt-container-width="true" 
     data-hide-cover="false" 
     data-show-facepile="true"></div>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="bg-white shadow rounded-lg p-4 border-b-4 border-red-700">
                <h4 class="font-semibold mb-3">Berita Terbaru</h4>
                <p class="text-sm text-gray-600 mb-3">Berlanggananlah buletin kami untuk mendapatkan berita terkini di kotak masuk Anda!</p>
                <form action="#" method="POST" class="space-y-2">
                    <input type="email" placeholder="Email address" 
                           class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
