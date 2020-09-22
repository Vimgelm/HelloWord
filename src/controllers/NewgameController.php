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

    public function actionView()
    {
        if (isset($_POST['load_data'])) {   // send world
            echo 'asdasdfkjshadkjfh';

        } else {                            //render page
            $world_gen = new WorldGen();
            $this->world_arr = $world_gen->takeStep();
            $this->data['world_arr'] = $this->world_arr;
//        var_dump($this->world_arr);
            $view = new ViewPage();
            $view->render($this->path, $this->title, $this->data);
        }
    }
}