@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary mt-1">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="barangTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function(){
    $('#barangTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('barang.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: "text-center" },
            { data: 'barang_kode', name: 'barang_kode' },
            { data: 'barang_nama', name: 'barang_nama' },
            { data: 'kategori', name: 'kategori' },
            { data: 'harga', name: 'harga' },
            { data: 'stok', name: 'stok' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
        ]
    });
});

function deleteBarang(id) {
    if (confirm("Apakah Anda yakin ingin menghapus barang ini?")) {
        $.ajax({
            url: `/barang/${id}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.message);
                $('#barangTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert('Gagal menghapus data!');
            }
        });
    }
}
</script>
@endpush
