<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function update(Request $request, Customer $customer)
    {
        $user = Auth::user();
        $customer = $user->customer;

        $validatedData = $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('foto_user', $fileName);

            // delete foto lama jika ada
            if (customer->photo) {
                Storage::delete($customer->photo);
            }

            $customer->photo = $filePath;
        }

        $customer->alamat = $validatedData['alamat'];
        $customer->no_hp = $validatedData['no_hp'];
        $customer->jenis_kelamin = $validatedData['jenis_kelamin'];
        $customer->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil update profile.',
            'data' => $customer,
        ], 200);
    }
}
