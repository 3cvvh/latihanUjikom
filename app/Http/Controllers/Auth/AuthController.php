<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\View\View;

class AuthController extends Controller
{
    // protected $authService;

    // public function __construct(AuthService $authService){
    //     $this->authService = $authService;
    // }
    //return view login
    public function login(): View
    {
        $title = "login|page";
        $tktk = "dkqdkwq";
    return view("auth.login",compact("title"));
    }

    //be login
    public function store(LoginRequest $request){
        $request->validated();
        // return $this->authService->login($request->all());
        $remember = $request->remember? true : false;
        return AuthService::login($request->all(),$remember);
    }
    public function logout(){
    return AuthService::logout(request());
    }
}
