<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MontirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bengkel = Auth::user()->bengkel;
        $data = User::where('role', 'montir')->where('bengkel_id', $bengkel->id)->paginate(10);

        return view('montir.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('montir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bengkel = Auth::user()->bengkel;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._]+@gmail\.com$/i',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[0-9]/',
                'regex:/[A-Z]/',
                'regex:/[!@#$%^&*(),.?":{}|<>]/'
            ],
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'bengkel_id' => $bengkel->id,
                'role' => 'montir'
            ]);

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('foto_user', $fileName);
                if ($user->photo) {
                    Storage::delete($user->photo);
                }

                $user->photo = $filePath;
                $user->save();
            }

            Montir::create([
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'bengkel_id' => $bengkel->id,
                'user_id' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Montir berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan montir: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Montir $montir)
    {
        return view('montir.show', compact('montir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Montir $montir)
    {
        return view('montir.edit', compact('montir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Montir $montir)
    {
        $user = $montir->user;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        try {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->input('password')) {
                $request->validate([
                    'password' => 'nullable|min:8',
                ]);
                $user->password = bcrypt($request->input('password'));
            }
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('foto_user', $fileName);
                if ($user->photo) {
                    Storage::delete($user->photo);
                }

                $user->photo = $filePath;
            }
            $user->save();

            $montir->alamat = $request->input('alamat');
            $montir->no_hp = $request->input('no_hp');
            $montir->jenis_kelamin = $request->input('jenis_kelamin');
            $montir->save();


            return redirect()->back()->with('success', 'Montir berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengedit montir: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Montir $montir)
    {
        try {
            $user = $montir->user;

            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $user->delete();

            return redirect()->back()->with('success', 'Montir berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus montir: ' . $e->getMessage());
        }
    }
}
