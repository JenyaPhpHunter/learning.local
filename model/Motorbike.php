<?php

namespace iu\model;

Class Motorbike extends Vehicle implements MovableInterface{
    public const COUNT_WHEELS = 2;
    private static $country='USA';

    function GetCountWheel(){
        return self::COUNT_WHEELS;
    }

    public static function GetCountry(){
        return self::$country;
    }
    public function up(int $unit,&$speed){
        $speed=$speed+$unit;
        if ($speed>$this->max_speed){
            $speed=$this->max_speed;
        }
        return "скорость мотоцикла " . $speed . " км";
    }
    public function down(int $unit,&$speed){
        $speed=$speed-$unit;
        if ($speed<=0){
            echo $this->stop();
        }
        else {
            return "скорость мотоцикла " . $speed . " км";
        }
    }
}