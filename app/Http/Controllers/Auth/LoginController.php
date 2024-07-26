<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index (){
        return view('auth.login');
    }
    public function login(Request $request) {
        //xử lý logic login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
    public function logout() {
        // xử ký logic logout
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }

    public function verify($token) {
        $user = User::query()->where('email', base64_decode($token))
            ->where('email_verified_at', null)->first();
        if ($user) {
//            $user->update(['email_verified_at' => Carbon::now()]);
            $user->email_verified_at = Carbon::now();
            $user->save();

            Auth::login($user);
            // generate token mới
            \request()->session()->regenerate();
            return redirect()->route('welcome');
        }
    }
}
