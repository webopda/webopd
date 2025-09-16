@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="bg-gray-50 p-6 border-r border-gray-200">
                    <div class="bg-blue-600 text-white text-center py-3 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold">Moto</h2>
                    </div>
                    @foreach($data_moto as $item)
                        <p class="text-gray-700 leading-relaxed text-justify">
                            {!! nl2br(e($item->moto)) !!}
                        </p>
                    @endforeach
                </div>
                <div class="p-6">
                    <div class="bg-blue-600 text-white text-center py-3 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold">Visi</h2>
                    </div>
                    @foreach($data_visi as $item)
                        <p class="text-gray-700 leading-relaxed text-justify mb-4">
                            {!! nl2br(e($item->visi)) !!}
                        </p>
                    @endforeach

                    <div class="bg-blue-600 text-white text-center py-3 rounded-lg mt-6 mb-4">
                        <h2 class="text-xl font-semibold">Misi</h2>
                    </div>

                    <ul class="list-disc list-outside pl-6 text-gray-700 leading-relaxed text-justify space-y-2">
                        @foreach($data_misi as $item)
                            <li>{!! nl2br(e($item->misi)) !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
