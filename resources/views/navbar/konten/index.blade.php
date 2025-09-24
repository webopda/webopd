@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Konten Tambahan</h4>
                <div class="col-sm-2 pt-6">
                    <button type="button" class="btn btn-block btn-primary" id="btnAddKonten"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </button> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Submenu</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Konten</th>
                                <th class="text-center">Img</th>
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
            ajax: "{{ route('kontennavbar.index') }}",
            scrollX: true,
            autoWidth: false, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
                {data: 'konten_name', name: 'submenu.submenu', class: 'text-center wrap-text'},
                {data: 'judul', name: 'judul', class: 'text-center wrap-text'},
                {data: 'konten', name: 'konten', class: 'text-center wrap-text'},
                {data: 'img', name: 'img', class: 'text-center wrap-text'},
                {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
            ]
        });

        $('#btnAddKonten').click(function () {
            let formHtml = `
                <form id="addFormSwal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-left">
                        <label>Submenu</label>
                        <select name="submenu_id" class="form-control" required>
                            <option value="">-- Pilih Submenu --</option>
                            @foreach($submenuList as $sm)
                                <option value="{{ $sm->id }}">{{ $sm->submenu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-left">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group text-left">
                        <label>Konten</label>
                        <textarea name="konten" id="konten" class="form-control" required></textarea>
                    </div>
                    <div class="form-group text-left">
                        <label>Img</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                </form>
            `;

            let editorInstance;
            Swal.fire({
                title: "Tambah Konten",
                html: formHtml,
                width: "50%",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                focusConfirm: false,
                preConfirm: () => {
                    if (editorInstance) {
                        $('#konten').val(editorInstance.getData());
                    }

                    let form = document.getElementById("addFormSwal");
                    let formData = new FormData(form);

                    if (!formData.get("submenu_id")) {
                        Swal.showValidationMessage("Submenu wajib dipilih.");
                        return false;
                    }

                    if (!formData.get("judul")?.trim()) {
                        Swal.showValidationMessage("Judul wajib diisi.");
                        return false;
                    }

                    if (!formData.get("konten")?.trim()) {
                        Swal.showValidationMessage("Konten wajib diisi.");
                        return false;
                    }

                    return formData;
                },
                didOpen: () => {
                    const editorTarget = document.querySelector('#konten');
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
                        url: "{{ route('kontennavbar.store') }}",
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
                        url: "{{ route('kontennavbar.destroy', '') }}/" + id,
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
            $.get("{{ url('kontennavbar') }}/" + id + "/edit", function(res) {

                // Ambil daftar submenu yang dinamis (server kasih array submenuList)
                let submenuOptions = "";
                res.submenuList.forEach(item => {
                    submenuOptions += `<option value="${item.id}" ${item.id == res.kontenNavbar.submenu_id ? "selected" : ""}>${item.submenu}</option>`;
                });

                let formHtml = `
                    <form id="editFormSwal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="${res.kontenNavbar.id}">
                        
                        <div class="form-group text-left">
                            <label>Pilih Submenu</label>
                            <select name="submenu_id" class="form-control" required>
                                <option value="">-- Pilih Submenu --</option>
                                ${submenuOptions}
                            </select>
                        </div>

                        <div class="form-group text-left">
                            <label>Judul</label>
                            <input type="text" name="judul" value="${res.kontenNavbar.judul}" class="form-control" required>
                        </div>
                        <div class="form-group text-left">
                            <label>Konten</label>
                            <textarea name="konten" id="kontenEdit" class="form-control" required>${res.kontenNavbar.konten}</textarea>
                        </div>
                        <div class="form-group text-left">
                            <label>Img (biarkan kosong jika tidak diganti)</label>
                            <input type="file" name="img" class="form-control">
                            ${res.kontenNavbar.img ? `<br><img src="/img_konten/${res.kontenNavbar.img}" alt="img konten" width="80">` : ""}
                        </div>
                    </form>
                `;

                let editorInstance = null;

                Swal.fire({
                    title: "Edit Konten Navbar",
                    html: formHtml,
                    width: "50%",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal",
                    focusConfirm: false,
                    preConfirm: () => {
                        // ✅ Sinkronisasi CKEditor ke textarea
                        if (editorInstance) {
                            document.querySelector('#kontenEdit').value = editorInstance.getData();
                        }

                        let form = document.getElementById("editFormSwal");
                        let formData = new FormData(form); 

                        // Optional: validasi manual
                        if (!formData.get("judul")?.trim()) {
                        Swal.showValidationMessage("Nama wajib diisi.");
                        return false;
                        }

                        if (!formData.get("konten")?.trim()) {
                            Swal.showValidationMessage("Konten wajib diisi.");
                            return false;
                        }

                        return formData;
                    },
                    didOpen: () => {
                        const editorTarget = document.querySelector('#kontenEdit');
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
                            url: "{{ url('kontennavbar') }}/" + res.kontenNavbar.id + "/update",
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
        .create(document.querySelector('#konten'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
