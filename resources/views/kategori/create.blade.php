@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori_kode">Kode Kategori</label>
                <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" required>
            </div>
            <div class="form-group">
                <label for="kategori_nama">Nama Kategori</label>
                <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
