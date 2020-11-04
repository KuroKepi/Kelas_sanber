<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('dateMiddleware');
    // }
    public function tes()
    {
        // dd(Auth::user());
        return "berhasil";
    }

    public function tanpaemail()
    {
        //   dd(Auth::user()->verif());
        return "sudah verikasi email";
    }

    public function tanpaadmin()
    {
        //    dd(Auth::user());
        return "verifikasi email dan admin";
    }
}
