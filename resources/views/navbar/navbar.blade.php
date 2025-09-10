<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Rumah Sakit Sadikin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Swiper CSS untuk scroll  untuk mengambil librari menggunkan cdn-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <style>
    .stat-card {
      @apply bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center transition hover:shadow-xl;
    }
  </style>
</head>
<body class="bg-gray-100">
<nav id="navbar" class="fixed top-0 left-0 w-full z-20 transition-all duration-500 bg-transparent">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <!-- Logo -->
      <img src="{{ asset('logo.png') }}" width="100px" height="100px">

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-6 items-center">
        <a href="#" class="nav-link flex items-center gap-2 dropdown-btn">
          <i data-lucide="home"></i> Beranda
        </a>

        <!-- Profil -->
        <div class="relative group">
          <button class="nav-link flex items-center gap-2 dropdown-btn">
            <i data-lucide="user"></i> Profil ▼
          </button>
          <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg w-48 dropdown-menu">
            <a href="{{ route('landing.sejarah') }}" class="dropdown-link flex"><i data-lucide="book"></i> Sejarah</a>
            <a href="{{ route('landing.visi') }}" class="dropdown-link flex"><i data-lucide="target"></i> Visi Misi</a>
            <a href="{{ route('landing.struktur') }}" class="dropdown-link flex"><i data-lucide="users"></i> Struktur Organisasi</a>
          </div>
        </div>

        <!-- Layanan -->
        <div class="relative group">
          <button class="nav-link flex items-center gap-2 dropdown-btn">
            <i data-lucide="activity"></i> Layanan ▼
          </button>
          <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg w-48 dropdown-menu">
            <a href="{{ route('landing.ugd') }}" class="dropdown-link flex"><i data-lucide="ambulance"></i> UGD</a>
            <a href="{{ route('landing.rawatjalan') }}" class="dropdown-link flex"><i data-lucide="stethoscope"></i> Rawat Jalan</a>
            <a href="#" class="dropdown-link flex"><i data-lucide="bed"></i> Rawat Inap</a>
            <a href="{{ route('landing.penunjang') }}" class="dropdown-link flex"><i data-lucide="flask-conical"></i> Penunjang</a>
          </div>
        </div>

        <!-- Informasi Publik -->
        <div class="relative group">
          <button class="nav-link flex items-center gap-2 dropdown-btn">
            <i data-lucide="info"></i> Informasi Publik ▼
          </button>
          <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg w-56 dropdown-menu">
            <a href="{{ route('landing.berita') }}" class="dropdown-link flex"><i data-lucide="newspaper"></i> Berita</a>
            <a href="{{ route('landing.indmutu') }}" class="dropdown-link flex"><i data-lucide="bar-chart-2"></i> Indikator Mutu</a>
            <a href="{{ route('landing.standarp') }}" class="dropdown-link flex"><i data-lucide="clipboard-check"></i> Standar Pelayanan</a>
          </div>
        </div>

        <!-- SDM -->
        <div class="relative group">
          <button class="nav-link flex items-center gap-2 dropdown-btn">
            <i data-lucide="users"></i> SDM ▼
          </button>
          <div class="absolute hidden group-hover:block bg-white shadow-lg mt-2 rounded-lg w-56 dropdown-menu">
            <a href="{{ route('landing.pimpinan') }}" class="dropdown-link flex"><i data-lucide="crown"></i> Pimpinan</a>
            <a href="{{ route('landing.tenagamedis') }}" class="dropdown-link flex"><i data-lucide="user-plus"></i> Tenaga Medis</a>
            <a href="{{ route('landing.tenagakesehatan') }}" class="dropdown-link flex"><i data-lucide="heart-pulse"></i> Tenaga Kesehatan</a>
            <a href="{{ route('landing.tpk') }}" class="dropdown-link flex"><i data-lucide="activity-square"></i> Tenaga Penunjang Kesehatan</a>
            <a href="{{ route('landing.tau') }}" class="dropdown-link flex"><i data-lucide="file-cog"></i> Tenaga ADM/Umum</a>
          </div>
        </div>

        <a href="{{ route('landing.inovasi') }}" class="nav-link flex items-center gap-2 dropdown-btn"><i data-lucide="sparkles"></i> Inovasi</a>
        <a href="{{ route('landing.pengaduan') }}" class="nav-link flex items-center gap-2 dropdown-btn"><i data-lucide="message-circle"></i> Pengaduan</a>
      </div>

      <!-- Mobile Button -->
      <button id="burger" class="md:hidden text-white text-2xl">☰</button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-white px-4 py-3 space-y-2 shadow">
    <a href="#" class="block py-2">🏠 Beranda</a>

    <details>
      <summary class="py-2 cursor-pointer">👤 Profil</summary>
      <div class="pl-4 space-y-1">
        <a href="{{url('landing/sejarah')}}" class="block py-1">📖 Sejarah</a>
        <a href="#" class="block py-1">🎯 Visi Misi</a>
        <a href="#" class="block py-1">👥 Struktur Organisasi</a>
      </div>
    </details>

    <details>
      <summary class="py-2 cursor-pointer">🩺 Layanan</summary>
      <div class="pl-4 space-y-1">
        <a href="#" class="block py-1">🚑 UGD</a>
        <a href="#" class="block py-1">🩺 Rawat Jalan</a>
        <a href="#" class="block py-1">🛏️ Rawat Inap</a>
        <a href="#" class="block py-1">⚗️ Penunjang</a>
      </div>
    </details>

    <details>
      <summary class="py-2 cursor-pointer">ℹ️ Informasi Publik</summary>
      <div class="pl-4 space-y-1">
        <a href="#" class="block py-1">📰 Berita</a>
        <a href="#" class="block py-1">📊 Indikator Mutu</a>
        <a href="#" class="block py-1">✅ Standar Pelayanan</a>
      </div>
    </details>

    <details>
      <summary class="py-2 cursor-pointer">👥 SDM</summary>
      <div class="pl-4 space-y-1">
        <a href="#" class="block py-1">👑 Pimpinan</a>
        <a href="#" class="block py-1">➕ Tenaga Medis</a>
        <a href="#" class="block py-1">❤️‍🩹 Tenaga Kesehatan</a>
        <a href="#" class="block py-1">📋 Tenaga Penunjang Kesehatan</a>
        <a href="#" class="block py-1">📂 Tenaga ADM/Umum</a>
      </div>
    </details>

    <a href="#" class="block py-2">✨ Inovasi</a>
    <a href="#" class="block py-2">💬 Pengaduan</a>
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
        link.classList.add('text-white');
        link.classList.remove('text-gray-800', 'hover:text-blue-600');
      });
    }
  });
</script>
