<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Libraries\ResponseBase;
use App\Repositories\User\DriverRepository;

class DriverController extends Controller
{
    private $driverRepository;

    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    //@TODO
    public function index()
    {
        try {

            $response = $this->driverRepository->listDriver();
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