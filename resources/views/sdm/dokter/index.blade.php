@extends('layout.template')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Dokter</h4>
                <div class="col-sm-2 pt-6">
                    <a href="{{ route('dokter.create') }}" type="button" class="btn btn-block btn-primary"> 
                        <i class="fa fa-plus"></i> Tambah 
                    </a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped nowrap data-table">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Poliklinik</th>
                                <th class="text-center">Profil</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
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
@endpush

@push('scripts')

<script type="text/javascript">
$(document).ready(function() {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dokter.index') }}",
        scrollX: true,
        autoWidth: false, 
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', orderable: false, searchable: false},
            {data: 'nama', name: 'nama', class: 'text-center'}, 
            {data: 'poli_name', name: 'poli.nama_poli', class: 'text-center wrap-text'},
            {data: 'img', name: 'img', class: 'text-center wrap-text'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
        ]
    });

    // SweetAlert Delete
    window.confirmDelete = function(id) {
        Swal.fire({
            title: "Apakah yakin?",
            text: "Data akan dihapus permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                deleteData(id);
            }
        });
    }

    function deleteData(id) {
        $.ajax({
            url: "{{ route('dokter.destroy', '') }}/" + id,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                Swal.fire("Deleted!", "Data berhasil dihapus.", "success");
                table.ajax.reload();
            },
            error: function(xhr) {
                Swal.fire("Gagal!", "Terjadi kesalahan.", "error");
            }
        });
    }

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

    window.openJadwalModal = function(dokterId) {
    let formHtml = `
        <form id="jadwalFormSwal">
          <input type="hidden" name="dokter_id" value="${dokterId}">
          <table class="table table-bordered text-left">
            <thead>
              <tr>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
              </tr>
            </thead>
            <tbody>
              ${['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'].map(day => `
                <tr>
                  <td>${day}</td>
                  <td><input type="time" name="jadwal[${day.toLowerCase()}][jam_mulai]" class="form-control"></td>
                  <td><input type="time" name="jadwal[${day.toLowerCase()}][jam_selesai]" class="form-control"></td>
                </tr>
              `).join('')}
            </tbody>
          </table>
        </form>
    `;

    Swal.fire({
    title: "Kelola Jadwal Dokter",
    html: formHtml,
    width: "70%",
    showCancelButton: true,
    confirmButtonText: "Simpan",
    cancelButtonText: "Batal",
    focusConfirm: false,
    preConfirm: () => {
        let form = document.getElementById("jadwalFormSwal");
        return $(form).serialize(); 
    }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('jadwal.store') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: result.value,
                success: function(res){
                    Swal.fire("Sukses", "Jadwal berhasil disimpan", "success");
                },
                error: function(err){
                    console.error(err); 

                    let errorMessage = "Terjadi error saat simpan jadwal";

                    if (err.responseJSON && err.responseJSON.errors) {
                        errorMessage = Object.values(err.responseJSON.errors)
                            .map(e => e.join("<br>"))
                            .join("<br>");
                    } 
                    else if (err.responseJSON && err.responseJSON.message) {
                        errorMessage = err.responseJSON.message;
                    } 
                    else if (err.responseText) {
                        errorMessage = err.responseText;
                    }

                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        html: errorMessage
                    });
                }
            });
        }
    });
}

window.showJadwalInfo = function(dokterId) {
    $.ajax({
        url: "{{ url('/jadwal-dokter') }}/" + dokterId,
        method: "GET",
        success: function(res) {
            if (res.length === 0) {
                Swal.fire("Info Jadwal", "Belum ada jadwal untuk dokter ini.", "info");
                return;
            }

            let tableHtml = `
                <table class="table table-bordered text-left">
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            res.forEach(j => {
                tableHtml += `
                    <tr>
                        <td>${j.hari}</td>
                        <td>${j.jam_mulai}</td>
                        <td>${j.jam_selesai}</td>
                    </tr>
                `;
            });

            tableHtml += "</tbody></table>";

            Swal.fire({
                title: "Jadwal Dokter",
                html: tableHtml,
                width: "60%",
                confirmButtonText: "Tutup"
            });
        },
        error: function(err) {
            console.error(err);
            Swal.fire("Error", "Gagal mengambil data jadwal", "error");
        }
    });
} 

    
});
</script>
@endpush
