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

    public function getValue($coordinates) // return current cell value
    {
        $cell_value = $this->world_arr[$coordinates['1']][$coordinates['2']];
        return $cell_value;
    }

    public function getWorldArr()
    {
        return $this->world_arr;
    }

    public function setCurrentCoord($current_coordinates)
    {
        $this->world_arr['coordinates'] = $current_coordinates;
    }

    public function getAroundValue($direction_arr)
    {
        for ($i = 1; $i <= count($direction_arr); $i++) {
            if ($direction_arr[$i]['1'] == null or $direction_arr[$i]['2'] == null) {
                $direction_arr[$i]['3'] = null;
                break;
            } else {
                if (isset($this->world_arr[$direction_arr[$i]['1']][$direction_arr[$i]['2']])){
                    $direction_arr[$i]['3'] = $this->world_arr[$direction_arr[$i]['1']][$direction_arr[$i]['2']]; //get terrain value for around unit
                }

            }
        }
        return $direction_arr;
    }
}