<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Rumah Sakit Sadikin</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <link rel="icon" type="image/x-png" href="{{ asset('logo.png') }}">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.2.0/dist/web/pusher.min.js"></script>
  <script src="{{ mix('js/app.js') }}" defer></script>
  <style>
    .stat-card {
      @apply bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center transition hover:shadow-xl;
    }
  </style>
  <style>
  /* Loader full screen */
  #loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  /* Rubik cube style */
  .rubik {
    width: 50px;
    height: 50px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 2px;
    animation: rotateRubik 1.5s linear infinite;
  }

  .rubik div {
    width: 100%;
    height: 100%;
    background-color: #ff3d00; 
  }

  .rubik div:nth-child(2) { background-color: #0d47a1; } 
  .rubik div:nth-child(3) { background-color: #ffea00; } 
  .rubik div:nth-child(4) { background-color: #00c853; } 

  @keyframes rotateRubik {
    0% { transform: rotateX(0deg) rotateY(0deg); }
    25% { transform: rotateX(180deg) rotateY(0deg); }
    50% { transform: rotateX(180deg) rotateY(180deg); }
    75% { transform: rotateX(0deg) rotateY(180deg); }
    100% { transform: rotateX(0deg) rotateY(0deg); }
  }
</style>
</head>
<body class="bg-gray-100">

  <div id="loader">
  <div class="rubik">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<nav id="navbar" class="fixed top-0 left-0 w-full z-20 transition-all duration-500 bg-transparent backdrop-blur">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <!-- Logo -->
      <img src="{{ asset('logo.png') }}" width="100px" height="100px">

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-6 items-center">
        <!-- Beranda -->
        <a href="{{ url('/') }}" class="nav-link flex items-center gap-2 dropdown-btn">
          Beranda
        </a>

        <!-- Loop Navbar -->
        @foreach($navbars as $navbar)
          {{-- tampilkan hanya jika punya url atau punya submenu --}}
          @if($navbar->url || $navbar->submenus->count() > 0)
            @if($navbar->submenus->count() > 0)
              <!-- Navbar dengan submenu -->
              <div class="relative group">
                <button class="nav-link flex items-center gap-2 dropdown-btn">
                  {{ $navbar->menu }} ▼
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg w-56 dropdown-menu">
                  @foreach($navbar->submenus as $submenu)
                    @if($submenu->is_dynamic == 0)
                      <a href="{{ route($submenu->url) }}" 
                         class="dropdown-link flex hover:bg-blue-500 border-b-2 px-2 py-3 hover:text-white">
                        {{ $submenu->submenu }}
                      </a>
                    @else
                      <a href="{{ url($submenu->slug) }}" 
                         class="dropdown-link flex hover:bg-blue-500 border-b-2 px-2 py-3 hover:text-white">
                        {{ $submenu->submenu }}
                      </a>
                    @endif
                  @endforeach
                </div>
              </div>
            @else
              <!-- Navbar tanpa submenu tapi punya URL -->
              @if($navbar->is_dynamic == 0)
                <a href="{{ route($navbar->url) }}" class="nav-link flex items-center gap-2 dropdown-btn">
                  {{ $navbar->menu }}
                </a>
              @else
                <a href="{{ url($navbar->url) }}" class="nav-link flex items-center gap-2 dropdown-btn">
                  {{ $navbar->menu }}
                </a>
              @endif
            @endif
          @endif
        @endforeach
      </div>

      <!-- Mobile Button -->
      <button id="burger" class="md:hidden text-black text-2xl">☰</button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-white px-4 py-3 space-y-2 shadow">
    <a href="{{ url('/') }}" class="block py-2">🏠 Beranda</a>

    @foreach($navbars as $navbar)
      {{-- tampilkan hanya jika punya url atau punya submenu --}}
      @if($navbar->url || $navbar->submenus->count() > 0)
        @if($navbar->submenus->count() > 0)
          <details>
            <summary class="py-2 cursor-pointer">{{ $navbar->menu }}</summary>
            <div class="pl-4 space-y-1">
              @foreach($navbar->submenus as $submenu)
                @if($submenu->is_dynamic == 0)
                  <a href="{{ route($submenu->url) }}" class="block py-1"> {{ $submenu->submenu }} </a>
                @else
                  <a href="{{ url($submenu->slug) }}" class="block py-1"> {{ $submenu->submenu }} </a>
                @endif
              @endforeach
            </div>
          </details>
        @else
          <!-- Navbar tanpa submenu tapi punya URL -->
          @if($navbar->is_dynamic == 0)
            <a href="{{ route($navbar->url) }}" class="block py-2"> {{ $navbar->menu }} </a>
          @else
            <a href="{{ url($navbar->url) }}" class="block py-2"> {{ $navbar->menu }} </a>
          @endif
        @endif
      @endif
    @endforeach
  </div>
</nav>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
//dowpdown sub menu

 document.querySelectorAll('.dropdown-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation(); // cegah close otomatis
      const menu = btn.nextElementSibling;
      
      // Tutup semua dulu
      document.querySelectorAll('.dropdown-menu').forEach(m => {
        if (m !== menu) m.classList.add('hidden');
      });

      // Toggle menu
      menu.classList.toggle('hidden');
    });
  });

  // Klik di luar -> tutup dropdown
  document.addEventListener('click', () => {
    document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
  });
// end sub menu
   const burger = document.getElementById('burger');
  const mobileMenu = document.getElementById('mobile-menu');
  const navbar = document.getElementById('navbar');
  const navLinks = document.querySelectorAll('.nav-link');

  // Toggle burger menu + icon
  burger.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');

    if (mobileMenu.classList.contains('hidden')) {
      burger.textContent = '☰'; // icon burger
    } else {
      burger.textContent = '✖'; // icon close
    }
  });

  // Scroll effect
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.remove('bg-transparent');
      navbar.classList.add('bg-white', 'shadow');
      navLinks.forEach(link => {
        link.classList.remove('text-white');
        link.classList.add('text-gray-800', 'hover:text-blue-600');
      });
    } else {
      navbar.classList.add('bg-transparent');
      navbar.classList.remove('bg-white', 'shadow');
      navLinks.forEach(link => {
        link.classList.add('text-grey-100');
        link.classList.remove('text-gray-800', 'hover:text-blue-600');
      });
    }
  });
   window.addEventListener('load', () => {
    document.getElementById('loader').style.display = 'none';
    document.getElementById('content').style.display = 'block';
  });
</script>
{{-- 
<a href="https://wa.me/6281234567890" target="_blank"
   class="fixed bottom-5 z-10 right-5 w-14 h-14 rounded-full bg-green-500 flex items-center justify-center shadow-lg animate-bounce hover:scale-110 transform transition">
    <img src="{{ asset('whatsapp.png') }}" alt="WhatsApp" class="w-8 h-8">
</a> --}}
