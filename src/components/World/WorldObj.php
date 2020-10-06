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

    public function deleteValue($coordinates)
    {
        $this->world_arr[$coordinates['1']][$coordinates['2']] = '2'; // '2' - empty cell
    }

    public function getWorldArr() // world for view
    {
        return $this->world_arr;
    }

    public function setCurrentStatistic($current_coordinates, $health, $energy)
    {
        $this->world_arr['statistic']['coordinates'] = $current_coordinates;
        $this->world_arr['statistic']['health'] = $health;
        $this->world_arr['statistic']['energy'] = $energy;
    }

    public function getAroundValue($direction_arr)
    {
        for ($i = 1; $i <= count($direction_arr); $i++) {
            if ($direction_arr[$i]['1'] < 1
                or $direction_arr[$i]['1'] > 20
                or $direction_arr[$i]['2'] < 1
                or $direction_arr[$i]['2'] > 20) {
                $direction_arr[$i]['3'] = 0;
            } else {
                if (isset($this->world_arr[$direction_arr[$i]['1']][$direction_arr[$i]['2']])) {
                    $direction_arr[$i]['3'] = $this->world_arr[$direction_arr[$i]['1']][$direction_arr[$i]['2']]; //get terrain value for around unit
                }
            }
        }
        return $direction_arr;
    }
}