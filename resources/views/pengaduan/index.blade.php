@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pengaduan</h4>
                <div class="table-responsive">
                    <table class="table table-striped  ">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Tanggal Kunjungan</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Pesan</th>                                
                                <th class="text-center">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $isi_pengaduan )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$isi_pengaduan->nama}}</td>
                                    <td>{{$isi_pengaduan->nik}}</td>
                                    <td>{{$isi_pengaduan->tanggal_kunjungan}}</td>
                                    <td>{{$isi_pengaduan->email}}</td>
                                    <td>{{$isi_pengaduan->pesan}}</td>
                                    <td>@if($isi_pengaduan->balasan==NULL || $isi_pengaduan=='')
                                         <a class="btn btn-yellow" data-toggle="modal" style="cursor: pointer;"
                                        data-target="#edit-modal{{$isi_pengaduan->id}}">
                                        <img src="{{ asset('reply.png') }}" alt="" title="kirim email">
                                    </a>
                                
                                @else

                                <a class="btn btn-yellow" data-toggle="modal" style="cursor: pointer;"
                                        data-target="#detail-modal{{$isi_pengaduan->id}}">
                              <img src="{{ asset('correct.png') }}" alt="" title="email telah terkirim"></a>
          @endif
                            </td>
                                </tr>
                                @include('pengaduan.edit')
                                @include('pengaduan.detail')
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // cari semua textarea dengan id yang diawali 'editor-'
        document.querySelectorAll("textarea[id^='editor-']").forEach(function (textarea) {
            ClassicEditor
                .create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>


@endsection




