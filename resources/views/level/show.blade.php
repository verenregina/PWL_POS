@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ route('level.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Kode Level</th>
                <td>{{ $level->level_kode }}</td>
            </tr>
            <tr>
                <th>Nama Level</th>
                <td>{{ $level->level_nama }}</td>
            </tr>
            <tr>
                <th>Dibuat</th>
                <td>{{ $level->created_at }}</td>
            </tr>
            <tr>
                <th>Diubah</th>
                <td>{{ $level->updated_at }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
