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
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}">
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

@endpush



