<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use  Yajra\DataTables\Facades\DataTables;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');


        return view('produk.index', compact('kategori'));
    }

    public function data(Request $request)
    {
        $produk = Produk::with('kategori_produk')->orderBy('id_produk', 'desc')->get();

        return datatables()
            ->of($produk)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                <input type="checkbox" name="id_produk[]" value="' . $produk->id_produk . '" >
                ';
            })
            ->editColumn('kode_produk', function ($produk) {
                return '<button type="button" class="btn btn-sm btn-success">' . $produk->kode_produk . '</button>';
            })
            ->editColumn('harga_beli', function ($produk) {
                return format_uang_rp($produk->harga_beli);
            })
            ->editColumn('harga_jual', function ($produk) {
                return format_uang_rp($produk->harga_jual);
            })
            ->editColumn('stok', function ($produk) {
                return format_angka($produk->stok);
            })
            // ->addColumn('kategori', function ($produk) {
            //     return $produk->kategori_produk->nama_kategori;
            // })
            ->addColumn('aksi', function ($produk) {
                $button = '
                <div class="btn-group">
                    <button type="button" class="btn btn-dark btn-xs btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        Select&nbsp;
                    </button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" onclick="editForm(`' . route('produk.update', $produk->id_produk) . '`)">Edit</a>
                        <a class="dropdown-item" onclick="deleteData(`' . route('produk.destroy', $produk->id_produk) . '`,`' . $produk->nama_produk . '`)">Hapus</a>
                    </div>
                </div>
                ';

                return $button;
                // return '
                // <div class="btn-group">
                // <button onclick="editForm(`' . route('produk.update', $produk->id_produk) . '`)" class="btn btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></button>
                // <button onclick="deleteData(`' . route('produk.destroy', $produk->id_produk) . '`)" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                // </div>
                // ';
            })
            ->rawColumns(['aksi', 'kode_produk', 'select_all'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = Produk::latest()->first();
        $request['diskon'] ? $request['diskon'] : $request['diskon'] = 0;
        $request['kode_produk'] = 'P' . tambah_nol_didepan($produk->id_produk + 1, 6);

        $produk = Produk::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return response()->json('Data berhasil dihapus', 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_produk as $key) {
            $produk = Produk::findOrFail($key);
            $produk->delete();
        }

        return response()->json('Data berhasil dihapus', 204);
    }

    public function cetakBarcode(Request $request)
    {
        $dataProduk = array();
        foreach ($request->id_produk as $id) {
            $produk = Produk::findOrFail($id);
            $dataProduk[] = $produk;
        }

        $pdf = PDF::loadView('produk.barcode', compact('dataProduk'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('produk.pdf');
    }
}
