@include('navbar.navbar')
<div id="content" style="display:none;">
  <section class="relative w-full h-screen overflow-hidden rellax" data-rellax-speed="-2">
    <div class="swiper h-full">
      <div class="swiper-wrapper">
       
        @foreach ($slider as $slider_depan )
          
        <div class="swiper-slide relative">
          <img src="{{ asset('slider/gambar') .'/'. $slider_depan->foto }}" class="w-full h-full object-cover" alt="">
          <div class="absolute inset-0 bg-black/40"></div>
<div class="absolute inset-0 flex items-end justify-start px-10 pb-16">
            <marquee behavior="" direction=""><p class="text-2xl md:text-2xl font-bold text-white">{{ $slider_depan->judul }}</p></marquee>
          </div>
        </div>
                @endforeach

      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </section>


{{-- statistik  --}}

<div class="max-w-6xl mx-auto px-4 items-center justify-center flex mt-10 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-5"></h2>
 <lottie-player 
          src="{{asset('lottie/statistik.json')}}" 
          background="transparent" 
          speed="1" 
          style="width: 400px; height: 400px;" 
          loop 
          autoplay>
        </lottie-player>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

      <!-- Dokter -->
      <div class="stat-card">
        <div class="text-blue-600 text-4xl mb-2">🩺</div>
        <h3 class="text-xl font-semibold text-gray-700">Dokter</h3>
        <p class="text-3xl font-bold text-blue-700 mt-2 counter" data-target="{{ $jumlah_dokter }}">{{ $jumlah_dokter }}</p>
      </div>
      <!-- Perawat -->
      <div class="stat-card">
        <div class="text-green-600 text-4xl mb-2">👩‍⚕️</div>
        <h3 class="text-xl font-semibold text-gray-700">Perawat</h3>
        <p class="text-3xl font-bold text-green-700 mt-2 counter" data-target="{{ $jumlah_kesehatan }}">{{ $jumlah_kesehatan }}</p>
      </div>

      <!-- Bidan -->
      <div class="stat-card">
        <div class="text-pink-600 text-4xl mb-2">🤱</div>
        <h3 class="text-xl font-semibold text-gray-700">Bidan</h3>
        <p class="text-3xl font-bold text-pink-700 mt-2 counter" data-target="{{ $jumlah_penunjang }}">{{ $jumlah_penunjang }}</p>
      </div>

      <!-- Adm / Umum -->
      <div class="stat-card">
        <div class="text-yellow-600 text-4xl mb-2">🧑‍💼</div>
        <h3 class="text-xl font-semibold text-gray-700">Adm / Umum</h3>
        <p class="text-3xl font-bold text-yellow-700 mt-2 counter" data-target="{{ $jumlah_adm }}">{{ $jumlah_adm }}</p>
      </div>

    </div>
  </div>
{{-- end statistik --}}



{{-- <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-indigo-100 p-6">
    <div class="bg-white shadow-2xl rounded-2xl p-6 max-w-4xl w-full">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">
            📢 Informasi Terbaru dari Facebook
        </h2>

        <div class="flex justify-center">
            <div class="w-full md:w-[500px] lg:w-[600px]">
               <iframe 
  src="https://www.facebook.com/plugins/page.php?
       href=https%3A%2F%2Fwww.facebook.com%2Fkominfopariamankota
       &tabs=timeline&width=500&height=600&small_header=false
       &adapt_container_width=true&hide_cover=false&show_facepile=true" 
  width="500" 
  height="600" 
  style="border:none;overflow:hidden" 
  scrolling="no" 
  frameborder="0" 
  allowfullscreen="true" 
  allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
</iframe>

            </div>
        </div>
    </div>
</div> --}}


{{-- voting --}}
<div class="min-h-screen bg-gradient-to-r from-blue-50 to-indigo-100 flex items-center justify-center p-8">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-10">
        
        {{-- Bagian Ilustrasi --}}
        <div class="flex flex-col items-center justify-center text-center">
 <lottie-player 
          src="{{asset('vot.json')}}" 
          background="transparent" 
          speed="1" 
          style="width: 400px; height: 400px;" 
          loop 
          autoplay>
        </lottie-player>             <h2 class="text-2xl font-bold text-gray-800">Online Voting System</h2>
              @if(session()->has('login_google'))
            <p class="text-gray-500 mt-2">Berikan pendapat Anda untuk meningkatkan pelayanan rumah sakit.</p>
                         
