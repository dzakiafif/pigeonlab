<?php

namespace App\Repositories\User;

use App\Interfaces\User\AuthInterfaces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterfaces
{
   
    public function authLogin($request)
    {
        $response = ['status' => true, 'data' => null, 'message' => null];

        $user = User::where('username', $request->username)->first();

        if (!Hash::check($request->password, $user->password)) {
            $response['status'] = false;
            $response['message'] = 'password not same. please check again';
            return $response;
        }

        $token = $user->createToken('user_token')->plainTextToken;

        $user->token = $token;
        $response['data'] = $user;

        return $response;
    }

    public function authRegister($request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->save();

        return $user;
    }

    public function profile()
    {
        return Auth::guard('api-users')->user();
    }

    
}