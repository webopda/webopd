@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Poliklinik</h4>
            <form class="forms-sample" action="{{ route('poli.update', $poli->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_poli">Nama Poliklinik</label>
                <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="{{ old('nama_poli', $poli->nama_poli) }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" rows="4" id="keterangan" name="keterangan">{{ old('keterangan', $poli->keterangan) }}</textarea>
            </div>
            <div class="d-flex">
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol Cancel -->
                <a href="{{ route('poli.index') }}" class="btn btn-light me-2">Cancel</a>
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
<script>
    ClassicEditor
        .create(document.querySelector('#keterangan'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush



