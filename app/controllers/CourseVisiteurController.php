<?php


use TourDeMaroc\App\models\courses;


class CourseVisiteurController extends Controller {
    public function index() {
        $courses = new courses();
        $coursesList = $courses->SelectCourse(); 
        $data = compact("coursesList");
        $this->view("courseVisiteur", $data);
    }
}