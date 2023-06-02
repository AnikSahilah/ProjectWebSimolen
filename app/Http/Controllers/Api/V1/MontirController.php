<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MontirResource;
use App\Models\Montir;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MontirController extends Controller
{
    public function index(): JsonResponse
    {
        $montir = Montir::with('user')->with('bengkel')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil semua data montir.',
            'data' => MontirResource::collection($montir),
        ], 200);
    }

    public function search(Request $request): JsonResponse
    {
        $keyword = $request->input('keyword');
        $montirs = Montir::whereHas('user', function ($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        })->with('user')->with('bengkel')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mencari montir.',
            'data' => MontirResource::collection($montirs),
        ], 200);
    }

    public function show(Request $request): JsonResponse
    {
        $montir = Montir::with('user')->with('bengkel')->find($request->id);

        if (!$montir) {
            return response()->json([
                'status' => false,
                'message' => 'Montir tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mendapatkan detail montir.',
            'data' => new MontirResource($montir),
        ], 200);
    }
}
