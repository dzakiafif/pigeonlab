<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Libraries\ResponseBase;
use App\Repositories\User\AuthRepository;

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
            if (!$response['status'])
            {
                throw new \Exception($response['message']);
            }

            $data = [
                'data' => $response['data']
            ];

            return ResponseBase::success($data);

        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }

    //@TODO
    public function register(RegisterRequest $request)
    {
        try {

            $response = $this->authRepository->authRegister($request);

            $data = [
                'data' => $response
            ];

            return ResponseBase::success($data);

        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }

    public function profile()
    {
        $response = $this->authRepository->profile();

        $data = [
            'data' => $response
        ];

        return ResponseBase::success($data);
    }
}