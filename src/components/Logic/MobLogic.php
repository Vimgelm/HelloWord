<?php


namespace App\components\Logic;


class MobLogic
{
    private $border_field = array('1'=>'0','2'=>'21'); //coordinates out the field
    private $coordinates;

    function __construct($coordinates){
        $this->coordinates = $coordinates;
    }

    public function changeDirection() //change random direction
    {
       $direction_arr = $this->makeDirectionArr();
       $pol_arr = $this->filterDirectionArr($direction_arr);
        $direction = rand($pol_arr);
    return $direction;
    }

    private function makeDirectionArr(){
        $directions_arr = array();
        for ($i=1; $i < 8; $i++){
            switch ($i){
                case 1:
                    $directions_arr['1'] = $this->coordinates - 1.1;
                    break;
                case 2:
                    $directions_arr['2'] = $this->coordinates - 0.1;
                    break;
                case 3:
                    $directions_arr['3'] = $this->coordinates + 0.9;
                    break;
                case 4:
                    $directions_arr['4'] = $this->coordinates +1.0;
                    break;
                case 5:
                    $directions_arr['5'] = $this->coordinates +1.1;
                    break;
                case 6:
                    $directions_arr['6'] = $this->coordinates +0.1;
                    break;
                case 7:
                    $directions_arr['7'] = $this->coordinates -0.9;
                    break;
                case 8:
                    $directions_arr['8'] = $this->coordinates -1.0;
                    break;
            }
        }
        return $directions_arr;
    }

    private function filterDirectionArr($direction_arr){
        foreach ($direction_arr as $key){
            if($this->border_field['1'] and $this->border_field['2']){
            unset($direction_arr[$key]);
            }
        }
    }
}