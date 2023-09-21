<?php

namespace App\Service;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthService
{


    /**
     * @param  \App\Http\Requests\AuthRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
              'user' => $user,
              'authorization' => [
                'token' => $user->createToken('ApiToken')->plainTextToken,
                'type' => 'bearer',
              ],
            ]);
        }
        return response()->json([
          'message' => 'Invalid credentials',
        ], 401);
    }

    /**
     * @param  \App\Http\Requests\RegisterRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);

        return response()->json([
          'message' => 'User created successfully',
          'user' => $user,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
          'message' => 'Successfully logged out',
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json([
          'user' => Auth::user(),
          'authorisation' => [
            'token' => Auth::refresh(),
            'type' => 'bearer',
          ],
        ]);
    }

}
