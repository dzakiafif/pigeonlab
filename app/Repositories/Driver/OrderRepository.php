<?php

namespace App\Repositories\Driver;

use App\Interfaces\Driver\OrderInterfaces;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderInterfaces
{
    public function listOrder()
    {
        return Driver::with(['order.user', 'order.driver'])->where('id', Auth::guard('api-drivers')->user()->id)->first();
    }
}