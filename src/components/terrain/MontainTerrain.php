<?php


namespace App\components\terrain;

define('MOUNTAIN', 'M');

class MontainTerrain
{
    private $health;

    public function getSymbol()
    {
        return MOUNTAIN;
    }
}