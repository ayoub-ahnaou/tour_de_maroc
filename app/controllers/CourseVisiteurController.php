<?php

use TourDeMaroc\App\models\categories;

class CourseVisiteurController extends Controller {
    public function index() {
    $categories=new categories();
    $categoriesList = $categories->SelectCategorie(); 
    $data = compact("categoriesList");
    $this->view("courseVisiteur", $data );
    }
}