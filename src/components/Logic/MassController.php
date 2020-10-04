<?php


namespace App\components\Logic;

use App\components\Unit\UnitMob;

class MassController
{
    private $mob;

    function __construct()
    {

    }

    public function nextStep($unit_arr)
    {
        for ($i = 1; $i <= count($unit_arr); $i++) {
            $_SESSION['UnitMob'.$i]->unit_move();
        }

    }
}