<?php 

require __DIR__ . '/model/Car.php';
require __DIR__ . '/model/Motorbike.php';

$vechicles=[new iu\model\Car(100),new iu\model\Motorbike(80)];
foreach($vechicles as $vechicle){
    // echo $vechicle::$country . PHP_EOL;
    echo $vechicle::GetCountry(). PHP_EOL;
    // echo $vechicle::COUNT_WHEELS. PHP_EOL;
    echo $vechicle::GetCountWheel(). PHP_EOL;
    echo $vechicle->start() . PHP_EOL;
    echo $vechicle-> GetUpSpeed(50). PHP_EOL;
    echo $vechicle-> GetUpSpeed(60). PHP_EOL;
    echo $vechicle-> GetDownSpeed(30). PHP_EOL;
    echo $vechicle-> GetDownSpeed(70). PHP_EOL;
    // echo $vechicle->stop() . PHP_EOL;
    echo PHP_EOL;
}


