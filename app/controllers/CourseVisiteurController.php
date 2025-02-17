<?php

use TourDeMaroc\App\models\categories;
use TourDeMaroc\App\models\courses;

class CourseVisiteurController extends Controller {
    public function index() {
    $categories=new categories();
    $categoriesList = $categories->SelectCategorie(); 
    $data = compact("categoriesList");
    $this->view("courseVisiteur", $data );
    }
}