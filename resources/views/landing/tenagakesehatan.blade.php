<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('template/js/select.dataTables.min.css') }}">
@include('navbar.navbar')

<div class="min-h-screen bg-gray-100 py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-semibold">Daftar Tenaga Kesehatan</h2>
            </div>
            <div class="p-6">
                <table class="table table-bordered data-table w-full text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Detail Jabatan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('navbar.footer')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('template/js/dataTables.select.min.js') }}"></script>


<script type="text/javascript">
    $(function () {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('landing.tenagakesehatan') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center'},
                {data: 'nama', name: 'nama'},
                {data: 'jk', name: 'jk'},
                {data: 'detail_jabatan', name: 'detail_jabatan'},
            ]
        });
    });
</script>
