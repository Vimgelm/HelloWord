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
$_SESSION['UnitMob1']->unit_move();
    }
}