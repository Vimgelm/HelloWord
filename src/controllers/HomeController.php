<?php

//namespace App\controllers;

use App\models\HomeModel;
use App\controllers\AbstractController;
use App\components\ViewPage;

class HomeController extends AbstractController
{
    private $title = "home";
    public $data = "page";
    public function actionView()
    {

        $view = new ViewPage();
        $view->render($this->path, $this->title);
    }

}