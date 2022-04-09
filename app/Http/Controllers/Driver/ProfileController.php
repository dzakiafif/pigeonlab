<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\ProfileRequest;
use App\Libraries\ResponseBase;
use App\Repositories\Driver\ProfileRepository;

class ProfileController extends Controller
{
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    public function index()
    {
        try {

            $response = $this->profileRepository->profile();

            $data = [
                'data' => $response
            ];

            return ResponseBase::success($data);
        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }

    public function update(ProfileRequest $request)
    {
        try {

            $response = $this->profileRepository->updateProfile($request);

            $data = [
                'data' => $response
            ];

            return ResponseBase::success($data);

        } catch (\Exception $e) {
            return ResponseBase::error(400, $e->getMessage());
        }
    }
}
