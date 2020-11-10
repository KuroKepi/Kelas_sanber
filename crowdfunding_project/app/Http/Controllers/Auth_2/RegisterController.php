<?php

namespace App\Http\Controllers\Auth_2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Otp;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //     request()->validate([
    //         'name'  => ['required','string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
    //         'password' => ['required']
    //     ]);

    //     User::create([
    //         'name'      => request('name'),
    //         'email'     => request('email'),
    //         'password'  => Hash::make(request('password'))
    //     ]);

    //     return response('Thanks !');
    // }

    public function register(Request $request)
    {
        request()->validate([
            'name'  => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required']
        ]);

        $tes = User::create([
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => Hash::make(request('password'))
        ]);

        Otp::create([
            'otp'          => rand(1000,9999),
            'user_id'       => $tes->id,
            'valid_until'   =>  now()->addHours(2)
        ]);
        return response()->json([
            'response_code'     => "00",
            'response_message'  => "Silakan cek email anda untuk verif, kode otp hanya berlaku 2 jam !"
        ]);
    }

    public function verifikasi(Request $request)
    {
        $otp_code = Otp::where('otp', $request->otp)->first();

        if(!$otp_code)
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Kode OTP tidak ditemukan"
            ]);
        }

        if(now() > $otp_code->valid_until)
        {
            // $otp_code->delete();
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Kode OTP sudah expired"
            ]);
        }

        //update user
        $user = User::find($otp_code->user_id);
        $user->email_verified_at = now();
        $user->save();
        //delete OTP
        $otp_code->delete();
        return response()->json([
            'response_code'     => "00",
            'response_message'  => "Email telah diverifikasi",
            'data'              => $user
        ]);
    }

    public function regenerateOtp(Request $request)
    {
        $tes2 = User::where('email',$request->email)->first();

        if($tes2==null)
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Email tidak ditemukan, silakan masukkan kembali"
            ]);
        }

        //update otp
        Otp::where('user_id',$tes2->id)->update([
            'otp'          => rand(1000,9999),
            'valid_until'   =>  now()->addHours(2),
        ]);
        return response()->json([
            'response_code'     => "00",
            'response_message'  => "Kode OTP sudah dibuat ulang, kode hanya berlaku 2 jam"
        ]);
    }

    public function passwordReset(Request $request)
    {
        $request->validate([
            'email'     => ['required', 'string', 'email'],
            'password'  => ['required']
        ]);

        $pass = User::where('email',$request->email)->first();
        if($pass == null)
        {
            return response()->json([
                'response_code'     => "01",
                'response_message'  => "Email tidak ditemukan"
            ]);
        }

        $pass->update([
            'password'  => Hash::make(request('password'))
        ]);

        return response()->json([
            'response_code'     => "00",
            'response_message'  => "Password telah diubah !"
        ]);
    }
    //php artisan jwt:secret
    //php artisan cache:clear
    //php artisan config:clear
}
