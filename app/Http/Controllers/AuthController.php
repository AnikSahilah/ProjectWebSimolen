<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('success', 'Anda Telah Login');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')->with('success', "Login berhasil");
        } else {
            return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
        }
    }

    public function registerFrom()
    {
        return view('register');
    }

    public function register(Request $request)
    {
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
        ]);

        $bengkel = Bengkel::create([
            'nama_bengkel' => $request->name . ' Bengkel',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => "admin",
            'bengkel_id' => $bengkel->id,

        ]);


        Auth::login($user);
        return redirect('/dashboard')->with('success', "Pendaftaran berhasil");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
