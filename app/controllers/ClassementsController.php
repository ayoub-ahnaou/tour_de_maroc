<?php

use TourDeMaroc\App\Models\ClassementModel;
use TourDeMaroc\App\models\EtapeModel;

class ClassementsController extends Controller {
    public function general() {
        $this->view("classements/classements");
    }

    public function etape($ordre) {
        $etape = (new EtapeModel())->getEtapeByOrdre($ordre);
        $maxEtapes = (new EtapeModel())->maxEtapes();
        $classements = (new ClassementModel())->getEtapeClassement($ordre);
        $this->view("classements/classementEtape", compact("etape", "maxEtapes", "classements"));
    }
}