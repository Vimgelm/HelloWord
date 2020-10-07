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
    private $status;

    function __construct($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    function __destruct()
    {
        $_SESSION['world']->setValue($this->coordinates, $this->cell_value);
    }

    public function unit_move() //TODO костыль с возращением старого значения, которое находится под юнитом (стабильно работает1w)
    {
        $logic = new MobLogic($this->coordinates);
        $new_coordinates = $logic->changeDirection();
//        $this->cell_value = $_SESSION['world']->getValue($new_coordinates); //get current cell value
        $prev_coordinates = self::updateCoordinates($new_coordinates);// update current coordinate
        $_SESSION['world']->setValue($prev_coordinates, $this->cell_value); //return prev value
        self::unitHunger(); //check mob status (live or dead)
        $food = $_SESSION['world']->getValue($this->coordinates);
        if ($food === '#') {
            self::unitEat(); //increase energy if next target food
        }
        $_SESSION['world']->setValue($this->coordinates, UNIT); //change coordinate to world obj

        //send first unit statistic for debug
        $_SESSION['world']->setCurrentStatistic($this->coordinates, $this->health, $this->energy);
    }

    private function unitEat()
    {
        $this->energy = $this->energy + 200; // if unit ate, increase unit energy
    }

    private function unitHunger()
    {
        $this->energy = $this->energy - 50; // each step decrease energy
        if ($this->energy <= 0) {
            $this->energy = 0; //crutch
            $this->health = $this->health - 10;
        }
        if ($this->health <= 0) {
            $this->status = false;
        } else {
            $this->status = true;
        }
    }

    private function updateCoordinates($new_coordinates)
    {
        $prev_coordinates = $this->coordinates;
        $this->coordinates = $new_coordinates;
        return $prev_coordinates;
    }

    public function getStatus()
    {
        return $this->status;
    }


}