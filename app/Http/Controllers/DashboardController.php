<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMontir = Auth::user()->bengkel->montir->count();
        $totalBarang = Auth::user()->bengkel->barang->count();

        $montir = Auth::user()->bengkel->montir;
        $idMontir = $montir->pluck("id")->all();
        $totalPemesanan = Pemesanan::whereIn('montir_id', $idMontir)->count();

        $barang = Auth::user()->bengkel->barang;
        $idBarang = $barang->pluck("id")->all();
        $totalPembelian = Pembelian::whereIn('barang_id', $idBarang)->count();

        return view('dashboard', compact('totalMontir', 'totalBarang', 'totalPemesanan', 'totalPembelian'));
    }
}
