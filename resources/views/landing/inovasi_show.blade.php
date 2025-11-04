@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden p-6">
            
            <h1 class="text-2xl font-bold mb-2">{{ $inovasi->judul }}</h1>
            <p class="text-sm text-gray-500 mb-4">{{ $inovasi->tgl_publish }} - by Sadikin Inovasi</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                @if($inovasi->img1)
                    <img src="{{ asset('img1_inovasi/'.$inovasi->img1) }}" class="rounded-lg shadow">
                @endif
                @if($inovasi->img2)
                    <img src="{{ asset('img2_inovasi/'.$inovasi->img2) }}" class="rounded-lg shadow">
                @endif
            </div>

            <div class="prose max-w-none mb-6">
                {!! ($inovasi->deskripsi) !!}
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">SOP</h3>
                @if($inovasi->sop)
                    <iframe src="{{ asset('file_sop_inovasi/'.$inovasi->sop) }}" class="w-full h-96 rounded-lg" frameborder="0"></iframe>
                @else
                    <p class="text-gray-500">Tidak ada file SOP</p>
                @endif
            </div>

            <div>
                <h3 class="font-semibold mb-2">Manual Book</h3>
                @if($inovasi->manual_book)
                    <iframe src="{{ asset('file_manual_book/'.$inovasi->manual_book) }}" class="w-full h-96 rounded-lg" frameborder="0"></iframe>
                @else
                    <p class="text-gray-500">Tidak ada file Manual Book</p>
                @endif
            </div>
             <div>
                <h3 class="font-semibold mb-2">Proposal</h3>
                @if($inovasi->proposal)
                    <iframe src="{{ asset('file_proposal_inovasi/'.$inovasi->proposal) }}" class="w-full h-96 rounded-lg" frameborder="0"></iframe>
                @else
                    <p class="text-gray-500">Tidak ada file Proposal</p>
                @endif
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
