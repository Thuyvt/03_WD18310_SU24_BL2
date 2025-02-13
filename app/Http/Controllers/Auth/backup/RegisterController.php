<?php

namespace App\Http\Controllers\Auth\backup;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function index() {
        // hiển trang đăng kỳ
//        dd('Form đăng ký');
        return view('auth.register');
    }

    public function register(Request $request) {
        // xử lý logic
//        dd($request->all());

        $data = $request->validate([
            'name' => ['required', 'string', 'max:50' ],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // tạo user
        $user = User::query()->create($data);
        // GUI email
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($token, $user->name));
//        // Login với user vừa tạo
//        Auth::login($user);
//        // generate token mới
//        $request->session()->regenerate();

        return redirect()->intended('/');
    }
}
