<?php

namespace App\Repositories\User;

use App\Interfaces\User\OrderInterfaces;
use App\Models\Driver;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderInterfaces
{
    public function createOrder($request)
    {
        $response = ['status' => true, 'data' => null, 'message' => null];

        $nopol = strtoupper(str_replace(' ', '', $request->nopol));

        $checkOrder = Order::where('user_id', Auth::guard('api-users')->user()->id)->where('status', "0")->first();
        if ($checkOrder) {
            $response['status'] = false;
            $response['message'] = "still process order";
            return $response;
        }

        $driver = Driver::with('pigeon')->where('nopol', $nopol)->first();
        if(!$driver) {
            $response['status'] = false;
            $response['message'] = "there is no nopol with " . $request->nopol;
            return $response;
        }

        if ($request->distance == 0) {
            $response['status'] = false;
            $response['message'] = "you must insert distance more than 0";
            return $response;
        }

        if ($request->distance < $driver->range) {
            $estimationCost = $request->distance * $driver->pigeon->cost;
            $time = round($request->distance / $driver->pigeon->speed);
            $estimationDeadline = Carbon::now()->addHour($time)->format('Y-m-d H:i:s');
        } else {
            $estimationCost = $request->distance * $driver->pigeon->cost;
            $division = floor($request->distance / $driver->pigeon->range);
            $time = (($driver->pigeon->range / $driver->pigeon->speed) * $division) + ($driver->pigeon->downtime * $division) + (($request->distance % $driver->pigeon->range) / $driver->pigeon->speed);
            $fixedTime = round($time);
            $estimationDeadline = Carbon::now()->addHour($fixedTime)->format('Y-m-d H:i:s');
        }

        $order = new Order();
        $order->user_id = Auth::guard('api-users')->user()->id;
        $order->driver_id = $driver->id;
        $order->status = "0";
        $order->estimation_at = $estimationDeadline;
        $order->estimation_cost = $estimationCost;
        $order->save();

        $response['data'] = $order;

        return $response;
    }
}