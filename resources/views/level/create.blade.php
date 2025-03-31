@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Level</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('level.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="level_kode">Kode Level</label>
                <input type="text" class="form-control" id="level_kode" name="level_kode" required>
            </div>
            <div class="form-group">
                <label for="level_nama">Nama Level</label>
                <input type="text" class="form-control" id="level_nama" name="level_nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>                
    </div>
</div>
@endsection
