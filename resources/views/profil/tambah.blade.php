@extends('layout.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10 col-sm-12">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h3 class="mb-0">Tambah Profil</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/profil/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- Sejarah -->
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <textarea name="sejarah" id="sejarah" class="form-control @error('sejarah') is-invalid @enderror">{{ old('sejarah') }}</textarea>
                            @error('sejarah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Visi -->
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror">{{ old('visi') }}</textarea>
                            @error('visi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Misi -->
                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror">{{ old('misi') }}</textarea>
                            @error('misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Struktur Organisasi -->
                        <div class="mb-3">
                            <label for="struktur_org" class="form-label">Struktur Organisasi</label>
                            <input type="file" name="struktur_org" accept="image/*" onchange="loadFile(event)" id="struktur_org" class="form-control @error('struktur_org') is-invalid @enderror">
                            @error('struktur_org')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center mb-3">
                            <img id="output" class="img-thumbnail rounded-3" style="max-width: 200px; max-height: 200px;">
                        </div>

                        <!-- Moto -->
                        <div class="mb-3">
                            <label for="moto" class="form-label">Moto</label>
                            <input type="text" name="moto" id="moto" value="{{ old('moto') }}" class="form-control @error('moto') is-invalid @enderror" required>
                            @error('moto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Urutan -->
                        <div class="mb-3">
                            <label for="urutan" class="form-label">Urutan</label>
                            <input type="number" name="urutan" id="urutan" value="{{ old('urutan') }}" class="form-control @error('urutan') is-invalid @enderror">
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    ClassicEditor
        .create(document.querySelector('#misi'))
        .catch(error => {
            console.error(error);
        });
</script>

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