@extends('layout.template')

@section('content')
 
  <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data User</h4>
                <button class="btn btn-primary" wire:click="closeModal" data-toggle="modal" data-target="#staticBackdrop">
                    + Tambah Data User
                </button>
            </div>
            <div class="card-body">
                           
                       
                    @error('name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                    @error('password')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                    @error('email')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                 <div class="table-responsive">
                               
                <table class="table table-bordered table-striped"> 
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                {{-- <th class="text-center">Password</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($user_data as $item )
                        <tbody>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->name}}</td>
                             <td class="text-center">{{$item->email}}</td>
                             {{-- <td class="text-center">{{$item->password}}</td> --}}
                             <td class="text-center"> 
                                 <a 
            class="btn btn-sm btn-warning"
            data-toggle="modal"
            data-target="#edit{{ $item->id }}"
            title="Edit"
            aria-label="Edit {{ $item->name }}">
      <i class="bi bi-pencil-square"></i>
    </a>

    <!-- Hapus -->
    <a 
            class="btn btn-sm btn-danger"
            data-toggle="modal"
            data-target="#hapus{{ $item->id }}"
            title="Hapus"
            aria-label="Hapus {{ $item->name }}">
      <i class="bi bi-trash3"></i>
    </a>

    <!-- Ganti Password (atau action lain) -->
    <a 
            class="btn btn-sm btn-secondary"
            data-toggle="modal"
            data-target="#password{{ $item->id }}"
            title="Ubah Password"
            aria-label="Ubah password {{ $item->name }}">
      <i class="bi bi-key"></i>
    </a>
                             </td>
                        </tbody>
@include('register.edit')
@include('register.password')
@include('register.hapus')
                                                @endforeach

                    </table>
                 </div>
            </div>
        </div>
  </div>
  
@include('register.tambah')
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