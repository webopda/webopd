@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Image</h4>
            <form class="forms-sample" action="{{ route('img.update', $img->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Indikator Mutu</label>
                <input type="file" name="indikator_mutu" class="file-upload-default" id="indikator_mutu">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($img->indikator_mutu) 
                    <div class="mt-2">
                        <img src="{{ asset('indikator_mutu/'.$img->indikator_mutu) }}" alt="Indikator Mutu" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Standar Pelayanan</label>
                <input type="file" name="standar_pelayanan" class="file-upload-default" id="standar_pelayanan">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($img->standar_pelayanan) 
                    <div class="mt-2">
                        <img src="{{ asset('standar_pelayanan/'.$img->standar_pelayanan) }}" alt="Standar Pelayanan" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Jadwal Dokter</label>
                <input type="file" name="jadwal_dokter" class="file-upload-default" id="jadwal_dokter">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>

                @if($img->jadwal_dokter) 
                    <div class="mt-2">
                        <img src="{{ asset('jadwal_dokter/'.$img->jadwal_dokter) }}" alt="Standar Pelayanan" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>
            <div class="d-flex">
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol Cancel -->
                <a href="{{ route('img.index') }}" class="btn btn-light me-2">Cancel</a>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.file-upload-browse').on('click', function () {
            $(this).closest('.form-group').find('input[type="file"]').trigger('click');
        });

        $('input[type="file"]').on('change', function () {
            var fileName = $(this).val().split('\\').pop();
            $(this).closest('.form-group').find('.file-upload-info').val(fileName);
        });
    });
</script>
@endpush



