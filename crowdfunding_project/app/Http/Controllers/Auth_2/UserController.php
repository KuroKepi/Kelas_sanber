<?php

namespace App\Http\Controllers\Auth_2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function user(Request $request)
    {
        return $request->user()->name;
    }

    public function profile(Request $request)
    {
        if(!Auth::user())
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "User profile tidak ditemukan !"
            ]);
        }
        if(!Auth::user()->email_verified_at)
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Akun anda belum melakukan verifikasi"
            ]);
        }

        return response()->json([
            'response_code'     => "00",
            'response_message'  => "User profile ditemukan !",
            'data'              => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        if(!Auth::user()->email_verified_at)
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Akun anda belum melakukan verifikasi"
            ]);
        }
        request()->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = $request->user();
        $path = $request->photo->store('/photo/users','public');
        $user->name = request('name');
        $user->photo = $path;
        $user->save();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Berhasil Update profile',
            'data' => [
                'profile' => $user
            ]
        ]);
    }
}
