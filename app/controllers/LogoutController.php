<?php

use TourDeMaroc\App\libraries\Controller;

   class LogoutController extends Controller {
        public function logout() {
            session_start();
            session_destroy();
            header("Location:home");
            exit;
            $this->view('home'); 
        }
    }