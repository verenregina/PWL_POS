<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    // Menampilkan halaman utama level
    public function index()
    {
        $page = (object) ['title' => 'Data Level'];
        $activeMenu = 'level'; // Menandai menu level sebagai aktif
        $breadcrumb = (object) [
            'title' => 'Data Level',
            'list' => ['Home' => url('/'), 'Data Level']
        ];

        return view('level.index', compact('page', 'activeMenu', 'breadcrumb'));
    }

    // Mengambil data untuk DataTables
    public function getData()
    {
        $level = Level::select(['level_id', 'level_nama']);

        return DataTables::of($level)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                return '
                    <a href="'.url('level/edit/'.$row->level_id).'" class="btn btn-sm btn-warning">Edit</a>
                    <a href="'.url('level/delete/'.$row->level_id).'" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</a>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function data()
{
    $levels = Level::select(['id', 'level_kode', 'level_nama'])->get();

    return datatables()
        ->of($levels)
        ->addIndexColumn()
        ->addColumn('level_kode', function ($level) {
            return $level->level_kode ?? '-';  // Jika NULL, tampilkan '-'
        })
        ->addColumn('aksi', function ($level) {
            return '
                <a href="'.route('level.edit', $level->id).'" class="btn btn-sm btn-warning">Edit</a>
                <a href="'.route('level.delete', $level->id).'" class="btn btn-sm btn-danger">Hapus</a>
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
}


    // Menampilkan form tambah level
    public function create()
    {
        $page = (object) ['title' => 'Tambah Level'];
    
        // Tambahkan breadcrumb
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
    
        return view('level.create', compact('page', 'breadcrumb'));
    }

    // Menyimpan level baru
    public function store(Request $request)
    {
        $request->validate([
            'level_nama' => 'required'
        ]);
    
        // Ambil last level berdasarkan primary key yang benar
        $lastLevel = Level::orderBy('level_id', 'desc')->first();
        $newKode = 'L001';
    
        if ($lastLevel) {
            $lastNumber = (int) substr($lastLevel->level_kode, 1);
            $newKode = 'L' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }
    
        Level::create([
            'level_kode' => $newKode,
            'level_nama' => $request->level_nama
        ]);
    
        return redirect()->route('level.index')->with('success', 'Level berhasil ditambahkan.');
    }
    

    // Menampilkan form edit level
    public function edit($id)
{
    $level = Level::findOrFail($id);
    $page = (object) ['title' => 'Edit Level'];

    // Tambahkan breadcrumb
    $breadcrumb = (object) [
        'title' => 'Edit Level',
        'list' => ['Home', 'Level', 'Edit']
    ];

    return view('level.edit', compact('level', 'page', 'breadcrumb'));
}

    // Memperbarui data level
    public function update(Request $request, $id)
    {
        $request->validate([
            'level_nama' => 'required|string|unique:m_level,level_nama,'.$id.',level_id'
        ]);

        $level = Level::findOrFail($id);
        $level->update(['level_nama' => $request->level_nama]);

        return redirect('/level')->with('success', 'Data level berhasil diperbarui.');
    }

    //detail
    public function show($id)
{
    $level = Level::findOrFail($id);
    $page = (object) ['title' => 'Detail Level'];

    // Breadcrumb untuk navigasi
    $breadcrumb = (object) [
        'title' => 'Detail Level',
        'list' => ['Home', 'Level', 'Detail']
    ];

    return view('level.show', compact('level', 'page', 'breadcrumb'));
}

    // Menghapus data level
        public function destroy($id)
    {
        try {
            $level = Level::findOrFail($id);
            $level->delete();

            return response()->json(['message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data!'], 500);
        }
    }
}