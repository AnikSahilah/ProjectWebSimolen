<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembelianRequest;
use App\Http\Resources\PembelianResource;
use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index(): JsonResponse
    {
        $pembelian = Pembelian::where('customer_id', Auth::user()->customer->id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan daftar pembelian.',
            'data' => PembelianResource::collection($pembelian)
        ], 200);
    }

    public function show($id): JsonResponse
    {
        try {
            $pembelian = Pembelian::findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mendapatkan detail pembelian.',
                'data' => new PembelianResource($pembelian),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Data pembelian tidak ditemukan.',
            ], 404);
        }
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'customer_id' => 'required|exists:tb_customer,id',
            'barang_id' => 'required|exists:tb_barang,id',
            'jumlah' => 'required|integer',
            'tanggal_pembelian' => 'required|date',

        ]);

        $barang = Barang::findOrFail($request->barang_id);

        $pembelian = new Pembelian();
        $pembelian->customer_id = $request->customer_id;
        $pembelian->barang_id = $request->barang_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->tanggal_pembelian = $request->tanggal_pembelian;
        $pembelian->total = $barang->harga * $request->jumlah;
        $pembelian->status = "belum diproses";
        $pembelian->save();

        return response()->json([
            'status' => true,
            'message' => 'Pembelian berhasil. silahkan menunggu bengkel untuk persetujuan.',
            'data' => new PembelianResource($pembelian)
        ], 200);
    }

    public function approveCustomer($id): JsonResponse
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = "selesai";
        $pembelian->save();

        return response()->json([
            'status' => true,
            'message' => 'Terimakasih telah membeli di bengkel kami.',
            'data' => new PembelianResource($pembelian),
        ], 200);
    }
}
