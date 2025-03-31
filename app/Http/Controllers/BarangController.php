<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $page = (object) ['title' => 'Data Barang'];
        $breadcrumb = (object) ['title' => 'Data Barang', 'list' => ['Home', 'Barang']];

        return view('barang.index', compact('page', 'breadcrumb'));
    }

    public function data()
    {
        $query = Barang::with('kategori')->select('m_barang.*');
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('kategori', function ($barang) {
                return $barang->kategori->kategori_nama ?? '-';
            })
            ->addColumn('aksi', function ($barang) {
                return '
                    <a href="'.route('barang.show', $barang->barang_id).'" class="btn btn-info btn-sm">Detail</a>
                    <a href="'.route('barang.edit', $barang->barang_id).'" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteBarang('.$barang->barang_id.')">Hapus</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $page = (object) ['title' => 'Tambah Barang'];
        $breadcrumb = (object) ['title' => 'Tambah Barang', 'list' => ['Home', 'Barang', 'Tambah']];
        $kategori = Kategori::all();

        return view('barang.create', compact('page', 'breadcrumb', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_kode' => 'required|unique:m_barang',
            'barang_nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        $page = (object) ['title' => 'Detail Barang'];
        $breadcrumb = (object) ['title' => 'Detail Barang', 'list' => ['Home', 'Barang', 'Detail']];

        return view('barang.show', compact('barang', 'page', 'breadcrumb'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $page = (object) ['title' => 'Edit Barang'];
        $breadcrumb = (object) ['title' => 'Edit Barang', 'list' => ['Home', 'Barang', 'Edit']];
        $kategori = Kategori::all();

        return view('barang.edit', compact('barang', 'page', 'breadcrumb', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_kode' => 'required|unique:m_barang,barang_kode,'.$id.',barang_id',
            'barang_nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Barang::destroy($id);

        return response()->json(['message' => 'Barang berhasil dihapus']);
    }
}