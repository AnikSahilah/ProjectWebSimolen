<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bengkel_id' => 'required|exists:tb_bengkel,id',
            'customer_id' => 'required|exists:tb_bengkel,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = new Rating([
            'bengkel_id' => $request->input('bengkel_id'),
            'customer_id' => $request->input('customer_id'),
            'rating' => $request->input('rating'),
        ]);

        $rating->save();

        return response()->json([
            'status' => true,
            'message' => 'Rating berhasil ditambahkan.',
            'data' => $rating,
        ], 200);
    }
}
