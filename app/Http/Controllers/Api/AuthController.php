<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        dd($request->header('Accept'));
        // menerima data dari post request
        $credential = $request->post();

        // cek data credential
        if (Auth::attempt($credential)) {
            // membuat token
            $token = Auth::user()->createToken('token');

            return response()->json([
                'status' => true,
                'message' => 'Login Success',
                'AccessToken' => $token->plainTextToken,
            ], 200);
        }

        // jika cretential tidak valid
        return response()->json([
            'status' => false,
            'message' => 'Login Failed',
        ], 401);
    }

    public function logout(Request $request)
    {
        // menghapus token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout Success',
        ], 200);
    }
}
