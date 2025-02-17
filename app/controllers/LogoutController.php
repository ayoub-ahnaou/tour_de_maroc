<?php

   class LogoutController extends Controller {
        public function logout() {
            session_start();
            session_destroy();
            header("Location:Login/login");
            exit;
            $this->view('login'); 
        }
    }