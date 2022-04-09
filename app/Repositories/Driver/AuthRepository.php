<?php

namespace App\Repositories\Driver;

use App\Interfaces\Driver\AuthInterfaces;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterfaces
{
    public function authLogin($request)
    {
        $response = ['status' => true, 'data' => null, 'message' => null];
        $driver = Driver::where('username', $request->username)->first();
        if (!Hash::check($request->password, $driver->password)) {
            $response['status'] = false;
            $response['message'] = 'password not same. please check again';
            return $response;
        }
        $token = $driver->createToken('driver_token')->plainTextToken;
        $driver->token = $token;
        $response['data'] = $driver;
        return $response;
    }
}