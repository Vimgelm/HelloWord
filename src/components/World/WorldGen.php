<?php


namespace App\components\World;


class WorldGen
{
    private $field_row;
    private $field_col;
    private $rand;
    private $world_arr = array('1' => array('1' => '', '2' => '', '3' => ''),
        '2' => array('1' => '', '2' => '', '3' => ''),
        '3' => array('1' => '', '2' => '', '3' => ''));

    function __construct($field_col, $field_row)
    {
        $this->field_row = $field_row;
        $this->field_col = $field_col;
    }

    public function takeStep()
    {
        for ($i = 1; $i <= count($this->world_arr); $i++) {
            foreach ($this->world_arr[$i] as $key => $value) {
                $this->world_arr[$i][$key] = rand(1, 100);
            }
        }

//        $this->rand = rand(1,100);
//        $this->world_arr[1][1] = $this->rand;
        return $this->world_arr;
    }
}