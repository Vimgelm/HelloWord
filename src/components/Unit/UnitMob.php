<?php


namespace App\components\Unit;

use App\components\Unit\AbstractUnit;
use App\components\Logic\MobLogic;

define("STEP_LENGHT", "1");
define("UNIT", "@");

class UnitMob extends AbstractUnit
{
    private $health = 100;
    private $energy = 1000;
    private $coordinates;
    private $cell_value = 2; // cell value under the unit

    function __construct($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    public function unit_move() //TODO костыль с возращением старого значения, которое находится под юнитом (стабильно работает)
    {
        $logic = new MobLogic($this->coordinates);
        $new_coordinates = $logic->changeDirection();
//        $this->cell_value = $_SESSION['world']->getValue($new_coordinates); //get current cell value
        $prev_coordinates  = self::updateCoordinates($new_coordinates);// update current coordinate
        $_SESSION['world']->setCurrentCoord($new_coordinates); //for view unit statistic
        $_SESSION['world']->setValue($prev_coordinates, $this->cell_value); //return prev value
        $_SESSION['world']->setValue($this->coordinates, UNIT); //change coordinate to world obj
    }

    public function unitEat()
    {
        $this->energy + 100; // if unit ate, increase unit energy
    }

    public function unitHunger()
    {
        $this->energy - 50; // each step decrease energy
        if ($this->energy <= 0) {
            $this->health - 10;
            return true;
        } elseif ($this->health <= 0) {
            return false;
        }
    }

    private function updateCoordinates($new_coordinates)
    {
        $prev_coordinates = $this->coordinates;
        $this->coordinates = $new_coordinates;
        return $prev_coordinates;
    }


}