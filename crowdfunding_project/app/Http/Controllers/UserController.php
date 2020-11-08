<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        return "anda adalah user yang sudah di verifikasi email";
    }
    public function admin()
    {
        return "anda adalah admin !";
    }
}
