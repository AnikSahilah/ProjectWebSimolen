<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PemesananResource;
use App\Models\Pemesanan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class PemesananController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $pemesanan = null;
        if ($user->role === 'montir'){
                $pemesanan = Pemesanan::where('montir_id', Auth::user()->montir->id)->get();
            }
        if ($user->role === 'customer'){
                $pemesanan = Pemesanan::where('customer_id', Auth::user()->customer->id)->get();
            }
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan daftar pemesanan.',
            'data' => PemesananResource::collection($pemesanan)
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'customer_id' => 'required|exists:tb_customer,id',
            'montir_id' => 'required|exists:tb_montir,id',
            'tanggal_pemesanan' => 'required|date',
        ]);

        $pemesanan = new Pemesanan();
        $pemesanan->customer_id = $request->customer_id;
        $pemesanan->montir_id = $request->montir_id;
        $pemesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
        $pemesanan->total = "0";
        $pemesanan->status = "menunggu persetujuan";
        $pemesanan->created_at = today();
        $pemesanan->save();

        return response()->json([
            'status' => true,
            'message' => 'Pemesanan berhasil. Silahkan menunggu persetujuan montir.',
            'data' => new PemesananResource($pemesanan)
        ], 201);
    }

    public function show($id): JsonResponse
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mendapatkan detail pemesanan.',
                'data' => new PemesananResource($pemesanan),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Data pemesanan tidak ditemukan.',
            ], 404);
        }
    }

    public function approve($id): JsonResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = "disetujui";
        $pemesanan->save();

        return response()->json([
            'status' => true,
            'message' => 'Pemesanan telah disetujui oleh montir.',
            'data' => new PemesananResource($pemesanan),
        ], 200);
    }

    public function approveCustomer(Request $request, $id): JsonResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $request->validate([
            'total' => 'required|integer',
        ]);

        $pemesanan->total = $request->total;
        $pemesanan->status = "selesai";
        $pemesanan->save();

        return response()->json([
            'status' => true,
            'message' => 'Terimakasih telah mempercayai montir kami.',
            'data' => new PemesananResource($pemesanan),
        ], 200);
    }
}
