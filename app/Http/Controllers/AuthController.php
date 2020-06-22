<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingInRequest;
use App\Http\Requests\SingUpRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function singUp(SingUpRequest $request) {
        User::create($request->validated());

        return response(null, 201);
    }

    public function singIn(SingInRequest $request) {
        $credentials = $request->validated();

        $field = filter_var($credentials['credential'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $user = User::where('email', $credentials['credential'])
            ->orWhere('phone', $credentials['credential'])->first();

        if ($user === null) {
            return response()->json([
                'message' => __('auth.notFound')
            ], 404);
        }
        if (!Hash::check($credentials['password'], $user['password'])) {
            return response()->json([
                'message' => __('auth.wrongPassword')
            ], 403);
        }

        $token = $user->createToken(config('app.name'));

        return response()->json($token, 200);
    }
}
