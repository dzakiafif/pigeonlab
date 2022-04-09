<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderRequest;
use App\Libraries\ResponseBase;
use App\Repositories\User\OrderRepository;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    //@TODO
    public function store(OrderRequest $request)
    {
        try {

            $response = $this->orderRepository->createOrder($request);
            if(!$response['status'])
                throw new \Exception($response['message']);

            $data = [
                'data' => $response['data']
            ];

            return ResponseBase::success($data);

        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }
}