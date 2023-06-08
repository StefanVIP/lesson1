<?php

abstract class Vehicle
{

    private string $modelName;
    protected int $number;

    public function __construct(string $modelName)
    {
        $this->number = rand(1, 1000);
        $this->modelName = $modelName;
    }

    public function getModelName()
    {
        return $this->modelName;
    }

    public function refactor(string $newName)
    {
        $this->modelName = $newName;
    }

    public function getNumber()
    {
        return $this->number;
    }

    abstract public function move();
}

class Car extends Vehicle
{
    static public string $fdsfdsf = 'Я механизм';

    public function move()
    {
        return 'Я машина и я еду по дороге';
    }
}

final class Plane extends Vehicle
{
    public function move()
    {
        return 'Я самолет и я лечу';
    }

    public function getNumber()
    {
        return 'Plane' . $this->number;
    }
}

var_dump(Car::$fdsfdsf);

//
//$car = new Car('X7');
//$car->refactor('X9');
//
//var_dump($car->getModelName());
//var_dump($car->getNumber());
//var_dump($car->move());
//
//$car = new Plane('737');
//$car->refactor('747');
//
//var_dump($car->getModelName());
//var_dump($car->getNumber());
//var_dump($car->move());