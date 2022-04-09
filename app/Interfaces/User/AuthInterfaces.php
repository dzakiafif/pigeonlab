<?php

namespace App\Interfaces\User;

interface AuthInterfaces
{
    public function authLogin($request);
    public function authRegister($request);
    public function profile();
}