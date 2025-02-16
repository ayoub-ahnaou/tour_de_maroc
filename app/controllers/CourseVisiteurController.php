<?php

use TourDeMaroc\App\models\courses;


class CourseVisiteurController extends Controller {
    public function index() {
        $categories = new courses();
        $categoriesList = $categories->SelectCourse(); 
        $data = compact("categoriesList");
        $this->view("CategorieVisiteur", $data);
    }
}