<?php
//namespace App\controllers;
use App\components\ViewPage;
use App\controllers\AbstractController;
use App\components\World\WorldGen;

class NewgameController extends AbstractController
{
    private $title = "game";
    private $world_arr;
    private $data = array();
    private $field_row = 3;
    private $field_col = 3;

   function __construct($path)
   {
       parent::__construct($path);
       $this->data['field_row'] = $this->field_row;
       $this->data['field_col'] = $this->field_col;
   }

    public function actionView()
    {
        if (isset($_POST['load_data'])) {
            //TODO set col and row
            $world_gen = new WorldGen($this->field_row, $this->field_col);
            $this->world_arr = $world_gen->takeStep();
            echo(json_encode($this->world_arr));// return world in table
        } else {
            //render page
            $view = new ViewPage();
            $view->render($this->path, $this->title, $this->data);
        }
    }
}