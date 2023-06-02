<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BengkelController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('bengkel.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $bengkel = $user->bengkel;

        $validatedData = $request->validate([
            'nama_bengkel' => 'required|max:255',
            'alamat' => 'required',
            'no_hp' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('foto_bengkel', $fileName);

            // delete foto lama jika ada
            if ($bengkel->photo) {
                Storage::delete($bengkel->photo);
            }

            $bengkel->photo = $filePath;
        }

        $bengkel->nama_bengkel = $validatedData['nama_bengkel'];
        $bengkel->alamat = $validatedData['alamat'];
        $bengkel->no_hp = $validatedData['no_hp'];
        $bengkel->save();

        return redirect()->back()->with('success', 'Data bengkel berhasil diupdate.');
    }
}
