@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden p-8">

            <div class="bg-blue-600 text-white text-center py-4 rounded-lg mb-8">
                <h2 class="text-2xl font-semibold">Layanan Rawat Inap</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($rawat_inap as $item)
                    <div class="p-6 bg-gray-50 rounded-xl shadow hover:shadow-lg transition block">
                        <button onclick="toggleDetail({{ $item->id }})" 
                            class="w-full focus:outline-none text-center">
                            <img src="{{ asset('icon_inap/'.$item->icon) }}" 
                                alt="{{ $item->nama }}" 
                                class="w-20 h-20 mx-auto mb-4 object-contain">
                            <h3 class="text-lg font-bold mb-2">{{ $item->nama }}</h3>
                        </button>
                        <div id="detail-{{ $item->id }}" class="hidden mt-6 text-left">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                                
                                <div>
                                    <p class="text-gray-700 text-justify">{!! ($item->keterangan) !!}</p>
                                </div>
                                <div class="relative">
                                    <div class="swiper mySwiper-{{ $item->id }}">
                                        <div class="swiper-wrapper">
                                            @foreach($item->images as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('detail_inap/'.$img) }}" 
                                                         class="rounded-lg shadow w-full h-64 object-cover">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@include('navbar.footer')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
function toggleDetail(id) {
    const detail = document.getElementById('detail-' + id);
    detail.classList.toggle('hidden');

    if (!detail.classList.contains('hidden')) {
        new Swiper(".mySwiper-" + id, {
            loop: true,
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        });
    }
}
</script>
