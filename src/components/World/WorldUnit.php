<?php


namespace App\components\World;

use App\components\Unit\UnitMob as UnitMob;

class WorldUnit //fill the world
{
    private $coordinates = array();

    public function fillWorldUnit($unit_arr) //create unit obj and write session
    {
        for ($i = 1; $i <= count($unit_arr); $i++) {
            $class_name = 'UnitMob';
            self::setCoordinates();
            $unit_obj = new UnitMob($this->coordinates);
            $_SESSION["$class_name$i"] = $unit_obj;
        }
    }

    protected function setCoordinates()
    {
        $coordinates = array();
        $coordinates['1'] = rand(1,20);
        $coordinates['2'] = rand(1,20);
        $this->coordinates =  $coordinates;
    }
}