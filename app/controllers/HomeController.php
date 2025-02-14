<?php

use TourDeMaroc\App\libraries\Controller;

class HomeController extends Controller {
    public function index() {
        $this->view("home");
    }
}