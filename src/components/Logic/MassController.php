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
        for ($i = 1; $i <= count($_SESSION['units']); $i++) {
            $_SESSION['units']['UnitMob' . $i]->unit_move();
            $status = $_SESSION['units']['UnitMob' . $i]->getStatus();
            if ($status === false) {
                unset($_SESSION['units']['UnitMob' . $i]); //delete if here status dead
            }
        }

    }
}