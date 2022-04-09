<?php

namespace App\Libraries;

class DistanceLib 
{
    public static function distance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,$unit)
    {

        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +
            cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) *
            cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $units = strtoupper($unit);
        if($units == 'K')
            return round($miles * 1.609344, PHP_ROUND_HALF_DOWN) . ' ' . 'km';
        else
            return round($miles * 1609.344, PHP_ROUND_HALF_DOWN) . ' '  .'m';

    }
}