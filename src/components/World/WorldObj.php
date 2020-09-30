<?php


namespace App\components\World;

use App\components\World\WorldGen;

class WorldObj
{
    private $world_arr;

    public function createWorld()
    {
        $generate = new WorldGen();
        $this->world_arr = $generate->world_gen();
    }

    public function setValue($coordinates, $unit)
    {
        $this->world_arr[$coordinates['1']][$coordinates['2']] = $unit;
    }

    public function getValue($coordinates)
    {
        $cell_value = $this->world_arr[$coordinates['1']][$coordinates['2']];
        return $cell_value;
    }

    public function getWorldArr()
    {
        return $this->world_arr;
    }
}