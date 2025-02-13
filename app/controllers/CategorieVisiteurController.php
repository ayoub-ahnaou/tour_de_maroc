<?php


use TourDeMaroc\App\models\categories;

class CategorieVisiteurController extends Controller {
    public function index($id) {
        $course_id = $id;
        $categories = new categories();
        $categoriesList = $categories->SelectCategorie(); 
        $data = compact("categoriesList");
        $this->view("categorieVisiteur", $data);
    }

}