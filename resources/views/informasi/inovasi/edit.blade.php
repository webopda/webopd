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
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" type="text" id="deskripsi" name="deskripsi">{{ old('deskripsi', $inovasi->deskripsi) }}</textarea>            
            <div class="form-group">
                <label>File SOP</label>
                <!-- Input file -->
                <input type="file" name="sop" class="file-upload-default" id="sop">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                <!-- File yang sudah diupload sebelumnya -->
                @if($inovasi->sop)
                    <div class="mt-2">
                        <p>File SOP Sebelumnya:</p>
                        <a href="{{ asset('file_sop_inovasi/' . $inovasi->sop) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat / Download File
                        </a>
                    </div>
                @endif
            </div>            
            <div class="form-group">
                <label>Manual Book</label>

                <!-- Input file -->
                <input type="file" name="manual_book" class="file-upload-default" id="manual_book">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                <!-- File yang sudah diupload sebelumnya -->
                @if($inovasi->manual_book)
                    <div class="mt-2">
                        <p>File Sebelumnya:</p>
                        <a href="{{ asset('file_manual_book/' . $inovasi->manual_book) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat / Download File
                        </a>
                    </div>
                @endif
            </div>
            </div>
            
            <div class="form-group">
                <label>Foto Inovasi 1</label>

                <!-- Input file -->
                <input type="file" name="img1" class="file-upload-default" id="img1">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                <!-- File yang sudah diupload sebelumnya -->
                @if($inovasi->img1)
                    <div class="mt-2">
                        <p>File Foto 1 Sebelumnya:</p>
                        <a href="{{ asset('img1_inovasi/' . $inovasi->img1) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat / Download File
                        </a>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Foto Inovasi 2</label>

                <!-- Input file -->
                <input type="file" name="img2" class="file-upload-default" id="img2">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                <!-- File yang sudah diupload sebelumnya -->
                @if($inovasi->img2)
                    <div class="mt-2">
                        <p>File Foto 2 Sebelumnya:</p>
                        <a href="{{ asset('img2_inovasi/' . $inovasi->img2) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat / Download File
                        </a>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Proposal</label>

                <!-- Input file -->
                <input type="file" name="proposal" class="file-upload-default" id="proposal">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                <!-- File yang sudah diupload sebelumnya -->
                @if($inovasi->proposal)
                    <div class="mt-2">
                        <p>File Sebelumnya:</p>
                        <a href="{{ asset('file_proposal_inovasi/' . $inovasi->proposal) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat / Download File
                        </a>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tgl_publish">Tanggal Publish</label>
                <input type="date" class="form-control" id="tgl_publish" name="tgl_publish" value="{{ old('tgl_publish', $inovasi->tgl_publish) }}">
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
    // klik tombol -> trigger file input di form-group yang sama
    $('.file-upload-browse').on('click', function() {
        $(this).closest('.form-group').find('.file-upload-default').trigger('click');
    });

    // ketika file dipilih -> set nama file ke input tampilan di form-group yang sama
    $('.file-upload-default').on('change', function() {
        var fileName = (this.files && this.files.length) ? this.files[0].name : $(this).val().split(/(\\|\/)/g).pop();
        $(this).closest('.form-group').find('.file-upload-info').val(fileName);
    });
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });
</script
@endpush