@else
            <a href="{{ url('auth/google') }}" class="flex  rounded-lg bg-blue-600 text-white hover:bg-blue-900"><img src="{{ asset('google.png') }}" alt="" width="50px" height="20px"><span class="px-2 border-l-4 border-gray-300"></span><span class="px-2 py-3"> Login Dengan Akun Google</span></a>
        @endif
          </div>
 @php
              $cek_voting=DB::table('votings')->where('email',Session::get('login_google.email'))->first();
            @endphp

        {{-- Bagian Voting Form --}}
        <div class="flex flex-col justify-center">
                      @if($cek_voting)
@else
            <h3 class="text-xl font-semibold text-gray-700 mb-6">🏥 Bagaimana pelayanan kami?</h3>
            @endif

            {{-- Alert --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-center animate-pulse">
                    {{ session('success') }}
                </div>
            @endif 
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-center animate-pulse">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form Voting --}}
           
            @if($cek_voting)
                       <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
  <p class="font-bold">Hai</p>
  <p class="text-sm">Terima Kasih Sudah melakukan Voting</p>
</div>
            @else
            <form action="{{ route('voting.store') }}" method="POST" class="space-y-4">
                @csrf
                <button type="submit" name="pilihan" value="puas" 
                    class="flex items-center gap-3 w-full py-3 px-4 rounded-xl text-lg font-semibold 
                           bg-green-500 text-white shadow-lg transform transition duration-200 hover:scale-105 hover:bg-green-600">
                    <span class="text-2xl">😊</span> Puas

                </button>

                <button type="submit" name="pilihan" value="cukup" 
                    class="flex items-center gap-3 w-full py-3 px-4 rounded-xl text-lg font-semibold 
                           bg-yellow-500 text-white shadow-lg transform transition duration-200 hover:scale-105 hover:bg-yellow-600">
                    <span class="text-2xl">😐</span> Cukup
                    
                </button>

                <button type="submit" name="pilihan" value="tidak_puas" 
                    class="flex items-center gap-3 w-full py-3 px-4 rounded-xl text-lg font-semibold 
                           bg-red-500 text-white shadow-lg transform transition duration-200 hover:scale-105 hover:bg-red-600">
                    <span class="text-2xl">☹️</span> Tidak Puas
                </button>
            </form>
@endif
            {{-- Step Info seperti di gambar --}}
            <div class="mt-8 space-y-4">
                <div class="flex items-start gap-3">
                    <span class="bg-blue-500 text-white font-bold w-8 h-8 flex items-center justify-center rounded-full">{{$puas}}</span>
                    <p><span class="font-semibold">Puas</span><br><span class="text-gray-500 text-sm"></span></p>
                </div>
                <div class="flex items-start gap-3">
                    <span class="bg-green-500 text-white font-bold w-8 h-8 flex items-center justify-center rounded-full">{{$cukup}}</span>
                    <p><span class="font-semibold">Cukup</span><br><span class="text-gray-500 text-sm"></span></p>
                </div>
                <div class="flex items-start gap-3">
                    <span class="bg-red-500 text-white font-bold w-8 h-8 flex items-center justify-center rounded-full">{{$tidak_puas}}</span>
                    <p><span class="font-semibold">Tidak Puas</span><br><span class="text-gray-500 text-sm"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- end voting --}}

