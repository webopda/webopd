@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Dokter</h4>
            <form class="forms-sample" action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
             <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Perempuan" >Perempuan</option>
                        <option value="Laki-Laki" >Laki-Laki</option>                         
                    </select>
                @error('jk')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail_jabatan">Detail Jabatan</label>
                <input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" placeholder="Contoh: Dr. Spesialis Paru">
            </div> 
            <div class="form-group">
                <label for="poli">Poliklinik</label>
                    <select name="poli_id" id="poli" class="form-control" required>
                        <option value="" disabled selected>Pilih Poliklinik</option> 
                        @foreach($poli as $pl)
                            <option value="{{$pl->id}}">{{$pl->nama_poli}}</option>
                        @endforeach
                    </select>
                @error('poli')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="img" class="file-upload-default" id="img" hidden>
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button" data-target="#img" data-input=".file-upload-info">Upload</button>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label>Image Jadwal</label>
                <input type="file" name="img_jadwal" class="file-upload-default" id="img_jadwal" hidden>
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info2" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button" data-target="#img_jadwal" data-input=".file-upload-info2">Upload</button>
                    </span>
                </div>
            </div>
            <div class="d-flex">
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol Cancel -->
                <a href="{{ route('dokter.index') }}" class="btn btn-light me-2">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.file-upload-browse').on('click', function() {
            var target = $(this).data('target');
            $(target).trigger('click');
        });

        $('input[type="file"]').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            var inputClass = $('button[data-target="#' + this.id + '"]').data('input');
            $(inputClass).val(fileName);
        });
    });
</script>
@endpush



