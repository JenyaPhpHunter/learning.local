<?php

namespace iu\model;

require __DIR__ . '/Vehicle.php';
require __DIR__ . '/MovableInterface.php';

Class Car extends Vehicle implements MovableInterface{
    public const COUNT_WHEELS = 4;

    function GetCountWheel(){
        return self::COUNT_WHEELS;
    }

    private static $country='Ukraine';
    public static function GetCountry(){
        return self::$country;
    }
}