<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\LoginRequest;
use App\Libraries\ResponseBase;
use App\Repositories\Driver\AuthRepository;

class AuthController extends Controller
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    //@TODO
    public function login(LoginRequest $request)
    {
        try {

            $response = $this->authRepository->authLogin($request);
            $data = [
                'data' => $response['data']
            ];

            return ResponseBase::success($data);

        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }
}