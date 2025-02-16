<?php

use TourDeMaroc\App\Models\ClassementModel;
use TourDeMaroc\App\models\EtapeModel;

class HomeController extends Controller {
    public function index() {
        $etapes = (new EtapeModel())->getAllEtapes();
        $classements = (new ClassementModel())->getClassementGeneral();
        $this->view("home", compact("etapes", "classements"));
    }

}