@include('navbar.navbar')
<div class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 mt-24 grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Content -->
        <div class="lg:col-span-2 border-l-2 border-red-500">
            
            <!-- Trending News (ambil berita pertama untuk headline) -->
            @if($berita->count() > 0)
                @php
                $headline = \App\Models\Berita::orderBy('dilihat', 'desc')
            ->take(5)
            ->get();
                
                @endphp
                <div class="mb-6">
                                  <div class="relative bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-4 rounded-tr-3xl rounded-br-3xl shadow-lg inline-block">
🔥 Trending News</div>
                    <div class="grid md:grid-cols-2 gap-4 mt-4">
                        <div class="relative" id="targetDiv">

    <div class="swiper mySwiperber  w-full h-72 rounded-xl shadow-lg overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($headline as $item)
                <div class="swiper-slide relative">
                  <a href="{{ route('berita.show',encrypt($item->id)) }}">
                    <img src="{{ asset('img_berita/'.$item->img) }}"  
                         alt="{{ $item->judul }}" 
                         class="w-full h-72 object-cover">
                    <div class="absolute bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent text-white p-4 w-full">
                        <h2 class="text-lg font-bold">{{ $item->judul }}</h2>
                        <p class="text-sm">{{ \Carbon\Carbon::parse($item->tgl_publish)->format('M d, Y') }}</p>
                    </div>
                  </a>
                </div>
            @endforeach
        </div>

        <!-- Navigasi & Pagination -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
 
                        <!-- Grid 4 berita selanjutnya -->
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($berita->skip(1)->take(4) as $item)
                                <div class="relative">
                                    <img src="{{ asset('img_berita/'.$item->img) }}" 
                                         class="rounded-md w-full h-32 object-cover">
                                    <p class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-xs text-white p-1">
                                        {{ \Illuminate\Support\Str::limit($item->judul, 40) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Section berita lainnya -->
            <div class="mb-6">
                <h3 class="text-xl font-bold border-b-2 border-blue-600 pb-2 mb-4">📰 Daftar Berita</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    @foreach($berita as $item)
                        <div class="flex space-x-4">
                            <img src="{{ asset('img_berita/'.$item->img) }}" 
                                 class="w-40 h-28 object-cover rounded-lg shadow">
                            <div>
                                <h4 class="font-semibold">{{ $item->judul }}</h4>
                                <p class="text-gray-600 text-sm">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}
                                </p>
                                <a href="{{ route('berita.show',encrypt($item->id)) }}" class="text-blue-600 text-sm">Read more →</a>
                                <p class="text-xs text-gray-500 mt-1">
    {{ \Carbon\Carbon::parse($item->tgl_publish)->format('Y-m-d H:i') }} 
    • {{ $item->author_name }} <br>

    <div class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" 
             viewBox="0 0 24 24" aria-hidden="true" role="img"
             class="text-gray-500">
          <path fill="none" stroke="currentColor" stroke-width="1.6" 
                stroke-linecap="round" stroke-linejoin="round"
                d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/>
          <circle cx="12" cy="12" r="3" fill="currentColor"/>
        </svg>
        <span class='text-gray-500' style="font-size: 10px;">{{ $item->dilihat??0 }}</span>
    </div>
</p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Social Media -->
            

            <!-- Popular News (ambil 3 berita paling baru) -->
            {{-- <div class="bg-white shadow rounded-lg p-4">
                <h4 class="font-semibold mb-3">Popular News </h4>
                <ul class="space-y-2 text-sm text-gray-700">
                    @php
                         $beritapopuler = \App\Models\Berita::orderBy('dilihat', 'desc')
                    ->skip(1)
                    ->take(3)
                    ->get();
                    @endphp
                    @foreach($beritapopuler as $item)
                        <li>
                            <a href="{{ route('berita.show', encrypt($item->id)) }}" class="hover:text-blue-600">
                                {{ \Illuminate\Support\Str::limit($item->judul, 60) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div> --}}


 @php
                         $beritapopuler = \App\Models\Berita::orderBy('dilihat', 'desc')
                    ->skip(1)
                    ->take(3)
                    ->get();
                    @endphp
                    <div class="bg-white shadow rounded-lg p-4 mt-[75px] border-b-4 border-red-700">
                <h4 class="font-semibold mb-3">Popular News</h4>
                <ul class="space-y-3 text-sm text-gray-700">
                    @foreach($beritapopuler as $pop)
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
             <div class="bg-white shadow rounded-lg p-4 mt-[75px] border-b-4 border-red-700">
                <h4 class="font-semibold mb-3">Instagram</h4>
                <ul class="space-y-3 text-sm text-gray-700">
                    
<blockquote class="instagram-media" 
    data-instgrm-permalink="https://www.instagram.com/sadikin_rsud?igsh=bm1wZmlvdHFqaW56" 
    data-instgrm-version="14" 
    style="background:#FFF; border:0; margin:1px; max-width:540px; width:100%;">
</blockquote>
<script async src="//www.instagram.com/embed.js"></script>

                </ul>
            </div>
             
            {{-- <div class="bg-white shadow rounded-lg p-4">
                <h4 class="font-semibold mb-3">Berita Terbaru </h4>
                <ul class="space-y-2 text-sm text-gray-700">
                    @php
                         $beritaterbaru = \App\Models\Berita::orderBy('tgl_publish', 'desc')
                    ->skip(1)
                    ->take(5)
                    ->get();
                    @endphp
                    @foreach($beritaterbaru as $item)
                        <li>
                            <a href="{{ route('berita.show', encrypt($item->id)) }}" class="hover:text-blue-600">
                                {{ \Illuminate\Support\Str::limit($item->judul, 60) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div> --}}
@php
                         $beritaterbaru = \App\Models\Berita::orderBy('tgl_publish', 'desc')
                    ->skip(1)
                    ->take(5)
                    ->get();
                    @endphp
            <div class="bg-white shadow rounded-lg p-4 border-b-4 border-red-700">
                <h4 class="font-semibold mb-3">Berita Terbaru</h4>
                <ul class="space-y-3 text-sm text-gray-700">
                    @foreach($beritaterbaru as $terbaru)
                        <li class="flex space-x-3">
                            <img src="{{ asset('img_berita/'.$terbaru->img) }}" 
                                 class="w-16 h-12 object-cover rounded">
                            <div>
                                <a href="{{ route('berita.show', encrypt($terbaru->id)) }}" class="hover:text-blue-600 font-medium">
                                    {{ \Illuminate\Support\Str::limit($terbaru->judul, 50) }}
                                </a>
                                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($terbaru->tgl_publish)->format('M d, Y') }}</p>
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
        </div>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
   function handleResize() {
    const div = document.getElementById("targetDiv");

    if (window.innerWidth < 740) {
      if (div) {
        div.remove(); 
      }
    }
  }

  handleResize();

  window.addEventListener("resize", handleResize);



    var swiper = new Swiper(".mySwiperber", {
    loop: true,
    autoplay: {
      delay: 3000, // 3 detik
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
@include('navbar.footer')
