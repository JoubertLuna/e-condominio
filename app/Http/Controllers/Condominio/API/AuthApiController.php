<?php

namespace App\Http\Controllers\Condominio\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|string',
            'password' => 'required|min:8|max:36|string',
        ]);

        $token = Auth::guard('api')->attempt($request->only('email', 'password'));
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não autorizado',
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'user' => Auth()->user(),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Desconectado com sucesso',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
