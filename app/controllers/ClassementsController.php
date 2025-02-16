<?php

use TourDeMaroc\App\Models\ClassementModel;
use TourDeMaroc\App\models\EtapeModel;

class ClassementsController extends Controller {
    public function general() {
        $total_distance = (new EtapeModel())->getTotalEtapesDistance();
        $classements = (new ClassementModel())->getClassementGeneral();
        $this->view("classements/classements", compact("classements", "total_distance"));
    }

    public function index() {
        header("location: " . URL_ROOT . "/classements/general");
    }

    public function etape($ordre) {
        $etape = (new EtapeModel())->getEtapeByOrdre($ordre);
        $maxEtapes = (new EtapeModel())->maxEtapes();
        $classements = (new ClassementModel())->getEtapeClassement($ordre);
        $this->view("classements/classementEtape", compact("etape", "maxEtapes", "classements"));
    }
}