<?php

namespace TourDeMaroc\App\controllers;

use TourDeMaroc\App\libraries\Controller;

   class LogoutController extends Controller {
        public function logout() {
            session_start();
            session_destroy();
            header("Location: /");
            exit;
        }
    }