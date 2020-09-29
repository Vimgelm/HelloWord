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
    protected $logic;

    function __construct($coordinates)
    {
        $this->coordinates = $coordinates;
        $this->logic = new MobLogic($coordinates);
    }

    public function unit_move()// receive float value
    {
        $coordinates = $this->logic->changeDirection();
        $this->coordinates = $coordinates; // update current coordinate
        //change coordinate to world obj
        $_SESSION['world']->setValue($this->coordinates,UNIT);
    }

}