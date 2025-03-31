@extends('layouts.template')

@section('content') 
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ route('kategori.create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-striped" id="kategoriTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('#kategori-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kategori.data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'kode_kategori', name: 'kode_kategori' },
                { data: 'nama_kategori', name: 'nama_kategori' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });
    }); 

function deleteKategori(id) {
    if (confirm("Apakah Anda yakin ingin menghapus kategori ini?")) {
        $.ajax({
            url: "/kategori/" + id,
            type: "DELETE",
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                alert(response.message);
                $('#kategoriTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert("Gagal menghapus data!");
            }
        });
    }
}
</script>
@endpush
