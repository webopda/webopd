@extends('layout.template')

@section('content')
 <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css" />
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Profile</h4>
                <div class="col-sm-2 pt-6">
                    <a  href="{{ url('admin/profil/tambah') }}" class="btn btn-block btn-primary"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </a> <br>
        
                </div>
                <div class="table-responsive">
    <table id="myTable" class="table table-striped">
        <thead>
            <tr>
                <th class="text-center" width="50px">No</th>
                <th class="text-center">Visi</th>
                <th class="text-center">Urutan</th>
                <th class="text-center">Struktur ORG</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_profil as $item )
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{$item->visi}}</td>
                <td class="text-center">{{$item->urutan}}</td>
                <td class="text-center">
                    <img src="{{ asset('profil/gambar/' . $item->struktur_org) }}" 
                        alt="Struktur Organisasi" 
                        class="img-thumbnail rounded-3" 
                        style="max-width: 120px; cursor: pointer;" 
                        onclick="showImage('{{ asset('profil/gambar/' . $item->struktur_org) }}')">
                </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning  me-1" 
                        href="{{ url('admin/profil/edit/' . $item->id) }}" 
                        title="Edit Data">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <button class="btn btn-sm btn-danger "
                        onclick="hapusProfil({{ $item->id }})"
                        title="Hapus Data">
                        <i class="bi bi-trash3"></i>
                    </button>

                    <form id="hapus-form-{{ $item->id }}" 
                        action="{{ url('admin/profil/hapus/' . $item->id) }}" 
                        method="POST" 
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function hapusProfil(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data profil ini akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('hapus-form-' + id).submit();
        }
    })
}
</script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    function showImage(src) {
        Swal.fire({
            title: 'Struktur Organisasi',
            imageUrl: src,
            imageWidth: 500,
            imageAlt: 'Preview Struktur Organisasi',
            confirmButtonText: 'Tutup',
            confirmButtonColor: '#3085d6'
        });
    }
</script>

@endsection