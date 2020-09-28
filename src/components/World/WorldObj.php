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
    return $this->world_arr;
    }
    public function setValue($coordinates, $unit){
        $coordinates = explode('.',$coordinates); //explode 20.20 into  coordinates 20 20
        $this->world_arr[$coordinates['0']][$coordinates['1']] = $unit;
    }
}