@extends('layouts.template')

@section('content') 
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('level/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="levelTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Level</th>
                    <th>Nama Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js') 
<!-- Tambahkan library DataTables -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function(){
    $('#levelTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('level.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: "text-center" },
            { data: 'level_kode', name: 'level_kode' },
            { data: 'level_nama', name: 'level_nama' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false, render: function(data, type, row) {
                return `
                    <a href="/level/${row.level_id}/show" class="btn btn-info btn-sm">Detail</a>
                    <a href="/level/${row.level_id}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteLevel(${row.level_id})">Hapus</button>
                `;
            }}
        ]
    });
});

// Fungsi Delete Level
function deleteLevel(id) {
    if (confirm("Apakah Anda yakin ingin menghapus level ini?")) {
        $.ajax({
            url: `/level/${id}`,
            type: 'POST', // Laravel hanya menerima DELETE jika ada _method
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function(response) {
                alert(response.message);
                $('#levelTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Gagal menghapus data! Periksa apakah data memiliki relasi lain.');
            }
        });
    }
}
</script>
@endpush
