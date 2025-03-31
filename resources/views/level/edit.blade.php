@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('level.update', $level->level_id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="level_nama">Kode Level</label>
                <label for="level_nama">Nama Level</label>
                <input type="text" class="form-control" id="level_nama" name="level_nama" value="{{ $level->level_nama }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
