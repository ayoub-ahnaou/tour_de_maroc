<?php

use TourDeMaroc\App\Models\BadgeModel;
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

    public function badges() {
        $nom_badge = $nom_badge_err = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["badge"]))) {
                $badge_err = "Le nom de badge est requis.";
            } else {
                $nom_badge = trim($_POST["badge"]);
                $response = (new BadgeModel())->createBadge($nom_badge);
            }

        }
        $badges = (new BadgeModel())->getAllBadges();
        $this->view("admin/badges/badges", compact("badges"));
    }
}