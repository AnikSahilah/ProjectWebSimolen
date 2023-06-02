<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bengkel = Auth::user()->bengkel;
        $data = Barang::where('bengkel_id', $bengkel->id)->paginate(10);

        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bengkel = Auth::user()->bengkel;

        $request->validate([
            'kode_barang' => 'required|unique:tb_barang',
            'nama_barang' => 'required',
            'harga' => 'required',
            'merek' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required|numeric|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        try {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $filePath = $photo->storeAs('foto_barang', $photoName);

            $barang = new Barang();
            $barang->bengkel_id = $bengkel->id;
            $barang->kode_barang = $request->kode_barang;
            $barang->nama_barang = $request->nama_barang;
            $barang->harga = $request->harga;
            $barang->merek = $request->merek;
            $barang->spesifikasi = $request->spesifikasi;
            $barang->stok = $request->stok;
            $barang->photo = $filePath;
            $barang->save();

            return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan Barang: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|unique:tb_barang,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'harga' => 'required',
            'merek' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        try {
            if ($request->file('photo')) {
                if ($barang->photo) {
                    Storage::delete($barang->photo);
                }
                $photo = $request->file('photo');
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $filePath = $photo->storeAs('foto_barang', $photoName);
                $barang->photo = $filePath;
            }

            $barang->kode_barang = $request->kode_barang;
            $barang->nama_barang = $request->nama_barang;
            $barang->harga = $request->harga;
            $barang->merek = $request->merek;
            $barang->spesifikasi = $request->spesifikasi;
            $barang->stok = $request->stok;
            $barang->save();

            return redirect()->back()->with('success', 'Barang berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate Barang: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try {

            if ($barang->photo) {
                Storage::delete($barang->photo);
            }
            $barang->delete();

            return redirect()->back()->with('success', 'Barang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus barang: ' . $e->getMessage());
        }
    }
}
