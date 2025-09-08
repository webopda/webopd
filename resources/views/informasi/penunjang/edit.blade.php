@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Penunjang</h4>
            <form class="forms-sample" action="{{ route('penunjang.update', $penunjang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="penunjang">Penunjang</label>
                <input type="text" class="form-control" id="penunjang" name="penunjang" value="{{ old('penunjang', $penunjang->penunjang) }}">
            </div> 
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $penunjang->keterangan) }}</textarea>
            </div>        
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="img" class="file-upload-default" id="img">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($penunjang->img) 
                    <div class="mt-2">
                        <img src="{{ asset('img_penunjang/'.$penunjang->img) }}" alt="Gambar Penunjang" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>            
            <div class="d-flex">
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol Cancel -->
                <a href="{{ route('penunjang.index') }}" class="btn btn-light me-2">Cancel</a>
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



