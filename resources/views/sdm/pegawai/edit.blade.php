@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Pegawai</h4>
            <form class="forms-sample" action="{{ route('pegawai.update', $pegawai->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ old('nama', $pegawai->nama) }}">
            </div>            
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option  value="Perempuan" {{ $pegawai->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        <option value="Laki-Laki" {{ $pegawai->jk == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>                         
                    </select>
                @error('jk')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control" required>
                        <option value="" disabled selected>Pilih Bagian</option>
                        <option value="Pimpinan" {{ $pegawai->jabatan == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                        <option value="Tenaga Medis" {{ $pegawai->jabatan == 'Tenaga Medis' ? 'selected' : '' }}>Tenaga Medis</option>    
                        <option value="Tenaga Kesehatan" {{ $pegawai->jabatan == 'Tenaga Kesehatan' ? 'selected' : '' }}>Tenaga Kesehatan</option>
                        <option value="Tenaga Penunjang Kesehatan" {{ $pegawai->jabatan == 'Tenaga Penunjang Kesehatan' ? 'selected' : '' }}>Tenaga Penunjang Kesehatan</option>  
                        <option value="Tenaga ADM/Umum" {{ $pegawai->jabatan == 'Tenaga ADM/Umum' ? 'selected' : '' }}>Tenaga ADM/Umum</option>                                 
                    </select>
                @error('jabatan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>        
            <div class="form-group">
                <label for="detail_jabatan">Detail Jabatan</label>
                <input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" value="{{ old('detail_jabatan', $pegawai->detail_jabatan) }}">
            </div>            
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="img" class="file-upload-default" id="img">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($pegawai->img) 
                    <div class="mt-2">
                        <img src="{{ asset('img_pegawai/'.$pegawai->img) }}" alt="Foto" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
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



