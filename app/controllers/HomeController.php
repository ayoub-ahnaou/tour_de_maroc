<?php

Use TourDeMaroc\App\Libraries\Controller;

class HomeController extends Controller {
    public function index() {
        $this->view("home");
    }
}