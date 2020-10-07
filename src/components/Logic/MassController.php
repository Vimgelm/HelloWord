<?php


namespace App\components\Logic;

use App\components\Unit\UnitMob;

class MassController
{
    private $mob;

    function __construct()
    {

    }

    public function nextStep()
    {
        foreach ($_SESSION['units'] as $key => $value){
            $value->unit_move();
            $status = $value->getStatus();
            if ($status === false) {
                unset($_SESSION['units'][$key]); //delete if here status dead
            }
        }
    }
}