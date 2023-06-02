<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(): Response
    {
        $montir = Auth::user()->bengkel->montir;
        $idMontir = $montir->pluck("id")->all();
        $dataPemesanan = Pemesanan::whereIn('montir_id', $idMontir)->paginate(10);

        $barang = Auth::user()->bengkel->barang;
        $idBarang = $barang->pluck("id")->all();
        $dataPembelian = Pembelian::whereIn('barang_id', $idBarang)->get();

        return response()->view('riwayat.index', compact('dataPemesanan', 'dataPembelian'));
    }

    public function viewApprove()
    {
        $user = Auth::user();
        $barang = Barang::where('bengkel_id', $user->bengkel_id)->get();
        $idBarang = $barang->pluck("id")->all();
        $pembelian = Pembelian::whereIn('barang_id', $idBarang)->get();


        return view('approve', compact('pembelian'));
    }

    public function editApprove($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('edit-approve', compact('pembelian'));
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = $request->input('status');
        $pembelian->save();

        if ($pembelian->status === 'telah diproses') {
            $barang = $pembelian->barang;
            $barang->stok -= $pembelian->jumlah;
            $barang->save();
        }

        return redirect()->back()->with('success', 'Status pembelian barang berhasil diupdate');
    }
}
