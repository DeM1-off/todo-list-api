<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Service\AuthService;

class AuthController extends Controller
{

    /**
     * @param  \App\Service\AuthService  $service
     */
    public function __construct(private AuthService $service)
    {
        $this->middleware('auth:sanctum', ['except' => ['login', 'register']]);
    }

    /**
     * @param  \App\Http\Requests\AuthRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
      return $this->service->login($request);
    }

    /**
     * @param  \App\Http\Requests\RegisterRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        return $this->service->register($request);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
       return $this->service->logout();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
      return $this->service->refresh();
    }
}
