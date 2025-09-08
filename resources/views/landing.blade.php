@include('navbar.navbar')
  <!-- HERO SWIPER untuk membuat gambar jadi slider -->
  <section class="relative w-full h-screen overflow-hidden">
    <div class="swiper h-full">
      <div class="swiper-wrapper">
        <!-- Slide 1 bagian  -->
        <div class="swiper-slide relative">
          <img src="https://picsum.photos/id/1015/1600/900" class="w-full h-full object-cover" alt="">
          <div class="absolute inset-0 bg-black/40"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white">Selamat Datang di Rumah Sakit Sadikin</h1>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide relative">
          <img src="https://picsum.photos/id/1005/1600/900" class="w-full h-full object-cover" alt="">
          <div class="absolute inset-0 bg-black/40"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white">Data Gizi Lebih Mudah</h1>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide relative">
          <img src="https://picsum.photos/id/1025/1600/900" class="w-full h-full object-cover" alt="">
          <div class="absolute inset-0 bg-black/40"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white">Laporan Cepat & Akurat</h1>
          </div>
        </div>
      </div>

      <!-- Swiper Pagination & Navigation -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="bg-white py-16 px-6 md:px-20">
  <div class="grid md:grid-cols-2 gap-12 items-center">
    <!-- Kiri -->
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

      <!-- Tombol -->
      <div class="flex flex-col sm:flex-row gap-4 mt-6">
        <a href="#" 
           class="flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-xl shadow hover:bg-teal-700 transition">
          📞 Hubungi Kami
        </a>
        <a href="#" 
           class="flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition">
          📅 Buat Janji
        </a>
      </div>
    </div>

    <!-- Kanan -->
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
    <!-- Gambar -->
    <div class="h-full">
      <img src="https://www.stieykpn.ac.id/cni-content/uploads/modules/pages/20180115100741.jpg" 
           alt="Visi Misi" 
           class="w-full h-full object-cover">
    </div>
    
    <!-- Konten -->
    <div class="p-6">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
      
      <div class="mb-6">
        <h3 class="text-xl font-semibold text-blue-600">Visi</h3>
        <p class="text-gray-600 mt-2">
          Menjadi rumah sakit terdepan dengan pelayanan kesehatan yang profesional, modern, dan berlandaskan nilai kemanusiaan.
        </p>
      </div>
      
      <div>
        <h3 class="text-xl font-semibold text-green-600">Misi</h3>
        <ul class="list-disc list-inside text-gray-600 mt-2 space-y-1">
          <li>Memberikan pelayanan kesehatan yang cepat, tepat, dan ramah.</li>
          <li>Meningkatkan kualitas SDM melalui pelatihan berkelanjutan.</li>
          <li>Mengutamakan keselamatan pasien dalam setiap tindakan medis.</li>
          <li>Mengembangkan teknologi kesehatan yang modern.</li>
        </ul>
      </div>
    </div>
  </div>
</div>


{{-- struktur oraganisi --}}
 <div class="max-w-6xl mx-auto my-4">
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
  </div>



{{-- endstruktur --}}

<footer class="bg-gradient-to-r from-blue-700 to-blue-900 text-white">
  <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-4 gap-8">
    
    <!-- Logo & Deskripsi -->
    <div>
      <h2 class="text-2xl font-bold mb-3">RSUD Sadikin</h2>
      <p class="text-sm text-gray-200">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127667.3149962615!2d99.9854718433594!3d-0.594437299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4e27ee01cde39%3A0x16c42211261ad57f!2sRSUD%20Dr.%20Sadikin%20Kota%20Pariaman!5e0!3m2!1sid!2sid!4v1756694720826!5m2!1sid!2sid" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>      </p>
    </div>
    
    <!-- Navigasi -->
    <div>
      <h3 class="font-semibold text-lg mb-3">Navigasi</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:text-yellow-400">Tentang Kami</a></li>
        <li><a href="#" class="hover:text-yellow-400">Layanan</a></li>
        <li><a href="#" class="hover:text-yellow-400">Dokter</a></li>
        <li><a href="#" class="hover:text-yellow-400">Berita</a></li>
      </ul>
    </div>
    
    <!-- Kontak -->
    <div>
      <h3 class="font-semibold text-lg mb-3">Kontak</h3>
      <ul class="space-y-2 text-sm">
        <li>📍 Jl. sdfdsf No. 123, Kota Sehat</li>
        <li>📞 (021) 1234-5678</li>
        <li>✉️ info@rsudsadikin.go.id</li>
      </ul>
    </div>
    
    <!-- Sosial Media  ganti jika ada yang cocok -->
    <div>
      <h3 class="font-semibold text-lg mb-3">Ikuti Kami</h3>
      <div class="flex space-x-4">
        <a href="#" class="hover:text-yellow-400">🌐</a>
        <a href="#" class="hover:text-yellow-400">📘</a>
        <a href="#" class="hover:text-yellow-400">📷</a>
        <a href="#" class="hover:text-yellow-400">🐦</a>
      </div>
    </div>
  </div>

  <!-- Copyright  untuk pembuat-->
  <div class="border-t border-gray-600 text-center py-4 text-sm text-gray-300">
    © 2025 Diskominfo Kota Pariaman. Semua Hak Dilindungi.
  </div>
</footer>


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
    document.getElementById("mobile-btn").addEventListener("click", function() {
      document.getElementById("mobile-menu").classList.toggle("hidden");
    });

    // Navbar scroll effect ketika di scroll otoamtis warna navbar beruba
    window.addEventListener("scroll", function() {
      const nav = document.getElementById("navbar");
      if (window.scrollY > 50) {
        nav.classList.remove("bg-transparent");
        nav.classList.add("bg-white", "shadow-lg");
        nav.querySelectorAll("a, button, div.font-bold").forEach(el => {
          el.classList.remove("text-white");
          el.classList.add("text-gray-800");
        });
      } else {
        nav.classList.remove("bg-white", "shadow-lg");
        nav.classList.add("bg-transparent");
        nav.querySelectorAll("a, button, div.font-bold").forEach(el => {
          el.classList.remove("text-gray-800");
          el.classList.add("text-white");
        });
      }
    });
  </script>

</body>
</html>
