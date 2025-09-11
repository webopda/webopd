@extends('layout.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10 col-sm-12">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h3 class="mb-0">Edit organisasi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/organisasi/update/' . $edit_organisasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Sejarah -->
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <textarea name="organisasi" id="sejarah" class="form-control @error('organisasi') is-invalid @enderror">{{ old('organisasi', $edit_organisasi->deskripsi) }}</textarea>
                            @error('organisasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <!-- Struktur Organisasi -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" accept="image/*" onchange="loadFile(event)" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Preview Gambar -->
                        <div class="text-center mb-3">
                            @if($edit_organisasi->gambar)
                                <img src="{{ asset('organisasi/gambar/' . $edit_organisasi->gambar) }}" 
                                     id="output" 
                                     class="img-thumbnail rounded-3" 
                                     style="max-width: 200px; max-height: 200px;">
                            @else
                                <img id="output" class="img-thumbnail rounded-3" style="max-width: 200px; max-height: 200px;">
                            @endif
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4 rounded-pill">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CKEditor untuk misi -->
<script>
    ClassicEditor
        .create(document.querySelector('#sejarah'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- Preview Gambar -->
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
@endsection
