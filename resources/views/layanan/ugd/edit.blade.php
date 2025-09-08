@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data UGD</h4>
            <form class="forms-sample" action="{{ route('ugd.update', $ugd->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="detail_pelayanan">Detail Pelayanan</label>
                <input type="text" class="form-control" id="detail_pelayanan" name="detail_pelayanan" value="{{ old('detail_pelayanan', $ugd->detail_pelayanan) }}">
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="file-upload-default" id="foto">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($ugd->foto) 
                    <div class="mt-2">
                        <img src="{{ asset('img_ugd/'.$ugd->foto) }}" alt="Gambar UGD" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>
            <div class="d-flex">
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol Cancel -->
                <a href="{{ route('ugd.index') }}" class="btn btn-light me-2">Cancel</a>
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
            $('#foto').trigger('click');
        });
        $('#foto').on('change', function() {
            var fileName1 = $(this).val().split('\\').pop();
            $('.file-upload-info').val(fileName1);
        });
    });
</script>
@endpush