{{-- fasilitas layanan --}}
<div class="flex items-center justify-center min-h-screen bg-white ml-3 mr-3 mt-10">
  <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-6">
    
    <!-- Kolom Kiri: Lottie -->
    <div class="bg-white rounded-xl shadow-lg border-2 border-white flex items-center justify-center h-72">
 <lottie-player 
          src="{{asset('lottie/ugd.json')}}" 
          background="transparent" 
          speed="1" 
          style="width: 400px; height: 400px;" 
          loop 
          autoplay>
        </lottie-player>    </div>

    <!-- Kolom Kanan -->
    <div class="grid grid-cols-2 gap-6">
      
      <!-- UGD -->
      <a href="{{ url('landing/ugd') }}">
      <div class="bg-white rounded-xl shadow-lg border-2 border-orange-400 flex flex-col items-center justify-center h-28">
        <div class="text-3xl mb-2">🏥</div>
        <h2 class="text-lg font-semibold">UGD</h2>
      </div></a>

      <!-- Rawat Jalan -->
            <a href="{{ url('landing/rawatjalan') }}">

      <div class="bg-white rounded-xl shadow-lg border-2 border-orange-400 flex flex-col items-center justify-center h-28">
        <div class="text-3xl mb-2">💉</div>
        <h2 class="text-lg font-semibold">Rawat Jalan</h2>
      </div></a>

      <!-- Rawat Inap (Full width) -->
                  <a href="{{ url('landing/rawatinap') }}">

      <div class="col-span-2 bg-white rounded-xl shadow-lg border-2 border-orange-400 flex flex-col items-center justify-center h-32">
        <div class="text-3xl mb-2">🛏️</div>
        <h2 class="text-lg font-semibold">Rawat Inap</h2>
      </div></a>
      
    </div>
  </div>
