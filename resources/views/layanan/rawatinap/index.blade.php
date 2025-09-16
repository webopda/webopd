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
                                <th class="text-center">Nama</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Icon</th>
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
                {data: 'nama', name: 'nama', class: 'text-center wrap-text'},
                {data: 'keterangan', name: 'keterangan', class: 'text-center wrap-text'},
                {data: 'icon', name: 'icon', class: 'text-center wrap-text'},
                {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ]
        });

        $('#btnAddRawatInap').click(function () {
            let formHtml = `
                <form id="addFormSwal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-left">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group text-left">
                        <label>Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group text-left">
                        <label>Icon</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                </form>
            `;

            let editorInstance;
            Swal.fire({
                title: "Tambah Rawat Inap",
                html: formHtml,
                width: "50%",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                focusConfirm: false,
                preConfirm: () => {
                    if (editorInstance) {
                        $('#keterangan').val(editorInstance.getData());
                    }

                    let form = document.getElementById("addFormSwal");
                    let formData = new FormData(form);

                    if (!formData.get("nama")?.trim()) {
                        Swal.showValidationMessage("Nama wajib diisi.");
                        return false;
                    }

                    if (!formData.get("keterangan")?.trim()) {
                        Swal.showValidationMessage("Keterangan wajib diisi.");
                        return false;
                    }

                    return formData;
                },
                didOpen: () => {
                    const editorTarget = document.querySelector('#keterangan');
                    if (editorTarget) {
                        ClassicEditor
                            .create(editorTarget)
                            .then(editor => {
                                editorInstance = editor; 
                            })
                            .catch(error => {
                                console.error('CKEditor init error:', error);
                            });
                    }
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('rawatinap.store') }}",
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
                let formHtml = `
                    <form id="editFormSwal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="${res.rawatInap.id}">
                        <div class="form-group text-left">
                            <label>Nama</label>
                            <input type="text" name="nama" value="${res.rawatInap.nama}" class="form-control" required>
                        </div>
                        <div class="form-group text-left">
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="keteranganEdit" class="form-control" required>${res.rawatInap.keterangan}</textarea>
                        </div>
                        <div class="form-group text-left">
                            <label>Icon (biarkan kosong jika tidak diganti)</label>
                            <input type="file" name="icon" class="form-control">
                            ${res.rawatInap.icon ? `<br><img src="/icon_inap/${res.rawatInap.icon}" alt="icon" width="80">` : ""}
                        </div>
                    </form>
                `;

                let editorInstance = null;

                Swal.fire({
                    title: "Edit Rawat Inap",
                    html: formHtml,
                    width: "50%",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    focusConfirm: false,
                    preConfirm: () => {
                        // ✅ Sinkronisasi CKEditor ke textarea
                        if (editorInstance) {
                            document.querySelector('#keteranganEdit').value = editorInstance.getData();
                        }

                        let form = document.getElementById("editFormSwal");
                        let formData = new FormData(form); 

                        // Optional: validasi manual
                        if (!formData.get("nama")?.trim()) {
                            Swal.showValidationMessage("Nama wajib diisi.");
                            return false;
                        }

                        if (!formData.get("keterangan")?.trim()) {
                            Swal.showValidationMessage("Keterangan wajib diisi.");
                            return false;
                        }

                        return formData;
                    },
                    didOpen: () => {
                        const editorTarget = document.querySelector('#keteranganEdit');
                        if (editorTarget) {
                            ClassicEditor
                                .create(editorTarget)
                                .then(editor => {
                                    editorInstance = editor;
                                })
                                .catch(error => {
                                    console.error('CKEditor init error:', error);
                                });
                        }
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

        window.openDetailModal = function(inapId, imgData = []) {
            console.log("Preview imgData:", imgData);

            let previewHtml = "";
            if (imgData.length > 0) {
                previewHtml = `<div class="form-group text-left">
                    <label>Foto Detail Saat Ini</label><br>
                    <div style="display:flex; flex-wrap:wrap; gap:10px;">`;

                imgData.forEach(item => {
                    previewHtml += `
                        <div id="img-${item.id}" style="position:relative; display:inline-block;">
                            <img src="${item.url}" alt="Foto Detail" 
                                class="img-thumbnail" width="120">
                            <button type="button" class="btn btn-danger btn-sm" 
                                style="position:absolute; top:0; right:0; border-radius:50%;" 
                                onclick="deleteDetailImage(${item.id})">&times;</button>
                        </div>
                    `;
                });

                previewHtml += `</div></div>`;
            }

            let formHtml = `
                <form id="detailFormSwal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="inap_id" value="${inapId}">
                    ${previewHtml}
                    <div class="form-group text-left">
                        <label>Tambah Foto Detail</label>
                        <input type="file" name="img[]" class="form-control" multiple>
                    </div>
                </form>
            `;

            Swal.fire({
                title: "Kelola Foto Detail",
                html: formHtml,
                width: "60%",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                focusConfirm: false,
                preConfirm: () => {
                    let form = document.getElementById("detailFormSwal");
                    return new FormData(form);
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('detailinap.store') }}",
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
        }

        // fungsi hapus per gambar
        window.deleteDetailImage = function(id) {
            Swal.fire({
                title: 'Hapus foto ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/detailinap/" + id, // route destroy
                        type: "DELETE",
                        data: {_token: $('meta[name="csrf-token"]').attr('content')},
                        success: function(res) {
                            if(res.success){
                                Swal.fire("Terhapus!", res.message, "success").then(() => {
                                    table.ajax.reload(); 
                                    Swal.close();       
                                });
                            } else {
                                Swal.fire("Gagal", res.message, "error");
                            }
                        },
                        error: function() {
                            Swal.fire("Error", "Terjadi kesalahan server", "error");
                        }
                    });
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
                    img.style.maxWidth = '90%';   
                    img.style.height   = 'auto';
                }
            }
        });
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#keterangan'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
