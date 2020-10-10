<?php
//namespace App\controllers;
use App\components\ViewPage;
use App\controllers\AbstractController;
use App\components\World\WorldObj;
use App\components\Logic\MassController;
use App\components\World\WorldUnit;

class NewgameController extends AbstractController
{
    private $title = "game";
    private $world_arr;
    private $data = array();
    private $field_row = 20;
    private $field_col = 20;
    private $unit_arr = array('1'=>'mob','2'=>'mob','3'=>'mob','4'=>'mob','5'=>'mob'
    ,'6'=>'mob','7'=>'mob','8'=>'mob','9'=>'mob'
    ,'10'=>'mob','11'=>'mob','12'=>'mob','13'=>'mob'
    ,'14'=>'mob','15'=>'mob','16'=>'mob','17'=>'mob'
    ,'18'=>'mob','19'=>'mob','20'=>'mob'
    ,'21'=>'mob','22'=>'mob','23'=>'mob','24'=>'mob'
    ,'25'=>'mob','26'=>'mob','27'=>'mob','28'=>'mob');

    function __construct($path)
    {
        parent::__construct($path);
        $this->data['field_row'] = 20;
        $this->data['field_col'] = 20;
    }

    public function actionView()
    {
        if (isset($_POST['load_data'])) {
            $control = new MassController();
            $control->nextStep();
            $this->world_arr = $_SESSION['world']->getWorldArr();
            echo(json_encode($this->world_arr));// return world in table
        } else {
            //create world
            $world_obj = new WorldObj();
            $world_obj->createWorld();
            $_SESSION['world'] = $world_obj;
            $create_unit = new WorldUnit(); //create unit obj
            $create_unit->fillWorldUnit($this->unit_arr);
                //render page
            $view = new ViewPage();
            $view->render($this->path, $this->title, $this->data);
        }
    }
}