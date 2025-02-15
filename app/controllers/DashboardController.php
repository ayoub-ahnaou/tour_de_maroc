<?php
// DashboardController.php
use TourDeMaroc\App\libraries\Controller;
use TourDeMaroc\App\models\CategorieModel;
use TourDeMaroc\App\models\EtapeModel;
use TourDeMaroc\App\models\CyclistModel;

class Dashboardcontroller extends Controller {
    private $cyclistModel;

    public function __construct() {
        $this->cyclistModel = new CyclistModel();
    }

    public function index() {
        header("location: " . URL_ROOT . "/dashboard/overview");
    }
   
    public function overview() {
        $this->view("admin/overview");
    }

    public function cyclistes() {
        $mostFollowedCyclists = $this->cyclistModel->getMostFollowedCyclists();
        $this->view("admin/cyclistes/cyclistes", ['mostFollowedCyclists' => $mostFollowedCyclists]);
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