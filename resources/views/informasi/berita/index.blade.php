@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Berita</h4>
                <div class="col-sm-2 pt-6">
                    <a href="{{ route('berita.create') }}" type="button" class="btn btn-block btn-primary"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Tanggal Publish</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Img</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    table.dataTable {
        width: 100% !important; 
        table-layout: fixed; 
    }
    .wrap-text {
        white-space: normal !important; 
        word-wrap: break-word !important; 
    }
</style>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('berita.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'judul', name: 'judul', class: 'text-center'}, 
                {data: 'keterangan', name: 'keterangan', class: 'text-center wrap-text'}, 
                {data: 'tgl_publish', name: 'tgl_publish', class: 'text-center wrap-text'},
                {data: 'author_name', name: 'pegawai.nama', class: 'text-center wrap-text'},
                {data: 'img', name: 'img', class: 'text-center wrap-text'},
                {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ]
        });

        window.confirmDelete = function(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteData(id);
                }
            });
        }

        function deleteData(id) {
            $.ajax({
                url: "{{ route('berita.destroy', '') }}/" + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    Swal.fire("Deleted!", "Your data has been deleted.", "success");
                    table.ajax.reload();
                },
                error: function(xhr) {
                    Swal.fire("Failed!", "There was an error deleting the data.", "error");
                }
            });
        }
    });
    $(document).on('click', '.preview-img', function () {
    const src   = $(this).attr('src');
    const title = $(this).data('title') || 'Preview';
    const alt   = $(this).attr('alt') || 'Preview';

    Swal.fire({
        title: title,
        imageUrl: src,
        imageAlt: alt,
        showConfirmButton: false,
        showCloseButton: true,
        width: 'auto',
        backdrop: true,
        didOpen: () => {
            const img = Swal.getImage();
            if (img) {
                img.style.maxWidth = '90%';   // supaya besar tapi responsif
                img.style.height   = 'auto';
            }
        }
    });
});
</script>
@endpush
