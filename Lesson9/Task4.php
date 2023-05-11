<?php

$city1 = rand(100, 200);
$city1Radius = rand(30, 70);
$city2 = rand(500, 700);
$city2Radius = rand(30, 70);
$cars = [];
$inCitySpeed = 70;
$outCitySpeed = 90;

// My little update - map =)
echo "========/" . ($city1 - $city1Radius) . " км ====(Город 1)==== " . ($city1 + $city1Radius) . " км/============/" . ($city2 - $city2Radius) . " км ====(Город 2)==== " . ($city2 + $city2Radius) . " км/========";
echo "\n";

// Create cars
for ($i = 1; $i < 11; $i++) {
    $cars["Машина $i"] = rand(1, 1000);
}

// Where is the car and what it's speed?
foreach ($cars as $carKey => $carPosition) {
    if (($carPosition >= ($city1 - $city1Radius) && $carPosition <= ($city1 + $city1Radius)) || ($carPosition >= ($city2 - $city2Radius) && $carPosition <= ($city2 + $city2Radius))) {
        echo "$carKey едет по городу на $carPosition км со скоростью не более $inCitySpeed км/ч" . "\n";
    } else {
        echo "$carKey едет за городом на $carPosition км со скоростью не более $outCitySpeed км/ч" . "\n";
    }
}
