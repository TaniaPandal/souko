<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
      $data = $request->validated();
      if(Auth::atempt($data)) {
        return response ([
            'message'=> 'Email o contraseña incorrectos'
        ]);
      }
      /**@var User $user */
      $user = Auth::user();
      $token = $user->createToken('main')->plainTextToken;
      return response([
        'user'=>$user,
        'token'=>$token
    ]);

    }

    public function signup(SignupRequest $request )
    {
        $data = $request->validated();
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ]);

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user'=>$user,
            'token'=>$token
        ]);

    }

    public function logout($request)
    {
        /**@var User $user */
        $user = $request->user();



    }
}   

