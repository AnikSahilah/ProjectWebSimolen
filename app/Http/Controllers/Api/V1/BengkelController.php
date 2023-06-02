<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BengkelResource;
use App\Models\Bengkel;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    public function index(): JsonResponse
    {
        $bengkel = Bengkel::with('user')->with('montir')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil semua data bengkel.',
            'data' => BengkelResource::collection($bengkel),
        ], 200);
    }

    public function search(Request $request): JsonResponse
    {
        $keyword = $request->input('keyword');

        $users = User::where('role', 'admin')
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%")
                    ->orWhereHas('bengkel', function ($query) use ($keyword) {
                        $query->where('nama_bengkel', 'like', "%$keyword%")
                            ->orWhere('no_hp', 'like', "%$keyword%")
                            ->orWhere('alamat', 'like', "%$keyword%");
                    });
            })
            ->with('bengkel')
            ->paginate();

        $bengkelData = $users->map(function ($user) {
            return [
                'pemilik' => $user->name,
                'bengkel' => new BengkelResource($user->bengkel),
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil data bengkel.',
            'data' => $bengkelData,
        ], 200);
    }

    public function show(Request $request): JsonResponse
    {
        $user = User::where('role', 'admin')->with('bengkel')->where("bengkel_id", $request->id)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Bengkel tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail bengkel.',
            'data' => [
                'pemilik' => $user->name,
                'bengkel' => new BengkelResource($user->bengkel)
            ],
        ], 200);
    }
}
