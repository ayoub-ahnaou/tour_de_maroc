<?php

use TourDeMaroc\App\models\CategorieModel;
use TourDeMaroc\App\models\EtapeModel;

class Dashboardcontroller extends Controller {
    public function index() {
        header("location: " . URL_ROOT . "/dashboard/overview");
    }
    
    public function overview() {
        $this->view("admin/overview");
    }

    public function fans() {
        $this->view("admin/fans/fans");
    }

    public function categories() {
        $categories = (new CategorieModel())->getAllCategories();
        $this->view("admin/categories/categories", compact("categories"));
    }

    public function etapes() {
        $etapes = (new EtapeModel())->getAllEtapes();
        $this->view("admin/etapes/etapes", compact("etapes"));
    }
}