<?php


namespace App\components\World;


class WorldGen
{
    private $rand;
    private $world_arr = array('1' => array('1' => '', '2' => '', '3' => ''),
        '2' => array('1' => '', '2' => '', '3' => ''),
        '3' => array('1' => '', '2' => '', '3' => ''));

    public function takeStep()
    {

        for ($i = 1; $i <= count($this->world_arr); $i++) {
            foreach ($this->world_arr[$i] as $key => $value) {
//            echo $value;
                $this->world_arr[$i][$key] = rand(1, 100);
            }
        }

//        $this->rand = rand(1,100);
//        $this->world_arr[1][1] = $this->rand;
        return $this->world_arr;
    }
}