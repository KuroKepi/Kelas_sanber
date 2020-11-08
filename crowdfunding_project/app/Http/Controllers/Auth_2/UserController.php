<?php

namespace App\Http\Controllers\Auth_2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
