@include('navbar.navbar')

<section class="bg-gray-100 py-10 mt-[100px]">
    <div class="container mx-auto px-6">
        <div class="bg-gradient-to-r from-blue-900 to-blue-600 text-white py-4 px-6 rounded-lg shadow-md mb-10">
            <h2 class="text-3xl font-bold tracking-wide">Sejarah</h2>
            <p class="text-sm opacity-80">Perjalanan dan perkembangan dari masa ke masa</p>
        </div>

        @foreach($data_sejarah as $item)
        <article class=" bg-white rounded-lg py-2 px-3">
                <img src="{{ asset('profil/gambar/' . $item->gambar) }}" 
                     alt="Sejarah {{ $item->id }}" 
                     class="mr-5 float-left h-[350px] object-cover rounded-lg shadow-lg">

            <div>
                <p class="text-gray-700 ">
                    {!! $item->sejarah !!}
                </p>
            </div>
        </article>

        
        @endforeach
    </div>
</section>



@include('navbar.footer')
