<?php


namespace App\components\Unit;

use App\components\Unit\AbstractUnit;
use App\components\Logic\MobLogic;

define("STEP_LENGHT", "1");
define("UNIT", "@");

class UnitMob extends AbstractUnit
{
    private $health;
    private $energy;
    private $coordinates;

    function __construct($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    public function unit_move()
    {
        $logic = new MobLogic($this->coordinates);
        $coord = $logic->changeDirection();
        $prev_coordinates = $this->coordinates;
        $this->coordinates = $coord; // update current coordinate
        $cell_value = $_SESSION['world']->getValue($this->coordinates); //get current cell value
        $_SESSION['world']->setValue($prev_coordinates, $cell_value); //return prev value
        $_SESSION['world']->setValue($this->coordinates, UNIT); //change coordinate to world obj
    }

}