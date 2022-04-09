<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::insert([
            [
                'nopol' => 'W9001P',
                'username' => 'antonio',
                'password' => Hash::make('antonio12345'),
                'name' => 'Antonio',
                'status_driver' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nopol' => 'W9002P',
                'username' => 'bonito',
                'password' => Hash::make('bonito12345'),
                'name' => 'Bonito',
                'status_driver' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nopol' => 'W9003P',
                'username' => 'carillo',
                'password' => Hash::make('carillo12345'),
                'name' => 'Carillo',
                'status_driver' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nopol' => 'W9004P',
                'username' => 'alejandro',
                'password' => Hash::make('alejandro12345'),
                'name' => 'Alejandro',
                'status_driver' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
