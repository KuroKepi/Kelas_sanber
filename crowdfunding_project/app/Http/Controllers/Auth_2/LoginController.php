<?php

namespace App\Http\Controllers\Auth_2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'     => ['required','string'],
            'password'  => ['required']
        ]);

        if(!$token = auth()->attempt($request->only('email','password')))
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Cek kembali akun anda !"
            ]);
        }
        $user = auth()->user();
        if($user->email_verified_at == null)
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Silakan verifikasi email anda !"
            ]);
        }
        return response()->json([
            'response_code'     => "00",
            'response_message'  => "Login berhasil !",
            'token'             => $token,
            'user'              => $user
        ]);
    }
}
