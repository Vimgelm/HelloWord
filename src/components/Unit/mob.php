<?php


namespace App\components\Unit;

use App\components\Unit\AbstractUnit;

define("STEP_LENGHT", "1");
define("UNIT","@");

class mob extends AbstractUnit
{
    private $health;
    private $energy;
    private $coordinates;

    public function unit_move($direction)// receive float value
    {
        $pos = 0; //current position
        switch ($direction) {
            case 1:
                $pos = $this->coordinates - 1.1;
                break;
            case 2:
                $pos = $this->coordinates - 0.1;
                break;
            case 3:
                $pos = $this->coordinates + 0.9;
                break;
            case 4:
                $pos = $this->coordinates + 1;
                break;
            case 5:
                $pos = $this->coordinates + 1.1;
                break;
            case 6:
                $pos = $this->coordinates + 0.1;
                break;
            case 7:
                $pos = $this->coordinates - 0.9;
                break;
            case 8:
                $pos = $this->coordinates - 1.0;
                break;
        }
        $this->coordinates = $pos;

        return $this->coordinates;
    }

}