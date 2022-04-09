<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Authenticatable
{
    use HasApiTokens;

    protected $guarded = [];

    protected $hidden = ['password'];

    public function pigeon()
    {
        return $this->hasOne(Pigeon::class, 'driver_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'driver_id');
    }
}