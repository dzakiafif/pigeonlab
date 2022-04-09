<?php

namespace App\Repositories\Driver;

use App\Interfaces\Driver\ProfileInterfaces;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class ProfileRepository implements ProfileInterfaces
{
    public function profile()
    {
        return Auth::guard('api-drivers')->user();
    }

    public function updateProfile($request)
    {
        $driver = Driver::find(Auth::guard('api-drivers')->user()->id);

        if ($request->name && $request->name != '') {
            $driver->name = $request->name;
        }

        $driver->status_driver = $request->status;
        $driver->save();

        return $driver;
    }
}