@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Inovasi</h4>
            <form class="forms-sample" action="{{ route('inovasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type ="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" type="text"  id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
            </div>            
            <div class="form-group">
                <label>File SOP</label>
                <input type="file" name="sop" class="file-upload-default" id="sop">
                <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                </div>
            </div>                      
            <div class="form-group">
                <label>Manual Book</label>
                <input type="file" name="manual_book" class="file-upload-default" id="manual_book">
                <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                </div>
            </div>
            <div class="form-group">
                <label>Foto Inovasi 1</label>
                <input type="file" name="img1" class="file-upload-default" id="img1">
                <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                </div>
                </div>

            <div class="form-group">
                <label>Foto Inovasi 2</label>
                <input type="file" name="img2" class="file-upload-default" id="img2">
                <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                </div> 
            </div>
            <div class="form-group">
                <label for="tgl_publish">Tanggal Publish</label>
                <input type="date" class="form-control" id="tgl_publish" name="tgl_publish" placeholder="Tanggal Publish">
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
</script>
@endpush



