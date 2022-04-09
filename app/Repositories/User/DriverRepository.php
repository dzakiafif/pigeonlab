<?php

namespace App\Repositories\User;

use App\Interfaces\User\DriverInterfaces;
use App\Models\Driver;

class DriverRepository implements DriverInterfaces
{
    public function listDriver()
    {
        $response = ['status' => true, 'data' => null, 'message' => null];

        $driver = Driver::where('status_driver', 1)->get();

        if($driver->isEmpty()) {
            $response['status'] = false;
            $response['message'] = "there is no driver stand by";
            return $response;
        }

        $response['data'] = $driver;

        return $response;
    }
}