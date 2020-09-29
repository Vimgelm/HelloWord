<?php


namespace App\components\Logic;

use App\components\Unit\UnitMob;
class MassController
{
    private $mob;
    function __construct()
    {
        $coordinates =  array('0'=> 2, '1'=> 2);
        $this->mob = new UnitMob($coordinates);
    }

    public function nextStep()
    {
        $this->mob->unit_move();
    }
}