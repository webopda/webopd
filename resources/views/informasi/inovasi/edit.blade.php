@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Inovasi</h4>
            <form class="forms-sample" action="{{ route('inovasi.update', $inovasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $inovasi->judul) }}">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $inovasi->tahun) }}">
            </div>
            <div class="form-group">
                <label for="tahapan">Tahapan</label>
                <input type="text" class="form-control" id="tahapan" name="tahapan" value="{{ old('tahapan', $inovasi->tahapan) }}">
            </div>
            <div class="form-group">
    <label>File</label>

                <!-- Input file -->
                <input type="file" name="file" class="file-upload-default" id="file">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                <!-- File yang sudah diupload sebelumnya -->
                @if($inovasi->file)
                    <div class="mt-2">
                        <p>File Sebelumnya:</p>
                        <a href="{{ asset('file_inovasi/' . $inovasi->file) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat / Download File
                        </a>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="bentuk">Bentuk</label>
                <input type="text" class="form-control" id="bentuk" name="bentuk" value="{{ old('bentuk', $inovasi->bentuk) }}">
            </div>
            <div class="d-flex">
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol Cancel -->
                <a href="{{ route('inovasi.index') }}" class="btn btn-light me-2">Cancel</a>
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
            $('#file').trigger('click');
        });
        $('#file').on('change', function() {
            var fileName1 = $(this).val().split('\\').pop();
            $('.file-upload-info').val(fileName1);
        });
    });
</script>
@endpush



