@include('navbar.navbar')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden p-6">
            <div class="bg-blue-600 text-white text-center py-4 rounded-lg mb-6">
                <h2 class="text-2xl font-semibold">Unit Gawat Darurat</h2>
            </div>
            <div class="swiper mySwiper mb-8">
                <div class="swiper-wrapper">
                  @foreach($data_ugd as $item)
                      @php
                          $path = asset('img_ugd/' . $item->foto);
                          $ext = strtolower(pathinfo($item->foto, PATHINFO_EXTENSION));
                          $videoExt = ['mp4','webm','ogg','avi','mov','wmv'];
                          $imgExt = ['jpg','jpeg','png','gif','svg','bmp','webp'];
                      @endphp

                      <div class="swiper-slide flex justify-center">
                          @if(in_array($ext, $videoExt))
                              <video class="rounded-xl shadow-md max-h-96 object-cover" controls>
                                  <source src="{{ $path }}" type="video/{{ $ext }}">
                                  Browser Anda tidak mendukung tag video.
                              </video>
                          @elseif(in_array($ext, $imgExt))
                              <img src="{{ $path }}" 
                                  alt="UGD Media" 
                                  class="rounded-xl shadow-md max-h-96 object-cover">
                          @else
                              <p class="text-red-500">Format file tidak didukung</p>
                          @endif
                      </div>
                  @endforeach
              </div>

                <div class="swiper-pagination mt-4"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($data_ugd as $item)
                    <div>
                        <div class="prose max-w-none">
                            {!! $item->detail_pelayanan !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    centeredSlides: true,
    slidesPerView: 3,
    spaceBetween: 20,
    autoplay: {
      delay: 3000,
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
    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 3 },
    }
  });
</script>

@include('navbar.footer')
