@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pengaduan</h4>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Tanggal Kunjungan</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Pesan</th>                                
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
            ajax: "{{ route('pengaduan.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'nama', name: 'nama', class: 'text-center'}, 
                {data: 'nik', name: 'nik', class: 'text-center'}, 
                {data: 'tgl_kunjungan', name: 'tgl_kunjungan', class: 'text-center'},                
                {data: 'email', name: 'email', class: 'text-center wrap-text'},
                {data: 'pesan', name: 'pesan', class: 'text-center'},  
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
                url: "{{ route('pengaduan.destroy', '') }}/" + id,
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

        window.balasPengaduan = function(id) {
            $.get("/pengaduan/" + id + "/get-balasan", function(res) {
                Swal.fire({
                    title: 'Balas Pengaduan',
                    input: 'textarea',
                    inputLabel: 'Masukkan balasan',
                    inputPlaceholder: 'Tulis balasan di sini...',
                    inputAttributes: {
                        'aria-label': 'Tulis balasan di sini'
                    },
                    inputValue: res.balasan ?? "", // isi balasan lama kalau ada
                    showCancelButton: true,
                    confirmButtonText: 'Kirim',
                    cancelButtonText: 'Batal',
                    preConfirm: (balasan) => {
                        if (!balasan) {
                            Swal.showValidationMessage('Balasan tidak boleh kosong');
                        }
                        return balasan;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/pengaduan/" + id + "/balas",
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                balasan: result.value
                            },
                            success: function(res) {
                                Swal.fire("Terkirim!", "Balasan berhasil disimpan.", "success");
                                $('.data-table').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                                Swal.fire("Gagal!", "Terjadi kesalahan menyimpan balasan.", "error");
                            }
                        });
                    }
                });
            });
        }
    });
</script>
@endpush
