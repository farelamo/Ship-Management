<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginValidator;
use App\Http\Requests\Auth\RegisterValidator;
use App\Services\Auth\AuthServices;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(AuthServices $service){
        $this->service = $service;
    }
    
    public function showLogin(Request $request)
    {
        return $this->service->showLogin($request);
    }

    public function login(LoginValidator $request)
    {
        return $this->service->login($request);
    }
    
    public function showRegister()
    {
        return $this->service->showRegister();
    }

    public function register(RegisterValidator $request)
    {
        return $this->service->register($request);
    }

    public function logout()
    {
        return $this->service->logout();
    }
}
