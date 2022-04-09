<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Libraries\ResponseBase;
use App\Repositories\Driver\OrderRepository;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    //@TODO
    public function index()
    {
        try {

            $response = $this->orderRepository->listOrder();

            $data = [
                'data' => $response ? $response->order : []
            ];

            return ResponseBase::success($data);

        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }
}