@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Submenu</h4>
                <div class="col-sm-2 pt-6">
                    <button type="button" class="btn btn-block btn-primary" id="btnAddSubmenu"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </button> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Navbar</th>
                                <th class="text-center">Submenu</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Urutan</th>
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
            ajax: "{{ route('submenu.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'menu_name', name: 'navbar.menu', class: 'text-center wrap-text'},
                {data: 'submenu', name: 'submenu', class: 'text-center wrap-text'},
                {data: 'slug', name: 'slug', class: 'text-center wrap-text'},
                {data: 'urutan', name: 'urutan', class: 'text-center wrap-text'},
                {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ]
        });

        $('#btnAddSubmenu').click(function () {
            let formHtml = `
                <form id="addFormSwal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-left">
                        <label>Submenu</label>
                        <input type="text" name="submenu" class="form-control" required>
                    </div>
                    <div class="form-group text-left">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                        <small class="text-muted">Hanya huruf kecil, angka, dan tanda minus (-).</small>
                    </div>
                    <div class="form-group text-left">
                        <label>Urutan</label>
                        <input type="number" name="urutan" class="form-control" required min="1">
                    </div>
                </form>
            `;

            Swal.fire({
                title: "Tambah Submenu pada Navbar Lainnya",
                html: formHtml,
                width: "50%",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                focusConfirm: false,
                preConfirm: () => {
                    let form = document.getElementById("addFormSwal");
                    let formData = new FormData(form);

                    let submenu = formData.get("submenu")?.trim();
                    let slug    = formData.get("slug")?.trim();
                    let urutan  = formData.get("urutan")?.trim();

                    if (!submenu) {
                        Swal.showValidationMessage("Submenu wajib diisi.");
                        return false;
                    }
                    if (!slug) {
                        Swal.showValidationMessage("Slug wajib diisi.");
                        return false;
                    }
                    if (!/^[a-z0-9-]+$/.test(slug)) {
                        Swal.showValidationMessage("Slug hanya boleh huruf kecil, angka, dan tanda minus (-).");
                        return false;
                    }
                    if (!urutan) {
                        Swal.showValidationMessage("Urutan wajib diisi.");
                        return false;
                    }
                    if (isNaN(urutan) || parseInt(urutan) < 1) {
                        Swal.showValidationMessage("Urutan harus berupa angka lebih dari 0.");
                        return false;
                    }

                    return formData;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('submenu.store') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: result.value,
                        processData: false,
                        contentType: false,
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
                        url: "{{ route('submenu.destroy', '') }}/" + id,
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
            $.get("{{ url('submenu') }}/" + id + "/edit", function(res) {
                let formHtml = `
                    <form id="editFormSwal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="${res.subMenu.id}">
                        <div class="form-group text-left">
                            <label>Submenu</label>
                            <input type="text" name="submenu" value="${res.subMenu.submenu}" class="form-control" required>
                        </div>
                        <div class="form-group text-left">
                            <label>Slug</label>
                            <input type="text" name="slug" value="${res.subMenu.slug}" class="form-control" required>
                            <small class="text-muted">Hanya huruf kecil, angka, dan tanda minus (-).</small>
                        </div>
                        <div class="form-group text-left">
                            <label>Urutan</label>
                            <input type="number" name="urutan" value="${res.subMenu.urutan}" class="form-control" required min="1">
                        </div>
                    </form>
                `;

                Swal.fire({
                    title: "Edit Data Submenu",
                    html: formHtml,
                    width: "50%",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    focusConfirm: false,
                    preConfirm: () => {
                        let form = document.getElementById("editFormSwal");
                        let formData = new FormData(form);

                        let submenu = formData.get("submenu")?.trim();
                        let slug    = formData.get("slug")?.trim();
                        let urutan  = formData.get("urutan")?.trim();

                        if (!submenu) {
                            Swal.showValidationMessage("Submenu wajib diisi.");
                            return false;
                        }
                        if (!slug) {
                            Swal.showValidationMessage("Slug wajib diisi.");
                            return false;
                        }
                        if (!/^[a-z0-9-]+$/.test(slug)) {
                            Swal.showValidationMessage("Slug hanya boleh huruf kecil, angka, dan tanda minus (-).");
                            return false;
                        }
                        if (!urutan) {
                            Swal.showValidationMessage("Urutan wajib diisi.");
                            return false;
                        }
                        if (isNaN(urutan) || parseInt(urutan) < 1) {
                            Swal.showValidationMessage("Urutan harus berupa angka lebih dari 0.");
                            return false;
                        }

                        return formData;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('submenu') }}/" + res.subMenu.id + "/update",
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: result.value,
                            processData: false,
                            contentType: false,
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
        };
    });
</script>
@endpush
