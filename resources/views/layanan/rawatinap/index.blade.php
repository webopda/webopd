@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Rawat Inap</h4>
                <div class="col-sm-2 pt-6">
                    <button type="button" class="btn btn-block btn-primary" id="btnAddRawatInap"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </button> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Dokter</th>
                                <th class="text-center">Poliklinik</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div> 
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
            ajax: "{{ route('rawatinap.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'dokter_name', name: 'dokter.nama', class: 'text-center wrap-text'},
                {data: 'poli_name', name: 'poli.nama_poli', class: 'text-center wrap-text'},
                {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ]
        });

        $('#btnAddRawatInap').click(function () {
            $.get("{{ url('rawatinap/create') }}", function (res) {
                let options = '<option value="" disabled selected>-- Pilih Dokter --</option>';
                res.dokters.forEach(d => {
                    options += `<option value="${d.id}">${d.nama}</option>`;
                });

                let formHtml = `
                    <form id="addFormSwal">
                        @csrf
                        <div class="form-group text-left">
                            <label>Nama Dokter</label>
                            <select name="dokter_id" class="form-control" required>
                                ${options}
                            </select>
                        </div>
                    </form>
                `;

                Swal.fire({
                    title: "Tambah Rawat Inap",
                    html: formHtml,
                    width: "50%",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    focusConfirm: false,
                    preConfirm: () => {
                        let form = document.getElementById("addFormSwal");
                        return $(form).serialize(); 
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('rawatinap.store') }}",
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: result.value,
                            success: function(response){
                                if (response.success) {
                                    Swal.fire("Sukses", response.message, "success");
                                    table.ajax.reload();
                                } else {
                                    let errorMsg = response.errors ? response.errors.join("<br>") : "Terjadi kesalahan";
                                    Swal.fire("Gagal", errorMsg, "error");
                                }
                            },
                            error: function(err){
                                let errorMessage = "Terjadi error saat simpan data";
                                if (err.responseJSON && err.responseJSON.errors) {
                                    errorMessage = Object.values(err.responseJSON.errors)
                                        .map(e => e.join("<br>"))
                                        .join("<br>");
                                }
                                Swal.fire("Gagal", errorMessage, "error");
                            }
                        });
                    }
                });
            });
        });

        window.confirmDelete = function(id) {
            Swal.fire({
                title: "Yakin hapus data?",
                text: "Data tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('rawatinap.destroy', '') }}/" + id,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
                            table.ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire("Gagal!", "Terjadi kesalahan saat hapus data.", "error");
                        }
                    });
                }
            });
        }

        window.openEditModal = function(id) {
            $.get("{{ url('rawatinap') }}/" + id + "/edit", function(res) {
                let options = '';
                res.dokters.forEach(d => {
                    options += `<option value="${d.id}" ${d.id == res.rawatInap.dokter_id ? 'selected' : ''}>${d.nama}</option>`;
                });

                let formHtml = `
                    <form id="editFormSwal">
                        @csrf
                        <input type="hidden" name="id" value="${res.rawatInap.id}">
                        <div class="form-group text-left">
                            <label>Nama Dokter</label>
                            <select name="dokter_id" class="form-control">
                                ${options}
                            </select>
                        </div>
                    </form>
                `;

                Swal.fire({
                    title: "Edit Rawat Inap",
                    html: formHtml,
                    width: "50%",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    focusConfirm: false,
                    preConfirm: () => {
                        let form = document.getElementById("editFormSwal");
                        return $(form).serialize(); 
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('rawatinap') }}/" + res.rawatInap.id + "/update",
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: result.value,
                            success: function(response){
                                if (response.success) {
                                    Swal.fire("Sukses", response.message, "success");
                                    table.ajax.reload();
                                } else {
                                    let errorMsg = response.errors ? response.errors.join("<br>") : "Terjadi kesalahan";
                                    Swal.fire("Gagal", errorMsg, "error");
                                }
                            },
                            error: function(err){
                                let errorMessage = "Terjadi error saat update data";
                                if (err.responseJSON && err.responseJSON.errors) {
                                    errorMessage = Object.values(err.responseJSON.errors)
                                        .map(e => e.join("<br>"))
                                        .join("<br>");
                                }
                                Swal.fire("Gagal", errorMessage, "error");
                            }
                        });
                    }
                });
            });
        }
    });
</script>
@endpush
