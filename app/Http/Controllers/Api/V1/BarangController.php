<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BarangResource;
use App\Models\Barang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(): JsonResponse
    {
        $barang = Barang::with('bengkel')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil semua data barang.',
            'data' => BarangResource::collection($barang),
        ], 200);
    }

    public function search(Request $request): JsonResponse
    {
        $keyword = $request->input('keyword');
        $barangs = Barang::where('nama_barang', 'like', "%$keyword%")->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mencari barang.',
            'data' => BarangResource::collection($barangs),
        ], 200);
    }

    public function show(Request $request): JsonResponse
    {
        $barang = Barang::with('bengkel')->find($request->id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'Barang tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan detail barang.',
            'data' => new BarangResource($barang),
        ], 200);
    }
}
