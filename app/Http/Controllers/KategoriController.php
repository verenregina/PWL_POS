<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $page = (object) ['title' => 'Kategori'];
        $breadcrumb = (object) [
            'title' => 'Kategori',
            'list' => ['Home', 'Kategori']
        ];
        return view('kategori.index', compact('page', 'breadcrumb'));
    }
    
    public function create()
    {
        $page = (object) ['title' => 'Tambah Kategori'];
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        return view('kategori.create', compact('page', 'breadcrumb'));
    }
    
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $page = (object) ['title' => 'Detail Kategori'];
        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];
        return view('kategori.show', compact('kategori', 'page', 'breadcrumb'));
    }

    public function data()
{
    $query = Kategori::select('m_kategori.*'); // Sesuaikan dengan nama tabel di database

    return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('aksi', function ($kategori) {
            return '
                <a href="'.route('kategori.show', $kategori->id).'" class="btn btn-info btn-sm">Detail</a>
                <a href="'.route('kategori.edit', $kategori->id).'" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" onclick="deleteKategori('.$kategori->id.')">Hapus</button>
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
}

    
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $page = (object) ['title' => 'Edit Kategori'];
        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];
        return view('kategori.edit', compact('kategori', 'page', 'breadcrumb'));
    }
}    