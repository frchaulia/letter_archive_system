<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if ($request->key != env('LOGIN_KEY')) {
            abort(404);
        }

        return view('auth.index');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember_me ?? false)) {
            return redirect()->route('dashboard.letters.index');
        }

        return redirect()->back()->withInput($request->only('email', 'password', 'remember_me'))->with('error', 'Email atau password salah');
    }

    public function redirectToGoogle(Request $request)
    {
        if ($request->key != env('LOGIN_KEY')) {
            abort(404);
        }
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            return redirect()->route('auth.index', ['key' => env('LOGIN_KEY')])->with('error', 'Email tidak terdaftar');
        }

        Auth::login($user, true);

        return redirect()->route('dashboard.letters.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.index', ['key' => env('LOGIN_KEY')]);
    }

    public function changePassword()
    {
        return view('auth.change-password', [
            'title' => 'Change Password',
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (!Auth::attempt(['email' => $user->email, 'password' => $request->current_password])) {
            return redirect()->back()->withErrors(['current_password' => 'Kata sandi saat ini salah'])->withInput();
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Kata sandi berhasil diubah');
    }
}
