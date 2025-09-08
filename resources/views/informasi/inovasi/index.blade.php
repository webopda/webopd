@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Inovasi</h4>
                <div class="col-sm-2 pt-6">
                    <a href="{{ route('inovasi.create') }}" type="button" class="btn btn-block btn-primary"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Tahapan</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Bentuk</th>                                
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
            ajax: "{{ route('inovasi.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'judul', name: 'judul', class: 'text-center'}, 
                {data: 'tahun', name: 'tahun', class: 'text-center'}, 
                {data: 'tahapan', name: 'tahapan', class: 'text-center'},                
                {data: 'file', name: 'file', class: 'text-center wrap-text'},
                {data: 'bentuk', name: 'bentuk', class: 'text-center'},  
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
                url: "{{ route('inovasi.destroy', '') }}/" + id,
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
</script>
@endpush
