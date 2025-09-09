@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Image</h4>
                <div class="col-sm-2 pt-6">
                    <a href="{{ route('img.create') }}" type="button" class="btn btn-block btn-primary"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Indikator Mutu</th>
                                <th class="text-center">Standar Pelayanan</th>
                                <th class="text-center">Jadwal Dokter</th>
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
            ajax: "{{ route('img.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'indikator_mutu', name: 'indikator_mutu', class: 'text-center wrap-text'},
                {data: 'standar_pelayanan', name: 'standar_pelayanan', class: 'text-center wrap-text'},
                {data: 'jadwal_dokter', name: 'jadwal_dokter', class: 'text-center wrap-text'},
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
                url: "{{ route('img.destroy', '') }}/" + id,
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
