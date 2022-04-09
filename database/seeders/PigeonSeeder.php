<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Pigeon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PigeonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pigeon::insert([
            [
                'driver_id' => Driver::where('username','antonio')->first()->id,
                'speed' => 70,
                'range' => 600,
                'cost' => 2,
                'downtime' => 2,
                'total_passenger' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'driver_id' => Driver::where('username','bonito')->first()->id,
                'speed' => 80,
                'range' => 500,
                'cost' => 2,
                'downtime' => 3,
                'total_passenger' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'driver_id' => Driver::where('username','carillo')->first()->id,
                'speed' => 65,
                'range' => 1000,
                'cost' => 2,
                'downtime' => 3,
                'total_passenger' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'driver_id' => Driver::where('username','alejandro')->first()->id,
                'speed' => 70,
                'range' => 800,
                'cost' => 2,
                'downtime' => 2,
                'total_passenger' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
