<?php

namespace App\Http\Controllers\Api;

use App\Models\Pmb;
use App\Models\User;
use App\Models\Bayar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required|min:6 '
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = User::create(array_merge($request->all(), [
            'password' => Hash::make($request->password),
            'level' => "user",
        ]));

        if ($user) {
            return response()->json([
                'success' => 1,
                'message' => 'Registrasi berhasil',
                'user' => $user,
            ]);
        }

        return $this->error('Registrasi gagal');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $pmb = Pmb::where('user_id', $user->id)->first();
        $pembayaran = Bayar::where('user_id', $user->id)->first();

        if ($user) {

            if (password_verify($request->password, $user->password)) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang',
                    'user' => $user,
                    'pmb' => $pmb,
                    'pembayaran' => $pembayaran
                ]);
            }

            return $this->error('Password Salah');
        }
        return $this->error('Email tidak ditemukan');
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
