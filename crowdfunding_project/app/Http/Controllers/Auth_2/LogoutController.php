<?php

namespace App\Http\Controllers\Auth_2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        auth()->logout();
        return response()->json([
            'response_code'     => "00",
            'response_message'  => "Berhasil Logout !"
        ]);
    }
}
