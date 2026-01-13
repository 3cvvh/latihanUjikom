<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //return view login
    public function login(){
        $title = "login|page";
        $tktk = "dkqdkwq";
    return view("auth.login",compact("title"));
    }

    //be login
    public function store(Request $request){
    dd($request);
    }
}
