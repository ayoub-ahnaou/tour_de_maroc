<?php

use TourDeMaroc\App\models\EtapeModel;

class HomeController extends Controller {
    public function index() {
        $etapes = (new EtapeModel())->getAllEtapes();
        $this->view("home", compact("etapes"));
    }

}