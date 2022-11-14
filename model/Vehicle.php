<?php

namespace iu\model;

Abstract Class Vehicle{
    private $speed;
    protected $max_speed;

    abstract protected static function GetCountry();

    public function __construct($max_speed,$speed=0){
        $this->speed=$speed;
        $this->max_speed=$max_speed;
    }

    public function start(){
        return "Начали движение";
    }

    public function stop(){
        return "Остановились";        
    }

    public function up(int $unit,&$speed){
        $speed=$speed+$unit;
        if ($speed>$this->max_speed){
            $speed=$this->max_speed;
        }
        return "скорость автомобиля " . $speed . " км";
    }

    public function down(int $unit,&$speed){
        $speed=$speed-$unit;
        if ($speed<=0){
            echo $this->stop();
        }
        else {
            return "скорость автомобиля " . $speed . " км";
        }
    }

    public function GetUpSpeed($unit){
        return $this->up($unit,$this->speed);
    }

    public function GetDownSpeed($unit){
        return $this->down($unit,$this->speed);
    }
    abstract protected function GetCountWheel();
}
