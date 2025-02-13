<?php

namespace TourDeMaroc\App\controllers;

use TourDeMaroc\App\libraries\Controller;

class HomeController extends Controller {
    public function index() {
        $this->view("home");
    }
}