</div>
{{-- berita --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 px-10 mb-5 bg-white rounded-lg">
    <!-- Slider / Berita Utama -->
           <h1 class=" items-center text-center text-3xl justify-center mt-3">
              <lottie-player 
          src="{{asset('news.json')}}" 
          background="transparent" 
          speed="1" 
          class="w-96 h-96"
          loop 
          autoplay>
        </lottie-player>
           </h1>

    <div class="relative px-3 py-3">

    <div class="swiper mySwiperber w-full h-72 rounded-xl shadow-lg overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($berita->take(5) as $item)
                <div class="swiper-slide relative">
                  <a href="{{ route('beritalanding.show',encrypt($item->id)) }}">
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

</div>
    <!-- 3 Card Berita Terbaru -->
    <div class="grid grid-cols-1 sm:grid-cols-5 gap-4  justify-end px-5">
      @php
        $berita = \App\Models\Berita::orderBy('dilihat', 'desc')
            ->skip(1)
            ->take(5)
            ->get();

      @endphp
        @foreach($berita as $item)
                                  <a href="{{ route('beritalanding.show',encrypt($item->id)) }}">

            <div class="relative rounded-xl overflow-hidden shadow-lg group justify-end">
                <img src="{{ asset('img_berita/'.$item->img) }}" 
                     alt="{{ $item->judul }}" 
                     class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 p-3 text-white">
                    <span class="bg-red-500 text-xs px-2 py-1 rounded">NEWS</span>
                    <h3 class="mt-2 text-sm font-semibold leading-tight">{{ $item->judul }}</h3>
                    <p class="text-xs">{{ \Carbon\Carbon::parse($item->tgl_publish)->format('M d, Y') }}</p>
                </div>
            </div>
                                  </a>
        @endforeach
</div>



{{-- end berita --}}
{{-- end fasilitas --}}
  <section class="bg-white py-16 px-6 md:px-20">
  <div class="grid md:grid-cols-2 gap-12 items-center">
    <div>
      <span class="text-teal-600 font-semibold text-sm uppercase tracking-wide">
        Tentang Kami
      </span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 leading-snug">
        Komitmen Kami Memberikan <br />
        Pelayanan Kesehatan Berkualitas untuk Anda
      </h2>
      <p class="text-gray-600 mt-4 leading-relaxed">
        Kami percaya bahwa kesehatan adalah prioritas utama. 
        Dengan tim medis berpengalaman dan fasilitas terbaik, 
        kami siap mendampingi Anda menjaga kesehatan melalui pemeriksaan rutin, 
        vaksinasi, hingga konsultasi khusus sesuai kebutuhan Anda.
      </p>

      {{-- <div class="flex flex-col sm:flex-row gap-4 mt-6">
        <a href="#" 
           class="flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-xl shadow hover:bg-teal-700 transition">
          📞 Hubungi Kami
        </a>
        <a href="#" 
           class="flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition">
          📅 Buat Janji
        </a>
      </div> --}}
    </div>

    <div class="relative flex justify-center">
      <div class="relative w-72 h-72">
        <img 
          src="https://images.unsplash.com/photo-1504813184591-01572f98c85f?q=80&w=871&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
          alt="Tentang Kami"
          class="absolute inset-0 w-full h-full object-cover 
                 [clip-path:polygon(20%_0,100%_0,80%_100%,0%_100%)] rounded-3xl shadow-lg" />
      </div>
    </div>
  </div>
</section>

<div class="max-w-5xl mx-auto my-10 p-6">
  <div class="grid md:grid-cols-2 gap-6 items-center bg-white shadow-lg rounded-2xl overflow-hidden">
    
    <!-- Gambar Visi Misi -->
    <div class="h-full">
      <lottie-player 
          src="{{asset('misi.json')}}" 
          background="transparent" 
          speed="1" 
          class="w-full"
          loop 
          autoplay>
        </lottie-player>
    </div>

    <!-- Konten Visi, Misi & Motto -->
    <div class="p-6 space-y-6">
      
      <!-- Judul -->
      <h2 class="text-3xl font-bold text-gray-800">Visi & Misi</h2>

      <!-- Visi -->
      <div>
        <h3 class="text-xl font-semibold text-blue-600">Visi</h3>
        @foreach ($visi as $visis )
          <p class="text-gray-600 mt-2">
          {{ $visis->visi }}
        </p> 
        @endforeach
       
      </div>

      <!-- Misi -->
      <div>
        <h3 class="text-xl font-semibold text-green-600">Misi</h3>
        <ul class="list-disc list-inside text-gray-600 mt-2 space-y-1">
          @foreach ($misi as $misis )
                      <li>{{$misis->misi}}</li>
          @endforeach
        </ul>
      </div>

      <!-- Motto -->
      <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white text-center py-4 px-6 rounded-lg shadow-md">
        @foreach ($moto as $mot )
                  <p class="text-lg font-semibold italic tracking-wide">"{{ $mot->moto }}"</p>

        @endforeach
      </div>

    </div>

  </div>
</div>



{{-- struktur oraganisi --}}
 {{-- <div class="max-w-6xl mx-auto my-4">
    <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Struktur Organisasi</h1>

    <!-- Card Organisasi -->
    <div class="grid gap-8">
      <!-- Ulangi blok ini untuk setiap anggota organisasi -->
      <div class="flex flex-col md:flex-row items-center bg-white shadow-lg rounded-xl overflow-hidden">
        
        <!-- Keterangan -->
        <div class="p-6 flex-1">
          <h2 class="text-2xl font-semibold text-gray-800 mb-2">Struktur Organisasi</h2>
          <p class="text-gray-500 text-sm">Keterangan dari organisasi</p>
        </div>

        <!-- Gambar -->
        <div class="w-full md:w-60 h-60 overflow-hidden">
          <img src="https://via.placeholder.com/300x300" alt="Foto Anggota" class="object-cover w-full h-full">
        </div>
      </div>


    </div>
  </div> --}}

</div>

{{-- endstruktur --}}

@include('navbar.footer')


  <!-- Swiper JS untuk akses  -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    // Swiper init untuk menjalankan swiper header gambar slider
    const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    // Toggle mobile menu sewaktu memamkai hp
    // document.getElementById("mobile-btn").addEventListener("click", function() {
    //   document.getElementById("mobile-menu").classList.toggle("hidden");
    // });

    // // Navbar scroll effect ketika di scroll otoamtis warna navbar beruba
    // window.addEventListener("scroll", function() {
    //   const nav = document.getElementById("navbar");
    //   if (window.scrollY > 50) {
    //     nav.classList.remove("bg-transparent");
    //     nav.classList.add("bg-white", "shadow-lg");
    //     nav.querySelectorAll("a, button, div.font-bold").forEach(el => {
    //       el.classList.remove("text-white");
    //       el.classList.add("text-gray-800");
    //     });
    //   } else {
    //     nav.classList.remove("bg-white", "shadow-lg");
    //     nav.classList.add("bg-transparent");
    //     nav.querySelectorAll("a, button, div.font-bold").forEach(el => {
    //       el.classList.remove("text-gray-800");
    //       el.classList.add("text-white");
    //     });
    //   }
    // });
  </script>
<script>
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
      counter.innerText = '0';
      const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = Math.ceil(target / 50);

        if (count < target) {
          counter.innerText = count + increment;
          setTimeout(updateCounter, 50);
        } else {
          counter.innerText = target;
        }
      };
      updateCounter();
    });



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
</body>
</html>
