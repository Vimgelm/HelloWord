<?php
//namespace App\controllers;
use App\components\ViewPage;
use App\controllers\AbstractController;
use App\components\World\WorldObj;
use App\components\Logic\MassController;
class NewgameController extends AbstractController
{
    private $title = "game";
    private $world_arr;
    private $data = array();
    private $field_row = 20;
    private $field_col = 20;

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
            $this->world_arr = $_SESSION['world']-> getWorldArr();
            echo(json_encode($this->world_arr));// return world in table
        } else {
            //create world
            $world_obj = new WorldObj();
            $world_obj->createWorld();
            $_SESSION['world'] = $world_obj;
            //render page
            $view = new ViewPage();
            $view->render($this->path, $this->title, $this->data);
        }
    }
}