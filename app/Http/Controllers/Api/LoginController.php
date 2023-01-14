<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            abort(401, 'Invalid Credentials');
        }

        $token = auth()->user()->createToken('token');
        return response()->json([
            'data' => [
                'token' => $token->plainTextToken
            ]
        ]);
    }
}
