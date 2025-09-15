@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Dokter</h4>
            <form class="forms-sample" action="{{ route('dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $dokter->nama) }}">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option  value="Perempuan" {{ $dokter->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        <option value="Laki-Laki" {{ $dokter->jk == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>                         
                    </select>
                @error('jk')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
             <div class="form-group">
                <label for="detail_jabatan">Detail Jabatan</label>
                <input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" value="{{ old('detail_jabatan', $dokter->detail_jabatan) }}">
            </div>  
            <div class="form-group">
                <label for="poli">Poliklinik</label>
                <select name="poli_id" id="poli_id" class="form-control" required>
                    <option value="" disabled>Pilih Polliklinik</option>
                    @foreach($poli as $pl)
                        <option value="{{ $pl->id }}" 
                            {{ old('poli', $dokter->poli_id) == $pl->id ? 'selected' : '' }}>
                            {{ $pl->nama_poli }}
                        </option>
                    @endforeach
                </select>
                @error('poli')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto Profil</label>
                <input type="file" name="img" class="file-upload-default" id="img">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($dokter->img) 
                    <div class="mt-2">
                        <img src="{{ asset('img_dokter/'.$dokter->img) }}" alt="Foto Dokter" width="150" class="img-thumbnail">
                    </div>
                @endif
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
            $('#img').trigger('click');
        });
        $('#img').on('change', function() {
            var fileName1 = $(this).val().split('\\').pop();
            $('.file-upload-info').val(fileName1);
        });
    });
</script>
@endpush



