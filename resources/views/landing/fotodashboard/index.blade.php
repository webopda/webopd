@extends('layout.template')

@section('content')
<style>
  .btn-icon {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px; 
}
</style>
 
  <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Slider</h4>
                <button class="btn btn-primary" wire:click="closeModal" data-toggle="modal" data-target="#staticBackdrop">
                    + Tambah Data Slider
                </button>
            </div>
            <div class="card-body">
                           
                       
                    @error('judul')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                    @error('urutan')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                    @error('gambar')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                 <div class="table-responsive">
                               
                <table class="table table-bordered table-striped"> 
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Urutan</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($tampil_slider as $item )
                        <tbody>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->judul}}</td>
                             <td class="text-center">{{$item->urutan}}</td>
                            <td class="text-center">
                                <img src="{{ asset('slider/gambar/'.$item->foto) }}" 
                                    alt="Foto Slider" 
                                    class="img-thumbnail" 
                                    style="width: 50px; cursor: pointer;"
                                    data-toggle="modal" 
                                    data-target="#preview{{ $item->id }}">
                            </td>
                             <td class="text-center"> 
                                <a data-toggle="modal" data-target="#edit{{ $item->id }}"  
                                  class="btn btn-warning btn-icon btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg>
                                </a>
                                <a data-toggle="modal" data-target="#hapus{{ $item->id }}" 
                                  class="btn btn-danger btn-sm btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                                </a>
                            </td>
                        </tbody>
                        <!-- Modal Preview -->
                        <div class="modal fade" id="preview{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('slider/gambar/'.$item->foto) }}" 
                                            alt="Preview Foto" 
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
@include('landing.fotodashboard.edit')
@include('landing.fotodashboard.hapus')

                                                @endforeach

                    </table>
                 </div>
            </div>
        </div>
  </div>
  
@include('landing.fotodashboard.tambah')
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